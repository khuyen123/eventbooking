<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\client\titketCreateRequest;
use App\Http\Service\admin\eventDetailService;
use App\Http\Service\admin\pageInforService;
use App\Http\Service\client\eventDetailclientService;
use App\Http\Service\client\titketService;
use App\Models\checkseat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class titketController extends Controller
{
    protected $titketService;
    protected $eventdetailService;
    protected $client_detaildetailService,$pageInforService;
    public function __construct(pageInforService $pageInforService, titketService $titketService,eventDetailService $eventDetailService, eventDetailclientService $eventDetailclientService)
    {
        $this->titketService = $titketService;
        $this->eventdetailService = $eventDetailService;
        $this->client_detaildetailService = $eventDetailclientService;
        $this->pageInforService = $pageInforService;
    }   
    
    public function titket_create(titketCreateRequest $request){
        // dd($request->all());
        $eventdetail = $this->eventdetailService->find($request->id_chitietsukien);
        $data = $request->input();
        $image = $this->client_detaildetailService->getOneimage($request->id_chitietsukien);
        $result = $this->titketService->create($data);
        $truve['sovedaban'] = $eventdetail->sovedaban+$request->soCho;
        if ($new_ticket = $result){
            $this->eventdetailService->update($eventdetail,$truve);
            Mail::send('client.titket.titket_mail',compact('new_ticket','image'), function($email) use ($new_ticket) {
                $email->subject('Thông tin đặt vé');
                $email->to($new_ticket->email_nguoidat,$new_ticket->ten_nguoidat);
            });
            $seat = explode(",",$new_ticket->soGhe);
            foreach($seat as $key){
                DB::table('checkghe')
                ->where('soGhe','=',$key)
                ->where('id_nguoidung','=',$new_ticket->id_nguoidung)
                ->where('id_chitietsukien','=',$new_ticket->id_chitietsukien)
                ->limit(1)
                ->update(array('trangthai'=>1));
            }
            return response()->json([
                'status'=>200
            ]);
        } else {
            return response()->json([
                'status'=>404
            ]);
        }
    }
    public function momo_payment(titketCreateRequest $request){
        

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán vé: ".$request->id_ve;
        $amount = $request->tongtien;
        $orderId = time() ."";
        $redirectUrl = "http://127.0.0.1:8000/client/titket/momo_payment_success/". $request->id_ve;
        $ipnUrl = "http://127.0.0.1:8000/client/titket/momo_payment_success/". $request->id_ve;
        $extraData = "";
            $requestId = time() . "";
            $requestType = "captureWallet";
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json
        
            //Just a example, please check more in there
            $eventdetail = $this->eventdetailService->find($request->id_chitietsukien);
            $data = $request->input();
            $result_2 = $this->titketService->create($data);
            $truve['sovedaban'] = $eventdetail->sovedaban+$request->soCho;
            $this->eventdetailService->update($eventdetail,$truve);
           
            
            if ($result_2){
                $seat = explode(",",$result_2->soGhe);
                foreach($seat as $key){
                    DB::table('checkghe')
                    ->where('soGhe','=',$key)
                    ->where('id_nguoidung','=',$result_2->id_nguoidung)
                    ->where('id_chitietsukien','=',$result_2->id_chitietsukien)
                    ->limit(1)
                    ->update(array('trangthai'=>1));
                }
                $payment_url = $jsonResult['payUrl'];
                //Just a example, please check more in there
                return response()->json([
                    'payment_url' => $payment_url
                ]);
              
            } else {
                return response()->json([
                    'status' => 404
                ]);
            }
         
        }
    public function execPostRequest($url, $data){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function momo_payment_success($titket_id, Request $request)
    {
        
        $titket = $this->titketService->search($titket_id);
        $image = $this->client_detaildetailService->getOneimage($titket->id_chitietsukien);
        $this->titketService->payment_success($titket);
        $url = 'http://127.0.0.1:8000/client/event_detail/'.$titket->id_chitietsukien;
        $eventdetail = $this->eventdetailService->find($titket->id_chitietsukien);
        if ($new_ticket = $titket){
            Mail::send('client.titket.titket_mail',compact('new_ticket','image'), function($email) use ($new_ticket) {
                $email->subject('Thông tin đặt vé');
                $email->to($new_ticket->email_nguoidat,$new_ticket->ten_nguoidat);
            });
            return redirect($url)->with('booking_success','1');
        }
        return response()->json([
            'status'=>404
        ]);
    }
    public function ticket_list($user_id){
        $page_infor = $this->pageInforService->getAll();

        $tickets = $this->titketService->findticket_byuser($user_id);
        if (Auth::user()->quyentruycap != 1){
            return redirect()->back();
        }
        return view('client.titket.ticket_list',[
            'tickets'=>$tickets,
            'page_infor'=>$page_infor
        ]);
    }
    public function ticket_detail($ticket_id){
        $page_infor = $this->pageInforService->getAll();
        if (Auth::user()->quyentruycap != 1){
            return redirect()->back();
        }
        $new_titket = $this->titketService->search($ticket_id);
        return view('client.titket.ticket_detail',[
            'new_titket'=>$new_titket,
            'page_infor'=>$page_infor
        ]);
    }
    public function vnpay_payment(titketCreateRequest $request){

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/client/titket/momo_payment_success/". $request->id_ve;
        $vnp_TmnCode = "RJZMGBFT";//Mã website tại VNPAY 
        $vnp_HashSecret = "JVBVXDAXWGAJGWIOYIQMVXSSITWJBOYP"; //Chuỗi bí mật

        $vnp_TxnRef = $request->id_ve; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng test';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->tongtien * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
       
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $eventdetail = $this->eventdetailService->find($request->id_chitietsukien);
        $data = $request->input();
        $result_2 = $this->titketService->create($data);
        $truve['sovedaban'] = $eventdetail->sovedaban+$request->soCho;
        $this->eventdetailService->update($eventdetail,$truve);
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $seat = explode(",",$result_2->soGhe);
                foreach($seat as $key){
                    DB::table('checkghe')
                    ->where('soGhe','=',$key)
                    ->where('id_nguoidung','=',$result_2->id_nguoidung)
                    ->where('id_chitietsukien','=',$result_2->id_chitietsukien)
                    ->limit(1)
                    ->update(array('trangthai'=>1));
                }
            $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            return response()->json(['payment_url'=>$vnp_Url]);
        }  
}

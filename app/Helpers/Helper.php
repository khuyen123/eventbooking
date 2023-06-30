<?php

namespace App\Helpers;

use app\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class Helper
{
    public static function category($categories){
        $html='';
        $i=1;
        foreach ($categories as $key=>$category){
                $html .= '
                    <tr>
                        <td><input onclick="selectManycategory('.$category->id.')" id="check_category'.$category->id.'"type="checkbox"/></td>
                        <td>'. $category->id .'</td>
                        <td>'. $category->tenDanhmuc .'</td>
                        <td>'. $category->mota .'</td>
                        <td>
                            <a class="btn btn-primary btn-sm" onclick="show_category('.$category->id.')">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" onclick="deleteEventcategory('.$category->id.')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>

                ';
        }
        return $html;
    }
    public static function event($events){
        $html='';
        $i=1;
        foreach ($events as $key=>$event){
                $html .= '
                    <tr>
                        <td><input onclick="selectManyevent('.$event->id.')" id="check_event'.$event->id.'"type="checkbox"/></td>
                        <td>'. $event->id .'</td>
                        <td>'. $event->tenSukien .'</td>
                        <td>'. $event->motaSuKien .'</td>
                        <td>'. $event->category->tenDanhmuc .'</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="/admin/event_detail/'.$event->id.'/index">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <a class="btn btn-primary btn-sm" onclick="show_event('.$event->id.')">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" onclick="deleteEvent('.$event->id.')">
                                <i class="fas fa-trash"></i>
                            </a>
                           
                        </td>
                    </tr>

                ';
        }
        return $html;
    }
    public static function event_detail($event_details){
        $html='';
        $i=1;
        foreach ($event_details as $key=>$event_detail){
                $html .= '
                    <tr>
                        
                        <td>'. $event_detail->event->tenSukien .'</td>
                        <td>'. $event_detail->ten_lienhe .'</td>
                        <td>'. $event_detail->event->category->tenDanhmuc .'</td>
                        <td>'. $event_detail->wards->district->province->tentinhthanh .'</td>
                        <td>'. $event_detail->khuvuc .'</td>
                        <td>'. $event_detail->giave .'</td>
                        <td>'. self::active($event_detail->trangthai) .'</td>
                        <td>
                      
                            <a class="btn btn-primary btn-sm" href="/admin/event_detail/'.$event_detail->event->id.'/edit/'.$event_detail->id.'">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" onclick="deleteEventdetail('.$event_detail->id.')">
                                <i class="fas fa-trash"></i>
                            </a>
                           
                        </td>
                    </tr>

                ';
        }
        return $html;
    }
    public static function user($users){
        $html='';
        $i=1;
        foreach ($users as $key=>$user){
                $html .= '
                    <tr>
                        <td>'.$i.'</td>
                        <td>'. $user->hoten .'</td>
                        <td>'. $user->ngaySinh .'</td>
                        <td>'.self::active($user->trangthai).'</td>
                        <td>'. $user->gioiTinh .'</td>
                        <td> ';
                        if (Auth::user()->id != $user->id && $user->quyentruycap !=3){
                        $html .='
                            <a class="btn btn-primary btn-sm" href="edit/'.$user->id.'">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" onclick="deleteuser('.$user->id.')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>

                ';}
                $i++;
        }
        return $html;
    }
    public static function image($images){
        $html='';
        $i=1;
     
        foreach ($images as $key=>$image){
            $html .= '
                    <tr>
                        <td>'.$i.'</td>
                        <td>'. $image->event_detail->event->tenSukien.'-' .$image->event_detail->wards->district->province->tentinhthanh.'</td>
                        <td><a  target="_blank"><img src="admin\Image" width="100px"></a></td>
                        <td>'. $image->updated_at .'</td>
                        <td>
                            <a class="btn btn-danger btn-sm" href="#" onclick="removeRow('. $image->id . ',\'/admin/image/destroy\')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>

                ';
                $i++;
        }
        return $html;
    }
    public static function active($active=0):string
    {
        return $active==0 ? ' <span style="font-size:15px" class="badge badge-danger">Kết thúc</span>':'<span style="font-size:15px" class="badge badge-success ">Đang hoạt động</span>';
    }
}

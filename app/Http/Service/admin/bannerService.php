<?php 
namespace App\Http\Service\admin;

use App\Models\banner;
use App\Repository\Eloquent\BannerRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class bannerService {
    protected $bannerRepository;
    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }
    public function getAll(){
        return $this->bannerRepository->getAll();
    }
    public function delete($id) {
        
        return $this->bannerRepository->delete($id);
    }
    public function update($event,$data){
        $this->bannerRepository->update($event,$data);
        return true;
    }
    public function find($id){
        return $this->bannerRepository->find($id);
    }
    public function create($data) {
        Session::flash('success', 'Thêm mới Banner thành công');
        return $this->bannerRepository->create($data);
    }
}
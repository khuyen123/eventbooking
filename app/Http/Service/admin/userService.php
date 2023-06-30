<?php 
namespace App\Http\Service\admin;

use App\Models\User;

use App\Repository\Eloquent\UserRepository;
use Illuminate\Support\Facades\Hash;

class userService {
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getAll(){
        return $this->userRepository->getAll();
    }
    public function delete($id) {
        
        return $this->userRepository->delete($id);
    }
    public function update($user,$data){
        $this->userRepository->update($user,$data);
        return true;
    }
    public function find($id){
        return $this->userRepository->find($id);
    }
}
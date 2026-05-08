<?php
namespace App\Repository;

use App\Models\User;
use App\Interface\AuthInterface;

class AuthRepository implements AuthInterface
{
    protected $model;
    public function __construct(User $model){
        $this->model = $model;
    }

    public function getEmail($email){
       return $this->model->where('email',$email)->first();
    }
    public function create($request){
        return $this->model->create($request);
    }

}
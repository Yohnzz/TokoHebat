<?php

namespace App\Http\Controllers\Auth;

use App\Handler\AuthHandler;
use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistRequest;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $handler;
    public function __construct(AuthHandler $handler){
        $this->handler = $handler;
    }

    public function register(RegistRequest $request){
        try{
            $request->validated();
            $register = $this->handler->register($request);
            return ResponseHelper::success($register,__('auth.register_success'));
        } catch (\Throwable $e){
            return ResponseHelper::error(null, __('auth.fail_register'). $e->getMessage());
        }
    }

    public function login(LoginRequest $request){
        try {
            $request->validated();
           $login = $this->handler->login($request);
            return ResponseHelper::success($login, __('auth.login_success'));
        } catch (\Throwable $e) {
            return ResponseHelper::error(null,__('auth.fail_login'). $e->getMessage());
        }
    }

    public function logout($request){
        try {
            $logout = $this->handler->logout($request);
            return ResponseHelper::success(null, __('auth.logout_success'));
        } catch (\Throwable $e) {
            return ResponseHelper::error(null, __('auth.fail_logout'). $e->getMessage());
        }
    }

}
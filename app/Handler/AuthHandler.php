<?php
namespace App\Handler;

use App\Interface\AuthInterface;

class AuthHandler{
    protected $repo;
    public function __construct(AuthInterface $repo){
        $this->repo = $repo;
    }

    public function register($request){
        return $this->repo->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    }
    
    public function login($request){
        $user = $this->repo->getEmail($request->email);

        if(!$user){
            return null;
        }
        
        $token = $user->createToken('login-token')->plainTextToken;
        return [
            'user' => $user,
            'token' => $token,
        ];
    }
    public function logout($request){
       return $request->user()->currentAccessToken()->delete();
    }

}
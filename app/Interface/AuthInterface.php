<?php
namespace App\Interface;

interface AuthInterface{
    public function getEmail($email);
    public function create($request);
}
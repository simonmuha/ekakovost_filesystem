<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    
    public function coming_soon()
    {
        return view('pages.authentication.coming-soon');
    }
    
    public function create_password_basic()
    {
        return view('pages.authentication.create-password-basic');
    }
    
    public function create_password_cover()
    {
        return view('pages.authentication.create-password-cover');
    }
    
    public function lockscreen_basic()
    {
        return view('pages.authentication.lockscreen-basic');
    }
    
    public function lockscreen_cover()
    {
        return view('pages.authentication.lockscreen-cover');
    }
    
    public function reset_password_basic()
    {
        return view('pages.authentication.reset-password-basic');
    }
    
    public function reset_password_cover()
    {
        return view('pages.authentication.reset-password-cover');
    }
    
    public function sign_in_basic()
    {
        return view('pages.authentication.sign-in-basic');
    }
    
    public function sign_in_cover()
    {
        return view('pages.authentication.sign-in-cover');
    }
    
    public function sign_up_basic()
    {
        return view('pages.authentication.sign-up-basic');
    }
    
    public function sign_up_cover()
    {
        return view('pages.authentication.sign-up-cover');
    }
    
    public function two_step_verification_basic()
    {
        return view('pages.authentication.two-step-verification-basic');
    }
    
    public function two_step_verification_cover()
    {
        return view('pages.authentication.two-step-verification-cover');
    }
    
    public function under_maintenance()
    {
        return view('pages.authentication.under-maintenance');
    }

}

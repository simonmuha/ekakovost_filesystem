<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function blog_create()
    {
        return view('pages.pages.blog-create');
    }
    
    public function blog_details()
    {
        return view('pages.pages.blog-details');
    }
    
    public function blog()
    {
        return view('pages.pages.blog');
    }
    
    public function chat()
    {
        return view('pages.pages.chat');
    }
    
    public function emptypage()
    {
        return view('pages.pages.emptypage');
    }
    
    public function faqs()
    {
        return view('pages.pages.faqs');
    }
    
    public function file_manager()
    {
        return view('pages.pages.file-manager');
    }
    
    public function invoice_create()
    {
        return view('pages.pages.invoice-create');
    }
    
    public function invoice_details()
    {
        return view('pages.pages.invoice-details');
    }
    
    public function invoice_list()
    {
        return view('pages.pages.invoice-list');
    }
    
    public function landing()
    {
        return view('pages.pages.landing');
    }
    
    public function mail_settings()
    {
        return view('pages.pages.mail-settings');
    }
    
    public function mail()
    {
        return view('pages.pages.mail');
    }
    
    public function pricing()
    {
        return view('pages.pages.pricing');
    }
    
    public function profile_settings()
    {
        return view('pages.pages.profile-settings');
    }
    
    public function profile()
    {
        return view('pages.pages.profile');
    }
    
    public function reviews()
    {
        return view('pages.pages.reviews');
    }
    
    public function search_results()
    {
        return view('pages.pages.search-results');
    }
    
    public function team()
    {
        return view('pages.pages.team');
    }
    
    public function terms_conditions()
    {
        return view('pages.pages.terms-conditions');
    }
    
    public function timeline()
    {
        return view('pages.pages.timeline');
    }
    
    public function to_do_list()
    {
        return view('pages.pages.to-do-list');
    }
    
}

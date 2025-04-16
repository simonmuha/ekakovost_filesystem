<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UielementsController extends Controller
{
    
    
    public function alerts()
    {
        return view('pages.uielements.alerts');
    }
    
    public function badge()
    {
        return view('pages.uielements.badge');
    }
    
    public function breadcrumb()
    {
        return view('pages.uielements.breadcrumb');
    }
    
    public function buttongroup()
    {
        return view('pages.uielements.buttongroup');
    }
    
    public function buttons()
    {
        return view('pages.uielements.buttons');
    }
    
    public function cards()
    {
        return view('pages.uielements.cards');
    }
    
    public function dropdowns()
    {
        return view('pages.uielements.dropdowns');
    }
    
    public function images_figures()
    {
        return view('pages.uielements.images-figures');
    }
    
    public function links_interactions()
    {
        return view('pages.uielements.links-interactions');
    }
    
    public function listgroup()
    {
        return view('pages.uielements.listgroup');
    }
    
    public function navs_tabs()
    {
        return view('pages.uielements.navs-tabs');
    }
    
    public function object_fit()
    {
        return view('pages.uielements.object-fit');
    }
    
    public function pagination()
    {
        return view('pages.uielements.pagination');
    }
    
    public function popovers()
    {
        return view('pages.uielements.popovers');
    }
    
    public function progress()
    {
        return view('pages.uielements.progress');
    }
    
    public function spinners()
    {
        return view('pages.uielements.spinners');
    }
    
    public function toasts()
    {
        return view('pages.uielements.toasts');
    }
    
    public function tooltips()
    {
        return view('pages.uielements.tooltips');
    }
    
    public function typography()
    {
        return view('pages.uielements.typography');
    }

}

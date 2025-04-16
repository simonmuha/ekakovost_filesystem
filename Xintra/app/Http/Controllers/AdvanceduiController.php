<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvanceduiController extends Controller
{
    
    public function accordions_collpase()
    {
        return view('pages.advancedui.accordions-collpase');
    }
    
    public function carousel()
    {
        return view('pages.advancedui.carousel');
    }
    
    public function draggable_cards()
    {
        return view('pages.advancedui.draggable-cards');
    }
    
    public function media_player()
    {
        return view('pages.advancedui.media-player');
    }
    
    public function modals_closes()
    {
        return view('pages.advancedui.modals-closes');
    }
    
    public function navbar()
    {
        return view('pages.advancedui.navbar');
    }
    
    public function offcanvas()
    {
        return view('pages.advancedui.offcanvas');
    }
    
    public function placeholders()
    {
        return view('pages.advancedui.placeholders');
    }
    
    public function ratings()
    {
        return view('pages.advancedui.ratings');
    }
    
    public function ribbons()
    {
        return view('pages.advancedui.ribbons');
    }
    
    public function scrollspy()
    {
        return view('pages.advancedui.scrollspy');
    }
    
    public function sortable_list()
    {
        return view('pages.advancedui.sortable-list');
    }
    
    public function swiperjs()
    {
        return view('pages.advancedui.swiperjs');
    }
    
    public function tour()
    {
        return view('pages.advancedui.tour');
    }


}

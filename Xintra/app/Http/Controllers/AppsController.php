<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppsController extends Controller
{
    
    public function add_products()
    {
        return view('pages.apps.add-products');
    }
    
    public function cart()
    {
        return view('pages.apps.cart');
    }
    
    public function checkout()
    {
        return view('pages.apps.checkout');
    }
    
    public function crm_companies()
    {
        return view('pages.apps.crm-companies');
    }
    
    public function crm_contacts()
    {
        return view('pages.apps.crm-contacts');
    }
    
    public function crm_deals()
    {
        return view('pages.apps.crm-deals');
    }
    
    public function crm_leads()
    {
        return view('pages.apps.crm-leads');
    }
    
    public function crypto_buy_sell()
    {
        return view('pages.apps.crypto-buy-sell');
    }
    
    public function crypto_currency_exchange()
    {
        return view('pages.apps.crypto-currency-exchange');
    }
    
    public function crypto_marketcap()
    {
        return view('pages.apps.crypto-marketcap');
    }
    
    public function crypto_transactions()
    {
        return view('pages.apps.crypto-transactions');
    }
    
    public function crypto_wallet()
    {
        return view('pages.apps.crypto-wallet');
    }
    
    public function edit_products()
    {
        return view('pages.apps.edit-products');
    }
    
    public function full_calendar()
    {
        return view('pages.apps.full-calendar');
    }
    
    public function gallery()
    {
        return view('pages.apps.gallery');
    }
    
    public function job_candidate_details()
    {
        return view('pages.apps.job-candidate-details');
    }
    
    public function job_candidate_search()
    {
        return view('pages.apps.job-candidate-search');
    }
    
    public function job_company_search()
    {
        return view('pages.apps.job-company-search');
    }
    
    public function job_details()
    {
        return view('pages.apps.job-details');
    }
    
    public function job_post()
    {
        return view('pages.apps.job-post');
    }
    
    public function job_search()
    {
        return view('pages.apps.job-search');
    }
    
    public function jobs_list()
    {
        return view('pages.apps.jobs-list');
    }
    
    public function nft_create()
    {
        return view('pages.apps.nft-create');
    }
    
    public function nft_details()
    {
        return view('pages.apps.nft-details');
    }
    
    public function nft_live_auction()
    {
        return view('pages.apps.nft-live-auction');
    }
    
    public function nft_marketplace()
    {
        return view('pages.apps.nft-marketplace');
    }
    
    public function nft_wallet_integration()
    {
        return view('pages.apps.nft-wallet-integration');
    }
    
    public function order_details()
    {
        return view('pages.apps.order-details');
    }
    
    public function orders()
    {
        return view('pages.apps.orders');
    }
    
    public function product_details()
    {
        return view('pages.apps.product-details');
    }
    
    public function products_list()
    {
        return view('pages.apps.products-list');
    }
    
    public function products()
    {
        return view('pages.apps.products');
    }
    
    public function projects_create()
    {
        return view('pages.apps.projects-create');
    }
    
    public function projects_list()
    {
        return view('pages.apps.projects-list');
    }
    
    public function projects_overview()
    {
        return view('pages.apps.projects-overview');
    }
    
    public function sweet_alerts()
    {
        return view('pages.apps.sweet-alerts');
    }
    
    public function task_details()
    {
        return view('pages.apps.task-details');
    }
    
    public function task_kanban_board()
    {
        return view('pages.apps.task-kanban-board');
    }
    
    public function task_list_view()
    {
        return view('pages.apps.task-list-view');
    }
    
    public function wishlist()
    {
        return view('pages.apps.wishlist');
    }


}

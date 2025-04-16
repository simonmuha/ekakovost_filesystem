<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdvanceduiController;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\IconsController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\UielementsController;
use App\Http\Controllers\UtilitiesController;
use App\Http\Controllers\WidgetsController;
use App\Http\Controllers\Controller; 

Route::get('/', function () {
    return view('welcome');
});


// Dashboards //
Route::get('/', [DashboardsController::class, 'index']);
Route::get('index', [DashboardsController::class, 'index']);
Route::get('index2', [DashboardsController::class, 'index2']);
Route::get('index3', [DashboardsController::class, 'index3']);
Route::get('index4', [DashboardsController::class, 'index4']);
Route::get('index5', [DashboardsController::class, 'index5']);
Route::get('index6', [DashboardsController::class, 'index6']);
Route::get('index7', [DashboardsController::class, 'index7']);
Route::get('index8', [DashboardsController::class, 'index8']);
Route::get('index9', [DashboardsController::class, 'index9']);
Route::get('index10', [DashboardsController::class, 'index10']);
Route::get('index11', [DashboardsController::class, 'index11']);
Route::get('index12', [DashboardsController::class, 'index12']);
Route::get('index13', [DashboardsController::class, 'index13']);
Route::get('index14', [DashboardsController::class, 'index14']);
Route::get('index15', [DashboardsController::class, 'index15']);
Route::get('index16', [DashboardsController::class, 'index16']);

// Advancedui //

Route::get('accordions-collpase', [AdvanceduiController::class, 'accordions_collpase']);
Route::get('carousel', [AdvanceduiController::class, 'carousel']);
Route::get('draggable-cards', [AdvanceduiController::class, 'draggable_cards']);
Route::get('media-player', [AdvanceduiController::class, 'media_player']);
Route::get('modals-closes', [AdvanceduiController::class, 'modals_closes']);
Route::get('navbar', [AdvanceduiController::class, 'navbar']);
Route::get('offcanvas', [AdvanceduiController::class, 'offcanvas']);
Route::get('placeholders', [AdvanceduiController::class, 'placeholders']);
Route::get('ratings', [AdvanceduiController::class, 'ratings']);
Route::get('ribbons', [AdvanceduiController::class, 'ribbons']);
Route::get('scrollspy', [AdvanceduiController::class, 'scrollspy']);
Route::get('sortable-list', [AdvanceduiController::class, 'sortable_list']);
Route::get('swiperjs', [AdvanceduiController::class, 'swiperjs']);
Route::get('tour', [AdvanceduiController::class, 'tour']);

// Apps //
Route::get('add-products', [AppsController::class, 'add_products']);
Route::get('cart', [AppsController::class, 'cart']);
Route::get('checkout', [AppsController::class, 'checkout']);
Route::get('crm-companies', [AppsController::class, 'crm_companies']);
Route::get('crm-contacts', [AppsController::class, 'crm_contacts']);
Route::get('crm-deals', [AppsController::class, 'crm_deals']);
Route::get('crm-leads', [AppsController::class, 'crm_leads']);
Route::get('crypto-buy-sell', [AppsController::class, 'crypto_buy_sell']);
Route::get('crypto-currency-exchange', [AppsController::class, 'crypto_currency_exchange']);
Route::get('crypto-marketcap', [AppsController::class, 'crypto_marketcap']);
Route::get('crypto-transactions', [AppsController::class, 'crypto_transactions']);
Route::get('crypto-wallet', [AppsController::class, 'crypto_wallet']);
Route::get('edit-products', [AppsController::class, 'edit_products']);
Route::get('full-calendar', [AppsController::class, 'full_calendar']);
Route::get('gallery', [AppsController::class, 'gallery']);
Route::get('job-candidate-details', [AppsController::class, 'job_candidate_details']);
Route::get('job-candidate-search', [AppsController::class, 'job_candidate_search']);
Route::get('job-company-search', [AppsController::class, 'job_company_search']);
Route::get('job-details', [AppsController::class, 'job_details']);
Route::get('job-post', [AppsController::class, 'job_post']);
Route::get('job-search', [AppsController::class, 'job_search']);
Route::get('jobs-list', [AppsController::class, 'jobs_list']);
Route::get('nft-create', [AppsController::class, 'nft_create']);
Route::get('nft-details', [AppsController::class, 'nft_details']);
Route::get('nft-live-auction', [AppsController::class, 'nft_live_auction']);
Route::get('nft-marketplace', [AppsController::class, 'nft_marketplace']);
Route::get('nft-wallet-integration', [AppsController::class, 'nft_wallet_integration']);
Route::get('order-details', [AppsController::class, 'order_details']);
Route::get('orders', [AppsController::class, 'orders']);
Route::get('product-details', [AppsController::class, 'product_details']);
Route::get('products-list', [AppsController::class, 'products_list']);
Route::get('products', [AppsController::class, 'products']);
Route::get('projects-create', [AppsController::class, 'projects_create']);
Route::get('projects-list', [AppsController::class, 'projects_list']);
Route::get('projects-overview', [AppsController::class, 'projects_overview']);
Route::get('sweet-alerts', [AppsController::class, 'sweet_alerts']);
Route::get('task-details', [AppsController::class, 'task_details']);
Route::get('task-kanban-board', [AppsController::class, 'task_kanban_board']);
Route::get('task-list-view', [AppsController::class, 'task_list_view']);
Route::get('wishlist', [AppsController::class, 'wishlist']);

// Authentication //
Route::get('coming-soon', [AuthenticationController::class, 'coming_soon']);
Route::get('create-password-basic', [AuthenticationController::class, 'create_password_basic']);
Route::get('create-password-cover', [AuthenticationController::class, 'create_password_cover']);
Route::get('lockscreen-basic', [AuthenticationController::class, 'lockscreen_basic']);
Route::get('lockscreen-cover', [AuthenticationController::class, 'lockscreen_cover']);
Route::get('reset-password-basic', [AuthenticationController::class, 'reset_password_basic']);
Route::get('reset-password-cover', [AuthenticationController::class, 'reset_password_cover']);
Route::get('sign-in-basic', [AuthenticationController::class, 'sign_in_basic']);
Route::get('sign-in-cover', [AuthenticationController::class, 'sign_in_cover']);
Route::get('sign-up-basic', [AuthenticationController::class, 'sign_up_basic']);
Route::get('sign-up-cover', [AuthenticationController::class, 'sign_up_cover']);
Route::get('two-step-verification-basic', [AuthenticationController::class, 'two_step_verification_basic']);
Route::get('two-step-verification-cover', [AuthenticationController::class, 'two_step_verification_cover']);
Route::get('under-maintenance', [AuthenticationController::class, 'under_maintenance']);

// Charts //
Route::get('apex-area-charts', [ChartsController::class, 'apex_area_charts']);
Route::get('apex-bar-charts', [ChartsController::class, 'apex_bar_charts']);
Route::get('apex-boxplot-charts', [ChartsController::class, 'apex_boxplot_charts']);
Route::get('apex-bubble-charts', [ChartsController::class, 'apex_bubble_charts']);
Route::get('apex-candlestick-charts', [ChartsController::class, 'apex_candlestick_charts']);
Route::get('apex-column-charts', [ChartsController::class, 'apex_column_charts']);
Route::get('apex-funnel-charts', [ChartsController::class, 'apex_funnel_charts']);
Route::get('apex-heatmap-charts', [ChartsController::class, 'apex_heatmap_charts']);
Route::get('apex-line-charts', [ChartsController::class, 'apex_line_charts']);
Route::get('apex-mixed-charts', [ChartsController::class, 'apex_mixed_charts']);
Route::get('apex-pie-charts', [ChartsController::class, 'apex_pie_charts']);
Route::get('apex-polararea-charts', [ChartsController::class, 'apex_polararea_charts']);
Route::get('apex-radar-charts', [ChartsController::class, 'apex_radar_charts']);
Route::get('apex-radialbar-charts', [ChartsController::class, 'apex_radialbar_charts']);
Route::get('apex-rangearea-charts', [ChartsController::class, 'apex_rangearea_charts']);
Route::get('apex-scatter-charts', [ChartsController::class, 'apex_scatter_charts']);
Route::get('apex-slope-charts', [ChartsController::class, 'apex_slope_charts']);
Route::get('apex-timeline-charts', [ChartsController::class, 'apex_timeline_charts']);
Route::get('apex-treemap-charts', [ChartsController::class, 'apex_treemap_charts']);
Route::get('chartjs-charts', [ChartsController::class, 'chartjs_charts']);
Route::get('echarts', [ChartsController::class, 'echarts']);

// Error //
Route::get('error401', [ErrorController::class, 'error401']);
Route::get('error404', [ErrorController::class, 'error404']);
Route::get('error500', [ErrorController::class, 'error500']);

// Forms //
Route::get('floating-labels', [FormsController::class, 'floating_labels']);
Route::get('form-advanced', [FormsController::class, 'form_advanced']);
Route::get('form-check-radios', [FormsController::class, 'form_check_radios']);
Route::get('form-color-pickers', [FormsController::class, 'form_color_pickers']);
Route::get('form-datetime-pickers', [FormsController::class, 'form_datetime_pickers']);
Route::get('form-file-uploads', [FormsController::class, 'form_file_uploads']);
Route::get('form-input-group', [FormsController::class, 'form_input_group']);
Route::get('form-input-masks', [FormsController::class, 'form_input_masks']);
Route::get('form-inputs', [FormsController::class, 'form_inputs']);
Route::get('form-layout', [FormsController::class, 'form_layout']);
Route::get('form-range', [FormsController::class, 'form_range']);
Route::get('form-select', [FormsController::class, 'form_select']);
Route::get('form-select2', [FormsController::class, 'form_select2']);
Route::get('form-validation', [FormsController::class, 'form_validation']);
Route::get('form-wizards', [FormsController::class, 'form_wizards']);
Route::get('quill-editor', [FormsController::class, 'quill_editor']);

// Icons //
Route::get('icons', [IconsController::class, 'icons']);

// Maps //
Route::get('google-maps', [MapsController::class, 'google_maps']);
Route::get('leaflet-maps', [MapsController::class, 'leaflet_maps']);
Route::get('vector-maps', [MapsController::class, 'vector_maps']);

// Pages //
Route::get('blog-create', [PagesController::class, 'blog_create']);
Route::get('blog-details', [PagesController::class, 'blog_details']);
Route::get('blog', [PagesController::class, 'blog']);
Route::get('chat', [PagesController::class, 'chat']);
Route::get('emptypage', [PagesController::class, 'emptypage']);
Route::get('faqs', [PagesController::class, 'faqs']);
Route::get('file-manager', [PagesController::class, 'file_manager']);
Route::get('invoice-create', [PagesController::class, 'invoice_create']);
Route::get('invoice-details', [PagesController::class, 'invoice_details']);
Route::get('invoice-list', [PagesController::class, 'invoice_list']);
Route::get('landing', [PagesController::class, 'landing']);
Route::get('mail-settings', [PagesController::class, 'mail_settings']);
Route::get('mail', [PagesController::class, 'mail']);
Route::get('pricing', [PagesController::class, 'pricing']);
Route::get('profile-settings', [PagesController::class, 'profile_settings']);
Route::get('profile', [PagesController::class, 'profile']);
Route::get('reviews', [PagesController::class, 'reviews']);
Route::get('search-results', [PagesController::class, 'search_results']);
Route::get('team', [PagesController::class, 'team']);
Route::get('terms-conditions', [PagesController::class, 'terms_conditions']);
Route::get('timeline', [PagesController::class, 'timeline']);
Route::get('to-do-list', [PagesController::class, 'to_do_list']);

// Tables //
Route::get('data-tables', [TablesController::class, 'data_tables']);
Route::get('grid-tables', [TablesController::class, 'grid_tables']);
Route::get('tables', [TablesController::class, 'tables']);

// Uielements //
Route::get('alerts', [UielementsController::class, 'alerts']);
Route::get('badge', [UielementsController::class, 'badge']);
Route::get('breadcrumb', [UielementsController::class, 'breadcrumb']);
Route::get('buttongroup', [UielementsController::class, 'buttongroup']);
Route::get('buttons', [UielementsController::class, 'buttons']);
Route::get('cards', [UielementsController::class, 'cards']);
Route::get('dropdowns', [UielementsController::class, 'dropdowns']);
Route::get('images-figures', [UielementsController::class, 'images_figures']);
Route::get('links-interactions', [UielementsController::class, 'links_interactions']);
Route::get('listgroup', [UielementsController::class, 'listgroup']);
Route::get('navs-tabs', [UielementsController::class, 'navs_tabs']);
Route::get('object-fit', [UielementsController::class, 'object_fit']);
Route::get('pagination', [UielementsController::class, 'pagination']);
Route::get('popovers', [UielementsController::class, 'popovers']);
Route::get('progress', [UielementsController::class, 'progress']);
Route::get('spinners', [UielementsController::class, 'spinners']);
Route::get('toasts', [UielementsController::class, 'toasts']);
Route::get('tooltips', [UielementsController::class, 'tooltips']);
Route::get('typography', [UielementsController::class, 'typography']);

// Utilities //
Route::get('avatars', [UtilitiesController::class, 'avatars']);
Route::get('borders', [UtilitiesController::class, 'borders']);
Route::get('breakpoints', [UtilitiesController::class, 'breakpoints']);
Route::get('colors', [UtilitiesController::class, 'colors']);
Route::get('columns', [UtilitiesController::class, 'columns']);
Route::get('css-grid', [UtilitiesController::class, 'css_grid']);
Route::get('flex', [UtilitiesController::class, 'flex']);
Route::get('gutters', [UtilitiesController::class, 'gutters']);
Route::get('helpers', [UtilitiesController::class, 'helpers']);
Route::get('more', [UtilitiesController::class, 'more']);
Route::get('position', [UtilitiesController::class, 'position']);

// Widgets //
Route::get('widgets', [WidgetsController::class, 'widgets']);
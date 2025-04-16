<!-- resources/views/inc/sidebar.blade.php -->
<div id="sidebar" class="sidebar">
    <ul class="nav flex-column">
        @foreach($app_area->sidebars as $sidebar_app_area_item)
            <li class="nav-item">
                <a class="nav-link" href="/{{$sidebar_app_area_item->sidebar->app_area_link}}">
                    <i class="fa {{ $sidebar_app_area_item->sidebar->app_area_fontawesome }}"></i>
                    <span class="menu-text">{{ $sidebar_app_area_item->sidebar->app_area_sidebar_name }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>

 <!-- Start::header-element -->
<li class="header-element notifications-dropdown d-xl-block d-none dropdown">
    <!-- Start::header-link|dropdown-toggle -->
    <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 header-link-icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
        </svg>
        @if ($blade_person->unread_notifications->count() > 0) 
            <span class="header-icon-pulse bg-primary2 rounded pulse pulse-secondary"></span>
        @endif
    </a>
    <!-- End::header-link|dropdown-toggle --> 
    <!-- Start::main-header-dropdown -->
    <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
        <div class="p-3">
            <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 fs-15 fw-medium">Obvestila</p>
                @if ($blade_person->unread_notifications->count() > 0)
                    <span class="badge bg-secondary text-fixed-white" id="notifiation-data">
                        {{ $blade_person->unread_notifications->count() }}
                    </span>
                @endif
            </div>
        </div>
        <div class="dropdown-divider"></div>
        <ul class="list-unstyled mb-0" id="header-notification-scroll">

        @forelse ($blade_person->unread_notifications as $notification)
            <li class="dropdown-item">
                <div class="d-flex align-items-center">
                    <!-- Slika ali ikona -->
                    <div class="pe-2 lh-1">
                        <span class="avatar avatar-md avatar-rounded bg-primary">
                            <img src="/storage/users/{{$blade_user->user_profile_image}}" alt="user1">
                        </span>
                    </div>

                    <!-- Vsebina obvestila -->
                    <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                        <div>
                            <!-- Naslov obvestila -->
                            <p class="mb-0 fw-medium">
                                <a href="{{ $notification->app_notification_link }}" class="text-decoration-none" target="_blank">
                                    {{ $notification->app_notification_title ?? 'Novo obvestilo' }}
                                </a>
                            </p>
                            <!-- Besedilo obvestila -->
                            <div class="text-muted fw-normal fs-12 header-notification-text text-truncate">
                                {{ $notification->app_notification_text }}
                            </div>
                            <!-- Datum obvestila -->
                            <div class="fw-normal fs-10 text-muted op-8">
                                {{ \Carbon\Carbon::parse($notification->app_notification_date)->format('d. m. Y') }}
                            </div>
                        </div>

                        <!-- Gumb za zapiranje obvestila -->
                    </div>
                </div>
            </li>
        @empty
            <!-- Če ni nobenih neprebranih obvestil -->
            <li class="dropdown-item text-center text-muted">
                Ni novih obvestil.
            </li>
        @endforelse
            
        </ul>
        
        <div class="p-3 empty-header-item1 border-top">
            <div class="d-grid">
                <a href="/school/notifications/" class="btn btn-primary btn-wave">Poglej vse</a>
            </div>
        </div>
        <div class="p-5 empty-item1 d-none">
            <div class="text-center">
                <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                    <i class="ri-notification-off-line fs-2"></i>
                </span>
                <h6 class="fw-medium mt-3">No New Notifications</h6>
            </div>
        </div>
    </div>
    <!-- End::main-header-dropdown -->
</li>
<!-- End::header-element -->
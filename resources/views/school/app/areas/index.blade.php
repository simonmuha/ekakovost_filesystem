
@extends('layouts.school_master')

@section('styles')


@endsection

@section('content')
<!-- Start::page-header -->
<div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
    <div>
        <nav>
            <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="/school/app/helps">Pomoč</a></li>
            @if ($app_area->app_area_parent_id != null)      
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="school/app/helps/{{ $app_area->parent->id }}">
                        {{ $app_area->parent->app_area_name }}
                    </a>
                </li>
            @endif
            <li class="breadcrumb-item active" aria-current="page">{{ $app_area->app_area_name }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- End::page-header -->
<!-- Start:: AppHelps-1 -->
<div class="row">
    <div class="col-xl-12">
        @if ($app_helps)
            @foreach ($app_helps as $app_help)
                <div class="row align-items-stretch">
                    <div class="col-xxl-3 col-xl-6">
                        <div class="card custom-card overflow-hidden main-content-card">
                            <div class="card-body bg-transparent text-white" >
                                <div class="d-flex align-items-start justify-content-between mb-2">
                                    <div>
                                        <a href="/school/app/helps/{{ $app_help->id }}">
                                            <span class="text-muted d-block mb-1 text-{{ $app_help->post_category_background }}">{{ $app_help->app_help_name }}</span>
                                        </a>
                                        <h4 class="fw-medium mb-0 text-{{ $app_help->post_category_background }}">1</h4>
                                    </div>
                                    <div class="lh-1">
                                        <span class="avatar avatar-md avatar-rounded text-light bg-danger">
                                            <i class="ti ti-help fs-5"></i>
                                        </span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                
                    
                </div>
            @endforeach
        @endif                
    </div>
</div>
<!-- End:: AppHelps-1 -->

                        


@endsection

@section('scripts')


@endsection

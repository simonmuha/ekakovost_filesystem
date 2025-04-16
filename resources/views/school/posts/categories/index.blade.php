
@extends('layouts.school_master')

@section('styles')


@endsection

@section('content')
<!-- Start::page-header -->
<div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
    <div>
        <nav>
            <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="/school/posts">Prispevki</a></li>
            <li class="breadcrumb-item"><a href="/school/posts/categories">Kategorije</a></li>
            </ol>
        </nav>
    </div>
</div>
<!-- End::page-header -->
<!-- Start:: Subcategories-1 -->
<div class="row">
    <div class="col-xl-12">
        @if ($post_categories)
            @foreach ($post_categories as $post_category)
                <div class="row align-items-stretch">
                    <div class="col-xxl-12 col-xl-6">
                        <div class="card custom-card overflow-hidden main-content-card">

                            <div class="card-body bg-{{ $post_category->post_category_color }}-transparent  .text-dark " >
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="/school/posts/categories/{{ $post_category->id }}">
                                        <h5>{{ $post_category->post_category_name }}</h5>
                                    </a>
                                    <a href="/school/posts/categories/{{ $post_category->id }}" class="btn btn-light btn-wave btn-sm text-muted waves-effect waves-light">
                                        <span class="fw-bold">{{ $post_category->posts->count() }}</span>
                                        <i class="ti ti-arrow-narrow-right ms-1"></i>
                                    </a>
                                </div>
                                <div class="row align-items-stretch">
                                    <div class="col-xxl-9 col-xl-6">
                                        @if ($post_category->posts->isNotEmpty())
                                            <div class="row align-items-center g-3">
                                                @foreach ($post_category->posts->take(4) as $post)
                                                    <div class="col-4">
                                                        <div class="d-flex flew-wrap text-truncate align-items-center gap-2">
                                                            <span class="avatar avatar-xl flex-shrink-0 me-1">
                                                                <a href="/school/posts/{{ $post->id }}" title="{{ $post->post_title }}"> 
                                                                    <img src="/storage/posts/{{ $post->post_cover_image_400x400 }}" class="img-fluid" alt="..." title="{{ $post->post_title }}">
                                                                </a>
                                                            </span>
                                                            <div class="flex-fill text-wrap">
                                                                <a href="javascript:void(0);" class="fs-14 fw-medium mb-0">{{ \Illuminate\Support\Str::limit($post->post_title, 30, '...') }} </a>
                                                                <p class="mb-1 popular-blog-content text-truncate text-muted">
                                                                    {{ $post->post_summary }}
                                                                </p>
                                                                <span class="text-muted fs-10">{{ \Carbon\Carbon::parse( $post->post_published_at )->format('j. n. Y') }} </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="row align-items-center g-3">
                                                <div class="col-12">
                                                    Kategorija nima nobenega prispevka.
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-xxl-3 col-xl-6">
                                        <div class="card custom-card">
                                            
                                            <div class="card-body">
                                                <ul class="list-group">
                                                @if ($post_category->subcategories)
                                                @foreach ($post_category->subcategories as $subcategory)
                                                        <li class="list-group-item">
                                                            <a href="/school/posts/categories/{{ $subcategory->id }}">
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                    <div class="d-flex align-items-center">
                                                                        <div>
                                                                            <i class="{{ $subcategory->post_category_icon }} fs-14 p-1 rounded-2 d-inline-block align-middle lh-1 bg-primary-transparent text-{{ $subcategory->post_category_color }}"></i>
                                                                        </div>
                                                                        <div>
                                                                            
                                                                            <span class="fw-medium ms-2">
                                                                                    {{ $subcategory->post_category_name }}
                                                                            </span>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <span class="badge bg-{{ $subcategory->post_category_color }}">{{ $subcategory->posts->count() }}</span>
                                                                    </div>
                                                                </div>    
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        
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
<!-- End:: Categories-1 -->

                        


@endsection

@section('scripts')


@endsection

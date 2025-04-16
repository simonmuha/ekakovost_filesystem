
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
            <li class="breadcrumb-item" aria-current="page"><a href="/school/posts/categories/{{ $post_category->id }}">{{ $post_category->post_category_name }}</a></li>
            </ol>
        </nav>
    </div>
</div>
<!-- End::page-header -->
<!-- Start:: Subcategories-1 -->
<div class="row">
    <div class="col-xl-12">
        <div class="row align-items-stretch">
            <div class="col-xxl-9 col-xl-6">
                <div class="card custom-card overflow-hidden main-content-card">
                    <div class="card-body bg-{{ $post_category->post_category_color }}-transparent text-dark" >
                        <div class="d-flex align-items-start justify-content-between mb-2">
                            <div>
                                <span class="text-muted d-block mb-1 text-{{ $post_category->post_category_color }}">{{ $post_category->post_category_name }}</span>
                                <h4 class="fw-medium mb-0 text-{{ $post_category->post_category_color }}"></h4>
                            </div>
                            <div class="lh-1">
                                <span class="avatar avatar-md avatar-rounded text-{{ $post_category->post_category_color }}-transpatent bg-{{ $post_category->post_category_color }}">
                                    <i class="ti {{ $post_category->post_category_icon }} fs-5 "></i>
                                </span>
                            </div>
                        </div>
                        <div class="text-muted fs-13"><span class="text-success"><i class="ti ti-arrow-narrow-up1 fs-16"></i></span></div>
                    </div>
                </div>
<!-- Start:: row-3 -->
<div class="row">
    <div class="col-xxl-12">
        <div class="card custom-card">
            <div class="card-body py-3">
                <ul class="list-unstyled mb-0 schedule-list">
                    @if ($post_category->posts->isNotEmpty())

                        @foreach ($post_category->posts as $post)
                            <div class="row align-items-center g-3">

                                <!-- Slika -->
                                <div class="col-1">
                                    <a href="/school/posts/{{ $post->id }}" class="fs-14 fw-medium mb-0"><img src="/storage/posts/{{ $post->post_cover_image_400x400 }}" class="img-fluid rounded" style="width: 100%; height: auto; object-fit: cover;" alt=""></a>
                                </div>

                                <!-- Besedilo -->
                                <div class="col-3">
                                    <p class="fw-medium mb-0"><a href="/school/posts/{{ $post->id }}" class="fs-14 fw-medium mb-0">{{ $post->post_title }}</a></p>
                                    <p class="fs-11 text-muted mb-0 text-nowrap text-truncate">
                                        <i class="ri-time-line me-1"></i>{{ \Carbon\Carbon::parse($post->post_published_at)->format('j. n. Y') }}
                                    </p>
                                </div>
                                <!-- Povzetek -->
                                <div class="col-4">
                                    <p>{{ \Illuminate\Support\Str::limit($post->post_summary, 100, '...') }} <a href="/school/posts/{{ $post->id }}" class="fs-14 fw-medium mb-0">Preberite več...</a></p>
                                </div>
                                <!-- Avtor -->
                                <div class="col-2 text-end">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-md avatar-rounded me-2">
                                            <img src="/storage/users/{{$post->author->user->user_profile_image}}" alt="">
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-medium">{{ $post->author->person_name }} {{ $post->author->person_surname }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Čas branja -->
                                <div class="col-1 d-flex justify-content-center align-items-center">
                                    <p class="fw-medium mb-0">
                                        <i class="ri-time-line me-1"></i>{{ $post->post_reading_time }} min</p>
                                    </p>
                                </div>
                                <!-- Gumb -->
                                <div class="col-1 d-flex justify-content-center align-items-center">
                                    <button type="button" class="btn btn-primary btn-sm text-nowrap">{{ $post->postViews->count() }}</button>
                                </div>
                            </div>
                            <br>
                        @endforeach
                    @else
                        <div class="row align-items-center g-3">
                            <div class="col-12">
                                Kategorija nima nobenega prispevka.
                            </div>
                        </div>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>







            </div>
            <div class="col-xxl-3 col-xl-6">
                <div class="col-xl-12">
                    @if ($post_category->subcategories->count() > 0)
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    Podkategorije  
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    
                                    @foreach ($post_category->subcategories as $category)
                                        <li class="list-group-item">
                                            <a href="/school/posts/categories/{{ $category->id }}">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <i class="{{ $category->post_category_icon }} fs-14 p-1 rounded-2 d-inline-block align-middle lh-1 bg-primary-transparent text-{{ $category->post_category_color }}"></i>
                                                        </div>
                                                        <div>
                                                            
                                                            <span class="fw-medium ms-2">
                                                                    {{ $category->post_category_name }}
                                                            </span>
                                                            
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <span class="badge bg-{{ $category->post_category_color }}">{{ $category->posts->count() }}</span>
                                                    </div>
                                                </div>    
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    @else
                        <div class="card custom-card">
                            <div class="card-body">
                                Kategorija nima podkategorij
                            </div>
                        </div>
                    @endif
                    <div class="card custom-card overflow-hidden">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="card-title">
                                Zadnji prispevki
                            </div>
                            <div>
                                <span class="badge bg-primary-transparent rounded-pill"></span>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                @foreach ($latest_posts as $latest_post)

                                    <li class="list-group-item border-bottom-0">
                                        <div class="d-flex flew-wrap text-truncate align-items-center gap-2">
                                            <span class="avatar avatar-xl flex-shrink-0 me-1">
                                                <img src="/storage/posts/{{ $latest_post->post_cover_image_978x400 }}" class="img-fluid" alt="...">
                                            </span>
                                            <div class="flex-fill text-wrap">
                                                <a href="/school/posts/{{ $latest_post->id }}" class="fs-14 fw-medium mb-0">{{ \Illuminate\Support\Str::limit($latest_post->post_title, 40, '...') }}</a>
                                                <p class="mb-1 popular-blog-content text-truncate text-muted">
                                                </p>
                                                <span class="text-muted fs-10">{{ \Carbon\Carbon::parse($latest_post->post_published_at)->format('j. n. Y') }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</div>
<!-- End:: Subcategories-1 -->

                        


@endsection

@section('scripts')


@endsection


@extends('layouts.school_master')

@section('styles')



@endsection

@section('content')
	
                    <!-- Page Header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="/school/app/areas">Pomoč</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pogosta vprašanja</li>
                                </ol>
                            </nav>
                        </div>
                        @if (1==2)
                            <div class="btn-list">
                                <button class="btn btn-white btn-wave">
                                    <i class="ri-filter-3-line align-middle me-1 lh-1"></i> Filter
                                </button>
                                <button class="btn btn-primary btn-wave me-0">
                                    <i class="ri-share-forward-line me-1"></i> Share
                                </button>
                            </div>
                        @endif
                    </div>
                    <!-- Page Header Close -->

                    <!-- Start:: row-2 -->
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-body">
                                    
                                    <ul class="nav nav-tabs nav-tabs-header mb-4 d-flex justify-content-center faq-nav gap-2" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page" href="#{{ $app_area->id }}" aria-selected="true"><i class="ti ti-palette me-1 d-inline-block"></i>{{ $app_area->app_area_name }}</a>
                                        </li>

                                        @foreach ($app_areas as $area)
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#{{ $area->id }}" aria-selected="false" tabindex="-1"><i class="ti ti-user-cog me-1 d-inline-block"></i>{{ $area->app_area_name }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <div class="tab-content mb-4">
                                        
                                        <div class="tab-pane show active border-0 p-0" id="{{ $app_area->id }}"
                                            role="tabpanel">
                                            <div class="accordion accordion-customicon1 faq-accordion accordion-primary accordions-items-seperate" id="accordionFAQ1">
                                                @if ($app_area->faqs->isNotEmpty())
                                                    @foreach ($app_area->faqs as $faq)
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}"
                                                                    aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                                                    {{ $faq->app_faq_question }}
                                                                </button>
                                                            </h2>
                                                            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                                                aria-labelledby="heading{{ $faq->id }}"
                                                                data-bs-parent="#accordionFAQ5">
                                                                <div class="accordion-body">
                                                                {{ $faq->app_faq_answer }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    Ni pogostih vprašanj
                                                @endif
                                            </div>
                                        </div>
                                        @foreach ($app_areas as $area)
                                            <div class="tab-pane border-0 p-0" id="{{ $area->id }}"
                                                role="tabpanel">
                                                <div class="accordion accordion-customicon1 faq-accordion accordion-primary accordions-items-seperate" id="accordionFAQ2">
                                                    @if ($area->faqs->isNotEmpty())
                                                        @foreach ($area->faqs as $faq)
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                                                    <button class="accordion-button collapsed" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}"
                                                                        aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                                                        {{ $faq->app_faq_question }}
                                                                    </button>
                                                                </h2>
                                                                <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                                                    aria-labelledby="heading{{ $faq->id }}"
                                                                    data-bs-parent="#accordionFAQ5">
                                                                    <div class="accordion-body">
                                                                    {{ $faq->app_faq_answer }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        Ni pogostih vprašanj
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row bg-light mx-0 justify-content-between align-items-center rounded">
                                        <div class="col-sm-3 d-md-block d-none px-0">
                                            <img src="/storage/app/faqs/media-65.png" alt="" class="img-fluid ps-3">
                                        </div>
                                        <div class="col-md-8 px-0">
                                            <div class="p-3">
                                                <div>
                                                    <form action="{{ route('faq.store') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <h5 class="fw-semibold mb-2">Imate še kakšna vprašanja? Tukaj smo, da pomagamo!</h5>
                                                        <span class="d-block fs-12 text-muted">
                                                            Obrnite se na našo podporo za osebno pomoč. Vaše zadovoljstvo je naša prednost!
                                                            Vpišite vaše vprašanje spodaj in kmalu vam bomo odgovorili.
                                                        </span>
                                                        <div class="row gy-3 mt-3">
                                                            <div class="col-xl-12">
                                                                <textarea class="form-control" name="app_faq_question" placeholder="Vpišite svoje vprašanje tukaj" id="text-area" rows="6"></textarea>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <button class="btn btn-primary btn-wave waves-effect waves-light" type="submit">Pošljite vprašanje</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End:: row-2 -->

@endsection

@section('scripts')
	


@endsection

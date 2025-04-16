
@extends('layouts.school_master')

@section('styles')



@endsection

@section('content')
	
                    <!-- Page Header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pomoč</a></li>
                                    <li class="breadcrumb-item"><a href="/school/app/suggestions/">Moji predlogi</a></li>
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

                    

                    <!-- Start::row-2 -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Področje</th>
                                                    <th scope="col">Opis</th>
                                                    <th scope="col">Assigned Date</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($app_suggestions as $app_suggestion)

                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                {{ $app_suggestion->app_area->app_area_name }} 
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                {{ $app_suggestion->app_suggestion_description }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <p>{{ $app_suggestion->created_at->format('j. n. Y') }}</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                V reševanju
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

@endsection

@section('scripts')
	


@endsection

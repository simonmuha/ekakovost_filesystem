@extends('layouts.school_master')

@section('styles')
<!-- Dodaj morebitne dodatne stile tukaj -->
@endsection

@section('content')

<!-- Page Header -->
<div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
    <div>
        <nav>
            <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="/school/app/areas">Pomoč</a></li>
            <li class="breadcrumb-item"><a href="/school/app/suggestions/">Predlogi</a></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header Close -->

<!-- Start:: row-2 -->
<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-body">

                <div class="row bg-light mx-0 justify-content-between align-items-center rounded">
                    <div class="col-sm-3 d-md-block d-none px-0">
                        <img src="/storage/app/suggestions/suggestion.png" alt="Suggestions" class="img-fluid ps-3">
                    </div>
                    <div class="col-md-8 px-0">
                        <div class="p-3">
                            <div>
                                <form action="{{ route('suggestions.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h5 class="fw-semibold mb-2">Imate predlog za nas? Veseli bomo vaših idej!</h5>
                                    <span class="d-block fs-12 text-muted">
                                        Delite svoj predlog z nami in pomagajte izboljšati našo aplikacijo. Izberite ustrezno področje in podajte svoj predlog spodaj.
                                    </span>
                                    <div class="row gy-3 mt-3">
                                        <!-- Izbira področja -->
                                        <div class="col-xl-12">
                                            <label for="app_area_id" class="form-label">Izberite področje</label>
                                            <select class="form-control" name="app_area_id" id="app_area_id" required>
                                                <option value="" selected disabled>Izberite področje</option>
                                                @foreach ($app_areas as $area)
                                                    <option value="{{ $area->id }}">{{ $area->app_area_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Vnos predloga -->
                                        <div class="col-xl-12">
                                            <label for="app_suggestion_description" class="form-label">Vaš predlog</label>
                                            <textarea class="form-control" name="app_suggestion_description" placeholder="Vpišite svoj predlog tukaj" id="app_suggestion_description" rows="6" required></textarea>
                                        </div>

                                        <!-- Pošlji predlog -->
                                        <div class="col-xl-12">
                                            <button class="btn btn-primary btn-wave waves-effect waves-light" type="submit">Pošlji predlog</button>
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
<!-- Dodaj morebitne dodatne skripte tukaj -->
@endsection

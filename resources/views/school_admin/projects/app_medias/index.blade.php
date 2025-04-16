
@extends('layouts.school_admin_master')

@section('styles')
        <!-- Prism CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/prismjs/themes/prism-coy.min.css')}}">

                <!-- FlatPickr CSS -->
                <link rel="stylesheet" href="{{asset('build/assets/libs/flatpickr/flatpickr.min.css')}}">

@endsection

@section('content')
	
                    <!-- Page Header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Administracija šole</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $project->project_name }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Mediji</li>
                                </ol>
                            </nav>
                            <h1 class="page-title fw-medium fs-18 mb-0">Mediji</h1>
                        </div>
                        <div class="ms-auto align-self-start">
                            <button type="button" class="btn btn-secondary mb-sm-0 mb-1" data-bs-toggle="modal" data-bs-target="#exampleModalLg"><i class="ri-add-line me-1 fw-medium align-middle"></i>Dodaj medij</button>

                            <div class="modal fade" id="exampleModalLg" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-hidden="true">

                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('project-app_medias.store') }}" id="add-media-form-{{ $project->id }}">
                                        @csrf
                                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLgLabel">Dodaj medij k projektu {{ $project->project_name }}
                                                </h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                
                                            <div class="row">
                                                <div class="col-xl-12 mb-3">
                                                    <label for="app_media_type_id-{{ $project->id }}" class="form-label">Tip medija</label>
                                                    <select class="form-select" name="app_media_type_id" id="app_media_type_id-{{ $project->id }}">
                                                        <option value="" disabled selected>Izberi tip medija</option>
                                                        @foreach ($app_media_types as $app_media_type)
                                                            <option value="{{ $app_media_type->id }}">
                                                                {{ $app_media_type->app_media_type_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-xl-12 mb-3">
                                                    <label for="project_name" class="form-label">Ime medija:</label>
                                                    <input type="text" class="form-control" name="media_title" id="project_name" placeholder="Vnesite ime medija" value="{{ old('media_title') }}">
                                                </div>

                                                <div class="col-xl-12 mb-3">
                                                    <label for="media_description" class="form-label">Kratek opis</label>
                                                    <textarea class="form-control" id="media_description" name="media_description" rows="3">{{ old('media_description') }}</textarea>
                                                </div>

                                                <div class="col-xl-12 mb-3">
                                                    <label for="media_value" class="form-label">URL:</label>
                                                    <input type="text" class="form-control" name="media_value" id="media_value" placeholder="Vnesite URL" value="{{ old('media_value') }}">
                                                </div>

                                                <div class="row">
                                                    <div class="col-xl-6 mb-3">
                                                        <label class="form-label">
                                                            Začetek veljavnosti (od:
                                                            {{ $project->project_start_date ? \Carbon\Carbon::parse($project->project_start_date)->locale('sl')->format('j. n. Y') : 'Ni določeno' }}):
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-text text-muted">
                                                                <i class="ri-calendar-line"></i>
                                                            </div>
                                                            <input type="text" class="form-control" id="media_valid_from" name="media_valid_from" placeholder="Izberi datum" value="{{ old('media_valid_from') }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6 mb-3">
                                                        <label class="form-label">Konec veljavnosti:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-text text-muted">
                                                                <i class="ri-calendar-line"></i>
                                                            </div>
                                                            <input type="text" class="form-control" id="media_valid_until" name="media_valid_until" placeholder="Izberi datum" value="{{ old('media_valid_until') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Prekliči</button>
                                                <button type="submit" class="btn btn-primary">Potrdi</button>
                                            </div>
                                            
                                    
                                        </form>
                                    </div>
                                </div>
                            </div>
                                    
                                    
                        </div>
                    </div>
                    <!-- Page Header Close -->
                    
                    <div class="col-xxl-12">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <ul class="nav nav-tabs flex-column vertical-tabs-3" role="tablist">
                                                @foreach ($app_media_types as $index => $app_media_type)
                                                    <li class="nav-item" role="presentation">
                                                        <a
                                                            class="nav-link {{ $loop->first ? 'active' : '' }} text-break"
                                                            id="tab-{{ $app_media_type->id }}"
                                                            data-bs-toggle="tab"
                                                            href="#media-tab-{{ $app_media_type->id }}"
                                                            role="tab"
                                                            aria-controls="media-tab-{{ $app_media_type->id }}"
                                                            aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                                                        >
                                                            <i class="ri-map-pin-user-line me-2 align-middle d-inline-block"></i>
                                                            {{ $app_media_type->app_media_type_name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content">
                                                @foreach ($app_media_types as $app_media_type)
                                                    <div
                                                        class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                        id="media-tab-{{ $app_media_type->id }}"
                                                        role="tabpanel"
                                                        aria-labelledby="tab-{{ $app_media_type->id }}"
                                                    >
                                                        <div class="card custom-card justify-content-between">
                                                            <div class="card-header justify-content-between">
                                                                <div class="card-title">
                                                                {{ $app_media_type->app_media_type_name }}
                                                                </div>
                                                                <div class="ms-auto align-self-start">
                                                                    
                                                                    <div class="dropdown">
                                                                        <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-primary-light" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="fe fe-more-vertical"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                                            
                                                                            <li><a class="dropdown-item" href="/school_admin/projects/{{ $project->id }}/edit"><i class="ri-eye-line align-middle me-1 d-inline-block"></i>Dodaj</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                @php
                                                                    $mediaItems = $app_media_type->mediaForProject($project->id)->get();
                                                                @endphp

                                                                @if ($mediaItems->count())
                                                                    <div class="table-responsive">
                                                                        <table class="table text-nowrap">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th scope="col">Ime medija</th>
                                                                                    <th scope="col">Opis</th>
                                                                                    <th scope="col">Povezava</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($mediaItems as $media)
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="flex-fill">
                                                                                                    <a href="/school_admin/projects/{{ $project->id }}" class="fw-medium fs-14 d-block text-truncate project-list-title">{{ $media->media_title }}</a>
                                                                                                    @if ($media->media_valid_from || $media->media_valid_until)
                                                                                                        <small class="text-muted">
                                                                                                            Velja od: {{ \Carbon\Carbon::parse($media->media_valid_from)->format('d.m.Y') ?? '-' }}
                                                                                                            
                                                                                                            @if ($media->media_valid_until != null)
                                                                                                                do: 
                                                                                                                {{ \Carbon\Carbon::parse($media->media_valid_until)->format('d.m.Y') ?? '-' }}
                                                                                                            @endif
                                                                                                        </small>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <p class="text-muted mb-0 project-list-description">{{ \Illuminate\Support\Str::limit($media->media_description, 80, '...') }}</p>
                                                                                        </td>
                                                                                        <td>
                                                                                            @if ($media->media_value)
                                                                                                <p class="mb-1">
                                                                                                    <a href="{{ $media->media_value }}" target="_blank">{{ $media->media_value }}</a>
                                                                                                </p>
                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                @else
                                                                    <div class="text-center">
                                                                        <p class="mb-0">Ni najdenih medijev za ta tip.</p>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            
                                                        </div>

                                                   
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> 
                        </div>
@endsection

@section('scripts')
<script src="{{ asset('build/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/sl.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            flatpickr("#media_valid_from", {
                dateFormat: "d.m.Y",
                locale: "sl"
            });

            flatpickr("#media_valid_until", {
                dateFormat: "d.m.Y",
                locale: "sl"
            });
        });
    </script>

@endsection

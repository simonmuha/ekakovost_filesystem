@extends('layouts.school_admin_master')

@section('styles')
    <link rel="stylesheet" href="{{asset('build/assets/libs/quill/quill.snow.css')}}">
    <link rel="stylesheet" href="{{asset('build/assets/libs/quill/quill.bubble.css')}}">
    <link rel="stylesheet" href="{{asset('build/assets/libs/filepond/filepond.min.css')}}">
    <link rel="stylesheet" href="{{asset('build/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')}}">
    <link rel="stylesheet" href="{{asset('build/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css')}}">
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
        <div>
            <nav>
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Administracija šole</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Projekti</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Uredi projekt</li>
                </ol>
            </nav>
            <h1 class="page-title fw-medium fs-18 mb-0">Uredi projekt</h1>
        </div>
    </div>
    
    <form method="POST" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data" autocomplete="on">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="project_name" class="form-label">Ime projekta:</label>
                                <input type="text" class="form-control" name="project_name" id="project_name" value="{{ old('project_name', $project->project_name) }}">
                            </div>
                            <div class="col-xl-12">
                                <label for="project_name_short" class="form-label">Kratko ime projekta:</label>
                                <input type="text" class="form-control" name="project_name_short" id="project_name_short" value="{{ old('project_name_short', $project->project_name_short) }}">
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label">Začetni datum:</label>
                                <input type="text" class="form-control" id="project_start_date" name="project_start_date" value="{{ old('project_start_date', $project->project_start_date) }}">
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label">Končni datum:</label>
                                <input type="text" class="form-control" id="project_end_date" name="project_end_date" value="{{ old('project_end_date', $project->project_end_date) }}">
                            </div>
                            <div class="col-xl-12">
                                <label for="project_description_short" class="form-label">Kratek opis</label>
                                <textarea class="form-control" id="project_description_short" name="project_description_short" rows="3">{{ old('project_description_short', $project->project_description_short) }}</textarea>
                            </div>
                            <div class="col-xl-12">
                                <label class="form-label">Opis projekta:</label>
                                <textarea class="form-control" id="description-ckeditor" name="project_description" rows="5">{{ old('project_description', $project->project_description) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary-light btn-wave ms-auto float-end">Posodobi projekt</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{asset('build/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/sl.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr("#project_start_date", {
                locale: "sl",
                dateFormat: "Y-m-d",
                altInput: true,
                altFormat: "j. n. Y",
                defaultDate: "{{ old('project_start_date', $project->project_start_date) }}"
            });

            flatpickr("#project_end_date", {
                locale: "sl",
                dateFormat: "Y-m-d",
                altInput: true,
                altFormat: "j. n. Y",
                defaultDate: "{{ old('project_end_date', $project->project_end_date) }}"
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor.create(document.querySelector("#description-ckeditor"))
                .catch(error => console.error(error));
        });
    </script>
@endsection

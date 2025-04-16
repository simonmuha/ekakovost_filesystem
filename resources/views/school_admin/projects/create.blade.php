
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
	
                    <!-- Page Header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                    <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Administracija šole</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Projekti</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Nov projekt</li>
                                </ol>
                            </nav>
                            <h1 class="page-title fw-medium fs-18 mb-0">Ustvari projekt</h1>
                        </div>
                        <div class="btn-list">
                        </div>
                    </div>
                    <!-- Page Header Close -->
                    <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data" autocomplete="on">
                    @csrf
                    <!-- Start::row-1 -->
                    <div class="row">
                                <div class="col-xl-12">
                                    <div class="card custom-card">
                                        <div class="card-body">
                                            <div class="row gy-3">
                                                <div class="col-xl-12">
                                                    <label for="input-label" class="form-label">Ime projekta:</label>
                                                    <input type="text" class="form-control" name="project_name" id="project_name" placeholder="Vnesite ime projekta">
                                                </div>
                                                <div class="col-xl-12">
                                                    <label for="input-label" class="form-label">Kratko ime projekta:</label>
                                                    <input type="text" class="form-control" name="project_name_short" id="project_name_short" placeholder="Vnesite kratko ime projekta">
                                                </div>
                                                <div class="col-xl-6">
                                                    <label class="form-label">Začetni datum:</label>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-text text-muted">
                                                                <i class="ri-calendar-line"></i>
                                                            </div>
                                                            <input type="text" class="form-control" id="project_start_date" name="project_start_date" placeholder="Izberi datum" value="{{ old('project_start_date') }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6">
                                                    <label class="form-label">Končni datum:</label>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-text text-muted"><i class="ri-calendar-line"></i></div>
                                                            <input type="text" class="form-control" id="project_end_date" name="project_end_date" placeholder="Izberi datum" value="{{ old('project_end_date') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input-label" class="form-label">Kratek opis</label>
                                                    <textarea class="form-control" id="project_description_short" name="project_description_short" rows="3">
                                                        {{ old('project_description_short') }}
                                                    </textarea>
                                                    
                                                </div>
                                                <div class="col-xl-12">
                                                    <label class="form-label">Opis projekta:</label>
                                                    <textarea class="form-control" id="description-ckeditor" name="project_description" rows="5">{!! old('project_description') !!}</textarea>

                                                </div>

                                                
                                                
                                            </div>
                                        </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary-light btn-wave ms-auto float-end">Create Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End::row-1 -->
                    </form>
@endsection

@section('scripts')
	
        <!-- Quill Editor JS -->
        <script src="{{asset('build/assets/libs/quill/quill.js')}}"></script>

        <!-- Filepond JS -->
        <script src="{{asset('build/assets/libs/filepond/filepond.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js')}}"></script>
        <script src="{{asset('build/assets/libs/filepond-plugin-image-transform/filepond-plugin-image-transform.min.js')}}"></script>

        <!-- Flat Picker JS -->
        <script src="{{asset('build/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/sl.js"></script>

        <!-- Create Project JS -->
        @vite('resources/assets/js/create-project.js')


<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#project_start_date", {
            locale: "sl",
            dateFormat: "Y-m-d",
            altInput: true,
            altFormat: "j. n. Y",
            allowInput: true,
            defaultDate: "{{ old('project_start_date') }}"
        });

        flatpickr("#project_end_date", {
            locale: "sl",
            dateFormat: "Y-m-d",
            altInput: true,
            altFormat: "j. n. Y",
            allowInput: true,
            defaultDate: "{{ old('project_end_date') }}"
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create(document.querySelector("#description-ckeditor"))
            .catch(error => console.error(error));
    });
</script>

@endsection

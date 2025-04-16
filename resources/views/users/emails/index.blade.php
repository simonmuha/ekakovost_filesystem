
@extends('layouts.user_master')

@section('styles')

        <link rel="stylesheet" href="{{asset('build/assets/libs/quill/quill.snow.css')}}">
        <link rel="stylesheet" href="{{asset('build/assets/libs/quill/quill.bubble.css')}}">

@endsection

@section('content')
	
                    <!-- Start::page-header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:void(0);">
                                            {{ $person->person_name }}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">E-pošta</a></li>
                                </ol>
                            </nav>
                        </div>
                        @if(1==2)
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
                    <!-- End::page-header -->

                    <div class="main-mail-container mb-2 gap-2 d-flex">
                        <div class="mail-navigation border">
                            @if(1==2)

                            <div class="d-grid align-items-top p-3 border-bottom border-block-end-dashed">
                                <button class="btn btn-primary d-flex align-items-center justify-content-center" data-bs-toggle="modal"
                                data-bs-target="#mail-Compose">
                                    <i class="ri-add-circle-line fs-16 align-middle me-1"></i>Compose Mail
                                </button>
                                
                                <div class="modal modal-lg fade" id="mail-Compose" tabindex="-1" aria-labelledby="mail-ComposeLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="mail-ComposeLabel">Compose Mail</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xl-6 mb-2">
                                                        <label for="fromMail" class="form-label">From<sup><i class="ri-star-s-fill text-success fs-8"></i></sup></label>
                                                        <input type="email" class="form-control" id="fromMail" value="henrymilo2345@gmail.com">
                                                    </div>
                                                    <div class="col-xl-6 mb-2">
                                                        <label for="toMail" class="form-label">To<sup><i class="ri-star-s-fill text-success fs-8"></i></sup></label>
                                                        <select class="form-control" name="toMail" id="toMail" multiple>
                                                            <option value="Choice 1" selected>jay@gmail.com</option>
                                                            <option value="Choice 2">kia@gmail.com</option>
                                                            <option value="Choice 3">don@gmail.com</option>
                                                            <option value="Choice 4">kimo@gmail.com</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-6 mb-2">
                                                        <label for="mailCC" class="form-label text-dark fw-medium">Cc</label>
                                                        <input type="email" class="form-control" id="mailCC">
                                                    </div>
                                                    <div class="col-xl-6 mb-2">
                                                        <label for="mailBcc" class="form-label text-dark fw-medium">Bcc</label>
                                                        <input type="email" class="form-control" id="mailBcc">
                                                    </div>
                                                    <div class="col-xl-12 mb-2">
                                                        <label for="Subject" class="form-label">Subject</label>
                                                        <input type="text" class="form-control" id="Subject" placeholder="Subject">
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <label class="col-form-label">Content :</label>
                                                        <div class="mail-compose">
                                                            <div id="mail-compose-editor"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary">Send</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div>
                                <ul class="list-unstyled mail-main-nav" id="mail-main-nav">
                                    <li class="px-0 pt-0">
                                        <span class="fs-11 text-muted op-7 fw-medium">Vrste e-pošte</span>
                                    </li>
                                    <li class="active mail-type">
                                        <a href="javascript:void(0);">
                                            <div class="d-flex align-items-center">
                                                <span class="me-2 lh-1">
                                                    <i class="ti ti-mail align-middle fs-16"></i>
                                                </span>
                                                <span class="flex-fill text-nowrap">
                                                    Vse
                                                </span>
                                                <span class="badge bg-primary1 rounded-pill">{{ $emails->count() }}</span>
                                            </div>
                                        </a>
                                    </li>
                                    @if (1==2)
                                        @foreach ($email_statuses as $email_status)
                                            <li class="mail-type">
                                                <a href="javascript:void(0);">
                                                    <div class="d-flex align-items-center">
                                                        <span class="me-2 lh-1">
                                                            <i class="ti ti-inbox align-middle fs-16"></i>
                                                        </span>
                                                        <span class="flex-fill text-nowrap">
                                                            {{ $email_status->email_status_name  }}
                                                        </span>
                                                        <span class="badge bg-primary2 rounded-pill">12</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if (1==2)
                                    <li class="px-0">
                                        <span class="fs-11 text-muted op-7 fw-medium">ONLINE USERS</span>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="d-flex align-items-top lh-1">
                                                <div class="me-2">
                                                    <span class="avatar avatar-sm online avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/4.jpg')}}" alt="">
                                                    </span>
                                                </div>
                                                <div>
                                                    <p class="text-default fw-medium mb-1">Angelica</p>
                                                    <p class="fs-12 text-muted mb-0 fw-normal">Can please send me the file.</p>
                                                </div>
                                            </div>
                                        </a>    
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="d-flex align-items-top lh-1">
                                                <div class="me-2">
                                                    <span class="avatar avatar-sm online avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/6.jpg')}}" alt="">
                                                    </span>
                                                </div>
                                                <div>
                                                    <p class="text-default fw-medium mb-1">Rexha</p>
                                                    <p class="fs-12 text-muted mb-0 fw-normal">Waiting for response &#128077;.</p>
                                                </div>
                                            </div>
                                        </a>    
                                    </li>
                                    <li class="px-0">
                                        <span class="fs-11 text-muted op-7 fw-medium">NASTAVITVE</span>
                                    </li>
                                    <li>
                                        <a href="{{url('mail-settings')}}">
                                            <div class="d-flex align-items-center">
                                                <span class="me-2 lh-1">
                                                    <i class="ti ti-settings align-middle fs-14"></i>
                                                </span>
                                                <span class="flex-fill text-nowrap">
                                                    Nastavitve
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                        <div class="total-mails border">
                            @if(1==2)
                            <div class="p-3 d-flex align-items-center border-bottom border-block-end-dashed flex-wrap gap-2">
                                <div class="input-group">
                                    <input type="text" class="form-control shadow-none" placeholder="Search Email" aria-describedby="button-addon">
                                    <button class="btn btn-primary" type="button" id="button-addon"><i class="ri-search-line me-1"></i> Search</button>
                                </div>
                            </div>
                            @endif
                            <div class="px-3 p-2 d-flex align-items-center border-bottom flex-wrap gap-2">
                                <div class="me-3">
                                    <input class="form-check-input check-all" type="checkbox" id="checkAll" value="" aria-label="...">
                                </div>
                                <div class="flex-fill">
                                    <h6 class="fw-medium mb-0">Vsa pošta</h6>
                                </div>
                                @if(1==2)
                                <div class="d-flex gap-2">
                                    <button class="btn btn-icon btn-light me-1 d-lg-none d-block total-mails-close">
                                        <i class="ri-close-line"></i>
                                    </button>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary1-light btn-wave" type="button" aria-expanded="false">
                                            <i class="ri-inbox-archive-line me-1"></i> Archive
                                        </button>
                                        <button class="btn btn-sm btn-primary2-light btn-wave" type="button" aria-expanded="false">
                                            <i class="ri-error-warning-line me-1"></i> Spam
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-primary3-light btn-wave" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:void(0);">Recent</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Unread</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Mark All Read</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Delete All</a></li>
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="mail-messages" id="mail-messages">
                                <ul class="list-unstyled mb-0 mail-messages-container">
                                    @if ($emails->count() > 0)
                                        @foreach ($emails as $email)
                                            <!-- Start::mail information offcanvas -->
                                            <div class="offcanvas offcanvas-end mail-info-offcanvas" tabindex="-1" id="offcanvasRight-{{ $email->id }}">       > 
                                                <div class="offcanvas-body p-0">
                                                    <div class="mails-information">
                                                        <br>
                                                        <br>
                                                        <br>
                                                        @if ($email->email_sender_id != null)
                                                             
                                                        @else
                                                            <div class="mail-info-header d-flex flex-wrap gap-2 align-items-center">
                                                                <div class="me-1 lh-1">
                                                                    <span class="avatar avatar-md avatar-rounded bg-{{ $email->app_email->emailType->app_email_type_color }}">
                                                                        <i class="ti-{{ $email->app_email->emailType->app_email_type_icon }} fs-5"></i>
                                                                    </span>
                                                                </div>

                                                                <div class="flex-fill">
                                                                    <h6 class="mb-0 fw-medium">{{ $email->app_email->emailType->app_email_type_name }}</h6>
                                                                    <span class="text-muted fs-11">info@ekakovost.com</span>
                                                                </div>
                                                                <div class="mail-action-icons">
                                                                    <button type="button" class="btn-close btn btn-sm btn-icon border" data-bs-dismiss="offcanvas"
                                                                        aria-label="Close">
                                                                    </button>
                                                                </div>
                                                                <div class="responsive-mail-action-icons">
                                                                    <button class="btn btn-icon btn-light ms-1 close-button" data-bs-dismiss="offcanvas" aria-label="Close">
                                                                        <i class="ri-close-line"></i>
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        @endif     
                                                        <div class="mail-info-body p-3" id="mail-info-body">
                                                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-3">
                                                                <div>
                                                                    <p class="fs-20 fw-medium mb-0">{{ $email->email_subject }}</p>
                                                                </div>
                                                                <div class="float-end">
                                                                    <span class="fs-12 text-muted">{{ \Carbon\Carbon::parse($email->email_sent_at)->format('j. n. Y, H:i') }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="main-mail-content mb-3">
                                                                {!! $email->email_body !!}
                                                            </div>
                                                            <hr>
                                                            <div class="mail-attachments mb-3">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <div class="mb-2"> 
                                                                        <span class="fs-14 fw-medium"><i class="ri-attachment-2 me-1 align-middle"></i>Priloge:</span>
                                                                    </div>
                                                                    @if (1==2)
                                                                        <div class="btn-list">
                                                                            <button class="btn btn-sm btn-primary-light">Prenesi vse</button>
                                                                        </div>
                                                                    @endif
                                                                </div>    
                                                                <div class="mt-2 d-flex flex-wrap gap-3">
                                                                    @if (1==2)
                                                                        <div class="d-flex align-items-center flex-wrap gap-3 border p-2 rounded-2">
                                                                            <div class="me-1 lh-1">
                                                                                <span class="avatar avatar-md bg-primary">
                                                                                    <i class="ri-file-pdf-2-line fs-18"></i>
                                                                                </span>
                                                                            </div>
                                                                            <div class="flex-fill">
                                                                                <a href="javascript:void(0);">
                                                                                    <p class="mb-1 fs-12 fw-medium">
                                                                                        Instructions_file.pdf
                                                                                    </p>
                                                                                </a>
                                                                                <div class="fs-12 text-muted text-wrap">2.1KB</div>  
                                                                            </div>
                                                                            <div class="ms-auto btn btn-sm btn-primary1-light rounded-circle btn-icon">
                                                                                <i class="ri-download-line"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center flex-wrap gap-3 border p-2 rounded-2">
                                                                            <div class="me-1 lh-1">
                                                                                <span class="avatar avatar-md bg-primary">
                                                                                    <i class="ri-file-pdf-line fs-18"></i>
                                                                                </span>
                                                                            </div>
                                                                            <div class="flex-fill">
                                                                                <a href="javascript:void(0);">
                                                                                    <p class="mb-1 fs-12 fw-medium">
                                                                                        Complete_Folder.doc
                                                                                    </p>
                                                                                </a>
                                                                                <div class="fs-12 text-muted text-wrap">1.5KB</div>  
                                                                            </div>
                                                                            <div class="ms-auto btn btn-sm btn-primary1-light rounded-circle btn-icon">
                                                                                <i class="ri-download-line"></i>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="d-flex align-items-center flex-wrap gap-3 border p-2 rounded-2">
                                                                            Ni prilog
                                                                        </div>          
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="mail-images mb-3">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <div class="mb-2"> 
                                                                        <span class="fs-14 fw-medium"><i class="ri-image-line me-1 align-middle"></i>Slike:</span>
                                                                    </div>
                                                                    @if(1==2)
                                                                        <div class="btn-list">
                                                                            <button class="btn btn-sm btn-primary-light">Download All</button>
                                                                        </div>
                                                                    @endif
                                                                </div>    
                                                                <div class="mt-2 d-flex flex-wrap gap-3">
                                                                    @if (1==2)
                                                                        <a href="javascript:void(0)">
                                                                            <span class="avatar avatar-lg shadow-sm">
                                                                                <img src="{{asset('build/assets/images/media/media-74.jpg')}}" alt="">
                                                                            </span>
                                                                        </a>
                                                                        <a href="javascript:void(0)">
                                                                            <span class="avatar avatar-lg shadow-sm">
                                                                                <img src="{{asset('build/assets/images/media/media-75.jpg')}}" alt="">
                                                                            </span>
                                                                        </a>
                                                                        <a href="javascript:void(0)">
                                                                            <span class="avatar avatar-lg shadow-sm">
                                                                                <img src="{{asset('build/assets/images/media/media-77.jpg')}}" alt="">
                                                                            </span>
                                                                        </a>
                                                                        <a href="javascript:void(0)">
                                                                            <span class="avatar avatar-lg bg-primary-transparent">
                                                                                5+
                                                                            </span>
                                                                        </a>
                                                                    @else
                                                                        <div class="d-flex align-items-center flex-wrap gap-3 border p-2 rounded-2">
                                                                            Ni slik
                                                                        </div>          
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            @if (1==2)
                                                                <div class="mb-3"> 
                                                                    <span class="fs-14 fw-medium"><i class="ri-reply-all-line me-1 align-middle d-inline-block"></i>Reply:</span>
                                                                </div>
                                                                <div class="mail-reply">
                                                                    <div id="mail-reply-editor"></div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        @if (1==2)
                                                            <div class="mail-info-footer d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                                                <div>
                                                                    <button class="btn btn-icon btn-primary-light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Print">
                                                                        <i class="ri-printer-line"></i>
                                                                    </button>
                                                                    <button class="btn btn-icon btn-secondary-light ms-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Mark as read">
                                                                        <i class="ri-mail-open-line"></i>
                                                                    </button>
                                                                    <button class="btn btn-icon btn-success-light ms-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Reload">
                                                                        <i class="ri-refresh-line"></i>
                                                                    </button>
                                                                </div>
                                                                <div>
                                                                    <button class="btn btn-secondary">
                                                                        <i class="ri-share-forward-line me-1 d-inline-block align-middle"></i>Forward
                                                                    </button>
                                                                    <button class="btn btn-danger ms-1">
                                                                        <i class="ri-reply-all-line me-1 d-inline-block align-middle"></i>Reply
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End::mail information offcanvas -->
                                            <li>
                                                <div class="d-sm-flex align-items-top">
                                                    <div class="me-3 mt-1">
                                                        <input class="form-check-input" type="checkbox" id="checkboxNoLabel1" value="" aria-label="...">
                                                    </div>
                                                    @if ($email->email_sender_id != null)
                                                        <div class="me-1 lh-1">
                                                            <span
                                                                class="avatar avatar-md me-2 avatar-rounded mail-msg-avatar">
                                                                <img src="{{asset('build/assets/images/faces/5.jpg')}}" alt="">
                                                            </span>
                                                        </div>
                                                    @else
                                                        <div class="me-1 lh-1">
                                                            <span class="avatar avatar-md avatar-rounded bg-{{ $email->app_email->emailType->app_email_type_color }}">
                                                                <i class="ti-{{ $email->app_email->emailType->app_email_type_icon }} fs-5"></i>
                                                            </span>
                                                        </div>
                                                    @endif
                                                    @if ($email->email_sender_id != null)
                                                        <div class="flex-fill">
                                                            <a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                                                <p class="mb-1 fs-12 fw-medium">
                                                                    Iliana Lilly <span
                                                                        class="float-end text-muted fw-normal fs-11"><span class="me-2"><i class="ri-attachment-2 align-middle fs-12"></i></span>12:12AM</span>
                                                                </p>
                                                            </a>   
                                                            <div class="mail-msg mb-0">
                                                                <span class="d-block mb-0 fw-medium text-truncate w-75">{{ $email->email_subject }}</span>
                                                                <div
                                                                    class="fs-12 text-muted text-wrap text-truncate mail-msg-content">{!! \Illuminate\Support\Str::limit($email->email_body, 100) !!}
                                                                    <button class="btn p-0 lh-1 mail-starred true border-0 float-end">
                                                                        <i class="ri-star-fill fs-14"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="flex-fill">
                                                            <a href="javascript:void(0);" data-bs-toggle="offcanvas"
                                                            data-bs-target="#offcanvasRight-{{ $email->id }}" aria-controls="offcanvasRight-{{ $email->id }}" title="{{ $email->app_email_type_description }}">
                                                                <p class="mb-1 fs-12 fw-medium">
                                                                {{ $email->app_email->emailType->app_email_type_name }}  <span
                                                                        class="float-end text-muted fw-normal fs-11"><span class="me-2"><i class="ri-attachment-2 align-middle fs-12"></i></span>{{ \Carbon\Carbon::parse($email->email_sent_at)->format('j. n. Y, H:i') }}</span>
                                                                </p>
                                                            </a>   
                                                            <div class="mail-msg mb-0">
                                                                <span class="d-block mb-0 fw-medium text-truncate w-75">{{ $email->email_subject }}</span>
                                                                <div
                                                                    class="fs-12 text-muted text-wrap text-truncate mail-msg-content">{!! \Illuminate\Support\Str::limit($email->email_body, 100) !!}
                                                                    <button class="btn p-0 lh-1 mail-starred true border-0 float-end">
                                                                        <i class="ri-star-fill fs-14"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </li>
                                            
                                        @endforeach
                                    @else
                                        Nimate e-pošt.
                                    @endif
                                    
                                </ul>
                            </div>
                        </div>
                        @if (1==2)
                        <div class="mail-recepients border">
                            <div class="p-3 border-bottom">
                                <button class="btn btn-primary1-light btn-icon rounded-pill" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Add Recepient"><i class="ri-add-line"></i></button>
                            </div>
                            <div class="p-3 d-flex flex-column align-items-center total-mail-recepients" id="mail-recepients">
                                <a href="javascript:void(0);" class="mail-recepeint-person">
                                    <span class="avatar online avatar-rounded">
                                        <img src="{{asset('build/assets/images/faces/11.jpg')}}" alt="" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Hadley Kylin">
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="mail-recepeint-person">
                                    <span class="avatar online avatar-rounded">
                                        <img src="{{asset('build/assets/images/faces/7.jpg')}}" alt="" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Iliana Lilly">
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="mail-recepeint-person">
                                    <span class="avatar offline avatar-rounded">
                                        <img src="{{asset('build/assets/images/faces/4.jpg')}}" alt="" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Jasmine Della">
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="mail-recepeint-person">
                                    <span class="avatar offline online avatar-rounded">
                                        <img src="{{asset('build/assets/images/faces/8.jpg')}}" alt="" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Emanuel Rush">
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="mail-recepeint-person">
                                    <span class="avatar offline avatar-rounded">
                                        <img src="{{asset('build/assets/images/faces/3.jpg')}}" alt="" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Nyra Tiyana">
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="mail-recepeint-person">
                                    <span class="avatar offline avatar-rounded">
                                        <img src="{{asset('build/assets/images/faces/11.jpg')}}" alt="" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Maria Violet">
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="mail-recepeint-person">
                                    <span class="avatar online avatar-rounded">
                                        <img src="{{asset('build/assets/images/faces/16.jpg')}}" alt="" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Priceton Gray">
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="mail-recepeint-person">
                                    <span class="avatar offline avatar-rounded">
                                        <img src="{{asset('build/assets/images/faces/10.jpg')}}" alt="" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Charlie Edson">
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="mail-recepeint-person">
                                    <span class="avatar offline avatar-rounded">
                                        <img src="{{asset('build/assets/images/faces/15.jpg')}}" alt="" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Spencer Robin">
                                    </span>
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>

                    

@endsection

@section('scripts')
	
        <!-- Quill Editor JS -->
        <script src="{{asset('build/assets/libs/quill/quill.js')}}"></script>

        <!-- Mail JS -->
        @vite('resources/assets/js/mail.js')

@endsection

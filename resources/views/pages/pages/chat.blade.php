
@extends('layouts.master')

@section('styles')

        <!-- GLightbox CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/glightbox/css/glightbox.min.css')}}">

@endsection

@section('content')
	
                    <!-- Page Header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <nav>
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chat</li>
                                </ol>
                            </nav>
                            <h1 class="page-title fw-medium fs-18 mb-0">Chat</h1>
                        </div>
                        <div class="btn-list">
                            <button class="btn btn-white btn-wave">
                                <i class="ri-filter-3-line align-middle me-1 lh-1"></i> Filter
                            </button>
                            <button class="btn btn-primary btn-wave me-0">
                                <i class="ri-share-forward-line me-1"></i> Share
                            </button>
                        </div>
                    </div>
                    <!-- Page Header Close -->
                
                    <div class="main-chart-wrapper gap-lg-2 gap-0 mb-2 d-lg-flex">
                        <div class="chat-info border">
                            <div class="chat-search p-3 border-bottom"> 
                                <div class="input-group"> 
                                    <input type="text" class="form-control" placeholder="Search Chat" aria-describedby="button-addon01"> 
                                    <button aria-label="button" class="btn btn-primary-light" type="button" id="button-addon01">
                                        <i class="ri-search-line"></i>
                                    </button> 
                                </div> 
                            </div>
                            <ul class="nav nav-tabs tab-style-6 nav-justified mb-0 border-bottom d-flex gap-2 flex-wrap"
                                id="myTab1" role="tablist">
                                <li class="nav-item me-0" role="presentation">
                                    <button class="nav-link active" id="users-tab" data-bs-toggle="tab"
                                        data-bs-target="#users-tab-pane" type="button" role="tab"
                                        aria-controls="users-tab-pane" aria-selected="true">Recent
                                        <span class="badge bg-primary1 rounded-pill float-end shadow-sm">1</span>
                                    
                                    </button>
                                </li>
                                <li class="nav-item me-0" role="presentation">
                                    <button class="nav-link" id="groups-tab" data-bs-toggle="tab"
                                        data-bs-target="#groups-tab-pane" type="button" role="tab"
                                        aria-controls="groups-tab-pane" aria-selected="false">Groups
                                        <span class="badge bg-primary3 rounded-pill float-end shadow-sm">2</span>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contacts-tab" data-bs-toggle="tab"
                                        data-bs-target="#contacts-tab-pane" type="button" role="tab"
                                        aria-controls="contacts-tab-pane" aria-selected="false">Contacts
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane show active border-0 chat-users-tab" id="users-tab-pane"
                                    role="tabpanel" aria-labelledby="users-tab" tabindex="0">
                                    <ul class="list-unstyled mb-0 mt-2 chat-users-tab" id="chat-msg-scroll">
                                        <li class="pb-0">
                                            <p class="text-muted fs-11 fw-medium mb-2 op-7">ACTIVE CHATS</p>
                                        </li>
                                        <li class="checkforactive">
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,'Rashid Khan','5','online')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md online me-2">
                                                            <img  src="{{asset('build/assets/images/faces/5.jpg')}}" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium">
                                                            Rashid Khan <span
                                                                class="float-end text-muted fw-normal fs-11">11:12PM</span>
                                                        </p>
                                                        <p class="fs-12 mb-0">
                                                            <span class="chat-msg text-truncate">Hey!! you are there? &#128522;</span>
                                                                    <span
                                                                        class="badge bg-primary2 rounded-pill float-end">3</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="chat-msg-unread checkforactive">
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,'Jamison Jen','2','online')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md online me-2">
                                                            <img  src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium">
                                                            Jamison Jen <span
                                                                class="float-end text-muted fw-normal fs-11">06:52AM</span>
                                                        </p>
                                                        <p class="fs-12 mb-0 chat-msg-typing ">
                                                            <span class="chat-msg text-truncate">Typing...</span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="checkforactive" >
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,'Andy Max','10','online')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md online me-2">
                                                            <img  src="{{asset('build/assets/images/faces/10.jpg')}}" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium">
                                                            Andy Max <span
                                                                class="float-end text-muted fw-normal fs-11">10:15AM</span>
                                                        </p>
                                                        <p class="fs-12 mb-0">
                                                            <span class="chat-msg text-truncate">Great! I am happy to here this from you. &#9749;</span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="checkforactive active">
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,'Kerina Cherish','6','online')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md online me-2">
                                                            <img src="{{asset('build/assets/images/faces/6.jpg')}}" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium">
                                                            Kerina Cherish <span
                                                                class="float-end text-muted fw-normal fs-11">03:15PM</span>
                                                        </p>
                                                        <p class="fs-12 mb-0">
                                                            <span class="chat-msg text-truncate">Looking forward about the matter</span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="pb-0">
                                            <p class="text-muted fs-11 fw-medium mb-2 op-7">ALL CHATS</p>
                                        </li>
                                        <li class="chat-inactive checkforactive" >
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,'Rony Erick','11','offline')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md offline me-2" >
                                                            <img  src="{{asset('build/assets/images/faces/11.jpg')}}" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium">
                                                            Rony Erick <span
                                                                class="float-end text-muted fw-normal fs-11">04:13PM</span>
                                                        </p>
                                                        <p class="fs-12 mb-0">
                                                            <span class="chat-msg text-truncate">You should come definately&#127916;</span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="chat-inactive checkforactive" >
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,'Kenath kin','3','offline')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md offline me-2">
                                                            <img  src="{{asset('build/assets/images/faces/3.jpg')}}" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium">
                                                            Kenath kin <span
                                                                class="float-end text-muted fw-normal fs-11">12:46AM</span>
                                                        </p>
                                                        <p class="fs-12 mb-0">
                                                            <span class="chat-msg text-truncate">Did you remember the date</span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="chat-inactive checkforactive" >
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,'Thomas Lie','13','offline')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md offline me-2">
                                                            <img  src="{{asset('build/assets/images/faces/13.jpg')}}" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium">
                                                            Thomas Lie <span
                                                                class="float-end text-muted fw-normal fs-11">07:30PM</span>
                                                        </p>
                                                        <p class="fs-12 mb-0">
                                                            <span class="chat-msg text-truncate">Hi, Thank you for everything</span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="chat-inactive checkforactive" >
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,'Peter Stark','4','offline')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md offline me-2">
                                                            <img src="{{asset('build/assets/images/faces/4.jpg')}}" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium">
                                                            Peter Stark <span
                                                                class="float-end text-muted fw-normal fs-11">01:18PM</span>
                                                        </p>
                                                        <p class="fs-12 mb-0">
                                                            <span class="chat-msg text-truncate">Going to Australia!</span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="chat-inactive checkforactive" >
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,'Monte Christ','13','offline')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md offline me-2">
                                                            <img src="{{asset('build/assets/images/faces/13.jpg')}}" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium">
                                                            Monte Christ <span
                                                                class="float-end text-muted fw-normal fs-11">08:07PM</span>
                                                        </p>
                                                        <p class="fs-12 mb-0">
                                                            <span class="chat-msg text-truncate">Little Busy &#127829;</span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="chat-inactive checkforactive" >
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,'Regina Mos','15','offline')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md offline me-2">
                                                            <img src="{{asset('build/assets/images/faces/15.jpg')}}" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium">
                                                            Regina Mos <span
                                                                class="float-end text-muted fw-normal fs-11">09:19PM</span>
                                                        </p>
                                                        <p class="fs-12 mb-0">
                                                            <span class="chat-msg text-truncate">Have a Question? </span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane border-0 chat-groups-tab" id="groups-tab-pane"
                                    role="tabpanel" aria-labelledby="groups-tab" tabindex="0">
                                    <ul class="list-unstyled mb-0 mt-2 ">
                                        <li class="pb-0">
                                            <p class="text-muted fs-11 fw-medium mb-1 op-7">MY CHAT GROUPS</p>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="mb-0 fw-medium"><i class="ri-checkbox-blank-circle-fill lh-1 text-primary me-1 fs-8 align-middle"></i>Huge Rocks </p>
                                                    <p class="mb-0"><span class="badge bg-primary3-transparent">4
                                                            Online</span></p>
                                                </div>
                                                <div class="avatar-list-stacked my-auto">
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img">
                                                    </span>
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/8.jpg')}}" alt="img">
                                                    </span>
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img">
                                                    </span>
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/10.jpg')}}" alt="img">
                                                    </span>
                                                    <a class="avatar avatar-sm bg-primary text-fixed-white avatar-rounded"
                                                        href="javascript:void(0);">
                                                        +19
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="mb-0 fw-medium"><i class="ri-checkbox-blank-circle-fill lh-1 text-primary2 me-1 fs-8 align-middle"></i>Creative Group </p>
                                                    <p class="mb-0"><span class="badge bg-primary2-transparent">32
                                                            Online</span></p>
                                                </div>
                                                <div class="avatar-list-stacked my-auto">
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/1.jpg')}}" alt="img">
                                                    </span>
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/7.jpg')}}" alt="img">
                                                    </span>
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/3.jpg')}}" alt="img">
                                                    </span>
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/9.jpg')}}" alt="img">
                                                    </span>
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/12.jpg')}}" alt="img">
                                                    </span>
                                                    <a class="avatar avatar-sm bg-primary text-fixed-white avatar-rounded"
                                                        href="javascript:void(0);">
                                                        +123
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="mb-0 fw-medium"><i class="ri-checkbox-blank-circle-fill lh-1 text-primary3 me-1 fs-8 align-middle"></i>Anyside Spriritual</p>
                                                    <p class="mb-0"><span class="badge bg-primary1-transparent">3
                                                            Online</span></p>
                                                </div>
                                                <div class="avatar-list-stacked my-auto">
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/4.jpg')}}" alt="img">
                                                    </span>
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/8.jpg')}}" alt="img">
                                                    </span>
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/13.jpg')}}" alt="img">
                                                    </span>
                                                    <a class="avatar avatar-sm bg-primary text-fixed-white avatar-rounded"
                                                        href="javascript:void(0);">
                                                        +15
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="mb-0 fw-medium"><i class="ri-checkbox-blank-circle-fill lh-1 text-secondary me-1 fs-8 align-middle"></i>Fun Time</p>
                                                    <p class="mb-0"><span class="badge bg-secondary-transparent">5
                                                            Online</span></p>
                                                </div>
                                                <div class="avatar-list-stacked my-auto">
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/1.jpg')}}" alt="img">
                                                    </span>
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/7.jpg')}}" alt="img">
                                                    </span>
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/14.jpg')}}" alt="img">
                                                    </span>
                                                    <a class="avatar avatar-sm bg-primary text-fixed-white avatar-rounded"
                                                        href="javascript:void(0);">
                                                        +28
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="mb-0 fw-medium"><i class="ri-checkbox-blank-circle-fill lh-1 text-warning me-1 fs-8 align-middle"></i>Latest News</p>
                                                    <p class="mb-0"><span class="badge bg-warning-transparent">2 Online</span>
                                                    </p>
                                                </div>
                                                <div class="avatar-list-stacked my-auto">
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/5.jpg')}}" alt="img">
                                                    </span>
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/6.jpg')}}" alt="img">
                                                    </span>
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/12.jpg')}}" alt="img">
                                                    </span>
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{asset('build/assets/images/faces/3.jpg')}}" alt="img">
                                                    </span>
                                                    <a class="avatar avatar-sm bg-primary text-fixed-white avatar-rounded"
                                                        href="javascript:void(0);">
                                                        +53
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled mb-0 mt-2 ">
                                        <li class="pb-0">
                                            <p class="text-muted fs-11 fw-medium mb-1 op-7">GROUP CHATS</p>
                                        </li>
                                        <li class="checkforactive">
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,' Huge Rocks &#128525;','17','online')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md online me-2">
                                                            <img src="{{asset('build/assets/images/faces/17.jpg')}}" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium" >
                                                            Huge Rocks &#128525; <span
                                                                class="float-end text-muted fw-normal fs-11">12:24PM</span>
                                                        </p>
                                                        <p class="fs-12 mb-0 chat-msg-typing ">
                                                            <span class="chat-msg text-truncate">Mony Typing...</span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                            <span
                                                                class="badge bg-primary3 rounded-circle float-end">2</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="chat-msg-unread checkforactive" >
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,'Creative Group','18','online')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md online me-2">
                                                            <img src="{{asset('build/assets/images/faces/18.jpg')}}" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium" >
                                                            Creative Group <span
                                                                class="float-end text-muted fw-normal fs-11">06:16AM</span>
                                                        </p>
                                                        <p class="fs-12 mb-0">
                                                            <span class="chat-msg text-truncate"><span
                                                                    class="group-indivudial">Kin:</span>Have any updates today?</span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="chat-inactive checkforactive" >
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,' Anyside Spriritual &#128526;','19','offline')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md offline me-2">
                                                            <img src="{{asset('build/assets/images/faces/19.jpg')}}" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium">
                                                            Anyside Spriritual &#128526; <span
                                                                class="float-end text-muted fw-normal fs-11">2 days
                                                                ago</span>
                                                        </p>
                                                        <p class="fs-12 mb-0">
                                                            <span
                                                                class="chat-msg text-truncate">Samantha, Adam, Jessica, Emily, Alex</span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="chat-inactive checkforactive" >
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,'DialogDynasty','20','offline')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md offline me-2">
                                                            <img  src="{{asset('build/assets/images/faces/20.jpg')}}" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium">
                                                            Fun Time <span
                                                                class="float-end text-muted fw-normal fs-11">3 days
                                                                ago</span>
                                                        </p>
                                                        <p class="fs-12 mb-0">
                                                            <span
                                                                class="chat-msg text-truncate">Elsa,Henry,Susan, Emily, Ashlin</span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="chat-inactive checkforactive" >
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,'Latest News','21','offline')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md offline me-2">
                                                            <img src="{{asset('build/assets/images/faces/21.jpg')}}" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium">
                                                            Latest News <span
                                                                class="float-end text-muted fw-normal fs-11">10 days
                                                                ago</span>
                                                        </p>
                                                        <p class="fs-12 mb-0">
                                                            <span
                                                                class="chat-msg text-truncate">Emanuel, Rony, Alina, Lilly, Rush</span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane border-0 chat-contacts-tab" id="contacts-tab-pane" role="tabpanel"
                                    aria-labelledby="contacts-tab" tabindex="0">
                                    <ul class="list-unstyled mb-0 chat-contacts-tab">
                                        <li>
                                            <span class="text-default fw-semibold">A</span>
                                        </li>   
                                        <li>    
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="lh-1">
                                                    <span class="avatar avatar-sm">
                                                        <img src="{{asset('build/assets/images/faces/5.jpg')}}" alt="">
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="d-block fw-semibold">
                                                        Ava Taylor
                                                    </span>
                                                </div>
                                                <div class="dropdown">
                                                    <a aria-label="anchor" href="javascript:void(0);" data-bs-toggle="dropdown" class="btn btn-icon btn-sm btn-outline-light"> 
                                                        <i class="ri-more-2-fill"></i>
                                                    </a> 
                                                    <ul class="dropdown-menu" role="menu"> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-message-2-line me-2"></i>Chat</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-phone-line me-2"></i>Audio Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-live-line me-2"></i>Video Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-edit-line me-2"></i>Edit</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-spam-2-line me-2"></i>Block</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-line me-2"></i>Delete</a></li> 
                                                    </ul> 
                                                </div>
                                            </div>
                                        </li>
                                        <li>    
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="lh-1">
                                                    <span class="avatar avatar-sm">
                                                        <img src="{{asset('build/assets/images/faces/12.jpg')}}" alt="">
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="d-block fw-semibold">
                                                        Alice Angel
                                                    </span>
                                                </div>
                                                <div class="dropdown">
                                                    <a aria-label="anchor" href="javascript:void(0);" data-bs-toggle="dropdown" class="btn btn-icon btn-sm btn-outline-light"> 
                                                        <i class="ri-more-2-fill"></i>
                                                    </a> 
                                                    <ul class="dropdown-menu" role="menu"> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-message-2-line me-2"></i>Chat</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-phone-line me-2"></i>Audio Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-live-line me-2"></i>Video Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-edit-line me-2"></i>Edit</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-spam-2-line me-2"></i>Block</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-line me-2"></i>Delete</a></li> 
                                                    </ul> 
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="text-default fw-semibold">B</span>
                                        </li>   
                                        <li>    
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="lh-1">
                                                    <span class="avatar avatar-sm">
                                                        <img src="{{asset('build/assets/images/faces/14.jpg')}}" alt="">
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="d-block fw-semibold">
                                                        Blessy diamond
                                                    </span>
                                                </div>
                                                <div class="dropdown">
                                                    <a aria-label="anchor" href="javascript:void(0);" data-bs-toggle="dropdown" class="btn btn-icon btn-sm btn-outline-light"> 
                                                        <i class="ri-more-2-fill"></i>
                                                    </a> 
                                                    <ul class="dropdown-menu" role="menu"> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-message-2-line me-2"></i>Chat</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-phone-line me-2"></i>Audio Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-live-line me-2"></i>Video Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-edit-line me-2"></i>Edit</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-spam-2-line me-2"></i>Block</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-line me-2"></i>Delete</a></li> 
                                                    </ul> 
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="text-default fw-semibold">D</span>
                                        </li>   
                                        <li>    
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="lh-1">
                                                    <span class="avatar avatar-sm bg-primary">
                                                        C
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="d-block fw-semibold">
                                                        Catalina Keira
                                                    </span>
                                                </div>
                                                <div class="dropdown">
                                                    <a aria-label="anchor" href="javascript:void(0);" data-bs-toggle="dropdown" class="btn btn-icon btn-sm btn-outline-light"> 
                                                        <i class="ri-more-2-fill"></i>
                                                    </a> 
                                                    <ul class="dropdown-menu" role="menu"> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-message-2-line me-2"></i>Chat</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-phone-line me-2"></i>Audio Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-live-line me-2"></i>Video Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-edit-line me-2"></i>Edit</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-spam-2-line me-2"></i>Block</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-line me-2"></i>Delete</a></li> 
                                                    </ul> 
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="text-default fw-semibold">D</span>
                                        </li>   
                                        <li>    
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="lh-1">
                                                    <span class="avatar avatar-sm">
                                                        <img src="{{asset('build/assets/images/faces/7.jpg')}}" alt="">
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="d-block fw-semibold">
                                                        Danny Raj
                                                    </span>
                                                </div>
                                                <div class="dropdown">
                                                    <a aria-label="anchor" href="javascript:void(0);" data-bs-toggle="dropdown" class="btn btn-icon btn-sm btn-outline-light"> 
                                                        <i class="ri-more-2-fill"></i>
                                                    </a> 
                                                    <ul class="dropdown-menu" role="menu"> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-message-2-line me-2"></i>Chat</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-phone-line me-2"></i>Audio Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-live-line me-2"></i>Video Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-edit-line me-2"></i>Edit</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-spam-2-line me-2"></i>Block</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-line me-2"></i>Delete</a></li> 
                                                    </ul> 
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="text-default fw-semibold">G</span>
                                        </li>   
                                        <li>    
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="lh-1">
                                                    <span class="avatar avatar-sm">
                                                        <img src="{{asset('build/assets/images/faces/15.jpg')}}" alt="">
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="d-block fw-semibold">
                                                        Gatin Leo
                                                    </span>
                                                </div>
                                                <div class="dropdown">
                                                    <a aria-label="anchor" href="javascript:void(0);" data-bs-toggle="dropdown" class="btn btn-icon btn-sm btn-outline-light"> 
                                                        <i class="ri-more-2-fill"></i>
                                                    </a> 
                                                    <ul class="dropdown-menu" role="menu"> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-message-2-line me-2"></i>Chat</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-phone-line me-2"></i>Audio Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-live-line me-2"></i>Video Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-edit-line me-2"></i>Edit</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-spam-2-line me-2"></i>Block</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-line me-2"></i>Delete</a></li> 
                                                    </ul> 
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="text-default fw-semibold">L</span>
                                        </li>   
                                        <li>    
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="lh-1">
                                                    <span class="avatar avatar-sm bg-primary">
                                                    M
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="d-block fw-semibold">
                                                        Monte Christ
                                                    </span>
                                                </div>
                                                <div class="dropdown">
                                                    <a aria-label="anchor" href="javascript:void(0);" data-bs-toggle="dropdown" class="btn btn-icon btn-sm btn-outline-light"> 
                                                        <i class="ri-more-2-fill"></i>
                                                    </a> 
                                                    <ul class="dropdown-menu" role="menu"> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-message-2-line me-2"></i>Chat</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-phone-line me-2"></i>Audio Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-live-line me-2"></i>Video Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-edit-line me-2"></i>Edit</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-spam-2-line me-2"></i>Block</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-line me-2"></i>Delete</a></li> 
                                                    </ul> 
                                                </div>
                                            </div>
                                        </li>
                                        <li>    
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="lh-1">
                                                    <span class="avatar avatar-sm">
                                                        <img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="">
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="d-block fw-semibold">
                                                        Thomas Lie
                                                    </span>
                                                </div>
                                                <div class="dropdown">
                                                    <a aria-label="anchor" href="javascript:void(0);" data-bs-toggle="dropdown" class="btn btn-icon btn-sm btn-outline-light"> 
                                                        <i class="ri-more-2-fill"></i>
                                                    </a> 
                                                    <ul class="dropdown-menu" role="menu"> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-message-2-line me-2"></i>Chat</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-phone-line me-2"></i>Audio Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-live-line me-2"></i>Video Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-edit-line me-2"></i>Edit</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-spam-2-line me-2"></i>Block</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-line me-2"></i>Delete</a></li> 
                                                    </ul> 
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="text-default fw-semibold">N</span>
                                        </li>   
                                        <li>    
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="lh-1">
                                                    <span class="avatar avatar-sm">
                                                        <img src="{{asset('build/assets/images/faces/10.jpg')}}" alt="">
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="d-block fw-semibold">
                                                        Nelson Gold
                                                    </span>
                                                </div>
                                                <div class="dropdown">
                                                    <a aria-label="anchor" href="javascript:void(0);" data-bs-toggle="dropdown" class="btn btn-icon btn-sm btn-outline-light"> 
                                                        <i class="ri-more-2-fill"></i>
                                                    </a> 
                                                    <ul class="dropdown-menu" role="menu"> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-message-2-line me-2"></i>Chat</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-phone-line me-2"></i>Audio Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-live-line me-2"></i>Video Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-edit-line me-2"></i>Edit</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-spam-2-line me-2"></i>Block</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-line me-2"></i>Delete</a></li> 
                                                    </ul> 
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="text-default fw-semibold">V</span>
                                        </li>   
                                        <li>    
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="lh-1">
                                                    <span class="avatar avatar-sm">
                                                        <img src="{{asset('build/assets/images/faces/16.jpg')}}" alt="">
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="d-block fw-semibold">
                                                        Victoria Gracie
                                                    </span>
                                                </div>
                                                <div class="dropdown">
                                                    <a aria-label="anchor" href="javascript:void(0);" data-bs-toggle="dropdown" class="btn btn-icon btn-sm btn-outline-light"> 
                                                        <i class="ri-more-2-fill"></i>
                                                    </a> 
                                                    <ul class="dropdown-menu" role="menu"> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-message-2-line me-2"></i>Chat</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-phone-line me-2"></i>Audio Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-live-line me-2"></i>Video Call</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-edit-line me-2"></i>Edit</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-spam-2-line me-2"></i>Block</a></li> 
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-line me-2"></i>Delete</a></li> 
                                                    </ul> 
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="main-chat-area border">
                            <div class="d-flex align-items-center border-bottom main-chat-head flex-wrap">
                                <span class="avatar avatar-md online chatstatusperson me-2 lh-1">
                                        <img class="chatimageperson" src="{{asset('build/assets/images/faces/6.jpg')}}" alt="img">
                                    </span>
                                <div class="flex-fill">
                                    <p class="mb-0 fw-medium fs-14 lh-1">
                                        <a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" class="chatnameperson responsive-userinfo-open">Kerina Cherish</a>
                                    </p>
                                    <p class="text-muted mb-0 chatpersonstatus">online</p>
                                </div>
                                <div class="d-flex flex-wrap rightIcons gap-2">
                                    <button aria-label="button" type="button" class="btn btn-icon btn-primary1-light my-0  btn-sm">
                                        <i class="ti ti-phone"></i>
                                    </button>
                                    <button aria-label="button" type="button" class="btn btn-icon btn-primary2-light my-0 btn-sm d-none d-sm-block">
                                        <i class="ti ti-video"></i>
                                    </button>
                                    <button aria-label="button" type="button" class="btn btn-icon btn-outline-light  responsive-userinfo-open btn-sm">
                                        <i class="ti ti-user-circle" id="responsive-chat-close"></i>
                                    </button>
                                    <div class="dropdown">
                                        <button aria-label="button" class="btn btn-icon btn-primary3-light  btn-wave waves-light btn-sm waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-user-3-line me-1"></i>Profile</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-format-clear me-1"></i>Clear Chat</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-user-unfollow-line me-1"></i>Delete User</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-user-forbid-line me-1"></i>Block User</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-error-warning-line me-1"></i>Report</a></li>
                                        </ul>
                                    </div>
                                    <button aria-label="button" type="button" class="btn btn-icon btn-primary-light my-0 responsive-chat-close btn-sm">
                                        <i class="ri-close-line"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="chat-content" id="main-chat-content">
                                <ul class="list-unstyled">
                                    <li class="chat-day-label">
                                        <span>Today</span>
                                    </li>
                                    <li class="chat-item-start">
                                        <div class="chat-list-inner">
                                            <div class="chat-user-profile">
                                                <span class="avatar avatar-md online chatstatusperson">
                                                    <img class="chatimageperson" src="{{asset('build/assets/images/faces/6.jpg')}}" alt="img">
                                                </span>
                                            </div>
                                            <div class="ms-3">
                                                <div class="main-chat-msg">
                                                    <div>
                                                        <p class="mb-0">Hey!&#128522; How are you? What have you been up to lately?</p>
                                                    </div>
                                                </div>
                                                <span class="chatting-user-info">
                                                    <span class="chatnameperson">Kerina Cherish</span> <span class="msg-sent-time">10:20PM</span>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="chat-item-end">
                                        <div class="chat-list-inner">
                                            <div class="me-3">
                                                <div class="main-chat-msg">
                                                    <div>
                                                        <p class="mb-0">Oh, hey! &#128516; I'm doing pretty well, thanks! Just been catching up on some reading and enjoying the nice weather. How about you?</p>
                                                    </div>
                                                </div>
                                                <span class="chatting-user-info">
                                                    <span class="msg-sent-time"><span class="chat-read-mark align-middle d-inline-flex"><i
                                                                class="ri-check-double-line"></i></span>11:50PM</span> You
                                                </span>
                                            </div>
                                            <div class="chat-user-profile">
                                                <span class="avatar avatar-md online">
                                                    <img src="{{asset('build/assets/images/faces/15.jpg')}}" alt="img">
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="chat-item-start">
                                        <div class="chat-list-inner">
                                            <div class="chat-user-profile">
                                                <span class="avatar avatar-md online chatstatusperson">
                                                    <img class="chatimageperson" src="{{asset('build/assets/images/faces/6.jpg')}}" alt="img">
                                                </span>
                                            </div>
                                            <div class="ms-3">
                                                <div class="main-chat-msg">
                                                    <div>
                                                        <p class="mb-0">That sounds lovely! I've been keeping busy with work, but I'm looking forward to the weekend. Thinking of heading out for a hike if the weather holds up.</p>
                                                    </div>
                                                </div>
                                                <span class="chatting-user-info">
                                                    <span class="chatnameperson">Kerina Cherish</span> <span class="msg-sent-time">11:51PM</span>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="chat-item-end">
                                        <div class="chat-list-inner">
                                            <div class="me-3">
                                                <div class="main-chat-msg">
                                                    <div>
                                                        <p class="mb-0">Nice! Hiking sounds like a great way to unwind. Which trail are you thinking of exploring?</p>
                                                    </div>
                                                </div>
                                                <span class="chatting-user-info">
                                                    <span class="msg-sent-time"><span class="chat-read-mark align-middle d-inline-flex"><i
                                                                class="ri-check-double-line"></i></span>11:52PM</span> You
                                                </span>
                                            </div>
                                            <div class="chat-user-profile">
                                                <span class="avatar avatar-md online">
                                                    <img src="{{asset('build/assets/images/faces/15.jpg')}}" alt="img">
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="chat-item-start">
                                        <div class="chat-list-inner">
                                            <div class="chat-user-profile">
                                                <span class="avatar avatar-md online chatstatusperson">
                                                    <img class="chatimageperson" src="{{asset('build/assets/images/faces/6.jpg')}}" alt="img">
                                                </span>
                                            </div>
                                            <div class="ms-3">
                                                <div class="main-chat-msg">
                                                    <div>
                                                        <p class="mb-0">I'm thinking of checking out the one up at Pine Ridge. It's got some amazing views of the valley. Would you be interested in joining?</p>
                                                    </div>
                                                </div>
                                                <span class="chatting-user-info">
                                                    <span class="chatnameperson">Kerina Cherish</span> <span class="msg-sent-time">11:55PM</span>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="chat-item-end">
                                        <div class="chat-list-inner">
                                            <div class="me-3">
                                                <div class="main-chat-msg">
                                                    <div class="">
                                                        <p class="mb-0">That sounds fantastic! I'd like to come along. Let me know what time you're planning to head out, and I'll make sure to pack some snacks for the trail.</p>
                                                    </div>
                                                </div>
                                                <span class="chatting-user-info">
                                                    <span class="msg-sent-time"><span class="chat-read-mark align-middle d-inline-flex"><i
                                                                class="ri-check-double-line"></i></span>11:52PM</span> You
                                                </span>
                                            </div>
                                            <div class="chat-user-profile">
                                                <span class="avatar avatar-md online">
                                                    <img src="{{asset('build/assets/images/faces/15.jpg')}}" alt="img">
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="chat-item-start">
                                        <div class="chat-list-inner">
                                            <div class="chat-user-profile">
                                                <span class="avatar avatar-md online">
                                                    <img class="chatimageperson" src="{{asset('build/assets/images/faces/6.jpg')}}" alt="img">
                                                </span>
                                            </div>
                                            <div class="ms-3">
                                                <div class="main-chat-msg">
                                                    <div>
                                                        <p class="mb-0">okay. &#128516;</p>
                                                    </div>
                                                </div>
                                                <span class="chatting-user-info chatnameperson">
                                                    Kerina Cherish <span class="msg-sent-time">11:45PM</span>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat-footer">
                                <a aria-label="anchor" class="btn btn-primary1-light me-2 btn-icon btn-send" href="javascript:void(0)">
                                    <i class="ri-attachment-2"></i>
                                </a>
                                <a aria-label="anchor" class="btn btn-icon me-2 btn-primary2 emoji-picker" href="javascript:void(0)">
                                    <i class="ri-emotion-line"></i>
                                </a>
                                <input class="form-control chat-message-space" placeholder="Type your message here..." type="text">
                                <a aria-label="anchor" class="btn btn-primary ms-2 btn-icon btn-send" href="javascript:void(0)">
                                    <i class="ri-send-plane-2-line"></i>
                                </a>
                            </div>
                        </div>
                        
                    </div>

                    <!-- Start::chat user details offcanvas -->
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
                        <div class="offcanvas-body">
                            <button type="button" class="btn btn-sm btn-icon btn-outline-light border" data-bs-dismiss="offcanvas"
                                aria-label="Close"><i class="ri-close-line lh-1 align-center"></i></button>
                            <div class="chat-user-details" id="chat-user-details">
                                <div class="text-center mb-4">
                                    <span class="avatar avatar-rounded online avatar-xxl me-2 mb-3 chatstatusperson">
                                        <img class="chatimageperson" src="{{asset('build/assets/images/faces/2.jpg')}}" alt="img">
                                    </span>
                                    <p class="mb-1 fs-15 fw-medium text-dark lh-1 chatnameperson">Jamison Jen</p>
                                    <p class="fs-12 text-muted"><span class="chatnameperson">jamisonjen0114</span>@gmail.com</p>
                                    <p class="text-center mb-0 d-flex gap-2 flex-wrap">
                                        <button type="button" aria-label="button" class="btn btn-primary-light btn-wave flex-fill"><i
                                                class="ri-phone-line me-2 align-middle"></i>Call</button>
                                        <button type="button" aria-label="button" class="btn btn-primary1-light btn-wave flex-fill"><i
                                                class="ri-video-add-line me-2 align-middle"></i>Video Call</button>
                                        <button type="button" aria-label="button" class="btn btn-info-light btn-wave flex-fill"><i
                                                class="ri-chat-1-line me-2 align-middle"></i>Message</button>
                                    </p>
                                </div>
                                <div class="mb-4 pt-2">
                                    <div class="fw-medium mb-4">Shared Files
                                        <span class="badge bg-primary2 ms-1 rounded-pill">17</span>
                                        <span class="float-end fs-11"><a href="javascript:void(0);" class="fs-12 text-muted"> View All<i class="ti ti-arrow-narrow-right ms-1"></i> </a></span>
                                    </div>
                                    <ul class="shared-files list-unstyled">
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="me-2 bg-primary-transparent rounded-circle">
                                                    <span class="shared-file-icon">
                                                        <i class="ti ti-file-text text-primary"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <p class="fs-12 fw-medium mb-0">notification.pdf</p>
                                                    <p class="mb-0 text-muted fs-11">15,Dec 2024 - 12:45PM</p>
                                                </div>
                                                <div class="fs-18">
                                                    <a aria-label="anchor" href="javascript:void(0)"><i class="ri-download-2-line text-muted"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="me-2 bg-secondary-transparent rounded-circle">
                                                    <span class="shared-file-icon">
                                                        <i class="ri-image-line text-secondary"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <p class="fs-12 fw-medium mb-0">Image_file1.Jpg</p>
                                                    <p class="mb-0 text-muted fs-11">03,Oct 2024 - 03:20AM</p>
                                                </div>
                                                <div class="fs-18">
                                                    <a aria-label="anchor" href="javascript:void(0)"><i class="ri-download-2-line text-muted"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="me-2 bg-success-transparent rounded-circle">
                                                    <span class="shared-file-icon">
                                                        <i class="ri-image-line text-success"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <p class="fs-12 fw-medium mb-0">Imagefile_12.Jpg</p>
                                                    <p class="mb-0 text-muted fs-11">19,Oct 2024 - 01:23PM</p>
                                                </div>
                                                <div class="fs-18">
                                                    <a aria-label="anchor" href="javascript:void(0)"><i class="ri-download-2-line text-muted"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="me-2 bg-orange-transparent rounded-circle">
                                                    <span class="shared-file-icon">
                                                        <i class="ri-video-line text-orange"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <p class="fs-12 fw-medium mb-0">Video-rec-20-10-2021.MP4</p>
                                                    <p class="mb-0 text-muted fs-11">13,May 2024 - 16:25AM</p>
                                                </div>
                                                <div class="fs-18">
                                                    <a href="javascript:void(0)"><i class="ri-download-2-line text-muted"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mb-0 pt-2">
                                    <div class="fw-medium mb-4">Photos & Media
                                        <span class="badge bg-primary3 ms-1 rounded-pill">15</span>
                                        <span class="float-end fs-11"><a href="javascript:void(0);" class="fs-12 text-muted"> View All<i class="ti ti-arrow-narrow-right ms-1"></i> </a></span>
                                    </div>
                                    <div class="row gy-3">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{asset('build/assets/images/media/media-40.jpg')}}" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{asset('build/assets/images/media/media-40.jpg')}}" alt="image" >
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{asset('build/assets/images/media/media-41.jpg')}}" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{asset('build/assets/images/media/media-41.jpg')}}" alt="image" >
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{asset('build/assets/images/media/media-42.jpg')}}" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{asset('build/assets/images/media/media-42.jpg')}}" alt="image" >
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{asset('build/assets/images/media/media-43.jpg')}}" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{asset('build/assets/images/media/media-43.jpg')}}" alt="image" >
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{asset('build/assets/images/media/media-44.jpg')}}" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{asset('build/assets/images/media/media-44.jpg')}}" alt="image" >
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{asset('build/assets/images/media/media-45.jpg')}}" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{asset('build/assets/images/media/media-45.jpg')}}" alt="image" >
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{asset('build/assets/images/media/media-46.jpg')}}" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{asset('build/assets/images/media/media-46.jpg')}}" alt="image" >
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{asset('build/assets/images/media/media-60.jpg')}}" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{asset('build/assets/images/media/media-60.jpg')}}" alt="image" >
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{asset('build/assets/images/media/media-61.jpg')}}" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{asset('build/assets/images/media/media-61.jpg')}}" alt="image" >
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End::chat user details offcanvas -->

@endsection

@section('scripts')
	
        <!-- Emojji Picker JS -->
        <script src="{{asset('build/assets/libs/fg-emoji-picker/fgEmojiPicker.js')}}"></script>
        
        <!-- Gallery JS -->
        <script src="{{asset('build/assets/libs/glightbox/js/glightbox.min.js')}}"></script>

        <!-- Chat JS -->
        <script src="{{asset('build/assets/chat.js')}}"></script>

@endsection

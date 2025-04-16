
@extends('layouts.landing-master')

@section('styles')



@endsection

@section('content')
	
                <!-- Start:: Section-1 -->
                <div class="landing-banner" id="home">
                    <section class="section">
                        <div class="container main-banner-container pb-lg-0">
                            <div class="row pt-3">
                                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-8">
                                    <div class="pt-lg-5 pb-4">
                                        <div class="mb-3">
                                            <h6 class="fw-medium text-fixed-white op-9">Optimized and Accessible</h6>
                                        </div>
                                        <p class="landing-banner-heading mb-3 text-fixed-white">Refined Design, Elevated User Experience: 
                                            Explore <span class="fw-semibold text-warning">Xintra</span> Template.</p>
                                        <div class="fs-16 mb-5 text-fixed-white op-7">An intuitive admin template designed for efficiency, featuring a clean and modern interface that simplifies management tasks and enhances productivity.
                                        </div>
                                        <a href="{{url('index')}}" class="m-1 btn btn-lg bg-white-transparent">
                                            View Demos
                                            <i class="ri-eye-line ms-2 align-middle"></i>
                                        </a>
                                        <a href="{{url('index')}}"
                                            class="m-1 btn btn-lg btn-primary1 btn-wave waves-effect waves-light">
                                            Discover More
                                            <i class="ri-arrow-right-line ms-2 align-middle"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-4 my-auto">
                                    <div class="text-end landing-main-image landing-heading-img">
                                        <img src="{{asset('build/assets/images/media/landing/1.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- End:: Section-1 -->

                <!-- Start:: Section-2 -->
                <section class="section" id="about">
                    <div class="container position-relative">
                        <div class="text-center">
                            <p class="fs-12 fw-medium text-success mb-1"><span class="landing-section-heading text-primary">GLANCE</span>
                            </p>
                            <h4 class="fw-semibold mb-1 mt-3">Why you choose us ?</h4>
                            <div class="row justify-content-center">
                                <div class="col-xl-7">
                                    <p class="text-muted fs-14 mb-5 fw-normal">Our mission is to support you in achieving
                                        your goals.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card custom-card landing-card border shadow-none text-center">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <span class="avatar avatar-lg bg-primary-transparent svg-primary avatar-rounded border-3 border border-opacity-50 border-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M208,40H48A24,24,0,0,0,24,64V176a24,24,0,0,0,24,24H208a24,24,0,0,0,24-24V64A24,24,0,0,0,208,40Zm8,136a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V64a8,8,0,0,1,8-8H208a8,8,0,0,1,8,8Zm-48,48a8,8,0,0,1-8,8H96a8,8,0,0,1,0-16h64A8,8,0,0,1,168,224Z"></path></svg>
                                            </span>
                                        </div>
                                        <h6 class="fw-semibold">Responsive and Accessible</h6>
                                        <p class="text-muted">Lorem ipsum dolor sit, amet consectetur adipisicing
                                            elitipsum dolor sit, amet consectetur</p>
                                        <a href="javascript:void(0);" class="fw-medium btn btn-sm btn-primary">Read More<i
                                                class="ti ti-arrow-narrow-right ms-2 fs-16 align-bottom"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card custom-card landing-card border shadow-none text-center">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <span class="avatar avatar-lg bg-primary1-transparent svg-primary1 avatar-rounded border-3 border border-opacity-50 border-primary1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M224,48V96a8,8,0,0,1-8,8H168a8,8,0,0,1,0-16h28.69L182.06,73.37a79.56,79.56,0,0,0-56.13-23.43h-.45A79.52,79.52,0,0,0,69.59,72.71,8,8,0,0,1,58.41,61.27a96,96,0,0,1,135,.79L208,76.69V48a8,8,0,0,1,16,0ZM186.41,183.29a80,80,0,0,1-112.47-.66L59.31,168H88a8,8,0,0,0,0-16H40a8,8,0,0,0-8,8v48a8,8,0,0,0,16,0V179.31l14.63,14.63A95.43,95.43,0,0,0,130,222.06h.53a95.36,95.36,0,0,0,67.07-27.33,8,8,0,0,0-11.18-11.44Z"></path></svg>
                                            </span>
                                        </div>
                                        <h6 class="fw-semibold">Continuous Updates and Support</h6>
                                        <p class="text-muted">Lorem ipsum dolor sit, amet consectetur adipisicing
                                            elitipsum dolor sit, amet consectetur</p>
                                        <a href="javascript:void(0);" class="fw-medium btn btn-sm btn-primary">Read More<i
                                                class="ti ti-arrow-narrow-right ms-2 fs-16 align-bottom"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card custom-card landing-card border shadow-none text-center">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <span class="avatar avatar-lg bg-primary2-transparent svg-primary2 avatar-rounded border-3 border border-opacity-50 border-primary2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M64,105V40a8,8,0,0,0-16,0v65a32,32,0,0,0,0,62v49a8,8,0,0,0,16,0V167a32,32,0,0,0,0-62Zm-8,47a16,16,0,1,1,16-16A16,16,0,0,1,56,152Zm80-95V40a8,8,0,0,0-16,0V57a32,32,0,0,0,0,62v97a8,8,0,0,0,16,0V119a32,32,0,0,0,0-62Zm-8,47a16,16,0,1,1,16-16A16,16,0,0,1,128,104Zm104,64a32.06,32.06,0,0,0-24-31V40a8,8,0,0,0-16,0v97a32,32,0,0,0,0,62v17a8,8,0,0,0,16,0V199A32.06,32.06,0,0,0,232,168Zm-32,16a16,16,0,1,1,16-16A16,16,0,0,1,200,184Z"></path></svg>
                                            </span>
                                        </div>
                                        <h6 class="fw-semibold">Design and Customization</h6>
                                        <p class="text-muted">Lorem ipsum dolor sit, amet consectetur adipisicing
                                            elitipsum dolor sit, amet consectetur</p>
                                        <a href="javascript:void(0);" class="fw-medium btn btn-sm btn-primary">Read More<i
                                                class="ti ti-arrow-narrow-right ms-2 fs-16 align-bottom"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End:: Section-2 -->

                <!-- Start:: Section-3 -->
                <section class="section section-bg" id="expectations">
                    <div class="container">
                        <div class="row gx-5 mx-0">
                            <div class="col-xl-5">
                                <div class="home-proving-image">
                                    <img src="{{asset('build/assets/images/media/landing/2.png')}}" alt="" class="img-fluid] about-image d-none d-xl-block">
                                </div>
                                <div class="proving-pattern-1"></div>
                            </div>
                            <div class="col-xl-7 my-auto">
                                <div class="heading-section text-start mb-4">
                                    <p class="fs-12 fw-medium text-start text-success mb-1"><span
                                            class="landing-section-heading text-primary">ABOUT US</span>
                                    </p>
                                    <h4 class="mt-3 fw-semibold mb-2">Our Commitment!</h4>
                                    <div class="heading-description fs-14">Welcome to Xintra,  our commitment is more than a statement; it's the cornerstone of everything we do.We are dedicated to design, ensuring that every interaction, project, and outcome reflects.</div>
                                </div>
                                <div class="row gy-3 mb-0">
                                    <div class="col-xl-12">
                                        <div class="d-flex align-items-top">
                                            <div class="me-2 home-prove-svg">
                                                <i
                                                    class="ri-focus-2-fill align-middle text-primary d-inline-block"></i>
                                            </div>
                                            <div>
                                                <span class="fs-14">
                                                    <strong>Years of Experience and Reputation:</strong> We bring 4+ years of experience, backed by a solid reputation for excellence.
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="d-flex align-items-top">
                                            <div class="me-2 home-prove-svg">
                                                <i
                                                    class="ri-focus-2-fill align-middle text-primary1 d-inline-block"></i>
                                            </div>
                                            <div>
                                                <span class="fs-14">
                                                    <strong>Professional Team:</strong> Our team consists of experienced and professional individuals dedicated to delivering top-notch service.
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="d-flex align-items-top">
                                            <div class="me-2 home-prove-svg">
                                                <i
                                                    class="ri-focus-2-fill align-middle text-primary2 d-inline-block"></i>
                                            </div>
                                            <div>
                                                <span class="fs-14">
                                                    <strong>Client-Centric Approach:</strong> We understand that every client is unique, so we tailor our services to meet your specific needs and preferences.
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="d-flex align-items-top">
                                            <div class="me-2 home-prove-svg">
                                                <i
                                                    class="ri-focus-2-fill align-middle text-primary3 d-inline-block"></i>
                                            </div>
                                            <div>
                                                <span class="fs-14">
                                                    <strong>24/7 Support:</strong> We provide round-the-clock support, 365 days a year, ensuring that assistance is always available when you need it most.
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End:: Section-3 -->

                <!-- Start:: Section-4 -->
                <section class="section" id="services">
                    <div class="container">
                        <div class="text-center">
                            <p class="fs-12 fw-medium text-success mb-1"><span
                                    class="landing-section-heading text-primary">SERVICES</span>
                            </p>
                            <h4 class="fw-semibold mt-3 mb-2">What You Get</h4>
                            <div class="row justify-content-center">
                                <div class="col-xl-7">
                                    <p class="text-muted fs-14 mb-5 fw-normal">Nemo enim ipsam voluptatem quia voluptas sit
                                        aspernatur</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="card custom-card landing-card">
                                    <div class="card-body text-center">
                                        <div class="mb-4">
                                            <div class="p-2 border d-inline-block border-primary border-opacity-10 bg-primary-transparent rounded-pill">
                                                <span class="avatar avatar-lg avatar-rounded bg-primary svg-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M224,200h-8V40a8,8,0,0,0-8-8H152a8,8,0,0,0-8,8V80H96a8,8,0,0,0-8,8v40H48a8,8,0,0,0-8,8v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16ZM160,48h40V200H160ZM104,96h40V200H104ZM56,144H88v56H56Z"></path></svg>
                                                </span>
                                            </div>
                                        </div>
                                        <h6 class="fw-semibold">Responsive Design</h6>
                                        <p class="text-muted mb-0">Ensures the template is optimized for various screen sizes and devices, enhancing usability.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card custom-card landing-card">
                                    <div class="card-body text-center">
                                        <div class="mb-4">
                                            <div class="mb-4">
                                                <div class="p-2 border d-inline-block border-primary1 border-opacity-10 bg-primary1-transparent rounded-pill">
                                                    <span class="avatar avatar-lg avatar-rounded bg-primary1 svg-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M224,200h-8V40a8,8,0,0,0-8-8H152a8,8,0,0,0-8,8V80H96a8,8,0,0,0-8,8v40H48a8,8,0,0,0-8,8v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16ZM160,48h40V200H160ZM104,96h40V200H104ZM56,144H88v56H56Z"></path></svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="fw-semibold">Pre-built Components</h6>
                                        <p class="text-muted mb-0">Ready-made UI components such as buttons, forms, tables, charts, and modals.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card custom-card landing-card">
                                    <div class="card-body text-center">
                                        <div class="mb-4">
                                            <div class="mb-4">
                                                <div class="p-2 border d-inline-block border-primary2 border-opacity-10 bg-primary2-transparent rounded-pill">
                                                    <span class="avatar avatar-lg avatar-rounded bg-primary2 svg-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M224,200h-8V40a8,8,0,0,0-8-8H152a8,8,0,0,0-8,8V80H96a8,8,0,0,0-8,8v40H48a8,8,0,0,0-8,8v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16ZM160,48h40V200H160ZM104,96h40V200H104ZM56,144H88v56H56Z"></path></svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="fw-semibold">Customization Options</h6>
                                        <p class="text-muted mb-0">Ability to customize colors, fonts, layouts, and other visual elements to match your brand.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card custom-card landing-card">
                                    <div class="card-body text-center">
                                        <div class="mb-4">
                                            <div class="p-2 border d-inline-block border-primary3 border-opacity-10 bg-primary3-transparent rounded-pill">
                                                <span class="avatar avatar-lg avatar-rounded bg-primary3 svg-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M224,200h-8V40a8,8,0,0,0-8-8H152a8,8,0,0,0-8,8V80H96a8,8,0,0,0-8,8v40H48a8,8,0,0,0-8,8v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16ZM160,48h40V200H160ZM104,96h40V200H104ZM56,144H88v56H56Z"></path></svg>
                                                </span>
                                            </div>
                                        </div>
                                        <h6 class="fw-semibold">Documentation</h6>
                                        <p class="text-muted mb-0">Comprehensive documentation that guides you through installation, customization.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card custom-card landing-card">
                                    <div class="card-body text-center">
                                        <div class="mb-4">
                                            <div class="p-2 border d-inline-block border-secondary border-opacity-10 bg-secondary-transparent rounded-pill">
                                                <span class="avatar avatar-lg avatar-rounded bg-secondary svg-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M224,200h-8V40a8,8,0,0,0-8-8H152a8,8,0,0,0-8,8V80H96a8,8,0,0,0-8,8v40H48a8,8,0,0,0-8,8v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16ZM160,48h40V200H160ZM104,96h40V200H104ZM56,144H88v56H56Z"></path></svg>
                                                </span>
                                            </div>
                                        </div>
                                        <h6 class="fw-semibold">Support</h6>
                                        <p class="text-muted mb-0">Access to support forums, ticket systems, or direct support from the template provider.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card custom-card landing-card">
                                    <div class="card-body text-center">
                                        <div class="mb-4">
                                            <div class="p-2 border d-inline-block border-info border-opacity-10 bg-info-transparent rounded-pill">
                                                <span class="avatar avatar-lg avatar-rounded bg-info svg-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M224,200h-8V40a8,8,0,0,0-8-8H152a8,8,0,0,0-8,8V80H96a8,8,0,0,0-8,8v40H48a8,8,0,0,0-8,8v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16ZM160,48h40V200H160ZM104,96h40V200H104ZM56,144H88v56H56Z"></path></svg>
                                                </span>
                                            </div>
                                        </div>
                                        <h6 class="fw-semibold">Updates and Maintenance</h6>
                                        <p class="text-muted mb-0">Regular updates to ensure compatibility with the latest web technologies and bug fixes.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card custom-card landing-card">
                                    <div class="card-body text-center">
                                        <div class="mb-4">
                                            <div class="p-2 border d-inline-block border-warning border-opacity-10 bg-warning-transparent rounded-pill">
                                                <span class="avatar avatar-lg avatar-rounded bg-warning svg-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M224,200h-8V40a8,8,0,0,0-8-8H152a8,8,0,0,0-8,8V80H96a8,8,0,0,0-8,8v40H48a8,8,0,0,0-8,8v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16ZM160,48h40V200H160ZM104,96h40V200H104ZM56,144H88v56H56Z"></path></svg>
                                                </span>
                                            </div>
                                        </div>
                                        <h6 class="fw-semibold">Multiple Layout</h6>
                                        <p class="text-muted mb-0">Different layout styles (sidebar navigation, top navigation) to suit different types of applications.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card custom-card landing-card">
                                    <div class="card-body text-center">
                                        <div class="mb-4">
                                            <div class="p-2 border d-inline-block border-success border-opacity-10 bg-success-transparent rounded-pill">
                                                <span class="avatar avatar-lg avatar-rounded bg-success svg-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M224,200h-8V40a8,8,0,0,0-8-8H152a8,8,0,0,0-8,8V80H96a8,8,0,0,0-8,8v40H48a8,8,0,0,0-8,8v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16ZM160,48h40V200H160ZM104,96h40V200H104ZM56,144H88v56H56Z"></path></svg>
                                                </span>
                                            </div>
                                        </div>
                                        <h6 class="fw-semibold">Performance Optimization</h6>
                                        <p class="text-muted mb-0">Code optimized for performance, including lazy loading of assets, CSS and JS files.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End:: Section-4 -->

                <!-- Start:: Section-5 -->
                <section class="section landing-Features" id="features">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <div class="heading-section text-center mb-0">
                                    <p class="fs-12 fw-medium text-success mb-1"><span
                                            class="landing-section-heading landing-section-heading-dark text-fixed-white">FEATURES</span>
                                    </p>
                                    <h4 class="text-fixed-white text-center mt-3 fw-medium">Our Features</h4>
                                    <div class="fs-14 text-fixed-white text-center op-8 mb-4">Ullamco ea commodo.Sed ut
                                        perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                        laudantium, totam rem aperiam.perspiciatis unde omnis.</div>
                                </div>
                            </div>
                            <div class="col-xl-10 my-auto">
                                <div
                                    class="d-flex align-items-center justify-content-center trusted-companies sub-card-companies flex-wrap mb-3 mb-xl-0 gap-4">
                                    <div class="trust-img"><img src="{{asset('build/assets/images/media/landing/web/1.png')}}" alt="img"
                                            class="border-0 shadow-sm"></div>
                                    <div class="trust-img"><img src="{{asset('build/assets/images/media/landing/web/2.png')}}" alt="img"
                                            class="border-0 shadow-sm"></div>
                                    <div class="trust-img"><img src="{{asset('build/assets/images/media/landing/web/4.png')}}" alt="img"
                                            class="border-0 shadow-sm"></div>
                                    <div class="trust-img"><img src="{{asset('build/assets/images/media/landing/web/5.png')}}" alt="img"
                                            class="border-0 shadow-sm"></div>
                                    <div class="trust-img"><img src="{{asset('build/assets/images/media/landing/web/6.png')}}" alt="img"
                                            class="border-0 shadow-sm"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End:: Section-5 -->

                <!-- Start:: Section-6 -->
                <section class="section" id="team">
                    <div class="container">
                        <div class="text-center">
                            <p class="fs-12 fw-medium text-success mb-1"><span
                                    class="landing-section-heading text-primary">OUR TEAM</span>
                            </p>
                            <h4 class="fw-semibold mt-3 mb-2">The people who make our organization Successful</h4>
                            <div class="row justify-content-center">
                                <div class="col-xl-7">
                                    <p class="text-muted fs-14 mb-5 fw-normal">Our team is made up of real people who are
                                        passionate about what they do.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="card custom-card team-member text-center">
                                    <div class="team-bg-shape primary"></div>
                                    <div class="card-body p-4">
                                        <div class="mb-4 lh-1 d-flex gap-2 justify-content-center">
                                            <span class="avatar avatar-xl avatar-rounded bg-primary">
                                                <img src="{{asset('build/assets/images/faces/1.jpg')}}" class="card-img" alt="...">
                                            </span>
                                        </div>
                                        <div class="">
                                            <p class="mb-2 fs-11 badge bg-primary fw-medium">Director</p>
                                            <h6 class="mb-3 fw-semibold">Hadley Kylin</h6>
                                            <p class="text-muted fs-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since</p>
                                            <div class="d-flex justify-content-center mt-4">
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-primary-light btn-wave btn-sm waves-effect waves-light"><i class="ri-twitter-x-fill"></i></a>
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-primary1-light btn-wave btn-sm ms-2 waves-effect waves-light"><i class="ri-facebook-fill"></i></a>
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-primary2-light btn-wave btn-sm ms-2 waves-effect waves-light"><i class="ri-instagram-line"></i></a>
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-primary3-light btn-wave btn-sm ms-2 waves-effect waves-light"><i class="ri-linkedin-fill"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="card custom-card team-member text-center">
                                    <div class="team-bg-shape teal"></div>
                                    <div class="card-body p-4">
                                        <div class="mb-4 lh-1 d-flex gap-2 justify-content-center">
                                            <span class="avatar avatar-xl avatar-rounded bg-teal">
                                                <img src="{{asset('build/assets/images/faces/8.jpg')}}" class="card-img" alt="...">
                                            </span>
                                        </div>
                                        <div class="">
                                            <p class="mb-2 fs-11 badge bg-primary1 fw-medium">Board Director</p>
                                            <h6 class="mb-3 fw-semibold">Owen Foster</h6>
                                            <p class="text-muted fs-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since</p>
                                            <div class="d-flex justify-content-center mt-4">
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-primary-light btn-wave btn-sm waves-effect waves-light"><i class="ri-twitter-x-fill"></i></a>
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-primary1-light btn-wave btn-sm ms-2 waves-effect waves-light"><i class="ri-facebook-fill"></i></a>
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-primary2-light btn-wave btn-sm ms-2 waves-effect waves-light"><i class="ri-instagram-line"></i></a>
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-primary3-light btn-wave btn-sm ms-2 waves-effect waves-light"><i class="ri-linkedin-fill"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="card custom-card team-member text-center">
                                    <div class="team-bg-shape success"></div>
                                    <div class="card-body p-4">
                                        <div class="mb-4 lh-1 d-flex gap-2 justify-content-center">
                                            <span class="avatar avatar-xl avatar-rounded bg-success">
                                                <img src="{{asset('build/assets/images/faces/11.jpg')}}" class="card-img" alt="...">
                                            </span>
                                        </div>
                                        <div class="">
                                            <p class="mb-2 fs-11 badge bg-primary2 fw-medium">Creative Director</p>
                                            <h6 class="mb-3 fw-semibold">Stephen Roy</h6>
                                            <p class="text-muted fs-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since</p>
                                            <div class="d-flex justify-content-center mt-4">
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-primary-light btn-wave btn-sm waves-effect waves-light"><i class="ri-twitter-x-fill"></i></a>
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-primary1-light btn-wave btn-sm ms-2 waves-effect waves-light"><i class="ri-facebook-fill"></i></a>
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-primary2-light btn-wave btn-sm ms-2 waves-effect waves-light"><i class="ri-instagram-line"></i></a>
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-primary3-light btn-wave btn-sm ms-2 waves-effect waves-light"><i class="ri-linkedin-fill"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="card custom-card team-member text-center">
                                    <div class="team-bg-shape orange"></div>
                                    <div class="card-body p-4">
                                        <div class="mb-4 lh-1 d-flex gap-2 justify-content-center">
                                            <span class="avatar avatar-xl avatar-rounded bg-orange">
                                                <img src="{{asset('build/assets/images/faces/4.jpg')}}" class="card-img" alt="...">
                                            </span>
                                        </div>
                                        <div class="">
                                            <p class="mb-2 fs-11 badge bg-primary3 fw-medium">Board Director</p>
                                            <h6 class="mb-3 fw-semibold">Jasmine Della</h6>
                                            <p class="text-muted fs-12">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since</p>
                                            <div class="d-flex justify-content-center mt-4">
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-primary-light btn-wave btn-sm waves-effect waves-light"><i class="ri-twitter-x-fill"></i></a>
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-primary1-light btn-wave btn-sm ms-2 waves-effect waves-light"><i class="ri-facebook-fill"></i></a>
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-primary2-light btn-wave btn-sm ms-2 waves-effect waves-light"><i class="ri-instagram-line"></i></a>
                                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-primary3-light btn-wave btn-sm ms-2 waves-effect waves-light"><i class="ri-linkedin-fill"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End:: Section-6 -->

                <!-- Start:: Section-7 -->
                <section class="section section-bg" id="pricing">
                    <div class="container">
                        <div class="text-center">
                            <p class="fs-12 fw-medium text-success mb-1"><span
                                    class="landing-section-heading text-primary">PRICING</span>
                            </p>
                            <h4 class="fw-semibold mt-3 mb-2">Plans that flex with your needs.</h4>
                            <div class="row justify-content-center">
                                <div class="col-xl-7">
                                    <p class="text-muted fs-14 mb-5 fw-normal">Stay agile with plans that seamlessly adjust to your changing requirements, ensuring you always have the flexibility you need.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12" id="convertable-pricing">
                                <div class="d-flex justify-content-center mb-4">
                                    <div class="switcher-box">
                                        <span class="pricing-time-span">Monthly</span>
                                        <div class="switcher-pricing text-center">
                                        <input type="checkbox" class="pricing-toggle">
                                        </div>
                                        <span class="pricing-time-span">Annually <span class="badge bg-primary2">20% off</span></span>
                                    </div>
                                </div>
                                <div class="tab-content show" id="monthly1">
                                    <div class="row d-flex align-items-center justify-content-center mb-5">
                                        <div class="col-lg-8 col-xl-4 col-xxl-4 col-md-8 col-sm-12">
                                            <div class="card custom-card pricing-card hover bg-primary">
                                                <div class="pricing-table-item-icon">
                                                    <i class="fe fe-zap me-2"></i> Popular
                                                </div>
                                                <div class="card-body p-4 border-bottom border-block-end-dashed border-white-1">
                                                    <h6 class="fw-medium mb-1 text-fixed-white">Premium</h6>
                                                    <h2 class="mb-1 fw-semibold d-block text-fixed-white">$22.89<span class="fs-12 fw-medium ms-1 op-8"> / Month</span></h2>
                                                    <span class="op-7 d-block text-fixed-white fs-11">Unlock powerful tools tailored for seasoned users, designed to take your skills to the next level.</span>
                                                </div>
                                                <div class="card-body p-4 text-fixed-white">
                                                    <ul class="list-unstyled pricing-body">
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled op-8 fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Unlimited users
                                                                </span>
                                                                <span class="badge bg-success rounded-pill">Unlimited</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled op-8 fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    Advanced analytics
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled op-8 fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Customizable dashboards
                                                                </span>
                                                                <span class="bg-white-transparent op-8 p-1 lh-1 rounded-pill" data-bs-toggle="tooltip" data-bs-title="Provide essential insights and data analysis to help you track the performance.">
                                                                    <i class="ri-information-2-line"></i>
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled op-8 fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    Phone support
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled op-8 fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    Dedicated account manager
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled op-8 fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    SLA guarantees
                                                                </span>
                                                                <span class="op-5 fs-12 fw-medium">30 Days</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled op-8 fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    On-site training for teams
                                                                </span>
                                                                <span class="op-5 fs-12 fw-medium">120 Days</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-footer border-top border-block-start-dashed border-white-1 p-4">
                                                    <button type="button" class="btn btn-lg btn-white d-grid w-100 btn-wave">
                                                        <span class="ms-4 me-4">Get Started!</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-xl-4 col-xxl-4 col-md-8 col-sm-12">
                                            <div class="card custom-card pricing-card">
                                                <div class="card-body p-4 border-bottom border-block-end-dashed">
                                                    <h6 class="fw-medium mb-1">Basic</h6>
                                                    <h2 class="mb-1 fw-semibold d-block">$8.5<span class="fs-12 fw-medium ms-1"> / Month</span></h2>
                                                    <span class="mb-1 text-muted d-block fs-11">Discover the vital features that create an enchanting foundation for a magical beginning.</span>
                                                </div>
                                                <div class="card-body p-4">
                                                    <ul class="list-unstyled pricing-body">
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Up to 10 users
                                                                </span>
                                                                <span class="badge bg-primary2-transparent rounded-pill">New</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    Community access
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Basic reporting
                                                                </span>
                                                                <span class="bg-info-transparent p-1 lh-1 rounded-pill" data-bs-toggle="tooltip" data-bs-title="Provide essential insights and data analysis to help you track the performance.">
                                                                    <i class="ri-information-2-line"></i>
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    Email support
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    Community access
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Access to essential features
                                                                </span>
                                                                <span class="text-muted fs-12 fw-medium">12 Days</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Mobile app access
                                                                </span>
                                                                <span class="text-muted fs-12 fw-medium">45 Days</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-footer p-4">
                                                    <button type="button" class="btn btn-lg btn-primary d-grid w-100 btn-wave">
                                                        <span class="ms-4 me-4">Get Started!</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-xl-4 col-xxl-4 col-md-8 col-sm-12">
                                            <div class="card custom-card pricing-card">
                                                <div class="card-body p-4 border-bottom border-block-end-dashed">
                                                    <h6 class="fw-medium mb-1">Standard</h6>
                                                    <h2 class="mb-1 fw-semibold d-block">$29.99<span class="fs-12 fw-medium ms-1"> / Month</span></h2>
                                                    <span class="fs-11 text-muted d-block">Elevate to the highest standards with unparalleled excellence and exclusive top-tier support.</span>
                                                </div>
                                                <div class="card-body p-4">
                                                    <ul class="list-unstyled pricing-body">
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Up to 50 users
                                                                </span>
                                                                <span class="badge bg-primary2-transparent rounded-pill">New</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    Access to webinars
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Advanced reporting
                                                                </span>
                                                                <span class="bg-info-transparent p-1 lh-1 rounded-pill" data-bs-toggle="tooltip" data-bs-title="Provide essential insights and data analysis to help you track the performance.">
                                                                    <i class="ri-information-2-line"></i>
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    Priority email support
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    24/7 chat support
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    All Standard features
                                                                </span>
                                                                <span class="text-muted fs-12 fw-medium">52 Days</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Team collaboration tools
                                                                </span>
                                                                <span class="text-muted fs-12 fw-medium">60 Days</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-footer p-4">
                                                    <button type="button" class="btn btn-lg btn-primary d-grid w-100 btn-wave">
                                                        <span class="ms-4 me-4">Get Started!</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content" id="yearly1">
                                    <div class="row d-flex align-items-center justify-content-center mb-5">
                                        <div class="col-lg-8 col-xl-4 col-xxl-4 col-md-8 col-sm-12">
                                            <div class="card custom-card pricing-card hover bg-primary">
                                                <div class="pricing-table-item-icon">
                                                    <i class="fe fe-zap me-2"></i> Popular
                                                </div>
                                                <div class="card-body p-4 border-bottom border-block-end-dashed border-white-1">
                                                    <h6 class="fw-medium mb-1 text-fixed-white">Premium</h6>
                                                    <h2 class="mb-1 fw-semibold d-block text-fixed-white">$1,999.89<span class="fs-12 fw-medium ms-1 op-8"> / Annum</span></h2>
                                                    <span class="op-7 d-block text-fixed-white fs-11">Unlock powerful tools tailored for seasoned users, designed to take your skills to the next level.</span>
                                                </div>
                                                <div class="card-body p-4 text-fixed-white">
                                                    <ul class="list-unstyled pricing-body">
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled op-8 fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Unlimited users
                                                                </span>
                                                                <span class="badge bg-success rounded-pill">Unlimited</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled op-8 fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    Advanced analytics
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled op-8 fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Customizable dashboards
                                                                </span>
                                                                <span class="bg-white-transparent op-8 p-1 lh-1 rounded-pill" data-bs-toggle="tooltip" data-bs-title="Provide essential insights and data analysis to help you track the performance.">
                                                                    <i class="ri-information-2-line"></i>
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled op-8 fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    Phone support
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled op-8 fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    Dedicated account manager
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled op-8 fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    SLA guarantees
                                                                </span>
                                                                <span class="op-5 fs-12 fw-medium">90 Days</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled op-8 fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    On-site training for teams
                                                                </span>
                                                                <span class="op-5 fs-12 fw-medium">300 Days</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-footer border-top border-block-start-dashed border-white-1 p-4">
                                                    <button type="button" class="btn btn-lg btn-white d-grid w-100 btn-wave">
                                                        <span class="ms-4 me-4">Get Started!</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-xl-4 col-xxl-4 col-md-8 col-sm-12">
                                            <div class="card custom-card pricing-card">
                                                <div class="card-body p-4 border-bottom border-block-end-dashed">
                                                    <h6 class="fw-medium mb-1">Basic</h6>
                                                    <h2 class="mb-1 fw-semibold d-block">$899.96<span class="fs-12 fw-medium ms-1"> / Annum</span></h2>
                                                    <span class="mb-1 text-muted d-block fs-11">Discover the vital features that create an enchanting foundation for a magical beginning.</span>
                                                </div>
                                                <div class="card-body p-4">
                                                    <ul class="list-unstyled pricing-body">
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Up to 10 users
                                                                </span>
                                                                <span class="badge bg-primary2-transparent rounded-pill">New</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    Community access
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Basic reporting
                                                                </span>
                                                                <span class="bg-info-transparent p-1 lh-1 rounded-pill" data-bs-toggle="tooltip" data-bs-title="Provide essential insights and data analysis to help you track the performance.">
                                                                    <i class="ri-information-2-line"></i>
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    Email support
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    Community access
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Access to essential features
                                                                </span>
                                                                <span class="text-muted fs-12 fw-medium">40 Days</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Mobile app access
                                                                </span>
                                                                <span class="text-muted fs-12 fw-medium">180 Days</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-footer p-4">
                                                    <button type="button" class="btn btn-lg btn-primary d-grid w-100 btn-wave">
                                                        <span class="ms-4 me-4">Get Started!</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-xl-4 col-xxl-4 col-md-8 col-sm-12">
                                            <div class="card custom-card pricing-card">
                                                <div class="card-body p-4 border-bottom border-block-end-dashed">
                                                    <h6 class="fw-medium mb-1">Standard</h6>
                                                    <h2 class="mb-1 fw-semibold d-block">$589.99<span class="fs-12 fw-medium ms-1"> / Annum</span></h2>
                                                    <span class="fs-11 text-muted d-block">Elevate to the highest standards with unparalleled excellence and exclusive top-tier support.</span>
                                                </div>
                                                <div class="card-body p-4">
                                                    <ul class="list-unstyled pricing-body">
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Up to 50 users
                                                                </span>
                                                                <span class="badge bg-primary2-transparent rounded-pill">New</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    Access to webinars
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Advanced reporting
                                                                </span>
                                                                <span class="bg-info-transparent p-1 lh-1 rounded-pill" data-bs-toggle="tooltip" data-bs-title="Provide essential insights and data analysis to help you track the performance.">
                                                                    <i class="ri-information-2-line"></i>
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    Priority email support
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto">
                                                                    24/7 chat support
                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    All Standard features
                                                                </span>
                                                                <span class="text-muted fs-12 fw-medium">250 Days</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex align-items-center">
                                                                <span class="avatar avatar-xs svg-success">
                                                                <i class="ti ti-circle-arrow-right-filled text-primary fs-18"></i>
                                                                </span>
                                                                <span class="ms-2 my-auto flex-fill">
                                                                    Team collaboration tools
                                                                </span>
                                                                <span class="text-muted fs-12 fw-medium">320 Days</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-footer p-4">
                                                    <button type="button" class="btn btn-lg btn-primary d-grid w-100 btn-wave">
                                                        <span class="ms-4 me-4">Get Started!</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End:: Section-7 -->

                <!-- Start:: Section-8 -->
                <section class="section" id="faqs">
                    <div class="container text-center">
                        <p class="fs-12 fw-medium text-success mb-1"><span
                                class="landing-section-heading text-primary">F.A.Q 's</span>
                        </p>
                        <h4 class="fw-semibold mt-3 mb-2">Frequently asked questions ?</h4>
                        <div class="row justify-content-center">
                            <div class="col-xl-7">
                                <p class="text-muted fs-14 mb-5 fw-normal">We have shared some of the most frequently asked
                                    questions to help you out.</p>
                            </div>
                        </div>
                        <div class="row text-start">
                            <div class="col-xl-12">
                                <div class="row gy-2">
                                    <div class="col-xl-6">
                                        <div class="accordion accordion-customicon1 accordion-primary accordions-items-seperate"
                                            id="accordionFAQ1">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingcustomicon1One">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapsecustomicon1One" aria-expanded="true"
                                                        aria-controls="collapsecustomicon1One">
                                                        Where can I subscribe to your newsletter?
                                                    </button>
                                                </h2>
                                                <div id="collapsecustomicon1One" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingcustomicon1One" data-bs-parent="#accordionFAQ1">
                                                    <div class="accordion-body">
                                                        <strong>This is the first item's accordion body.</strong> It is
                                                        shown by
                                                        default, until the collapse plugin adds the appropriate classes that
                                                        we
                                                        use to style each element. These classes control the overall
                                                        appearance,
                                                        as well as the showing and hiding via CSS transitions. You can
                                                        modify
                                                        any of this with custom CSS or overriding our default variables.
                                                        It's
                                                        also worth noting that just about any HTML can go within the
                                                        <code>.accordion-body</code>, though the transition does limit
                                                        overflow.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingcustomicon1Two">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapsecustomicon1Two"
                                                        aria-expanded="false" aria-controls="collapsecustomicon1Two">
                                                        Where can in edit my address?
                                                    </button>
                                                </h2>
                                                <div id="collapsecustomicon1Two" class="accordion-collapse collapse"
                                                    aria-labelledby="headingcustomicon1Two" data-bs-parent="#accordionFAQ1">
                                                    <div class="accordion-body">
                                                        <strong>This is the first item's accordion body.</strong> It is
                                                        shown by
                                                        default, until the collapse plugin adds the appropriate classes that
                                                        we
                                                        use to style each element. These classes control the overall
                                                        appearance,
                                                        as well as the showing and hiding via CSS transitions. You can
                                                        modify
                                                        any of this with custom CSS or overriding our default variables.
                                                        It's
                                                        also worth noting that just about any HTML can go within the
                                                        <code>.accordion-body</code>, though the transition does limit
                                                        overflow.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingcustomicon1Three">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapsecustomicon1Three"
                                                        aria-expanded="false" aria-controls="collapsecustomicon1Three">
                                                        What are your opening hours?
                                                    </button>
                                                </h2>
                                                <div id="collapsecustomicon1Three" class="accordion-collapse collapse"
                                                    aria-labelledby="headingcustomicon1Three"
                                                    data-bs-parent="#accordionFAQ1">
                                                    <div class="accordion-body">
                                                        <strong>This is the first item's accordion body.</strong> It is
                                                        shown by
                                                        default, until the collapse plugin adds the appropriate classes that
                                                        we
                                                        use to style each element. These classes control the overall
                                                        appearance,
                                                        as well as the showing and hiding via CSS transitions. You can
                                                        modify
                                                        any of this with custom CSS or overriding our default variables.
                                                        It's
                                                        also worth noting that just about any HTML can go within the
                                                        <code>.accordion-body</code>, though the transition does limit
                                                        overflow.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingcustomicon1Four">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapsecustomicon1Four"
                                                        aria-expanded="false" aria-controls="collapsecustomicon1Four">
                                                        Do I have the right to return an item?
                                                    </button>
                                                </h2>
                                                <div id="collapsecustomicon1Four" class="accordion-collapse collapse"
                                                    aria-labelledby="headingcustomicon1Four"
                                                    data-bs-parent="#accordionFAQ1">
                                                    <div class="accordion-body">
                                                        <strong>This is the first item's accordion body.</strong> It is
                                                        shown by
                                                        default, until the collapse plugin adds the appropriate classes that
                                                        we
                                                        use to style each element. These classes control the overall
                                                        appearance,
                                                        as well as the showing and hiding via CSS transitions. You can
                                                        modify
                                                        any of this with custom CSS or overriding our default variables.
                                                        It's
                                                        also worth noting that just about any HTML can go within the
                                                        <code>.accordion-body</code>, though the transition does limit
                                                        overflow.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingcustomicon1Five">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapsecustomicon1Five"
                                                        aria-expanded="false" aria-controls="collapsecustomicon1Five">
                                                        General Terms & Conditions (GTC)
                                                    </button>
                                                </h2>
                                                <div id="collapsecustomicon1Five" class="accordion-collapse collapse"
                                                    aria-labelledby="headingcustomicon1Five"
                                                    data-bs-parent="#accordionFAQ1">
                                                    <div class="accordion-body">
                                                        <strong>This is the first item's accordion body.</strong> It is
                                                        shown by
                                                        default, until the collapse plugin adds the appropriate classes that
                                                        we
                                                        use to style each element. These classes control the overall
                                                        appearance,
                                                        as well as the showing and hiding via CSS transitions. You can
                                                        modify
                                                        any of this with custom CSS or overriding our default variables.
                                                        It's
                                                        also worth noting that just about any HTML can go within the
                                                        <code>.accordion-body</code>, though the transition does limit
                                                        overflow.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingcustomicon1Six">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapsecustomicon1Six"
                                                        aria-expanded="false" aria-controls="collapsecustomicon1Six">
                                                        Do I need to create an account to make an order?
                                                    </button>
                                                </h2>
                                                <div id="collapsecustomicon1Six" class="accordion-collapse collapse"
                                                    aria-labelledby="headingcustomicon1Six" data-bs-parent="#accordionFAQ1">
                                                    <div class="accordion-body">
                                                        <strong>This is the first item's accordion body.</strong> It is
                                                        shown by
                                                        default, until the collapse plugin adds the appropriate classes that
                                                        we
                                                        use to style each element. These classes control the overall
                                                        appearance,
                                                        as well as the showing and hiding via CSS transitions. You can
                                                        modify
                                                        any of this with custom CSS or overriding our default variables.
                                                        It's
                                                        also worth noting that just about any HTML can go within the
                                                        <code>.accordion-body</code>, though the transition does limit
                                                        overflow.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="accordion accordion-customicon1 accordion-primary accordions-items-seperate"
                                            id="accordionFAQ2">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingcustomicon2Five">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapsecustomicon2Five"
                                                        aria-expanded="false" aria-controls="collapsecustomicon2Five">
                                                        General Terms & Conditions (GTC)
                                                    </button>
                                                </h2>
                                                <div id="collapsecustomicon2Five" class="accordion-collapse collapse"
                                                    aria-labelledby="headingcustomicon2Five"
                                                    data-bs-parent="#accordionFAQ2">
                                                    <div class="accordion-body">
                                                        <strong>This is the first item's accordion body.</strong> It is
                                                        shown by
                                                        default, until the collapse plugin adds the appropriate classes that
                                                        we
                                                        use to style each element. These classes control the overall
                                                        appearance,
                                                        as well as the showing and hiding via CSS transitions. You can
                                                        modify
                                                        any of this with custom CSS or overriding our default variables.
                                                        It's
                                                        also worth noting that just about any HTML can go within the
                                                        <code>.accordion-body</code>, though the transition does limit
                                                        overflow.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingcustomicon2Six">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapsecustomicon2Six"
                                                        aria-expanded="false" aria-controls="collapsecustomicon2Six">
                                                        Do I need to create an account to make an order?
                                                    </button>
                                                </h2>
                                                <div id="collapsecustomicon2Six" class="accordion-collapse collapse"
                                                    aria-labelledby="headingcustomicon2Six" data-bs-parent="#accordionFAQ2">
                                                    <div class="accordion-body">
                                                        <strong>This is the first item's accordion body.</strong> It is
                                                        shown by
                                                        default, until the collapse plugin adds the appropriate classes that
                                                        we
                                                        use to style each element. These classes control the overall
                                                        appearance,
                                                        as well as the showing and hiding via CSS transitions. You can
                                                        modify
                                                        any of this with custom CSS or overriding our default variables.
                                                        It's
                                                        also worth noting that just about any HTML can go within the
                                                        <code>.accordion-body</code>, though the transition does limit
                                                        overflow.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingcustomicon2One">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapsecustomicon2One"
                                                        aria-expanded="true" aria-controls="collapsecustomicon2One">
                                                        Where can I subscribe to your newsletter?
                                                    </button>
                                                </h2>
                                                <div id="collapsecustomicon2One" class="accordion-collapse collapse "
                                                    aria-labelledby="headingcustomicon2One" data-bs-parent="#accordionFAQ2">
                                                    <div class="accordion-body">
                                                        <strong>This is the first item's accordion body.</strong> It is
                                                        shown by
                                                        default, until the collapse plugin adds the appropriate classes that
                                                        we
                                                        use to style each element. These classes control the overall
                                                        appearance,
                                                        as well as the showing and hiding via CSS transitions. You can
                                                        modify
                                                        any of this with custom CSS or overriding our default variables.
                                                        It's
                                                        also worth noting that just about any HTML can go within the
                                                        <code>.accordion-body</code>, though the transition does limit
                                                        overflow.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingcustomicon2Two">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapsecustomicon2Two"
                                                        aria-expanded="false" aria-controls="collapsecustomicon2Two">
                                                        Where can in edit my address?
                                                    </button>
                                                </h2>
                                                <div id="collapsecustomicon2Two" class="accordion-collapse collapse"
                                                    aria-labelledby="headingcustomicon2Two" data-bs-parent="#accordionFAQ2">
                                                    <div class="accordion-body">
                                                        <strong>This is the first item's accordion body.</strong> It is
                                                        shown by
                                                        default, until the collapse plugin adds the appropriate classes that
                                                        we
                                                        use to style each element. These classes control the overall
                                                        appearance,
                                                        as well as the showing and hiding via CSS transitions. You can
                                                        modify
                                                        any of this with custom CSS or overriding our default variables.
                                                        It's
                                                        also worth noting that just about any HTML can go within the
                                                        <code>.accordion-body</code>, though the transition does limit
                                                        overflow.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingcustomicon2Three">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapsecustomicon2Three"
                                                        aria-expanded="false" aria-controls="collapsecustomicon2Three">
                                                        What are your opening hours?
                                                    </button>
                                                </h2>
                                                <div id="collapsecustomicon2Three" class="accordion-collapse collapse"
                                                    aria-labelledby="headingcustomicon2Three"
                                                    data-bs-parent="#accordionFAQ2">
                                                    <div class="accordion-body">
                                                        <strong>This is the first item's accordion body.</strong> It is
                                                        shown by
                                                        default, until the collapse plugin adds the appropriate classes that
                                                        we
                                                        use to style each element. These classes control the overall
                                                        appearance,
                                                        as well as the showing and hiding via CSS transitions. You can
                                                        modify
                                                        any of this with custom CSS or overriding our default variables.
                                                        It's
                                                        also worth noting that just about any HTML can go within the
                                                        <code>.accordion-body</code>, though the transition does limit
                                                        overflow.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingcustomicon2Four">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapsecustomicon2Four" aria-expanded="false"
                                                        aria-controls="collapsecustomicon2Four">
                                                        Do I have the right to return an item?
                                                    </button>
                                                </h2>
                                                <div id="collapsecustomicon2Four" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingcustomicon2Four"
                                                    data-bs-parent="#accordionFAQ2">
                                                    <div class="accordion-body">
                                                        <strong>This is the first item's accordion body.</strong> It is
                                                        shown by
                                                        default, until the collapse plugin adds the appropriate classes that
                                                        we
                                                        use to style each element. These classes control the overall
                                                        appearance,
                                                        as well as the showing and hiding via CSS transitions. You can
                                                        modify
                                                        any of this with custom CSS or overriding our default variables.
                                                        It's
                                                        also worth noting that just about any HTML can go within the
                                                        <code>.accordion-body</code>, though the transition does limit
                                                        overflow.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End:: Section-8 -->

                <!-- Start:: Section-9 -->
                <section class="section landing-Features py-4" id="testimonials">
                    <div class="container reviews-container">
                        <div class="row justify-content-center pb-3">
                            <div class="col-xl-10">
                                <div class="text-center mb-0 mt-4 heading-section">
                                    <p class="fs-12 fw-medium text-success mb-1"><span
                                        class="landing-section-heading landing-section-heading-dark text-fixed-white">TESTIMONALS</span>
                                </p>
                                    <h4 class="mt-3 text-fixed-white mb-1">Discover What People Are Saying About Us</h4>
                                    <div class="fs-14 text-fixed-white mb-4 op-8"> Customer reviews, social media and testimonials to discover how is our products or services.</div>
                                </div>
                            </div>
                            <div class="col-xl-10">
                                <div class="swiper pagination-dynamic testimonialSwiperService">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="">
                                                        <span class=""><sup><i class="bi bi-quote fs-1 me-1 text-fixed-white"></i></sup> Customer service at this company is
                                                            outstanding. They were quick to respond to my inquiry and
                                                            resolved my issue within hours. -- 
                                                            <a href="javascript:void(0);" class="fw-semibold fs-11 text-fixed-white" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="top" data-bs-title="customer service at this company is outstanding. They were quick to respond to my inquiry and resolved my issue within hours.">Read
                                                                More
                                                            </a>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex align-items-center text-end  justify-content-end">
                                                        <div class="text-warning d-block me-1 fs-10">
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-half-line"></i>
                                                        </div>
                                                        <span>4.3</span>
                                                    </div>
                                                </div>
                                                <div class="p-3 bg-white-transparent">
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar rounded-circle me-2">
                                                            <img src="{{asset('build/assets/images/faces/8.jpg')}}" alt="" class="img-fluid rounded-circle border border-primary1 shadow-sm border-2">
                                                        </span>
                                                        <div>
                                                            <p class="mb-0 fw-semibold text-fixed-white">Elsa Teresa</p>
                                                            <p class="mb-0 fs-11 fw-normal op-8 text-fixed-white">elsateresa@gmail.com</p>
                                                        </div>
                                                        <div class="ms-auto fs-12 fw-semibold op-8 text-end">
                                                            <div class="btn btn-sm btn-icon rounded-circle btn-white"><i class="ri-twitter-x-line"></i></div>
                                                            <div class="btn btn-sm btn-icon rounded-circle btn-primary1"><i class="ri-share-line"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="">
                                                        <span class=""><sup><i class="bi bi-quote fs-1 me-1 text-fixed-white"></i></sup> Customer service at this company is
                                                            outstanding. They were quick to respond to my inquiry and
                                                            resolved my issue within hours. -- 
                                                            <a href="javascript:void(0);" class="fw-semibold fs-11 text-fixed-white" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="top" data-bs-title="customer service at this company is outstanding. They were quick to respond to my inquiry and resolved my issue within hours.">Read
                                                                More
                                                            </a>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex align-items-center text-end  justify-content-end">
                                                        <div class="text-warning d-block me-1 fs-10">
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-half-line"></i>
                                                        </div>
                                                        <span>4.3</span>
                                                    </div>
                                                </div>
                                                <div class="p-3 bg-white-transparent">
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar rounded-circle me-2">
                                                            <img src="{{asset('build/assets/images/faces/9.jpg')}}" alt="" class="img-fluid rounded-circle border border-primary1 shadow-sm border-2">
                                                        </span>
                                                        <div>
                                                            <p class="mb-0 fw-semibold text-fixed-white">Henry Milo</p>
                                                            <p class="mb-0 fs-11 fw-normal op-8 text-fixed-white">henrymilo@gmail.com</p>
                                                        </div>
                                                        <div class="ms-auto fs-12 fw-semibold op-8 text-end">
                                                            <div class="btn btn-sm btn-icon rounded-circle btn-white"><i class="ri-twitter-x-line"></i></div>
                                                            <div class="btn btn-sm btn-icon rounded-circle btn-primary1"><i class="ri-share-line"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="">
                                                        <span class=""><sup><i class="bi bi-quote fs-1 me-1 text-fixed-white"></i></sup> Customer service at this company is
                                                            outstanding. They were quick to respond to my inquiry and
                                                            resolved my issue within hours. -- 
                                                            <a href="javascript:void(0);" class="fw-semibold fs-11 text-fixed-white" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="top" data-bs-title="customer service at this company is outstanding. They were quick to respond to my inquiry and resolved my issue within hours.">Read
                                                                More
                                                            </a>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex align-items-center text-end  justify-content-end">
                                                        <div class="text-warning d-block me-1 fs-10">
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-half-line"></i>
                                                        </div>
                                                        <span>4.3</span>
                                                    </div>
                                                </div>
                                                <div class="p-3 bg-white-transparent">
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar rounded-circle me-2">
                                                            <img src="{{asset('build/assets/images/faces/6.jpg')}}" alt="" class="img-fluid rounded-circle border border-primary1 shadow-sm border-2">
                                                        </span>
                                                        <div>
                                                            <p class="mb-0 fw-semibold text-fixed-white">Katherin Oslo</p>
                                                            <p class="mb-0 fs-11 fw-normal op-8 text-fixed-white">katherin212@gmail.com</p>
                                                        </div>
                                                        <div class="ms-auto fs-12 fw-semibold op-8 text-end">
                                                            <div class="btn btn-sm btn-icon rounded-circle btn-white"><i class="ri-twitter-x-line"></i></div>
                                                            <div class="btn btn-sm btn-icon rounded-circle btn-primary1"><i class="ri-share-line"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="">
                                                        <span class=""><sup><i class="bi bi-quote fs-1 me-1 text-fixed-white"></i></sup> Customer service at this company is
                                                            outstanding. They were quick to respond to my inquiry and
                                                            resolved my issue within hours. -- 
                                                            <a href="javascript:void(0);" class="fw-semibold fs-11 text-fixed-white" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="top" data-bs-title="customer service at this company is outstanding. They were quick to respond to my inquiry and resolved my issue within hours.">Read
                                                                More
                                                            </a>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex align-items-center text-end  justify-content-end">
                                                        <div class="text-warning d-block me-1 fs-10">
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-half-line"></i>
                                                        </div>
                                                        <span>4.3</span>
                                                    </div>
                                                </div>
                                                <div class="p-3 bg-white-transparent">
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar rounded-circle me-2">
                                                            <img src="{{asset('build/assets/images/faces/14.jpg')}}" alt="" class="img-fluid rounded-circle border border-primary1 shadow-sm border-2">
                                                        </span>
                                                        <div>
                                                            <p class="mb-0 fw-semibold text-fixed-white">Jestin Calm</p>
                                                            <p class="mb-0 fs-11 fw-normal op-8 text-fixed-white">jestincalm1999@gmail.com</p>
                                                        </div>
                                                        <div class="ms-auto fs-12 fw-semibold op-8 text-end">
                                                            <div class="btn btn-sm btn-icon rounded-circle btn-white"><i class="ri-twitter-x-line"></i></div>
                                                            <div class="btn btn-sm btn-icon rounded-circle btn-primary1"><i class="ri-share-line"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="">
                                                        <span class=""><sup><i class="bi bi-quote fs-1 me-1 text-fixed-white"></i></sup> Customer service at this company is
                                                            outstanding. They were quick to respond to my inquiry and
                                                            resolved my issue within hours. -- 
                                                            <a href="javascript:void(0);" class="fw-semibold fs-11 text-fixed-white" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="top" data-bs-title="customer service at this company is outstanding. They were quick to respond to my inquiry and resolved my issue within hours.">Read
                                                                More
                                                            </a>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex align-items-center text-end  justify-content-end">
                                                        <div class="text-warning d-block me-1 fs-10">
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-half-line"></i>
                                                        </div>
                                                        <span>4.3</span>
                                                    </div>
                                                </div>
                                                <div class="p-3 bg-white-transparent">
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar rounded-circle me-2">
                                                            <img src="{{asset('build/assets/images/faces/13.jpg')}}" alt="" class="img-fluid rounded-circle border border-primary1 shadow-sm border-2">
                                                        </span>
                                                        <div>
                                                            <p class="mb-0 fw-semibold text-fixed-white">Harin ford</p>
                                                            <p class="mb-0 fs-11 fw-normal op-8 text-fixed-white">harinford345@gmail.com</p>
                                                        </div>
                                                        <div class="ms-auto fs-12 fw-semibold op-8 text-end">
                                                            <div class="btn btn-sm btn-icon rounded-circle btn-white"><i class="ri-twitter-x-line"></i></div>
                                                            <div class="btn btn-sm btn-icon rounded-circle btn-primary1"><i class="ri-share-line"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="">
                                                        <span class=""><sup><i class="bi bi-quote fs-1 me-1 text-fixed-white"></i></sup> Customer service at this company is
                                                            outstanding. They were quick to respond to my inquiry and
                                                            resolved my issue within hours. -- 
                                                            <a href="javascript:void(0);" class="fw-semibold fs-11 text-fixed-white" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="top" data-bs-title="customer service at this company is outstanding. They were quick to respond to my inquiry and resolved my issue within hours.">Read
                                                                More
                                                            </a>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex align-items-center text-end  justify-content-end">
                                                        <div class="text-warning d-block me-1 fs-10">
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-half-line"></i>
                                                        </div>
                                                        <span>4.3</span>
                                                    </div>
                                                </div>
                                                <div class="p-3 bg-white-transparent">
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar rounded-circle me-2">
                                                            <img src="{{asset('build/assets/images/faces/11.jpg')}}" alt="" class="img-fluid rounded-circle border border-primary1 shadow-sm border-2">
                                                        </span>
                                                        <div>
                                                            <p class="mb-0 fw-semibold text-fixed-white">Phillip John</p>
                                                            <p class="mb-0 fs-11 fw-normal op-8 text-fixed-white">phillipjohn21@gmail.com</p>
                                                        </div>
                                                        <div class="ms-auto fs-12 fw-semibold op-8 text-end">
                                                            <div class="btn btn-sm btn-icon rounded-circle btn-white"><i class="ri-twitter-x-line"></i></div>
                                                            <div class="btn btn-sm btn-icon rounded-circle btn-primary1"><i class="ri-share-line"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End:: Section-9 -->

                <!-- Start:: Section-10 -->
                <section class="section" id="contact">
                    <div class="container text-center">
                        <p class="fs-12 fw-medium text-success mb-1"><span
                                class="landing-section-heading text-primary">CONTACT US</span>
                        </p>
                        <h4 class="fw-semibold mt-3 mb-2">Need Help? Find Your Answers Here!</h4>
                        <div class="row justify-content-center">
                            <div class="col-xl-9">
                                <p class="text-muted fs-14 mb-5 fw-normal"> Explore Our Comprehensive Support Resources! Get answers to your queries and find solutions.</p>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="card custom-card contactus-form contactus-form-left overflow-hidden">
                                <div class="card-body text-start px-xl-5 px-4 py-5">
                                    <div class="row pt-0">
                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <i class="ri-map-pin-fill me-2 text-primary"></i> D.No: 1352/A-12, Street, Hyderabad.
                                                </div>
                                                <div class="mb-3">
                                                    <i class="ri-phone-fill text-primary"></i> +122 1234 32422
                                                </div>
                                                <div class="mb-4">
                                                    <i class="ri-mail-fill text-primary"></i> carolinahanna424@example.com
                                                </div><iframe allowfullscreen class="w-100" height="190" width="375" src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d30444.274596168965!2d78.54114692513858!3d17.48198883339408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d17.4886524!2d78.5495041!4m5!1s0x3bcb9c7ec139a15d%3A0x326d1c90786b2ab6!2sspruko%20technologies!3m2!1d17.474805099999998!2d78.570258!5e0!3m2!1sen!2sin!4v1670225507254!5m2!1sen!2sin" style="border:0;"></iframe>
                                            </div>
                                        <div class="col-xxl-8 col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                            <div class="row gy-3 text-start">
                                                <div class="col-xl-12">
                                                    <label class="form-label" for="contact-address-firstname">First Name :</label> <input class="form-control bg-light" id="contact-address-firstname" placeholder="Enter Name" type="text">
                                                </div>
                                                <div class="col-xl-12">
                                                    <label class="form-label" for="contact-address-email">Email Id :</label> <input class="form-control bg-light" id="contact-address-email" placeholder="Enter Email Id" type="email">
                                                </div>
                                                <div class="col-xl-12">
                                                    <label class="form-label" for="contact-mail-message">Message :</label> 
                                                    <textarea class="form-control bg-light" id="contact-mail-message" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class=" mt-4">
                                                <button class="btn btn-primary btn-wave btn-w-lg waves-effect waves-light">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End:: Section-10 -->

                <!-- Start:: Section-11 -->
                <section class="section landing-footer text-fixed-white">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-12 mb-md-0 mb-3">
                                <div class="px-4">
                                    <p class="fw-medium mb-3"><a href="{{url('index')}}"><img
                                                src="{{asset('build/assets/images/brand-logos/desktop-dark.png')}}" alt="" class="landing-footer-logo"></a></p>
                                    <p class="mb-2 op-6 fw-normal">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit et magnam,
                                        fuga est mollitia eius, quo illum illo inventore optio aut quas omnis rem. Dolores
                                        accusantium aspernatur minus ea incidunt.
                                    </p>
                                    <p class="mb-0 op-6 fw-normal">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                        Autem ea esse ad</p>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6 col-12">
                                <div class="px-4">
                                    <h6 class="fw-medium mb-3 text-fixed-white">PAGES</h6>
                                    <ul class="list-unstyled op-6 fw-normal landing-footer-list">
                                        <li>
                                            <a href="javascript:void(0);" class="text-fixed-white">Email</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="text-fixed-white">Profile</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="text-fixed-white">Timeline</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="text-fixed-white">Projects</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="text-fixed-white">Contacts</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="text-fixed-white">Portfolio</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6 col-12">
                                <div class="px-4">
                                    <h6 class="fw-medium text-fixed-white">INFO</h6>
                                    <ul class="list-unstyled op-6 fw-normal landing-footer-list">
                                        <li>
                                            <a href="javascript:void(0);" class="text-fixed-white">Our Team</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="text-fixed-white">Contact US</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="text-fixed-white">About</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="text-fixed-white">Services</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="text-fixed-white">Blog</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="text-fixed-white">Terms & Conditions</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <div class="px-4">
                                    <h6 class="fw-medium text-fixed-white">CONTACT</h6>
                                    <ul class="list-unstyled fw-normal landing-footer-list">
                                        <li>
                                            <a href="javascript:void(0);" class="text-fixed-white op-6"><i
                                                    class="ri-home-4-line me-1 align-middle"></i> New York, NY 10012, US</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="text-fixed-white op-6"><i
                                                    class="ri-mail-line me-1 align-middle"></i> info@fmail.com</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="text-fixed-white op-6"><i
                                                    class="ri-phone-line me-1 align-middle"></i> +(555)-1920 1831</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="text-fixed-white op-6"><i
                                                    class="ri-printer-line me-1 align-middle"></i> +(123) 1293 123</a>
                                        </li>
                                        <li class="mt-3">
                                            <p class="mb-2 fw-medium op-8">FOLLOW US ON :</p>
                                            <div class="mb-0">
                                                <div class="btn-list">
                                                    <button
                                                        class="btn btn-sm btn-icon btn-primary-light btn-wave waves-effect waves-light">
                                                        <i class="ri-facebook-line fw-bold"></i>
                                                    </button>
                                                    <button
                                                        class="btn btn-sm btn-icon btn-primary1-light btn-wave waves-effect waves-light">
                                                        <i class="ri-twitter-x-line fw-bold"></i>
                                                    </button>
                                                    <button
                                                        class="btn btn-sm btn-icon btn-primary2-light btn-wave waves-effect waves-light">
                                                        <i class="ri-instagram-line fw-bold"></i>
                                                    </button>
                                                    <button
                                                        class="btn btn-sm btn-icon btn-primary3-light btn-wave waves-effect waves-light">
                                                        <i class="ri-github-line fw-bold"></i>
                                                    </button>
                                                    <button
                                                        class="btn btn-sm btn-icon btn-info-light btn-wave waves-effect waves-light">
                                                        <i class="ri-youtube-line fw-bold"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End:: Section-11 -->

                <div class="text-center landing-main-footer py-3">
                    <span class="text-muted fs-15"> Copyright © <span id="year"></span> <a href="javascript:void(0);"
                            class="text-primary fw-medium"><u>Xintra</u></a>.
                        Designed with <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0);"
                            class="text-primary fw-medium"><u>
                                Spruko</u>
                        </a> All
                        rights
                        reserved
                    </span>
                </div>

@endsection

@section('scripts')
	


@endsection

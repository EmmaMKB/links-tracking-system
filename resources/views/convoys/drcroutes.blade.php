<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section('content')
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">

                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Convoys in DRC
                        </h1>

                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">
                                    Routes </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                DRC Routes </li>
                            <!--end::Item-->

                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <a href="#" type="button" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                            data-bs-target="#new_truck_modal">
                            Add a Convoy </a>
                    </div>
                </div>
                <!--end::Toolbar container-->
            </div>
            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div id="kt_app_content_container" class="app-container  container-xxl ">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card card-xl-stretch mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold text-gray-900">Kolwezi to Likasi</span>
                                        <span class="text-muted mt-1 fw-semibold fs-7">10 Convoys</span>
                                    </h3>

                                    <div class="card-toolbar">
                                        <!--begin::Menu-->
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-category fs-6"><span class="path1"></span><span
                                                    class="path2"></span><span class="path3"></span><span
                                                    class="path4"></span></i> </button>


                                        <!--begin::Menu 1-->
                                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                                            id="kt_menu_677fb64e559eb">
                                            <!--begin::Header-->
                                            <div class="px-7 py-5">
                                                <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                            </div>
                                            <!--end::Header-->

                                            <!--begin::Menu separator-->
                                            <div class="separator border-gray-200"></div>
                                            <!--end::Menu separator-->


                                            <!--begin::Form-->
                                            <div class="px-7 py-5">
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-semibold">Status:</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <div>
                                                        <select class="form-select form-select-solid" multiple
                                                            data-kt-select2="true" data-close-on-select="false"
                                                            data-placeholder="Select option"
                                                            data-dropdown-parent="#kt_menu_677fb64e559eb"
                                                            data-allow-clear="true">
                                                            <option></option>
                                                            <option value="1">Approved</option>
                                                            <option value="2">Pending</option>
                                                            <option value="2">In Process</option>
                                                            <option value="2">Rejected</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-semibold">Member Type:</label>
                                                    <!--end::Label-->

                                                    <!--begin::Options-->
                                                    <div class="d-flex">
                                                        <!--begin::Options-->
                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                            <span class="form-check-label">
                                                                Author
                                                            </span>
                                                        </label>
                                                        <!--end::Options-->

                                                        <!--begin::Options-->
                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="2"
                                                                checked="checked" />
                                                            <span class="form-check-label">
                                                                Customer
                                                            </span>
                                                        </label>
                                                        <!--end::Options-->
                                                    </div>
                                                    <!--end::Options-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-semibold">Notifications:</label>
                                                    <!--end::Label-->

                                                    <!--begin::Switch-->
                                                    <div
                                                        class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="notifications" checked />
                                                        <label class="form-check-label">
                                                            Enabled
                                                        </label>
                                                    </div>
                                                    <!--end::Switch-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Actions-->
                                                <div class="d-flex justify-content-end">
                                                    <button type="reset"
                                                        class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                        data-kt-menu-dismiss="true">Reset</button>

                                                    <button type="submit" class="btn btn-sm btn-primary"
                                                        data-kt-menu-dismiss="true">Apply</button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Menu 1--> <!--end::Menu-->
                                    </div>
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body pt-5">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-success">
                                                <i class="ki-duotone ki-abstract-26 fs-2x text-success"><span
                                                        class="path1"></span><span class="path2"></span></i> </span>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Text-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="text-gray-900 text-hover-primary fs-6 fw-bold">Project
                                                Briefing</a>

                                            <span class="text-muted fw-bold">Project Manager</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-warning">
                                                <i class="ki-duotone ki-pencil fs-2x text-warning"><span
                                                        class="path1"></span><span class="path2"></span></i> </span>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Text-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="text-gray-900 text-hover-primary fs-6 fw-bold">Concept
                                                Design</a>

                                            <span class="text-muted fw-bold">Art Director</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-primary">
                                                <i class="ki-duotone ki-message-text-2 fs-2x text-primary"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i> </span>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Text-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="text-gray-900 text-hover-primary fs-6 fw-bold">Functional
                                                Logics</a>

                                            <span class="text-muted fw-bold">Lead Developer</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-danger">
                                                <i class="ki-duotone ki-disconnect fs-2x text-danger"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span><span class="path4"></span><span
                                                        class="path5"></span></i> </span>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Text-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="text-gray-900 text-hover-primary fs-6 fw-bold">Development</a>

                                            <span class="text-muted fw-bold">DevOps</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center ">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-info">
                                                <i class="ki-duotone ki-security-user fs-2x text-info"><span
                                                        class="path1"></span><span class="path2"></span></i> </span>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Text-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="text-gray-900 text-hover-primary fs-6 fw-bold">Testing</a>

                                            <span class="text-muted fw-bold">QA Managers</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->

                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 1-->
                        </div>
                        <div class="col-xl-6">
                            <div class="card card-xl-stretch mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold text-gray-900">Likasi to Lushi</span>
                                        <span class="text-muted mt-1 fw-semibold fs-7">10 Convoys</span>
                                    </h3>

                                    <div class="card-toolbar">
                                        <!--begin::Menu-->
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-category fs-6"><span class="path1"></span><span
                                                    class="path2"></span><span class="path3"></span><span
                                                    class="path4"></span></i> </button>


                                        <!--begin::Menu 1-->
                                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                                            data-kt-menu="true" id="kt_menu_677fb64e559eb">
                                            <!--begin::Header-->
                                            <div class="px-7 py-5">
                                                <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                            </div>
                                            <!--end::Header-->

                                            <!--begin::Menu separator-->
                                            <div class="separator border-gray-200"></div>
                                            <!--end::Menu separator-->


                                            <!--begin::Form-->
                                            <div class="px-7 py-5">
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-semibold">Status:</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <div>
                                                        <select class="form-select form-select-solid" multiple
                                                            data-kt-select2="true" data-close-on-select="false"
                                                            data-placeholder="Select option"
                                                            data-dropdown-parent="#kt_menu_677fb64e559eb"
                                                            data-allow-clear="true">
                                                            <option></option>
                                                            <option value="1">Approved</option>
                                                            <option value="2">Pending</option>
                                                            <option value="2">In Process</option>
                                                            <option value="2">Rejected</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-semibold">Member Type:</label>
                                                    <!--end::Label-->

                                                    <!--begin::Options-->
                                                    <div class="d-flex">
                                                        <!--begin::Options-->
                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                            <span class="form-check-label">
                                                                Author
                                                            </span>
                                                        </label>
                                                        <!--end::Options-->

                                                        <!--begin::Options-->
                                                        <label
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="2" checked="checked" />
                                                            <span class="form-check-label">
                                                                Customer
                                                            </span>
                                                        </label>
                                                        <!--end::Options-->
                                                    </div>
                                                    <!--end::Options-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-semibold">Notifications:</label>
                                                    <!--end::Label-->

                                                    <!--begin::Switch-->
                                                    <div
                                                        class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="notifications" checked />
                                                        <label class="form-check-label">
                                                            Enabled
                                                        </label>
                                                    </div>
                                                    <!--end::Switch-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Actions-->
                                                <div class="d-flex justify-content-end">
                                                    <button type="reset"
                                                        class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                        data-kt-menu-dismiss="true">Reset</button>

                                                    <button type="submit" class="btn btn-sm btn-primary"
                                                        data-kt-menu-dismiss="true">Apply</button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Menu 1--> <!--end::Menu-->
                                    </div>
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body pt-5">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-success">
                                                <i class="ki-duotone ki-abstract-26 fs-2x text-success"><span
                                                        class="path1"></span><span class="path2"></span></i> </span>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Text-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="text-gray-900 text-hover-primary fs-6 fw-bold">Project
                                                Briefing</a>

                                            <span class="text-muted fw-bold">Project Manager</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-warning">
                                                <i class="ki-duotone ki-pencil fs-2x text-warning"><span
                                                        class="path1"></span><span class="path2"></span></i> </span>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Text-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="text-gray-900 text-hover-primary fs-6 fw-bold">Concept
                                                Design</a>

                                            <span class="text-muted fw-bold">Art Director</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-primary">
                                                <i class="ki-duotone ki-message-text-2 fs-2x text-primary"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i> </span>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Text-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="text-gray-900 text-hover-primary fs-6 fw-bold">Functional
                                                Logics</a>

                                            <span class="text-muted fw-bold">Lead Developer</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-danger">
                                                <i class="ki-duotone ki-disconnect fs-2x text-danger"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span><span class="path4"></span><span
                                                        class="path5"></span></i> </span>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Text-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="text-gray-900 text-hover-primary fs-6 fw-bold">Development</a>

                                            <span class="text-muted fw-bold">DevOps</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center ">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-info">
                                                <i class="ki-duotone ki-security-user fs-2x text-info"><span
                                                        class="path1"></span><span class="path2"></span></i> </span>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Text-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="text-gray-900 text-hover-primary fs-6 fw-bold">Testing</a>

                                            <span class="text-muted fw-bold">QA Managers</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->

                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 1-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="new_truck_modal" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_create_api_key_header">
                        <!--begin::Modal title-->
                        <h2>Add new truck</h2>
                        <!--end::Modal title-->

                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <i class="fa fa-times"></i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->

                    <!--begin::Form-->
                    <form id="kt_modal_create_api_key_form" class="form" action="{{ route('add_truck') }}"
                        method="post">
                        @csrf
                        <!--begin::Modal body-->
                        <div class="modal-body py-10 px-lg-17">
                            <!--begin::Scroll-->
                            <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_modal_create_api_key_header"
                                data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px">

                                <div class="input-group row">
                                    <div class="col-xs-3 mb-5 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">HORSE</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Ex: BCF20..." name="horse" />
                                    </div>
                                    <div class="col-xs-3 mb-5 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">Trailer</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Ex: BCF20..." name="trailer" />
                                    </div>
                                </div>

                                <div class="d-flex flex-column mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">CLIENT</label>
                                    <!--end::Label-->

                                    <!--begin::Select-->
                                    <select name="client_id" data-control="select2" data-hide-search="true"
                                        data-placeholder="Client" class="form-select form-select-solid">
                                        <option value="">Select a Category...</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->client }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Select-->
                                </div>
                                <div class="input-group row">
                                    <div class="col-xs-3 mb-5 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">Transporter</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Transporter" name="transporter" />
                                    </div>
                                    <div class="col-xs-3 mb-5 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">Dispatch Date</label>
                                        <input type="date" class="form-control form-control-solid"
                                            name="dispatch_date" />
                                    </div>
                                </div>

                                <div class="d-flex flex-column mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Mine</label>
                                    <!--end::Label-->

                                    <!--begin::Select-->
                                    <select name="mine_id" data-control="select2" data-hide-search="false"
                                        data-placeholder="Mine" class="form-select form-select-solid">
                                        <option value="">Select a Mine...</option>
                                        @foreach ($mines as $m)
                                            <option value="{{ $m->id }}">{{ $m->mine }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Select-->
                                </div>
                                <!--end::Input group-->
                                <div class="d-flex flex-column mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Location</label>
                                    <!--end::Label-->

                                    <!--begin::Select-->
                                    <select name="location_id" id="location_input" data-control="select2" data-hide-search="false"
                                        data-placeholder="Location" class="form-select form-select-solid">
                                        <option value="">Select a Location...</option>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->location }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Select-->
                                </div>
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Heading-->
                                    <div class="mb-3">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-5 fw-semibold">
                                            <span class="required">Status</span>


                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                title="Your billing numbers will be calculated based on your API method">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i></span> </label>
                                        <!--end::Label-->


                                    </div>
                                    <!--end::Heading-->

                                    <!--begin::Row-->
                                    <div class="fv-row">
                                        <!--begin::Radio group-->
                                        <div class="btn-group w-100" data-kt-buttons="true"
                                            data-kt-buttons-target="[data-kt-button]">
                                            <!--begin::Radio-->
                                            <label class="btn btn-outline btn-active-success btn-color-muted"
                                                data-kt-button="true">
                                                <!--begin::Input-->
                                                <input class="btn-check" type="radio" name="status" value="Moving" />
                                                <!--end::Input-->
                                                Moving
                                            </label>
                                            <!--end::Radio-->

                                            <!--begin::Radio-->
                                            <label class="btn btn-outline btn-active-success btn-color-muted active"
                                                data-kt-button="true">
                                                <!--begin::Input-->
                                                <input class="btn-check" type="radio" name="status" checked="checked"
                                                    value="Parked" />
                                                <!--end::Input-->
                                                Parked
                                            </label>
                                            <!--end::Radio-->

                                            <!--begin::Radio-->
                                            <label class="btn btn-outline btn-active-success btn-color-muted"
                                                data-kt-button="true">
                                                <!--begin::Input-->
                                                <input class="btn-check" type="radio" name="status"
                                                    value="BreakDown" />
                                                <!--end::Input-->
                                                Breakdown
                                            </label>
                                            <!--end::Radio-->

                                            <!--begin::Radio-->
                                            <label class="btn btn-outline btn-active-success btn-color-muted"
                                                data-kt-button="true">
                                                <!--begin::Input-->
                                                <input class="btn-check" type="radio" name="status" value="Queued" />
                                                <!--end::Input-->
                                                Queued
                                            </label>
                                            <!--end::Radio-->
                                            <label class="btn btn-outline btn-active-success btn-color-muted"
                                                data-kt-button="true">
                                                <!--begin::Input-->
                                                <input class="btn-check" type="radio" name="status"
                                                    value="Questionned" />
                                                <!--end::Input-->
                                                Questionned
                                            </label>
                                        </div>
                                        <!--end::Radio group-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Scroll-->
                        </div>
                        <!--end::Modal body-->

                        <!--begin::Modal footer-->
                        <div class="modal-footer flex-center">
                            <!--begin::Button-->
                            <button type="reset" id="kt_modal_create_api_key_cancel" class="btn btn-light me-3">
                                Discard
                            </button>
                            <!--end::Button-->

                            <!--begin::Button-->
                            <button type="submit" id="kt_modal_create_api_key_submit" class="btn btn-primary">
                                <span class="indicator-label">
                                    Submit
                                </span>
                                <span class="indicator-progress">
                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                            <!--end::Button-->
                        </div>
                        <!--end::Modal footer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
    @endsection
    @section('assets')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
    @section('scripts')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script>
            $(document).ready(function() {
                $('#location_input').select2();
            });
        </script>
    @endsection
</x-app-layout>

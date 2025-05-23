<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section('content')
        <div class="d-flex flex-column flex-column-fluid">

            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">



                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Links Tracking System
                        </h1>
                        <!--end::Title-->


                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted text-hover-primary">
                                    Home </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                Dashboards </li>
                            <!--end::Item-->

                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center gap-2 gap-lg-3">


                        <!--begin::Secondary button-->
                        <a href="#" class="btn btn-sm fw-bold btn-secondary">
                            All trucks </a>
                        <!--end::Secondary button-->

                        <!--begin::Primary button-->
                        <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                            data-bs-target="#new_truck_modal">
                            Add a truck </a>
                        <!--end::Primary button-->
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->

            <!--begin::Content-->
            <div id="kt_app_content" class="app-content  flex-column-fluid ">


                <!--begin::Content container-->
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
                    <div class="row g-5 g-xl-8">
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <i class="fa fa-truck text-primary fs-2x ms-n1"></i>
                                    <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">
                                        {{ $transit }}
                                    </div>
                                    <div class="fw-semibold text-gray-400">
                                        Trucks in transit </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <i class="fa fa-map-signs text-gray-100 fs-2x ms-n1"></i>

                                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">
                                        {{ $convoys }}
                                    </div>

                                    <div class="fw-semibold text-gray-100">
                                        Convoys in the day </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                        <div class="col-xl-4">

                            <!--begin::Statistics Widget 5-->
                            <a href="#" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <i class="fa fa-gear text-white fs-2x ms-n1"><span class="path1"></span><span
                                            class="path2"></span></i>

                                    <div class="text-white fw-bold fs-2 mb-2 mt-5">
                                        {{ $breakdowns }}
                                    </div>

                                    <div class="fw-semibold text-white">
                                        trucks on breakdown </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                    </div>
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">DRC Routes</span>

                                <span class="text-muted mt-1 fw-semibold fs-7">{{ $transit }} trucks in transit</span>
                            </h3>
                            <div class="card-toolbar">
                                <!--begin::Menu-->
                                <button type="button"
                                    class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="ki-duotone ki-category fs-6"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span></i> </button>

                                <!--begin::Menu 2-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator mb-3 opacity-75"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Ticket
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Customer
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                        data-kt-menu-placement="right-start">
                                        <!--begin::Menu item-->
                                        <a href="#" class="menu-link px-3">
                                            <span class="menu-title">New Group</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <!--end::Menu item-->

                                        <!--begin::Menu sub-->
                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    Admin Group
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    Staff Group
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">
                                                    Member Group
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Contact
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator mt-3 opacity-75"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content px-3 py-3">
                                            <a class="btn btn-primary  btn-sm px-4" href="#">
                                                Generate Reports
                                            </a>
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu 2-->
                                <!--end::Menu-->
                            </div>
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fw-bold text-muted">
                                            <th class="min-w-150px">Horse</th>
                                            <th class="min-w-150px">Mine</th>
                                            <th class="min-w-140px">Client</th>
                                            <th class="min-w-120px">Transporter</th>
                                            <th class="min-w-120px">Location</th>
                                            <th class="min-w-120px">Dispatch Date</th>
                                            <th class="min-w-120px">Status</th>
                                            <th class="min-w-100px text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->

                                    <!--begin::Table body-->
                                    <tbody>
                                        @foreach ($trucks as $truck)
                                            <tr>
                                                <td>
                                                    <p class="text-blue-900 fw-bold fs-6">{{ $truck->horse }}</p>
                                                </td>

                                                <td>
                                                    <p class="text-gray-900">{{ $truck->mine->mine }}</p>
                                                </td>

                                                <td>
                                                    <p class="text-gray-900">{{ $truck->client->client }}</p>
                                                </td>

                                                <td>
                                                    <p class="text-gray-900">{{ $truck->transporter }}</p>
                                                </td>

                                                <td>
                                                    <p href="#"
                                                        class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6">
                                                        {{ $truck->location->location }}</p>
                                                    <span
                                                        class="text-muted fw-semibold text-muted d-block fs-7">{{ $truck->location->section->section }}</span>
                                                </td>

                                                <td>
                                                    <p>{{ $truck->dispatch_date }}</p>
                                                </td>

                                                <td>
                                                    <span class="badge badge-light-success">{{ $truck->status }}</span>
                                                </td>

                                                <td class="text-end">
                                                    <a href="#"
                                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                        <i class="fa fa-edit"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--begin::Body-->
                    </div>
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->

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

                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    <div class="col">
                                        <label class="required fs-5 fw-semibold mb-2">HORSE</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Ex: BCF20..." name="horse" />
                                    </div>
                                    <div class="col">
                                        <label class="required fs-5 fw-semibold mb-2">Trailer</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Ex: BCF20..." name="trailer" />
                                    </div>
                                </div>
                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    <div class="col">
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
                                    </div>
                                    <div class="col">
                                        <label class="required fs-5 fw-semibold mb-2">Transporter</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Transporter" name="transporter" />
                                    </div>
                                </div>

                                <div class="input-group row">

                                    <div class="col-xs-3 mb-5 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">Dispatch Date</label>
                                        <input type="date" class="form-control form-control-solid"
                                            name="dispatch_date" />
                                    </div>
                                </div>

                                <div class="d-flex flex-column mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Mines</label>
                                    <!--end::Label-->

                                    <!--begin::Select-->
                                    <select name="mine_id" data-control="select2" data-hide-search="false"
                                        data-placeholder="Mine" class="form-select form-select-solid">
                                        <option value="">Select a Mine...</option>
                                        @foreach ($mines as $mine)
                                            <option value="{{ $mine->id }}">{{ $mine->mine }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Select-->
                                </div>

                                <div class="d-flex flex-column mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Location</label>
                                    <!--end::Label-->

                                    <!--begin::Select-->
                                    <select name="location_id" data-control="select2" data-hide-search="false"
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
</x-app-layout>

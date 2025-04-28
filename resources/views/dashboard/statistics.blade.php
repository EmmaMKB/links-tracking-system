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
                        <div class="col-6">
                            <div class="row g-5 g-xl-8">
                                <div class="col-xl-6">
                                    <!--begin::Statistics Widget 5-->
                                    <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <i class="fa fa-truck text-primary fs-2x ms-n1"></i>
                                            <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">
                                                {{ $trucks_drc }}
                                            </div>
                                            <div class="fw-semibold text-gray-400">
                                                Trucks in DRC </div>
                                        </div>
                                        <!--end::Body-->
                                    </a>
                                    <!--end::Statistics Widget 5-->
                                </div>

                                <div class="col-xl-6">
                                    <!--begin::Statistics Widget 5-->
                                    <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <i class="fa fa-truck text-primary fs-2x ms-n1"></i>
                                            <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">
                                                {{ $trucks_zm }}
                                            </div>
                                            <div class="fw-semibold text-gray-400">
                                                Trucks in Zambia </div>
                                        </div>
                                        <!--end::Body-->
                                    </a>
                                    <!--end::Statistics Widget 5-->
                                </div>

                                <div class="col-xl-6">
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

                                <div class="col-xl-6">

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
                        </div>
                        <div class="col-6">
                            <form action="{{ route('tracking') }}" method="post">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <h1 class="card-title">
                                            Tracking Report
                                        </h1>
                                    </div>
                                    <div class="card-body">
                                        <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll"
                                            data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                            data-kt-scroll-max-height="auto"
                                            data-kt-scroll-dependencies="#kt_modal_create_api_key_header"
                                            data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll"
                                            data-kt-scroll-offset="300px">
                                            <div class="row">
                                                <div class="d-flex flex-column mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required fs-5 fw-semibold mb-2">CLIENT</label>
                                                    <!--end::Label-->

                                                    <!--begin::Select-->
                                                    <select name="client_id" data-control="select2" data-hide-search="true"
                                                        data-placeholder="Client" class="form-select form-select-solid">
                                                        <option value="">Select a Client...</option>
                                                        @foreach ($clients as $client)
                                                            <option value="{{ $client->id }}">{{ $client->client }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer justify-center">
                                        <button class="btn btn-block btn-success">
                                            <i class="fa fa-chart">
                                            </i>
                                            Generate Report
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
    @endsection
</x-app-layout>

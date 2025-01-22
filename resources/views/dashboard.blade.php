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
                        <a href="#" class="btn btn-sm fw-bold btn-primary">
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
                    <div class="row g-5 g-xl-8">
                        <div class="col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <i class="fa fa-truck text-primary fs-2x ms-n1"></i>
                                    <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">
                                        53
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
                                        23
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
                                        2
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
                                <span class="card-label fw-bold fs-3 mb-1">KOLWEZI - KSU Routes</span>

                                <span class="text-muted mt-1 fw-semibold fs-7">75 trucks in transit</span>
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
                                        <tr>
                                            <td>
                                                <p class="text-blue-900 fw-bold fs-6">56037-XDER</p>
                                            </td>

                                            <td>
                                                <p class="text-gray-900">POLYTRA</p>
                                            </td>

                                            <td>
                                                <p class="text-gray-900">AGC</p>
                                            </td>

                                            <td>
                                                <p href="#"
                                                    class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6">Mutaka CP</p>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">KLZI-LSHI</span>
                                            </td>

                                            <td>
                                                <p>28/10/2024</p>
                                            </td>

                                            <td>
                                                <span class="badge badge-light-success">Moving</span>
                                            </td>

                                            <td class="text-end">
                                                <a href="#"
                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                    <i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
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
    @endsection
</x-app-layout>

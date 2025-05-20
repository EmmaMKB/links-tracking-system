@php use Carbon\Carbon; @endphp
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
                            Tracking Report
                        </h1>
                        <!--end::Title-->


                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">
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
                                Tracking report </li>
                            <!--end::Item-->

                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->

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

                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">Tracking report</span>

                                <span class="text-muted mt-1 fw-semibold fs-7">{{ $transit }} trucks in
                                    transit for {{ $client->client->client }}</span>
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


                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content px-3 py-3">
                                            <a href="{{ route('download', ['client_id' => $client->client->id]) }}"
                                                class="btn btn-primary  btn-sm px-4">
                                                Download Report
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
                                @foreach ($trucks as $section => $sectionTrucks)
                                    @php
                                        $sectionName = $sectionTrucks->first()->location->section->section ?? 'Unknown Section';
                                    @endphp
                                    <h3 class="card-title">
                                        {{ $sectionName }}
                                    </h3>
                                    <p>{{ $sectionTrucks->count() }} truck(s)</p>
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
                                                <th class="min-w-120px">Transit Days</th>
                                                <th class="min-w-120px">Status</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->

                                        <!--begin::Table body-->

                                        <tbody>
                                            @foreach ($sectionTrucks as $truck)
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

                                                    </td>

                                                    <td>
                                                        <p>{{ $truck->dispatch_date }}</p>
                                                    </td>
                                                    <td>
                                                        @php
                                                            $dispatchDate = $truck->dispatch_date
                                                                ? Carbon::parse($truck->dispatch_date)
                                                                : null;
                                                            $transitDays = $dispatchDate
                                                                ? $dispatchDate->diffInDays(Carbon::now())
                                                                : '-';
                                                        @endphp
                                                        <p style="text-align: center">{{ $transitDays }}</p>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge badge-light-{{ $truck->status_colour() }}">{{ $truck->status }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                @endforeach
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--begin::Body-->
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->

        </div>
    @endsection
</x-app-layout>

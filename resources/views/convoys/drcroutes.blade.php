<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section('assets')
    @endsection
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
                <div id="kt_app_content_container" class="app-container container-xxl ">
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
                                        <span class="text-muted mt-1 fw-semibold fs-7">{{ count($klzi_to_likasi) }}
                                            convoy(s)</span>
                                    </h3>
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body pt-5">
                                    <table
                                        class="table table-row-dashed align-middle fs-6 gy-4 my-0 pb-3"
                                        >
                                        <thead class="d-none">
                                            <tr>
                                                <th>#</th>
                                                <th>Trucks</th>
                                                <th>Escort</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($klzi_to_likasi as $t)
                                                <tr>
                                                    <td class="min-w-175px">
                                                        <div class="position-relative ps-6 pe-3 py-2">
                                                            <div
                                                                class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-{{ $t->status_colour() }} animation-blink">
                                                            </div>
                                                            <a href="#"
                                                                class="mb-1 text-gray-900 text-hover-primary fw-bold">{{ $t->location->location }}
                                                            </a>
                                                            <div class="fs-7 text-muted fw-bold">Updated on
                                                                {{ $t->updated_at }}</div>
                                                        </div>
                                                    </td>
                                                    <td class="min-w-125px">
                                                        @foreach ($t->trucks as $truck)
                                                            {{ $truck->horse }},
                                                        @endforeach
                                                    </td>
                                                    <td class="min-w-125px">
                                                        <!--begin::Team members-->
                                                        <span class="badge badge-primary">{{ explode(' ', $t->escort->full_name)[count(explode(' ', $t->escort->full_name)) - 1] }}</span>
                                                        <!--end::Team members-->
                                                        <div class="fs-7 fw-bold text-muted">{{ $t->controller->full_name }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-success">{{ $t->status }}</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#edit_convoy_{{ $t->id }}"
                                                            class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                                            <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <!--end::Table-->
                                    </table>

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
                                        <span class="text-muted mt-1 fw-semibold fs-7">{{ count($likasi_to_lushi) }}
                                            Convoy(s)</span>
                                    </h3>
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body pt-5">
                                    <table
                                        class="table table-row-dashed align-middle fs-6 gy-4 my-0 pb-3"
                                        >
                                        <thead class="d-none">
                                            <tr>
                                                <th>#</th>
                                                <th>Trucks</th>
                                                <th>Escort</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($likasi_to_lushi as $t)
                                                <tr>
                                                    <td class="min-w-175px">
                                                        <div class="position-relative ps-6 pe-3 py-2">
                                                            <div
                                                                class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-{{ $t->status_colour() }} animation-blink">
                                                            </div>
                                                            <a href="#"
                                                                class="mb-1 text-gray-900 text-hover-primary fw-bold">{{ $t->location->location }}
                                                            </a>
                                                            <div class="fs-7 text-muted fw-bold">Updated on
                                                                {{ $t->updated_at }}</div>
                                                        </div>
                                                    </td>
                                                    <td class="min-w-125px">
                                                        @foreach ($t->trucks as $truck)
                                                            {{ $truck->horse }},
                                                        @endforeach
                                                    </td>
                                                    <td class="min-w-125px">
                                                        <!--begin::Team members-->
                                                        <div class="symbol-group symbol-hover mb-1">
                                                            >
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <div class="symbol-label bg-danger">
                                                                    <span class="fs-7 text-inverse-danger">E</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Team members-->
                                                        <div class="fs-7 fw-bold text-muted">
                                                            {{ $t->controller->full_name }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-success">{{ $t->status }}</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#edit_convoy_{{ $t->id }}"
                                                            class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                                            <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <!--end::Table-->
                                    </table>

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
                                        <span class="card-label fw-bold text-gray-900">Lubumbashi</span>
                                        <span class="text-muted mt-1 fw-semibold fs-7">{{ count($lubumbashi) }}
                                            convoy(s)</span>
                                    </h3>
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body pt-5">
                                    <table
                                        class="table table-row-dashed align-middle fs-6 gy-4 my-0 pb-3"
                                        >
                                        <thead class="d-none">
                                            <tr>
                                                <th>#</th>
                                                <th>Trucks</th>
                                                <th>Escort</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($lubumbashi as $t)
                                                <tr>
                                                    <td class="min-w-175px">
                                                        <div class="position-relative ps-6 pe-3 py-2">
                                                            <div
                                                                class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-{{ $t->status_colour() }} animation-blink">
                                                            </div>
                                                            <a href="#"
                                                                class="mb-1 text-gray-900 text-hover-primary fw-bold">{{ $t->location->location }}
                                                            </a>
                                                            <div class="fs-7 text-muted fw-bold">Updated on
                                                                {{ $t->updated_at }}</div>
                                                        </div>
                                                    </td>
                                                    <td class="min-w-125px">
                                                        <input class="form-control form-control-solid"
                                                            value="
                                                            @foreach ($t->trucks as $truck)
                                                            {{ $truck->horse }}, @endforeach
                                                        "
                                                            readonly/>
                                                    </td>
                                                    <td class="min-w-125px">
                                                        <!--begin::Team members-->
                                                        <div class="symbol-group symbol-hover mb-1">
                                                            >
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <div class="symbol-label bg-danger">
                                                                    <span class="fs-7 text-inverse-danger">E</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Team members-->
                                                        <div class="fs-7 fw-bold text-muted">
                                                            {{ $t->controller->full_name }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-success">{{ $t->status }}</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#edit_convoy_{{ $t->id }}"
                                                            class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                                            <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <!--end::Table-->
                                    </table>

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
                                        <span class="card-label fw-bold text-gray-900">Lushi to Klsa</span>
                                        <span class="text-muted mt-1 fw-semibold fs-7">{{ count($lubumbashi) }}
                                            Convoy(s)</span>
                                    </h3>
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body pt-5">
                                    <table
                                        class="table table-row-dashed align-middle fs-6 gy-4 my-0 pb-3"
                                        >
                                        <thead class="d-none">
                                            <tr>
                                                <th>#</th>
                                                <th>Trucks</th>
                                                <th>Escort</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($lshi_to_klsa as $t)
                                                <tr>
                                                    <td class="min-w-175px">
                                                        <div class="position-relative ps-6 pe-3 py-2">
                                                            <div
                                                                class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-{{ $t->status_colour() }} animation-blink">
                                                            </div>
                                                            <a href="#"
                                                                class="mb-1 text-gray-900 text-hover-primary fw-bold">{{ $t->location->location }}
                                                            </a>
                                                            <div class="fs-7 text-muted fw-bold">Updated on
                                                                {{ $t->updated_at }}</div>
                                                        </div>
                                                    </td>
                                                    <td class="min-w-125px">
                                                        @foreach ($t->trucks as $truck)
                                                            {{ $truck->horse }},
                                                        @endforeach
                                                    </td>
                                                    <td class="min-w-125px">
                                                        <!--begin::Team members-->
                                                        <div class="symbol-group symbol-hover mb-1">
                                                            >
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <div class="symbol-label bg-danger">
                                                                    <span class="fs-7 text-inverse-danger">E</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Team members-->
                                                        <div class="fs-7 fw-bold text-muted">
                                                            {{ $t->controller->full_name }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-success">{{ $t->status }}</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#edit_convoy_{{ $t->id }}"
                                                            class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                                            <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <!--end::Table-->
                                    </table>

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
                                        <span class="card-label fw-bold text-gray-900">Kasumbalesa</span>
                                        <span class="text-muted mt-1 fw-semibold fs-7">{{ count($kasumbalesa) }}
                                            convoy(s)</span>
                                    </h3>
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body pt-5">
                                    <table
                                        class="table table-row-dashed align-middle fs-6 gy-4 my-0 pb-3"
                                        >
                                        <thead class="d-none">
                                            <tr>
                                                <th>#</th>
                                                <th>Trucks</th>
                                                <th>Escort</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($kasumbalesa as $t)
                                                <tr>
                                                    <td class="min-w-175px">
                                                        <div class="position-relative ps-6 pe-3 py-2">
                                                            <div
                                                                class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-{{ $t->status_colour() }} animation-blink">
                                                            </div>
                                                            <a href="#"
                                                                class="mb-1 text-gray-900 text-hover-primary fw-bold">{{ $t->location->location }}
                                                            </a>
                                                            <div class="fs-7 text-muted fw-bold">Updated on
                                                                {{ $t->updated_at }}</div>
                                                        </div>
                                                    </td>
                                                    <td class="min-w-125px">
                                                        <input class="form-control form-control-solid"
                                                            value="
                                                            @foreach ($t->trucks as $truck)
                                                            {{ $truck->horse }}, @endforeach
                                                        "
                                                            readonly />
                                                    </td>
                                                    <td class="min-w-125px">
                                                        <!--begin::Team members-->
                                                        <div class="symbol-group symbol-hover mb-1">
                                                            >
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <div class="symbol-label bg-danger">
                                                                    <span class="fs-7 text-inverse-danger">E</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Team members-->
                                                        <div class="fs-7 fw-bold text-muted">
                                                            {{ $t->controller->full_name }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-success">{{ $t->status }}</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#edit_convoy_{{ $t->id }}"
                                                            class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                                            <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <!--end::Table-->
                                    </table>

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
                                        <span class="card-label fw-bold text-gray-900">Klsa - Sakania</span>
                                        <span class="text-muted mt-1 fw-semibold fs-7">{{ count($klsa_to_sakania) }}
                                            Convoy(s)</span>
                                    </h3>
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body pt-5">
                                    <table
                                        class="table table-row-dashed align-middle fs-6 gy-4 my-0 pb-3"
                                >
                                        <thead class="d-none">
                                            <tr>
                                                <th>#</th>
                                                <th>Trucks</th>
                                                <th>Escort</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($klsa_to_sakania as $t)
                                                <tr>
                                                    <td class="min-w-175px">
                                                        <div class="position-relative ps-6 pe-3 py-2">
                                                            <div
                                                                class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-{{ $t->status_colour() }} animation-blink">
                                                            </div>
                                                            <a href="#"
                                                                class="mb-1 text-gray-900 text-hover-primary fw-bold">{{ $t->location->location }}
                                                            </a>
                                                            <div class="fs-7 text-muted fw-bold">Updated on
                                                                {{ $t->updated_at }}</div>
                                                        </div>
                                                    </td>
                                                    <td class="min-w-125px">
                                                        @foreach ($t->trucks as $truck)
                                                            {{ $truck->horse }},
                                                        @endforeach
                                                    </td>
                                                    <td class="min-w-125px">
                                                        <!--begin::Team members-->
                                                        <div class="symbol-group symbol-hover mb-1">
                                                            >
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <div class="symbol-label bg-danger">
                                                                    <span class="fs-7 text-inverse-danger">E</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Team members-->
                                                        <div class="fs-7 fw-bold text-muted">
                                                            {{ $t->controller->full_name }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-success">{{ $t->status }}</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#edit_convoy_{{ $t->id }}"
                                                            class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                                            <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <!--end::Table-->
                                    </table>

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
                        <h2>Add Convoy</h2>
                        <!--end::Modal title-->

                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <i class="fa fa-times"></i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->

                    <!--begin::Form-->
                    <form id="kt_modal_create_api_key_form" class="form" action="{{ route('add_convoy') }}"
                        method="post">
                        @csrf
                        <!--begin::Modal body-->
                        <div class="modal-body py-10 px-lg-17">
                            <!--begin::Scroll-->
                            <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_modal_create_api_key_header"
                                data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px">
                                <div class="d-flex flex-column mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Trucks</label>
                                    <!--end::Label-->

                                    <!--begin::Select-->
                                    <select name="trucks[]" multiple="multiple" data-control="select2"
                                        data-hide-search="false" data-placeholder="Truck"
                                        class="form-select form-select-solid select2-multiple">
                                        <option value="">Select a truck...</option>
                                        @foreach ($trucks as $truck)
                                            <option value="{{ $truck->id }}">{{ $truck->horse }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Select-->
                                </div>

                                <div class="d-flex flex-column mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Escorter</label>
                                    <!--end::Label-->

                                    <!--begin::Select-->
                                    <select name="escort_id" data-control="select2" data-hide-search="false"
                                        data-placeholder="Escort" class="form-select form-select-solid">
                                        <option value="">Select the Escort</option>
                                        @foreach ($escorts as $e)
                                            <option value="{{ $e->id }}">{{ $e->full_name }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Select-->
                                </div>
                                <div class="d-flex flex-column mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Controller</label>
                                    <!--end::Label-->

                                    <!--begin::Select-->
                                    <select name="controller_id" data-control="select2" data-hide-search="false"
                                        data-placeholder="Escort" class="form-select form-select-solid">
                                        <option value="">Select the Controller</option>
                                        @foreach ($controllers as $c)
                                            <option value="{{ $c->id }}">{{ $c->full_name }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Select-->
                                </div>
                                <div class="d-flex flex-column mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Location</label>
                                    <!--end::Label-->

                                    <!--begin::Select-->
                                    <select name="location_id" id="location_input" data-control="select2"
                                        data-hide-search="false" data-placeholder="Location"
                                        class="form-select form-select-solid">
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
                                        </label>
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
                            <a type="reset" id="kt_modal_create_api_key_cancel" class="btn btn-light me-3">
                                Discard
                            </a>
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
        @foreach ($klzi_to_likasi as $convoy)
            <div class="modal fade" id="edit_convoy_{{ $convoy->id }}" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header" id="kt_modal_create_api_key_header">
                            <!--begin::Modal title-->
                            <h2>Edit Convoy</h2>
                            <!--end::Modal title-->

                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <i class="fa fa-times"></i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->

                        <!--begin::Form-->
                        <form id="kt_modal_create_api_key_form" class="form" action="{{ route('update_convoy') }}"
                            method="post">
                            @csrf
                            <!--begin::Modal body-->
                            <div class="modal-body py-10 px-lg-17">
                                <!--begin::Scroll-->
                                <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll"
                                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_create_api_key_header"
                                    data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll"
                                    data-kt-scroll-offset="300px">
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Trucks</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="trucks[]" multiple="multiple" data-control="select2"
                                            data-hide-search="false" data-placeholder="Truck"
                                            class="form-select form-select-solid select2-multiple">
                                            <option value="">Select a truck...</option>
                                            @foreach ($trucks as $truck)
                                                @foreach ($convoy->trucks as $t)
                                                    @if ($t->id == $truck->id)
                                                        <option value="{{ $truck->id }}" selected>{{ $truck->horse }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $truck->id }}">{{ $truck->horse }}</option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <input type="hidden" name="convoy_id" value="{{ $convoy->id }}">

                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Escorter</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="escort_id" data-control="select2" data-hide-search="false"
                                            data-placeholder="Escort" class="form-select form-select-solid">
                                            <option value="">Select the Escort</option>
                                            @foreach ($escorts as $e)
                                                @if ($e->id == $convoy->escort_id)
                                                    <option value="{{ $e->id }}" selected>{{ $e->full_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $e->id }}">{{ $e->full_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Controller</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="controller_id" data-control="select2" data-hide-search="false"
                                            data-placeholder="Escort" class="form-select form-select-solid">
                                            <option value="">Select the Controller</option>
                                            @foreach ($controllers as $c)
                                                @if ($c->id == $convoy->controller_id)
                                                    <option value="{{ $c->id }}" selected>{{ $c->full_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $c->id }}">{{ $c->full_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Location</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="location_id" id="location_input" data-control="select2"
                                            data-hide-search="false" data-placeholder="Location"
                                            class="form-select form-select-solid">
                                            <option value="">Select a Location...</option>
                                            @foreach ($locations as $location)
                                                @if ($location->id == $convoy->location_id)
                                                    <option value="{{ $location->id }}" selected>
                                                        {{ $location->location }}</option>
                                                @else
                                                    <option value="{{ $location->id }}">{{ $location->location }}
                                                    </option>
                                                @endif
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
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Row-->
                                        <div class="fv-row">
                                            <!--begin::Radio group-->
                                            <div class="btn-group w-100" data-kt-buttons="true"
                                                data-kt-buttons-target="[data-kt-button]">
                                                <!--begin::Radio-->
                                                <label class="btn btn-outline btn-active-success btn-color-muted active"
                                                    data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" type="radio" name="status"
                                                        value="Moving" checked="checked" />
                                                    <!--end::Input-->
                                                    Moving
                                                </label>
                                                <!--end::Radio-->

                                                <!--begin::Radio-->
                                                <label class="btn btn-outline btn-active-success btn-color-muted"
                                                    data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" type="radio" name="status"
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
                                                    <input class="btn-check" type="radio" name="status"
                                                        value="Queued" />
                                                    <!--end::Input-->
                                                    Queued
                                                </label>
                                                <!--end::Radio-->
                                                <label class="btn btn-outline btn-active-success btn-color-muted"
                                                    data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" type="radio" name="status"
                                                        value="Handover" />
                                                    <!--end::Input-->
                                                    Handover
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
                                <button type="submit" name="action" value="delete" id="kt_modal_create_api_key_cancel"
                                    class="btn btn-danger me-3">
                                    Delete
                                </button>
                                <!--end::Button-->

                                <!--begin::Button-->
                                <button type="submit" name="action" value="update" id="kt_modal_create_api_key_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label">
                                        Submit
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
        @endforeach
        @foreach ($likasi_to_lushi as $convoy)
            <div class="modal fade" id="edit_convoy_{{ $convoy->id }}" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header" id="kt_modal_create_api_key_header">
                            <!--begin::Modal title-->
                            <h2>Edit Convoy</h2>
                            <!--end::Modal title-->

                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <i class="fa fa-times"></i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->

                        <!--begin::Form-->
                        <form id="kt_modal_create_api_key_form" class="form" action="{{ route('update_convoy') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Modal body-->
                            <div class="modal-body py-10 px-lg-17">
                                <!--begin::Scroll-->
                                <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll"
                                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_create_api_key_header"
                                    data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll"
                                    data-kt-scroll-offset="300px">
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Trucks</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="trucks[]" multiple="multiple" data-control="select2"
                                            data-hide-search="false" data-placeholder="Truck"
                                            class="form-select form-select-solid select2-multiple">
                                            <option value="">Select a truck...</option>
                                            @foreach ($trucks as $truck)
                                                @foreach ($convoy->trucks as $t)
                                                    @if ($t->id == $truck->id)
                                                        <option value="{{ $truck->id }}" selected>{{ $truck->horse }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $truck->id }}">{{ $truck->horse }}</option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <input type="hidden" name="convoy_id" value="{{ $convoy->id }}">

                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Escorter</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="escort_id" data-control="select2" data-hide-search="false"
                                            data-placeholder="Escort" class="form-select form-select-solid">
                                            <option value="">Select the Escort</option>
                                            @foreach ($escorts as $e)
                                                @if ($e->id == $convoy->escort_id)
                                                    <option value="{{ $e->id }}" selected>{{ $e->full_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $e->id }}">{{ $e->full_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Controller</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="controller_id" data-control="select2" data-hide-search="false"
                                            data-placeholder="Escort" class="form-select form-select-solid">
                                            <option value="">Select the Controller</option>
                                            @foreach ($controllers as $c)
                                                @if ($c->id == $convoy->controller_id)
                                                    <option value="{{ $c->id }}" selected>{{ $c->full_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $c->id }}">{{ $c->full_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Location</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="location_id" id="location_input" data-control="select2"
                                            data-hide-search="false" data-placeholder="Location"
                                            class="form-select form-select-solid">
                                            <option value="">Select a Location...</option>
                                            @foreach ($locations as $location)
                                                @if ($location->id == $convoy->location_id)
                                                    <option value="{{ $location->id }}" selected>
                                                        {{ $location->location }}</option>
                                                @else
                                                    <option value="{{ $location->id }}">{{ $location->location }}
                                                    </option>
                                                @endif
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
                                            </label>
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
                                                    <input class="btn-check" type="radio" name="status"
                                                        checked="checked" value="Moving" />
                                                    <!--end::Input-->
                                                    Moving
                                                </label>
                                                <!--end::Radio-->

                                                <!--begin::Radio-->
                                                <label class="btn btn-outline btn-active-success btn-color-muted active"
                                                    data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" type="radio" name="status"
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
                                                    <input class="btn-check" type="radio" name="status"
                                                        value="Queued" />
                                                    <!--end::Input-->
                                                    Queued
                                                </label>
                                                <!--end::Radio-->
                                                <label class="btn btn-outline btn-active-success btn-color-muted"
                                                    data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" type="radio" name="status"
                                                        value="Handover" />
                                                    <!--end::Input-->
                                                    Handover
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
                                <button type="submit" name="action" value="delete" id="kt_modal_create_api_key_cancel"
                                    class="btn btn-danger me-3">
                                    Delete
                                </button>
                                <!--end::Button-->

                                <!--begin::Button-->
                                <button type="submit" name="action" value="update" id="kt_modal_create_api_key_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label">
                                        Submit
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
        @endforeach
        @foreach ($lubumbashi as $convoy)
            <div class="modal fade" id="edit_convoy_{{ $convoy->id }}" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header" id="kt_modal_create_api_key_header">
                            <!--begin::Modal title-->
                            <h2>Edit Convoy</h2>
                            <!--end::Modal title-->

                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <i class="fa fa-times"></i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->

                        <!--begin::Form-->
                        <form id="kt_modal_create_api_key_form" class="form" action="{{ route('update_convoy') }}"
                            method="post">
                            @csrf
                            <!--begin::Modal body-->
                            <div class="modal-body py-10 px-lg-17">
                                <!--begin::Scroll-->
                                <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll"
                                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_create_api_key_header"
                                    data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll"
                                    data-kt-scroll-offset="300px">
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Trucks</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="trucks[]" multiple="multiple" data-control="select2"
                                            data-hide-search="false" data-placeholder="Truck"
                                            class="form-select form-select-solid select2-multiple">
                                            <option value="">Select a truck...</option>
                                            @foreach ($trucks as $truck)
                                                @foreach ($convoy->trucks as $t)
                                                    @if ($t->id == $truck->id)
                                                        <option value="{{ $truck->id }}" selected>{{ $truck->horse }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $truck->id }}">{{ $truck->horse }}</option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <input type="hidden" name="convoy_id" value="{{ $convoy->id }}">

                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Escorter</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="escort_id" data-control="select2" data-hide-search="false"
                                            data-placeholder="Escort" class="form-select form-select-solid">
                                            <option value="">Select the Escort</option>
                                            @foreach ($escorts as $e)
                                                @if ($e->id == $convoy->escort_id)
                                                    <option value="{{ $e->id }}" selected>{{ $e->full_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $e->id }}">{{ $e->full_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Controller</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="controller_id" data-control="select2" data-hide-search="false"
                                            data-placeholder="Escort" class="form-select form-select-solid">
                                            <option value="">Select the Controller</option>
                                            @foreach ($controllers as $c)
                                                @if ($c->id == $convoy->controller_id)
                                                    <option value="{{ $c->id }}" selected>{{ $c->full_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $c->id }}">{{ $c->full_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Location</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="location_id" id="location_input" data-control="select2"
                                            data-hide-search="false" data-placeholder="Location"
                                            class="form-select form-select-solid">
                                            <option value="">Select a Location...</option>
                                            @foreach ($locations as $location)
                                                @if ($location->id == $convoy->location_id)
                                                    <option value="{{ $location->id }}" selected>
                                                        {{ $location->location }}</option>
                                                @else
                                                    <option value="{{ $location->id }}">{{ $location->location }}
                                                    </option>
                                                @endif
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
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Row-->
                                        <div class="fv-row">
                                            <!--begin::Radio group-->
                                            <div class="btn-group w-100" data-kt-buttons="true"
                                                data-kt-buttons-target="[data-kt-button]">
                                                <!--begin::Radio-->
                                                <label class="btn btn-outline btn-active-success btn-color-muted active"
                                                    data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" type="radio" name="status"
                                                        value="Moving" checked="checked" />
                                                    <!--end::Input-->
                                                    Moving
                                                </label>
                                                <!--end::Radio-->

                                                <!--begin::Radio-->
                                                <label class="btn btn-outline btn-active-success btn-color-muted"
                                                    data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" type="radio" name="status"
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
                                                    <input class="btn-check" type="radio" name="status"
                                                        value="Queued" />
                                                    <!--end::Input-->
                                                    Queued
                                                </label>
                                                <!--end::Radio-->
                                                <label class="btn btn-outline btn-active-success btn-color-muted"
                                                    data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" type="radio" name="status"
                                                        value="Handover" />
                                                    <!--end::Input-->
                                                    Handover
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
                                <button type="submit" name="action" value="delete" id="kt_modal_create_api_key_cancel"
                                    class="btn btn-danger me-3">
                                    Delete
                                </button>
                                <!--end::Button-->

                                <!--begin::Button-->
                                <button type="submit" name="action" value="update" id="kt_modal_create_api_key_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label">
                                        Submit
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
        @endforeach
        @foreach ($lshi_to_klsa as $convoy)
            <div class="modal fade" id="edit_convoy_{{ $convoy->id }}" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header" id="kt_modal_create_api_key_header">
                            <!--begin::Modal title-->
                            <h2>Edit Convoy</h2>
                            <!--end::Modal title-->

                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <i class="fa fa-times"></i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->

                        <!--begin::Form-->
                        <form id="kt_modal_create_api_key_form" class="form" action="{{ route('update_convoy') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Modal body-->
                            <div class="modal-body py-10 px-lg-17">
                                <!--begin::Scroll-->
                                <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll"
                                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_create_api_key_header"
                                    data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll"
                                    data-kt-scroll-offset="300px">
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Trucks</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="trucks[]" multiple="multiple" data-control="select2"
                                            data-hide-search="false" data-placeholder="Truck"
                                            class="form-select form-select-solid select2-multiple">
                                            <option value="">Select a truck...</option>
                                            @foreach ($trucks as $truck)
                                                @foreach ($convoy->trucks as $t)
                                                    @if ($t->id == $truck->id)
                                                        <option value="{{ $truck->id }}" selected>
                                                            {{ $truck->horse }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $truck->id }}">{{ $truck->horse }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <input type="hidden" name="convoy_id" value="{{ $convoy->id }}">

                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Escorter</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="escort_id" data-control="select2" data-hide-search="false"
                                            data-placeholder="Escort" class="form-select form-select-solid">
                                            <option value="">Select the Escort</option>
                                            @foreach ($escorts as $e)
                                                @if ($e->id == $convoy->escort_id)
                                                    <option value="{{ $e->id }}" selected>{{ $e->full_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $e->id }}">{{ $e->full_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Controller</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="controller_id" data-control="select2" data-hide-search="false"
                                            data-placeholder="Escort" class="form-select form-select-solid">
                                            <option value="">Select the Controller</option>
                                            @foreach ($controllers as $c)
                                                @if ($c->id == $convoy->controller_id)
                                                    <option value="{{ $c->id }}" selected>{{ $c->full_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $c->id }}">{{ $c->full_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Location</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="location_id" id="location_input" data-control="select2"
                                            data-hide-search="false" data-placeholder="Location"
                                            class="form-select form-select-solid">
                                            <option value="">Select a Location...</option>
                                            @foreach ($locations as $location)
                                                @if ($location->id == $convoy->location_id)
                                                    <option value="{{ $location->id }}" selected>
                                                        {{ $location->location }}</option>
                                                @else
                                                    <option value="{{ $location->id }}">{{ $location->location }}
                                                    </option>
                                                @endif
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
                                            </label>
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
                                                    <input class="btn-check" type="radio" name="status"
                                                        checked="checked" value="Moving" />
                                                    <!--end::Input-->
                                                    Moving
                                                </label>
                                                <!--end::Radio-->

                                                <!--begin::Radio-->
                                                <label class="btn btn-outline btn-active-success btn-color-muted active"
                                                    data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" type="radio" name="status"
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
                                                    <input class="btn-check" type="radio" name="status"
                                                        value="Queued" />
                                                    <!--end::Input-->
                                                    Queued
                                                </label>
                                                <!--end::Radio-->
                                                <label class="btn btn-outline btn-active-success btn-color-muted"
                                                    data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" type="radio" name="status"
                                                        value="Handover" />
                                                    <!--end::Input-->
                                                    Handover
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
                                <button type="submit" name="action" value="delete" id="kt_modal_create_api_key_cancel"
                                    class="btn btn-danger me-3">
                                    Delete
                                </button>
                                <!--end::Button-->

                                <!--begin::Button-->
                                <button type="submit" name="action" value="update" id="kt_modal_create_api_key_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label">
                                        Submit
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
        @endforeach
        @foreach ($kasumbalesa as $convoy)
            <div class="modal fade" id="edit_convoy_{{ $convoy->id }}" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header" id="kt_modal_create_api_key_header">
                            <!--begin::Modal title-->
                            <h2>Edit Convoy</h2>
                            <!--end::Modal title-->

                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <i class="fa fa-times"></i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->

                        <!--begin::Form-->
                        <form id="kt_modal_create_api_key_form" class="form" action="{{ route('update_convoy') }}"
                            method="post">
                            @csrf
                            <!--begin::Modal body-->
                            <div class="modal-body py-10 px-lg-17">
                                <!--begin::Scroll-->
                                <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll"
                                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_create_api_key_header"
                                    data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll"
                                    data-kt-scroll-offset="300px">
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Trucks</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="trucks[]" multiple="multiple" data-control="select2"
                                            data-hide-search="false" data-placeholder="Truck"
                                            class="form-select form-select-solid select2-multiple">
                                            <option value="">Select a truck...</option>
                                            @foreach ($trucks as $truck)
                                                @foreach ($convoy->trucks as $t)
                                                    @if ($t->id == $truck->id)
                                                        <option value="{{ $truck->id }}" selected>
                                                            {{ $truck->horse }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $truck->id }}">{{ $truck->horse }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <input type="hidden" name="convoy_id" value="{{ $convoy->id }}">

                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Escorter</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="escort_id" data-control="select2" data-hide-search="false"
                                            data-placeholder="Escort" class="form-select form-select-solid">
                                            <option value="">Select the Escort</option>
                                            @foreach ($escorts as $e)
                                                @if ($e->id == $convoy->escort_id)
                                                    <option value="{{ $e->id }}" selected>{{ $e->full_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $e->id }}">{{ $e->full_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Controller</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="controller_id" data-control="select2" data-hide-search="false"
                                            data-placeholder="Escort" class="form-select form-select-solid">
                                            <option value="">Select the Controller</option>
                                            @foreach ($controllers as $c)
                                                @if ($c->id == $convoy->controller_id)
                                                    <option value="{{ $c->id }}" selected>{{ $c->full_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $c->id }}">{{ $c->full_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Location</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="location_id" id="location_input" data-control="select2"
                                            data-hide-search="false" data-placeholder="Location"
                                            class="form-select form-select-solid">
                                            <option value="">Select a Location...</option>
                                            @foreach ($locations as $location)
                                                @if ($location->id == $convoy->location_id)
                                                    <option value="{{ $location->id }}" selected>
                                                        {{ $location->location }}</option>
                                                @else
                                                    <option value="{{ $location->id }}">{{ $location->location }}
                                                    </option>
                                                @endif
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
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Row-->
                                        <div class="fv-row">
                                            <!--begin::Radio group-->
                                            <div class="btn-group w-100" data-kt-buttons="true"
                                                data-kt-buttons-target="[data-kt-button]">
                                                <!--begin::Radio-->
                                                <label class="btn btn-outline btn-active-success btn-color-muted active"
                                                    data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" type="radio" name="status"
                                                        value="Moving" checked="checked" />
                                                    <!--end::Input-->
                                                    Moving
                                                </label>
                                                <!--end::Radio-->

                                                <!--begin::Radio-->
                                                <label class="btn btn-outline btn-active-success btn-color-muted"
                                                    data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" type="radio" name="status"
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
                                                    <input class="btn-check" type="radio" name="status"
                                                        value="Queued" />
                                                    <!--end::Input-->
                                                    Queued
                                                </label>
                                                <!--end::Radio-->
                                                <label class="btn btn-outline btn-active-success btn-color-muted"
                                                    data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" type="radio" name="status"
                                                        value="Handover" />
                                                    <!--end::Input-->
                                                    Handover
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
                                <button type="submit" name="action" value="delete" id="kt_modal_create_api_key_cancel"
                                    class="btn btn-danger me-3">
                                    Delete
                                </button>
                                <!--end::Button-->

                                <!--begin::Button-->
                                <button type="submit" name="action" value="update" id="kt_modal_create_api_key_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label">
                                        Submit
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
        @endforeach
        @foreach ($klsa_to_sakania as $convoy)
            <div class="modal fade" id="edit_convoy_{{ $convoy->id }}" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header" id="kt_modal_create_api_key_header">
                            <!--begin::Modal title-->
                            <h2>Edit Convoy</h2>
                            <!--end::Modal title-->

                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <i class="fa fa-times"></i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->

                        <!--begin::Form-->
                        <form id="kt_modal_create_api_key_form" class="form" action="{{ route('update_convoy') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Modal body-->
                            <div class="modal-body py-10 px-lg-17">
                                <!--begin::Scroll-->
                                <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll"
                                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_create_api_key_header"
                                    data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll"
                                    data-kt-scroll-offset="300px">
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Trucks</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="trucks[]" multiple="multiple" data-control="select2"
                                            data-hide-search="false" data-placeholder="Truck"
                                            class="form-select form-select-solid select2-multiple">
                                            <option value="">Select a truck...</option>
                                            @foreach ($trucks as $truck)
                                                @foreach ($convoy->trucks as $t)
                                                    @if ($t->id == $truck->id)
                                                        <option value="{{ $truck->id }}" selected>
                                                            {{ $truck->horse }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $truck->id }}">{{ $truck->horse }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <input type="hidden" name="convoy_id" value="{{ $convoy->id }}">

                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Escorter</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="escort_id" data-control="select2" data-hide-search="false"
                                            data-placeholder="Escort" class="form-select form-select-solid">
                                            <option value="">Select the Escort</option>
                                            @foreach ($escorts as $e)
                                                @if ($e->id == $convoy->escort_id)
                                                    <option value="{{ $e->id }}" selected>{{ $e->full_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $e->id }}">{{ $e->full_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Controller</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="controller_id" data-control="select2" data-hide-search="false"
                                            data-placeholder="Escort" class="form-select form-select-solid">
                                            <option value="">Select the Controller</option>
                                            @foreach ($controllers as $c)
                                                @if ($c->id == $convoy->controller_id)
                                                    <option value="{{ $c->id }}" selected>{{ $c->full_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $c->id }}">{{ $c->full_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <div class="d-flex flex-column mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-semibold mb-2">Location</label>
                                        <!--end::Label-->

                                        <!--begin::Select-->
                                        <select name="location_id" id="location_input" data-control="select2"
                                            data-hide-search="false" data-placeholder="Location"
                                            class="form-select form-select-solid">
                                            <option value="">Select a Location...</option>
                                            @foreach ($locations as $location)
                                                @if ($location->id == $convoy->location_id)
                                                    <option value="{{ $location->id }}" selected>
                                                        {{ $location->location }}</option>
                                                @else
                                                    <option value="{{ $location->id }}">{{ $location->location }}
                                                    </option>
                                                @endif
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
                                            </label>
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
                                                    <input class="btn-check" type="radio" name="status"
                                                        checked="checked" value="Moving" />
                                                    <!--end::Input-->
                                                    Moving
                                                </label>
                                                <!--end::Radio-->

                                                <!--begin::Radio-->
                                                <label class="btn btn-outline btn-active-success btn-color-muted active"
                                                    data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" type="radio" name="status"
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
                                                    <input class="btn-check" type="radio" name="status"
                                                        value="Queued" />
                                                    <!--end::Input-->
                                                    Queued
                                                </label>
                                                <!--end::Radio-->
                                                <label class="btn btn-outline btn-active-success btn-color-muted"
                                                    data-kt-button="true">
                                                    <!--begin::Input-->
                                                    <input class="btn-check" type="radio" name="status"
                                                        value="Handover" />
                                                    <!--end::Input-->
                                                    Handover
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
                                <button type="submit" name="action" value="delete" id="kt_modal_create_api_key_cancel"
                                    class="btn btn-danger me-3">
                                    Delete
                                </button>
                                <!--end::Button-->

                                <!--begin::Button-->
                                <button type="submit" name="action" value="update" id="kt_modal_create_api_key_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label">
                                        Submit
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
        @endforeach
    @endsection
    @section('assets')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            window.setTimeout(function() {
                window.location.reload();
            }, 300000);
        </script>
    @endsection
</x-app-layout>

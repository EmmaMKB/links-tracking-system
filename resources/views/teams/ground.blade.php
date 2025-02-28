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
                            Links ground team
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
                                Teams </li>
                            <!--end::Item-->

                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <!--begin::Primary button-->
                        <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                            data-bs-target="#new_truck_modal">
                            Add an employee </a>
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
                </div>
                <!--end::Content container-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fw-bold text-muted bg-light">
                                        <th class="ps-4 min-w-300px rounded-start">Full Name</th>
                                        <th class="min-w-125px">ID</th>
                                        <th class="min-w-125px">Contact</th>
                                        <th class="min-w-200px">Hire Date</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->

                                <!--begin::Table body-->
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>
                                                <a href="#"
                                                    class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6">
                                                    {{ $employee->full_name }}
                                                </a>
                                            </td>

                                            <td>
                                                <a href="#"
                                                    class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6">
                                                    {{ $employee->employee_id }}
                                                </a>
                                            </td>

                                            <td>
                                                <a href="#"
                                                    class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6">
                                                    {{ $employee->phone }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#"
                                                    class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6">
                                                    {{ $employee->hire_date }}
                                                </a>
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
                        <h2>New employee</h2>
                        <!--end::Modal title-->

                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <i class="fa fa-times"></i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->

                    <!--begin::Form-->
                    <form id="kt_modal_create_api_key_form" class="form" action="{{ route('add_employee') }}"
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
                                        <label class="required fs-5 fw-semibold mb-2">Full name</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="John Doe" name="full_name" />
                                    </div>
                                    <div class="col-xs-3 mb-5 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">Employee ID</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Ex: 20240467" name="employee_id" />
                                    </div>
                                </div>
                                <div class="input-group row">
                                    <div class="col-xs-3 mb-5 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">Function</label>
                                        <select name="function" class="form-control form-control-solid" id="">
                                            <option value="controller">Controller</option>
                                            <option value="dispatcher">Dispatcher</option>
                                            <option value="escort">Escort</option>
                                            <option value="cp">CP</option>
                                            <option value="coordonateur">Coordonator</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex flex-column mb-10 fv-row">
                                    <label class="required fs-5 fw-semibold mb-2">Email</label>
                                    <input type="email" class="form-control form-control-solid" name="email" />
                                </div>
                                <div class="d-flex flex-column mb-10 fv-row">
                                    <label class="required fs-5 fw-semibold mb-2">Phone</label>
                                    <input type="tel" class="form-control form-control-solid" name="phone" />
                                </div>
                                <!--end::Input group-->
                                <div class="col-xs-3 mb-5 fv-row">
                                    <label class="required fs-5 fw-semibold mb-2">Hire Date</label>
                                    <input type="date" class="form-control form-control-solid" name="hire_date" />
                                </div>
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

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
                            Global Update - {{ $client->client->client }}
                        </h1>
                        <!--end::Title-->


                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                {{ \Carbon\Carbon::now()->format('d-m-Y') }}
                            </li>
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
                            <div class="card-toolbar">
                                <!--begin::Menu-->
                                <button id="copyButton" class="btn btn-color-primary btn-active-primary">
                                    Copy to Clipboard
                                </button>
                            </div>
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div id="global_update" class="rounded-lg border p-4 scrollable lg:w-[600px]">
                                <h3>*GLOBAL UPDATE {{ \Carbon\Carbon::now()->format('d-F-Y') }}*</h3>
                                @foreach ($trucks as $location => $sectionTrucks)
                                    <h3 class="card-title">
                                        _{{ $sectionTrucks->count() }} truck(s), {{ $location }}_
                                    </h3>
                                    <div>
                                        @foreach ($sectionTrucks as $truck)
                                        <p>{{ $truck->horse }} - {{ $truck->transporter }}</p>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
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
    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('copyButton').addEventListener('click', function() {
                    let content = document.getElementById('global_update').textContent;
                    content = content
                    .replace(/(\r?\n\s*\n)+/g, '\n') // Remove extra blank lines
                    .replace(/^\s+/gm, '') // Remove leading spaces from each line
                    .replace(/(_\d+ truck\(s\), .+?_)/g, '\n$1\n') // Add a blank line before and after locations
                    .trim();

                    navigator.clipboard.writeText(content).then(function() {
                        alert('Content copied to clipboard!');
                    }).catch(function(error) {
                        alert('Failed to copy content: ' + error);
                    });
                });
            });
        </script>
    @endsection
</x-app-layout>

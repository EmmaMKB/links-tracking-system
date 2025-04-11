<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Tracking Report</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <link rel="stylesheet" href="{{ public_path('css/pdfstyle.css') }}">
</head>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    table {
        margin: 0 auto;
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #bebebe;
    }

    td {
        padding: 2px;
        font-size: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #46f6b2;
        padding: 4px 2px;
        font-size: 14px;
        text-align: left;
    }

    h3 {
        margin-top: 10px;
        margin-bottom: 3px;
        color: #120552;
    }

    p.sub-header {
        margin-top: 0;
        margin-bottom: 5px;
        font-size: 10px;
        color: #404040;
        font-style: italic;
    }

    div.card-body {
        border-top: 1px solid #bebebe;
        padding: 10px 0;
        margin-top: 110px;
    }

    div.header {
        position: relative;
        width: 100%;

    }

    div.title {
        position: absolute;
        left: 0;
        width: 70%;
    }

    div.logo {
        position: absolute;
        right: 0;
        width: 30%;
        text-align: right;
    }

    h2.title {
        font-size: 25px;
        font-weight: bolder;
        color: #120552;
        margin: 6px 0;
    }

    h3.subtitle {
        font-size: 16px;
        color: #3a3a3a;
        margin: 0;
    }

    p.date {
        font-size: 12px;
        color: #3a3a3a;
        margin: 0;
        font-style: italic;
    }
</style>

<body>
    <div class="container">
        <div class="header">
            <div class="title">
                <h2 class="title">Tracking Report</h2>
                <h3 class="subtitle">{{ $client->client->client }}</h3>
                <p class="date">{{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
            </div>
            <div class="logo">
                <img src="{{ $image }}" alt="Links logo" style="width: 220px; height: auto;">
            </div>
        </div>
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                @foreach ($trucks as $section => $sectionTrucks)
                    <h3 class="card-title">
                        {{ $section }}
                    </h3>
                    <p class="sub-header">{{ $sectionTrucks->count() }} truck(s)</p>
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
                                <th class="min-w-120px">Comment</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->

                        <!--begin::Table body-->

                        <tbody>
                            @foreach ($sectionTrucks as $truck)
                                <tr>
                                    <td>
                                        <p class="text-blue-900 fw-bold fs-6">{{ $truck->horse }}
                                        </p>
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
                                        <p class="text-gray-900 fw-bold text-hover-primary d-block mb-1 fs-6">
                                            {{ $truck->location->location }}</p>

                                    </td>

                                    <td>
                                        <p>{{ $truck->dispatch_date }}</p>
                                    </td>

                                    <td>
                                        <span
                                            class="badge badge-light-{{ $truck->status_colour() }}">{{ $truck->status }}</span>
                                    </td>
                                    <td>
                                        <p>{{ $truck->comment }}</p>
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
</body>

</html>

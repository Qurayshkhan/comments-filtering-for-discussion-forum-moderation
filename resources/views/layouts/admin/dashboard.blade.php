<!DOCTYPE html>

<html lang="en">

<head>
    <base href="" />
    <title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular & Laravel by
        Keenthemes</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask & Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('admin') }}/assets/media/logos/favicon.ico" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />


    <link href="{{ asset('admin') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin') }}/assets/plugins/custom/leaflet/leaflet.bundle.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin') }}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
        type="text/css" />


    <link href="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

</head>


<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">

    <div class="d-flex flex-column flex-root">

        <div class="page d-flex flex-row flex-column-fluid">

            @include('layouts.admin.partials.sidebar')

            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                @include('layouts.admin.partials.header')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    @yield('content')
                </div>
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">

                    <div class="container-xxl d-flex flex-column flex-md-row flex-stack">

                        <div class="text-dark order-2 order-md-1">
                            <span class="text-gray-400 fw-semibold me-1">Created by</span>
                            <a href="https://keenthemes.com" target="_blank"
                                class="text-muted text-hover-primary fw-semibold me-2 fs-6">WARDA</a>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('admin') }}/assets/js/scripts.bundle.js"></script>
    <script src="{{ asset('admin') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="{{ asset('admin') }}/assets/plugins/custom/leaflet/leaflet.bundle.js"></script>
    <script src="{{ asset('admin') }}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="{{ asset('admin') }}/assets/js/widgets.bundle.js"></script>
    <script src="{{ asset('admin') }}/assets/js/custom/widgets.js"></script>
    <script src="{{ asset('admin') }}/assets/js/custom/apps/chat/chat.js"></script>
    <script src="{{ asset('admin') }}/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="{{ asset('admin') }}/assets/js/custom/utilities/modals/select-location.js"></script>
    <script src="{{ asset('admin') }}/assets/js/custom/utilities/modals/users-search.js"></script>
    @yield('script')
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>UAPS-POS </title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/onlyLogov1.svg')}}"/>


    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    @include('inventory.styles')
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<body class="sidebar-noneoverflow dashboard-sales">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @include('inventory.header')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        @include('inventory.sidebar')
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                @yield('content')
                {{-- @livewire('dashboard-pos.dashboard-controller') --}}
            </div>
            @include('inventory.footer')
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    @include('inventory.scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>
</html>

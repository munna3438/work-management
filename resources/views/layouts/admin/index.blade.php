<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>My First E-commerce Project</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
            integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

        <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
            integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
            />
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @yield('style')
    </head>

    <body>
        <div class="h-screen flex">

            <div class="w-[300px] h-full bg_primary">
                <div class="admin_sidebar h-full">
                    <div class="overflow-y-auto relative">
                        <a href="{{ route('dashboard') }}" class="sidebar_logo">
                            <h2>logo</h2>
                        </a>
                        <div class="sidebar_link_contanier">
                            <div class="accordion">
                                <div class="sidebar_link  dropdown_head ">Institute</div>
                                <div class="dropdown_inner ">
                                    <a href="{{ route('institute.add') }}" class="sidebar_link">New Institute</a>
                                    <a href="{{ route('institute.list') }}" class="sidebar_link">Institute List</a>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar_link_contanier">
                            <div class="accordion">
                                <div class="sidebar_link  dropdown_head">SYNC</div>
                                <div class="dropdown_inner mb-1">
                                    <a href="{{route('sync.add')}}" class="sidebar_link">Add Sync</a>
                                    <a href="{{route('sync.list')}}" class="sidebar_link">List Sync</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar_link sidebar_setings">
                        <h1>setting</h1>
                    </div>
                </div>
            </div>
            <div class="w-[calc(100%-300px)] h-screen overflow-y-auto relative">
                <div class="sticky top-0 left-0 z-[100]">

                    @include('layouts.admin.header')
                </div>
                <div class="bg-[#F5F5F5] min-h-screen">
                    @yield('content')
                </div>
                {{-- <div class="w-[calc(100%-300px)] fixed bottom-0 right-0"> --}}
                <div class="sticky bottom-0 left-0">
                    @include('layouts.admin.footer')
                </div>
            </div>
        </div>

        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script> --}}
        <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/index.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        ></script>
        <script>
            $("#searchSelectField").selectize(
                {
                }
            );
        </script>
        @yield('script')
        @livewireScripts
    </body>

</html>

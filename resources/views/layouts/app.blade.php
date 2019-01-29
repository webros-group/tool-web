<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.header')
</head>
<body>
    <div class="loading-invi-block" style="display: none;">
        <img src="/images/loading.gif" class="loading-page"/>
    </div>
    <div class="container-fluid content-error-home pl-0 pr-0">
        @php
            // @include('layouts.menu')
        @endphp

        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fadeout show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fadeout show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @yield('content')
    </div>
    
    
     @include('layouts.footer')
</body>
</html>

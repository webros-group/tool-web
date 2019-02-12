<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.layouts.header')
</head>
<body class="animsition" style="animation-duration: 1500ms; opacity: 1;">
    <div class="loading-invi-block" style="display: none;">
        <img src="/images/loading.gif" class="loading-page"/>
    </div>
    

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

    @include('admin.layouts.footer')

    @yield('footerJS')
    
</body>
</html>

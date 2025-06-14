@extends('adminlte::page')

@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle') | @yield('subtitle') @endif
@stop

<link rel="shortcut icon" href="{{ asset('vendor/adminlte/dist/img/logo-fvg.png') }}" type="image/x-icon">
@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">
            @yield('content_header_title')
            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop

@section('content')
    {{-- Alert success message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @yield('content_body')
@stop

@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.0') }}
    </div>
    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.company_name', 'VILLA GADING') }}
        </a>
    </strong>
@stop

@push('js')
<script>
    $(document).ready(function() {
        // Add your common script logic here...
    });
</script>
@endpush

@push('css')
<style type="text/css">
    .preloader img {
        border-radius: 0 !important; /* Pastikan tidak bulat */
    }
</style>
@endpush

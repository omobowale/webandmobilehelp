@extends('template')

@section('tabcontent')

<div class="container-fluid m-0 p-0">
    <div class="page-tabs">
        <div class="row">
            <div class="offset-md-1 col-md-2">
                <p class="p-3"><a href="homepage">Home</a></p>
            </div>
            <div class="col-md-2">
                <p class="p-3"><a href="aboutpage">About</a></p>
            </div>
            <div class="col-md-2">
                <p class="p-3"><a href="servicespage">Services</a></p>
            </div>
            <div class="col-md-2">
                <p class="p-3"><a href="portfoliopage">Portfolio</a></p>
            </div>
            <div class="col-md-2">
                <p class="p-3"><a href="contactpage">Contact</a></p>
            </div>
        </div>
    </div>

    <div class="page-tabs-content bg-secondary">
        @yield('page-content')
    </div>

    
</div>




@endsection
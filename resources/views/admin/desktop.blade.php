@extends('layouts.config')
@section('content')
@include('admin.admin')

<div id="layoutSidenav">
    @include('admin.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-4">
                <!-- Knowledge base home header option-->
                <header class="card card-waves">
                    <div class="card-body px-5 pt-5 pb-0">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6">
                                <h2 class="text-primary">How can we help?</h2>
                                <p class="lead mb-4">Search our knowledge base to find answers, or contact us directly if you're having issues!</p>

                            </div>
                            <div class="col-lg-4">
                                <img class="img-fluid" src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/problem-solving.svg" />
                            </div>
                        </div>
                    </div>
                </header>
            </div>
        </main>
    </div>
</div>

@endsection

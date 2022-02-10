@extends('layouts.config')
@section('content')
@include('admin.admin')

<div id="layoutSidenav">
    @include('admin.sidebar')
    <div id="layoutSidenav_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6">
                    <!-- Pagina details card-->
                    <div class="card mb-4">
                        <div class="card-header">Registro de Educacion</div>
                        <div class="card-body">
                            @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{\Session::get('success')}}</li>
                                </ul>
                            </div>
                            @endif
                            <form method="POST" action="{{ route('experience.store') }}"  role="form" enctype="multipart/form-data">
                                @csrf

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12">
                                        <label class="small mb-1">Periodo</label>
                                        <input class="form-control" type="text" name="period" placeholder="Enter period"  required />
                                        @error('period')
                                            <small class="text-danger" autofocus> {{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label class="small mb-1" >Titulo</label>
                                        <input class="form-control"  type="text" name="title" placeholder="Enter title" required />
                                        @error('title')
                                            <small class="text-danger" autofocus> {{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label class="small mb-1" >Descripcion</label>
                                        <textarea name="description" type="text" class="form-control" placeholder="Enter description" required></textarea>
                                        @error('description')
                                            <small class="text-danger" autofocus> {{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Save changes button-->
                                <button class="btn btn-primary lift" type="submit">Save changes</button>
                                <a href="{{route('experience.index')}}" class="btn btn-danger lift">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

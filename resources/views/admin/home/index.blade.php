@extends('layouts.config')
@section('content')
@include('admin.admin')

<div id="layoutSidenav">
    @include('admin.sidebar')
    <div id="layoutSidenav_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <!-- Pagina details card-->
                    <div class="card mb-4">
                        <div class="card-header">Actualizar Datos</div>
                        <div class="card-body">
                            @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{\Session::get('success')}}</li>
                                </ul>
                            </div>
                            @endif
                            <form method="POST" action="{{ route('home.update', $home) }}"  role="form" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf
                                                               
                                <!-- Form Row-->
                                <div class="row" style="margin: auto; height: 100%">
                                    <div class="col col-md-7">
                                        <div class="col col-md-10">
                                            <label class="small mb-1">nombre</label>
                                            <input class="form-control"  type="text" name="nombre" placeholder="Enter your username" value="{{$home->nombre}}" required />
                                        </div>
                                        <div class="col col-md-10">
                                            <label class="small mb-1" >Descripción</label>
                                            <textarea class="form-control" type="text" name="descripcion" placeholder="Enter descripcion" rows="3" required >{{$home->descripcion}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col col-md-5">
                                        <label class="small mb-1" >Imagen destacada</label>
                                        <img src="/images/home/{{$home->imagen}}" height="180" width="200" >
                                        <input type="file" name="imagen" accpet="image/jpg,image/jpeg,image/png" class="py-2"/>
                                        <br>
                                        @error('imagen')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Save changes button-->
                                <button class="btn btn-primary lift" type="submit">Save changes</button>
                                <a href="/admin/main" class="btn btn-danger lift">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
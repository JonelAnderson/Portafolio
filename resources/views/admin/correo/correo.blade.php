@extends('layouts.config')
@section('content')
@include('admin.admin')

<div id="layoutSidenav">
    @include('admin.sidebar')
    <div id="layoutSidenav_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card card-header-actions">
                        <div class="card-header">
                            <div class="float-left">
                                <span class="card-title"><strong>Lista de Correos</strong></span>
                            </div>
                        </div>
                        @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{\Session::get('success')}}</li>
                            </ul>
                        </div>
                        @endif
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end py-2 px-4">
                            <form class="form-inline">
                                <input name="busqueda" class="form-control me-md-2" type="search" placeholder="Ingrese nombre" aria-label="Search" autocomplete="off">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Buscar</button>
                                
                            </form>
                        </div>
                        <div class="card-body py-1 table-responsive">

                            <table class="table table-sm table-bordered border-primary table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Correo</th>
                                        <th class="text-center">Recibido</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($correos as $item)
                                    <tr>
                                        <td class="text-center">{{$item->id}}</td>
                                        <td class="text-center">{{$item->name}}</td>
                                        <td class="text-center">{{$item->email}}</td>
                                        <td class="text-center">{{$item->created_at->diffForHUmans()}}</td>
                                        <td class="text-center">
                                                <form action="{{ route('correo.destroy',$item->id) }}" method="POST" class="formEliminar">
                                                    <a class="btn btn-primary  lift btn-sm" href="{{ route('correo.show',$item->id) }}"><i
                                                class="fa fa-fw fa-eye"></i> &nbsp;Ver</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger lift btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $correos->links() !!}
                        </div>
                    </div>
                    <div class="card card-header-actions">
                        <div class="card-header">
                            Header Button
                            <button class="btn btn-primary btn-sm lift">Action</button>
                        </div>
                        <div class="card-body">
                            ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
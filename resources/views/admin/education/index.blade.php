@extends('layouts.config')
@section('content')
@include('admin.admin')

<div id="layoutSidenav">
    @include('admin.sidebar')
    <div id="layoutSidenav_content">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-header-actions">
                        <div class="card-header">
                            Educations
                            <a href="{{route('education.create')}}" class="btn btn-primary lift">{{ __('Create New') }}</a>
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
                        <div class="card-body py-1">

                            <table class="table table-sm table-bordered border-primary table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Periodo</th>
                                        <th class="text-center">Titulo</th>
                                        <th class="text-center">Descripcion</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($educations as $item)
                                    <tr>
                                        <td class="text-center">{{$item->id}}</td>
                                        <td class="text-center">{{$item->period}}</td>
                                        <td class="text-center">{{$item->title}}</td>
                                        <td class="text-center">{{$item->description}}</td>
                                        <td class="text-center">
                                                <form action="{{ route('education.destroy',$item->id) }}" method="POST" class="formEliminar">
                                                    <a class="btn btn-warning  lift btn-sm" href="{{ route('education.edit',$item->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger lift btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection




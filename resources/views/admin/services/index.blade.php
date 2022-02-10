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
                            CODIGO FUENTE DE SERVICIOS
                        </div>
                        @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{\Session::get('success')}}</li>
                            </ul>
                        </div>
                        @endif
                        <form action="{{route('save_cambios.config')}}" method="POST">
                            @csrf
                            <div class="card">
                                <textarea id="code" name="code">
                                    <?php echo $service?>
                                </textarea>
                                <div class="card-footer">
                                    <button class="btn btn-primary lift" type="submit">Guardar cambios</button>
                                </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <style>
                .CodeMirror {border-top: 1px solid black; border-bottom: 1px solid black;}
                .CodeMirror pre > * { text-indent: 0px; }
                pre.CodeMirror-line {
                        padding-left: 10px !important;
            }
      </style>
        </div>
    </div>
</div>
@push('scripts')
<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
        lineNumbers: true,
        lineWrapping: true,
        mode: "text/html",

      });

      editor.refresh();
      editor.setOption("theme", 'monokai');
      editor.setSize('100%', 1000);

</script>
@endpush
@endsection




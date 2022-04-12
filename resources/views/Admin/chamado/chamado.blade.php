@extends('adminlte::page')

@section('title', 'Chamados')

@section('content_header')
    <h1>{{$title}} </h1>
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@stop

@section('content')
    @if (@session('success'))
        <div class="alert alert-success">
            {{ session ('success')}}
        </div>
    @endif

    @if (@session('error'))
        <div class="alert alert-danger">
            {{ session ('error')}}
        </div>
    @endif

    <div>   
        <table class="table table-striped" id="ID_tabela">
            <thead>
                
                <tr>
                    {{-- <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Rendering engine</th> --}}
                    <th>#</th>
                    <th>Usuário</th>
                    <th>Assunto</th>
                    <th>Categoria</th>
                    <th>Status</th>
                    <th>Ultima interação</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($Chamados as $chamado)
                    <tr>
                        <td><a href="{{route('chamado.show',$chamado->id)}}">{{$chamado->id}}</a></td>
                        <td>{{$chamado->user_id}}</td>
                        <td>{{$chamado->assunto}}</td>
                        <td>{{$chamado->categoria}}</td>
                        <th>{{$chamado->status}}</th>
                        <td>{{$chamado->ultInteracao}}</td>
                        
                    </tr>  
                @endforeach
               
            </tbody>
        </table>  
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        
        <Script>
            $(document).ready(function() {
                $('#ID_tabela').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                    }
                });
            });
        </Script>  
    </div>         
@stop
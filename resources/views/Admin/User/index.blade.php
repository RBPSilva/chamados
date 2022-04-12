@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Cadastrado de Usuários </h1>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> --}}

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
        <a href="{{route('register.user')}}" class="btn btn-success">Novo</a>
    </div><br>

    <div>   
        <table id="ID_tabela" class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Perfil</th>
                    <th>E-mail</th>
                    <th>Cadastrado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Users as $User)
                    <tr>
                        <td><a href="{{route('user.show',$User->id)}}">{{$User->id}}</a></td>
                        <td>{{$User->name}}</td>
                        <td>{{$User->perfil}}</td>
                        <td>{{$User->email}}</td>
                        <td>{{$User->created_at}}</td>
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

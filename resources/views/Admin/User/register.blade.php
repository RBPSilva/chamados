@extends('adminlte::page')

@section('title', 'Cadastro de usuários')

@section('content_header')
<h1>{{$title}}</h1>
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
    
    @if(isset($Users) )
        <div class="box" style="width:400px">
            <div class="box-body" width="40">
                <form method="post" action="{{ route('editUser')}}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control"  value="{{$Users->id}}">
                    </div>

                        <div class="form-group">
                            <p><h4>Nome e sobrenome</h4></p> 
                        <input type="text" class="form-control" name="nome" placeholder="Nome Sobrenome" value="{{$Users->name}}">
                        </div>
                        <div class="form-group">
                            <p><h4>Perfil</h4></p>
                            <select  name="perfil" class="form-control">
                                @foreach ($categorys as $category)
                                    <option value="{{$category}}"
                                        @if (isset($Users) && $Users->perfil == $category)
                                            selected
                                        @endif
                                    >{{$category}}</option>
                                @endforeach
                            </select>
                        </div>                                    
                        <div class="form-group">
                            <p><h4>E-mail</h4></p> 
                        <input type="email"  value="{{$Users->email}}" name="email" placeholder="e-mail@dominio.com.br" form-control class="form-control"> 
                        </div>
                        <div class="form-group">
                            <p><h4>Senha</h4></p> 
                            <input type="password" name="senha" placeholder="Senha" form-control class="form-control"> 
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i>&nbsp<b>&nbsp Salvar</b></button>
                        </div> 
                </form>
            </div>
        </div>
    @else()
        <div class="box" style="width:400px">
            <div class="box-body" width="40">
                <form method="post" action="{{ route('user.store') }}">
                    {!! csrf_field() !!}
                    
                        <div class="form-group">
                            <p><h4>Nome e sobrenome</h4></p> 
                            <input type="text" class="form-control" name="nome" placeholder="Nome Sobrenome">
                        </div>
                        <div class="form-group">
                            <p><h4>Perfil</h4></p>
                            <select  name="perfil">
                                @foreach ($categorys as $category)
                                    <option>{{$category}}</option>
                                @endforeach
                            </select>
                        </div>                                    
                        <div class="form-group">
                            <p><h4>E-mail</h4></p> 
                            <input type="email"  name="email" placeholder="e-mail@dominio.com.br" form-control class="form-control"> 
                        </div>
                        <div class="form-group">
                            <p><h4>Senha</h4></p> 
                            <input type="password" name="senha" placeholder="Senha" form-control class="form-control"> 
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i>&nbsp<b>&nbsp Salvar</b></button>
                        </div> 
                </form>
            </div>
        </div>
    @endif
@stop
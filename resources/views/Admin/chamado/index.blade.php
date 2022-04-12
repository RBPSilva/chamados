@extends('adminlte::page')

@section('title', 'Chamados')

@section('content_header')
<h1>Abrir Chamado</h1>
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

    <div class="box" >
        <div class="box-body">
           <form method="post" action="{{ route('chamado.store') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group">
                    <p><h4>Assunto</h4></p> 
                    <input type="text" class="form-control" name="assunto" placeholder="Breve descrição" style="width:400px">
                </div>
                <div class="form-group">
                    <p><h4>Categoria</h4></p>
                    <select  name="categoria">
                        @foreach ($categorys as $category)
                            <option>{{$category}}</option>
                        @endforeach
                    </select>
                </div>                                    
                <div class="form-group">
                    <label for="Textarea"><h4>Descrição</h4></label>
                    <textarea name="descricao" class="form-control" id="Textarea" rows="8"></textarea>
                </div>
               {{-- Anexar arquivo para envio --}}
               <div class="form-group">
                    <input type="file" name="image" class="form-control" >
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i>&nbsp&nbsp <b>Salvar</b></button>
               </div>
            </form> 
            {{-- <button href="#" class="btn btn-danger"><i class="glyphicon glyphicon-pushpin"></i>&nbsp&nbsp<b>Anexo</b></button>
            --}}
        </div>
    </div>
@stop
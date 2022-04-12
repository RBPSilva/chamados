@extends('adminlte::page')

@section('title', 'Chamados')



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
    <!-- /.card-body -->
    <div class="card-footer">
        <form   action="{{ route('editarChamado') }}" enctype="multipart/form-data"method="POST" >
            {!! csrf_field() !!}
           
            <div class="container-fluid">
                <div class="row" >
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control"  value="{{$Chamado[0]['id']}}">
                    </div>
                    <div class="col-md-4" class="form-group">
                        <h4><b>Chamado número: &nbsp{{$Chamado[0]['id']}}</b></h4>
                    </div>
                    <div class="col-md-8" class="form-group" >                      
                        <select  name="status" class="form-control" {{$view_status}}>
                            @foreach ($cat_status as $cat_status)
                                <option value="{{$cat_status}}"
                                    @if(isset($Chamado) && $Chamado[0]['status'] == $cat_status)
                                        selected
                                    @endif
                                >{{$cat_status}}</option>
                            @endforeach
                        </select>   
                    </div>      
                </div>
            </div> 
            <div class="form-group">
                {{-- <label for="Textarea"><h4>Responder</h4></label> --}}
                <textarea  name="descricao" class="form-control" id="Textarea" rows="3"></textarea>
            </div>
            {{-- Anexar arquivo para envio --}}
            <div class="form-group">
                <input type="file" name="image" class="form-control" >
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i>&nbsp&nbsp <b>Responder</b></button>
            </div>
        </form>
    </div> <br>
    <div>
        @foreach ($Chamado_itens as $chamado_item)
     
            <div class="card direct-chat direct-chat-primary">
                @if($chamado_item->name)
                    {{-- <div class="direct-chat-msg"> --}}
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">{{$chamado_item->name}}</span>
                            <span class="direct-chat-timestamp float-right">{{$chamado_item->created_at}}</span>
                        </div>
                        <div class="direct-chat-text">
                            {{$chamado_item->descricao}}
                            <br>
                            <a href="{{route('anexo',$chamado_item->image)}}">{{$chamado_item->image}}</a>
                        </div>
                       
                        
                        <!-- /.direct-chat-text -->
                    {{-- </div>  --}}
                {{-- @else
                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                        </div>

                        <div class="direct-chat-text">
                            You better believe it!
                        </div>
                        <!-- /.direct-chat-text -->
                    </div> --}}
                @endif     
            </div>
     
        @endforeach
    </div>
    {{ $Chamado_itens->links() }}
      
    
@stop
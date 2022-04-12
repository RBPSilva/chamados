@extends('adminlte::page')

@section('title', 'Tickets')

@section('content_header')
    <h1>Dashboard</h1>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
           ['Mês', 'Validar', 'Fechado', 'Desenvolvimento','Aberto'],
          
           [{{$data['Mes']}},{{$data['Validar']}} , {{$data['Fechado']}}, {{$data['Desenvolvimento']}},{{$data['Aberto']}}],
     
        ]);

        var options = {
          chart: {
            title: 'Quantidades de chamados / Mês'+''+{{$data['Mes']}},
            // subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    
    
@stop
@push('css')

@push('js')
@section('content')

<div class="container-fluid">
  <div class="row" >
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-green" style="height:130px">
        <div class="inner">
          @foreach ($Chamado as $chamado)
              @if ($chamado->status == "Aberto")
                  <h3>{{$chamado->qtd}}</h3>
              @endif
          @endforeach
          <p><br></p>
        </div>
        <div class="icon">
          <span class="ion ion-folder"></span>
        </div>
          <a href="{{route('chamados')}}" class="small-box-footer">Aberto &nbsp &nbsp &nbsp  <i class="glyphicon glyphicon-share-alt"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-yellow" style="height:130px">
        <div class="inner">
          @foreach ($Chamado as $chamado)
              @if ($chamado->status == "Desenvolvimento")
                  <h3>{{$chamado->qtd}}</h3>
              @endif
          @endforeach
          <p><br></p>
        </div>
        <div class="icon">
          <i class="ion ion-clipboard"></i>
        </div>
            <a href="{{route('desenvolvimento')}}" class="small-box-footer">Em desenvolvimento&nbsp &nbsp &nbsp <i class="glyphicon glyphicon-share-alt"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-aqua" style="height:130px">
        <div class="inner">
          @foreach ($Chamado as $chamado)
              @if ($chamado->status == "Validar")
                  <h3>{{$chamado->qtd}}</h3>
              @endif
          @endforeach

          <p><br></p>
        </div>
        <div class="icon">
          <i class="ion ion-checkmark"></i>
        </div>
        <a href="{{route('validar')}}" class="small-box-footer">Validar &nbsp &nbsp &nbsp  <i class="glyphicon glyphicon-share-alt"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-red" style="height:130px">
        <div class="inner">
          @foreach ($Chamado as $chamado)
              @if ($chamado->status == "Fechado")
                  <h3>{{$chamado->qtd}}</h3>
              @endif
          @endforeach

          <p><br></p>
        </div>
        <div class="icon">
          <i class="ion-email"></i>
          
        </div>
      <a href="{{route('fechado')}}" class="small-box-footer">Fechado &nbsp &nbsp &nbsp  <i class="glyphicon glyphicon-share-alt"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
   <div id="columnchart_material" style="width: 50%; height: 350px;"></div>
</div>
@stop

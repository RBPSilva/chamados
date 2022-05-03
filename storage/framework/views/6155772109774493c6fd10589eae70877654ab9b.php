<?php $__env->startSection('title', 'Tickets'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Dashboard</h1>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
           ['Mês', 'Validar', 'Fechado', 'Desenvolvimento','Aberto'],
          
           [<?php echo e($data['Mes']); ?>,<?php echo e($data['Validar']); ?> , <?php echo e($data['Fechado']); ?>, <?php echo e($data['Desenvolvimento']); ?>,<?php echo e($data['Aberto']); ?>],
     
        ]);

        var options = {
          chart: {
            title: 'Quantidades de chamados / Mês'+''+<?php echo e($data['Mes']); ?>,
            // subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    
    
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
  <div class="row" >
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-green" style="height:130px">
        <div class="inner">
          <?php $__currentLoopData = $Chamado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chamado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($chamado->status == "Aberto"): ?>
                  <h3><?php echo e($chamado->qtd); ?></h3>
              <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <p><br></p>
        </div>
        <div class="icon">
          <span class="ion ion-folder"></span>
        </div>
          <a href="<?php echo e(route('chamados')); ?>" class="small-box-footer">Aberto &nbsp &nbsp &nbsp  <i class="glyphicon glyphicon-share-alt"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-yellow" style="height:130px">
        <div class="inner">
          <?php $__currentLoopData = $Chamado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chamado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($chamado->status == "Desenvolvimento"): ?>
                  <h3><?php echo e($chamado->qtd); ?></h3>
              <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <p><br></p>
        </div>
        <div class="icon">
          <i class="ion ion-clipboard"></i>
        </div>
            <a href="<?php echo e(route('desenvolvimento')); ?>" class="small-box-footer">Em desenvolvimento&nbsp &nbsp &nbsp <i class="glyphicon glyphicon-share-alt"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-aqua" style="height:130px">
        <div class="inner">
          <?php $__currentLoopData = $Chamado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chamado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($chamado->status == "Validar"): ?>
                  <h3><?php echo e($chamado->qtd); ?></h3>
              <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <p><br></p>
        </div>
        <div class="icon">
          <i class="ion ion-checkmark"></i>
        </div>
        <a href="<?php echo e(route('validar')); ?>" class="small-box-footer">Validar &nbsp &nbsp &nbsp  <i class="glyphicon glyphicon-share-alt"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-red" style="height:130px">
        <div class="inner">
          <?php $__currentLoopData = $Chamado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chamado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($chamado->status == "Fechado"): ?>
                  <h3><?php echo e($chamado->qtd); ?></h3>
              <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <p><br></p>
        </div>
        <div class="icon">
          <i class="ion-email"></i>
          
        </div>
      <a href="<?php echo e(route('fechado')); ?>" class="small-box-footer">Fechado &nbsp &nbsp &nbsp  <i class="glyphicon glyphicon-share-alt"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
   <div id="columnchart_material" style="width: 50%; height: 350px;"></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\chamado\resources\views/Admin/home/index.blade.php ENDPATH**/ ?>
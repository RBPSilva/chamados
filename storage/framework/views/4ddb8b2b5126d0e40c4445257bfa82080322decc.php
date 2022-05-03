<?php $__env->startSection('title', 'Chamados'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1><?php echo e($title); ?> </h1>
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(@session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session ('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(@session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session ('error')); ?>

        </div>
    <?php endif; ?>

    <div>   
        <table class="table table-striped" id="ID_tabela">
            <thead>
                
                <tr>
                    
                    <th>#</th>
                    <th>Usuário</th>
                    <th>Assunto</th>
                    <th>Categoria</th>
                    <th>Status</th>
                    <th>Ultima interação</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $Chamados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chamado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo e(route('chamado.show',$chamado->id)); ?>"><?php echo e($chamado->id); ?></a></td>
                        <td><?php echo e($chamado->user_id); ?></td>
                        <td><?php echo e($chamado->assunto); ?></td>
                        <td><?php echo e($chamado->categoria); ?></td>
                        <th><?php echo e($chamado->status); ?></th>
                        <td><?php echo e($chamado->ultInteracao); ?></td>
                        
                    </tr>  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\chamado\resources\views/Admin/chamado/chamado.blade.php ENDPATH**/ ?>
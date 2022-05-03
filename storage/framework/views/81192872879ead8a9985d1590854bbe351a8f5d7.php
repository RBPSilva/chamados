<?php $__env->startSection('title', 'Usuários'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Cadastro de Usuários </h1>
    

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
        <a href="<?php echo e(route('register.user')); ?>" class="btn btn-success">Novo</a>
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
                <?php $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $User): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo e(route('user.show',$User->id)); ?>"><?php echo e($User->id); ?></a></td>
                        <td><?php echo e($User->name); ?></td>
                        <td><?php echo e($User->perfil); ?></td>
                        <td><?php echo e($User->email); ?></td>
                        <td><?php echo e($User->created_at); ?></td>
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\chamado\resources\views/Admin/User/index.blade.php ENDPATH**/ ?>
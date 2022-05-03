<?php $__env->startSection('title', 'Cadastro de usuários'); ?>

<?php $__env->startSection('content_header'); ?>
<h1><?php echo e($title); ?></h1>
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
    
    <?php if(isset($Users) ): ?>
        <div class="box" style="width:400px">
            <div class="box-body" width="40">
                <form method="post" action="<?php echo e(route('editUser')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control"  value="<?php echo e($Users->id); ?>">
                    </div>

                        <div class="form-group">
                            <p><h4>Nome e sobrenome</h4></p> 
                        <input type="text" class="form-control" name="nome" placeholder="Nome Sobrenome" value="<?php echo e($Users->name); ?>">
                        </div>
                        <div class="form-group">
                            <p><h4>Perfil</h4></p>
                            <select  name="perfil" class="form-control">
                                <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category); ?>"
                                        <?php if(isset($Users) && $Users->perfil == $category): ?>
                                            selected
                                        <?php endif; ?>
                                    ><?php echo e($category); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>                                    
                        <div class="form-group">
                            <p><h4>E-mail</h4></p> 
                        <input type="email"  value="<?php echo e($Users->email); ?>" name="email" placeholder="e-mail@dominio.com.br" form-control class="form-control"> 
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
    <?php else: ?>
        <div class="box" style="width:400px">
            <div class="box-body" width="40">
                <form method="post" action="<?php echo e(route('user.store')); ?>">
                    <?php echo csrf_field(); ?>

                    
                        <div class="form-group">
                            <p><h4>Nome e sobrenome</h4></p> 
                            <input type="text" class="form-control" name="nome" placeholder="Nome Sobrenome">
                        </div>
                        <div class="form-group">
                            <p><h4>Perfil</h4></p>
                            <select  name="perfil">
                                <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option><?php echo e($category); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\chamado\resources\views/Admin/User/register.blade.php ENDPATH**/ ?>
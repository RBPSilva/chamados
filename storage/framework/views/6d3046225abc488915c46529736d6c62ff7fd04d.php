<?php $__env->startSection('title', 'Chamados'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Abrir Chamado</h1>
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

    <div class="box" >
        <div class="box-body">
           <form method="post" action="<?php echo e(route('chamado.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <p><h4>Assunto</h4></p> 
                    <input type="text" class="form-control" name="assunto" placeholder="Breve descrição" style="width:400px">
                </div>
                <div class="form-group">
                    <p><h4>Categoria</h4></p>
                    <select  name="categoria">
                        <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option><?php echo e($category); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>                                    
                <div class="form-group">
                    <label for="Textarea"><h4>Descrição</h4></label>
                    <textarea name="descricao" class="form-control" id="Textarea" rows="8"></textarea>
                </div>
               
               <div class="form-group">
                    <input type="file" name="image" class="form-control" >
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i>&nbsp&nbsp <b>Salvar</b></button>
               </div>
            </form> 
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\chamado\resources\views/Admin/chamado/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Chamados'); ?>



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
    <!-- /.card-body -->
    <div class="card-footer">
        <form   action="<?php echo e(route('editarChamado')); ?>" enctype="multipart/form-data"method="POST" >
            <?php echo csrf_field(); ?>

           
            <div class="container-fluid">
                <div class="row" >
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control"  value="<?php echo e($Chamado[0]['id']); ?>">
                    </div>
                    <div class="col-md-4" class="form-group">
                        <h4><b>Chamado número: &nbsp<?php echo e($Chamado[0]['id']); ?></b></h4>
                    </div>
                    <div class="col-md-8" class="form-group" >                      
                        <select  name="status" class="form-control" <?php echo e($view_status); ?>>
                            <?php $__currentLoopData = $cat_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat_status); ?>"
                                    <?php if(isset($Chamado) && $Chamado[0]['status'] == $cat_status): ?>
                                        selected
                                    <?php endif; ?>
                                ><?php echo e($cat_status); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>   
                    </div>      
                </div>
            </div> 
            <div class="form-group">
                
                <textarea  name="descricao" class="form-control" id="Textarea" rows="3"></textarea>
            </div>
            
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
        <?php $__currentLoopData = $Chamado_itens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chamado_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     
            <div class="card direct-chat direct-chat-primary">
                <?php if($chamado_item->name): ?>
                    
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left"><?php echo e($chamado_item->name); ?></span>
                            <span class="direct-chat-timestamp float-right"><?php echo e($chamado_item->created_at); ?></span>
                        </div>
                        <div class="direct-chat-text">
                            <?php echo e($chamado_item->descricao); ?>

                            <br>
                            <a href="<?php echo e(route('anexo',$chamado_item->image)); ?>"><?php echo e($chamado_item->image); ?></a>
                        </div>
                       
                        
                        <!-- /.direct-chat-text -->
                    
                
                <?php endif; ?>     
            </div>
     
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php echo e($Chamado_itens->links()); ?>

      
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\chamado\resources\views/Admin/chamado/chamadoItens.blade.php ENDPATH**/ ?>
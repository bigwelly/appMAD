<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">                
                <ol class="breadcrumb panel-heading">
                    <li><a href="<?php echo e(route('cliente.index')); ?>">Clientes</a></li>
                    <li><a href="<?php echo e(route('cliente.detalhe',$telefone->cliente->id)); ?>">Detalhe</a></li>
                    <li class="active">Editar</li>
                </ol>

                <div class="panel-body"> 
                <p><b>Cliente: </b><?php echo e($telefone->cliente->nome); ?></p>                                   
                    <form action="<?php echo e(route('telefone.atualizar',$telefone->id)); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="_method" value="put">
                        <div class="form-group <?php echo e($errors->has('titulo') ? 'has-error' : ''); ?>">
                            <label for="titulo">Título</label>
                            <input type="text" name="titulo" class="form-control" placeholder="Título do Telefone" value="<?php echo e($telefone->titulo); ?>">
                            <?php if($errors->has('titulo')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('titulo')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group <?php echo e($errors->has('telefone') ? 'has-error' : ''); ?>">
                            <label for="numero">Número</label>
                            <input type="text" name="telefone" class="form-control" placeholder="Número do Telefone" value="<?php echo e($telefone->telefone); ?>">
                            <?php if($errors->has('telefone')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('telefone')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <button class="btn btn-info">Atualizar</button>
                        
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">                
                <ol class="breadcrumb panel-heading">
                    <li><a href="<?php echo e(route('cliente.index')); ?>">Clientes</a></li>
                    <li><a href="<?php echo e(route('cliente.detalhe',$cliente->id)); ?>">Detalhe</a></li>
                    <li class="active">Adicionar</li>
                </ol>

                <div class="panel-body"> 
                <p><b>Cliente: </b><?php echo e($cliente->nome); ?></p>                                   
                    <form action="<?php echo e(route('telefone.salvar',$cliente->id)); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        
                        <div class="form-group <?php echo e($errors->has('titulo') ? 'has-error' : ''); ?>">
                            <label for="titulo">Título</label>
                            <input type="text" name="titulo" class="form-control" placeholder="Título do Telefone">
                            <?php if($errors->has('titulo')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('titulo')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group <?php echo e($errors->has('telefone') ? 'has-error' : ''); ?>">
                            <label for="numero">Número</label>
                            <input type="text" name="telefone" class="form-control" placeholder="Número do Telefone">
                            <?php if($errors->has('telefone')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('telefone')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <button class="btn btn-info">Adicionar</button>
                        
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">                
                <ol class="breadcrumb panel-heading">
                    <li><a href="<?php echo e(route('cliente.index')); ?>">Clientes</a></li>
                    <li class="active">Editar</li>
                </ol>

                <div class="panel-body">                                    
                    <form action="<?php echo e(route('cliente.atualizar',$cliente->id)); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="_method" value="put">
                        <div class="form-group <?php echo e($errors->has('nome') ? 'has-error' : ''); ?>">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome do cliente" value="<?php echo e($cliente->nome); ?>">
                            <?php if($errors->has('nome')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('nome')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail do cliente" value="<?php echo e($cliente->email); ?>">
                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group <?php echo e($errors->has('endereco') ? 'has-error' : ''); ?>">
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco" class="form-control" placeholder="Endereço do cliente" value="<?php echo e($cliente->endereco); ?>">
                            <?php if($errors->has('endereco')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('endereco')); ?></strong>
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
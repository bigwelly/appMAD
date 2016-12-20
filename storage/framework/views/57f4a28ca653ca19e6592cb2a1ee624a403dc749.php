<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">                    
                    <li class="active">Clientes</li>
                </ol>

                <div class="panel-body">
                    <p>
                        <a class="btn btn-info" href="<?php echo e(route('cliente.adicionar')); ?>">Adicinar</a>
                    </p>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Endereço</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($clientes as $cliente): ?>

                            <tr>
                                <th scope="row"><?php echo e($cliente->id); ?></th>
                                <td><?php echo e($cliente->nome); ?></td>
                                <td><?php echo e($cliente->email); ?></td>
                                <td><?php echo e($cliente->endereco); ?></td>
                                <td>
                                    <a class="btn btn-default" href="<?php echo e(route('cliente.detalhe',$cliente->id)); ?>">Detalhe</a>
                                    <a class="btn btn-default" href="<?php echo e(route('cliente.editar',$cliente->id)); ?>">Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='<?php echo e(route('cliente.deletar',$cliente->id)); ?>' : false)">Deletar</a>
                                </td>
                            </tr>                            

                            <?php endforeach; ?>
                            
                        </tbody>
                        
                    </table>

                    <div align="center">
                        <?php echo $clientes->links(); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
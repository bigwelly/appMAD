<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li><a href="<?php echo e(route('cliente.index')); ?>">Clientes</a></li>
                    <li class="active">Detalhe</li>
                </ol>

                <div class="panel-body">
                    <p><b>Cliente: </b><?php echo e($cliente->nome); ?></p>
                    <p><b>E-mail: </b><?php echo e($cliente->email); ?></p>
                    <p><b>Endereço: </b><?php echo e($cliente->endereco); ?></p>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Título</th>
                                <th>Número</th>                                
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>                           
                            <?php foreach($cliente->telefones as $telefone): ?>
                            <tr>
                                <th scope="row"><?php echo e($telefone->id); ?></th>
                                <td><?php echo e($telefone->titulo); ?></td>
                                <td><?php echo e($telefone->telefone); ?></td>                                
                                <td>
                                    <a class="btn btn-default" href="<?php echo e(route('telefone.editar',$telefone->id)); ?>">Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='<?php echo e(route('telefone.deletar',$telefone->id)); ?>' : false)">Deletar</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                        
                    </table>

                    <p>
                        <a class="btn btn-info" href="<?php echo e(route('telefone.adicionar',$cliente->id)); ?>">Adicinar Telefone</a>
                    </p>
                    

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
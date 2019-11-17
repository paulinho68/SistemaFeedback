<?php $__env->startSection('title', 'Item - listar'); ?>

<?php $__env->startSection('content_header'); ?>
<ol class="breadcrumb">
    <li><a href="<?php echo e(route('item.index')); ?>"><i class="fa fa-dashboard"></i> Item</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- will be used to show any messages -->
<?php if(Session::has('message')): ?>
<div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>

<script>
function ConfirmDelete() {
    return confirm('Tem certeza que deseja excluir este registro?');
}
</script>

<script>
    $(document).ready(function () {
        $('#tabela').DataTable({
            /*$('table.display').DataTable( {*/
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
                "order": [[ 0, "desc" ]]
            }
        });
    });
</script>

<div class="container">
    
    <a href="<?php echo e(URL::to('admin/item/create')); ?>"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Criar</button></a>
    
    <p></p>

    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">ITEM</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <!--<table class="table no-margin">-->
                        <table id="tabela"  class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $itens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
                                <tr>
                                    <td><?php echo e($value->id); ?></td>
                                    <td><?php echo e($value->nome); ?></td>
                                    <td><?php echo e($value->descricao); ?></td>

                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo e(URL::to('admin/item/' . $value->id)); ?>"><button type="button" class="btn btn-info"><i class="fa fa-search"></i> Visualizar</button></a>
                                            
                                            <a href="<?php echo e(URL::to('admin/item/' . $value->id . '/edit')); ?>"><button type="button" class="btn btn-warning"><i class="fa fa-edit"></i> Editar</button></a>
                                            
                                        </div>        
                                        <div class="btn-group">
                                            
                                            <?php echo e(Form::open(array('url' => 'admin/item/' . $value->id, 'onsubmit' => 'return ConfirmDelete()'))); ?>

                                            <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                                            <button type="submit" class="btn btn-danger"><i class="fa fa-close"></i> Excluir</button>
                                            <?php echo e(Form::close()); ?>

                                            
                                        </div>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                            </tbody>
                        </table>
                        

                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andrereis\projetos\workspace\feedback\resources\views/item/item_index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Item'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Item - Visualizar</h1>
<ol class="breadcrumb">
    <li><a href="<?php echo e(route('item.index')); ?>"><i class="fa fa-dashboard"></i> Item</a></li>
    <li class="active">Visualizar</li>
</ol>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- will be used to show any messages -->
<?php if(Session::has('message')): ?>
<div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>

<div class="container">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e($item->title); ?></h3>
        </div>
        <div class="box-body">
            <strong>Nome:</strong> <?php echo e($item->nome); ?><br>
            <strong>Descrição:</strong> <?php echo e($item->descricao); ?><br>
            <strong>Criação:</strong> <?php echo e($item->created_at); ?><br>
            <strong>Atualização:</strong> <?php echo e($item->updated_at); ?>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!--Footer-->
        </div>
        <!-- /.box-footer-->
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andrereis\projetos\workspace\feedback\resources\views/item/item_show.blade.php ENDPATH**/ ?>
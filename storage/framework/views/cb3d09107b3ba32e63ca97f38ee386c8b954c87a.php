<?php $__env->startSection('title', 'Item'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Item - Editar</h1>
<ol class="breadcrumb">
    <li><a href="<?php echo e(route('item.index')); ?>"><i class="fa fa-dashboard"></i> Item</a></li>
    <li class="active">Editar</li>
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
            <h3 class="box-title">Editar - <?php echo e($item->nome); ?></h3>
        </div>
        <div class="box-body">
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
                <?php echo e(Form::model($item, array('route' => array('item.update', $item->id), 'method' => 'PUT'))); ?>

            <div class="form-group">
                <?php echo e(Form::label('nome', 'Nome')); ?>

                
                
                <input type="text" name="nome"  class = "form-control" value="<?php echo e($item->nome); ?>">
                <?php echo e(Form::label('descricao', 'Descrição')); ?>

                
                <textarea name="descricao" class = "form-control" ><?php echo e($item->descricao); ?></textarea>
            </div>

                <?php echo e(Form::submit('Editar', array('class' => 'btn btn-primary'))); ?>

                <?php echo e(Form::close()); ?>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!--Footer-->
        </div>
        <!-- /.box-footer-->
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andrereis\projetos\workspace\feedback\resources\views/item/item_edit.blade.php ENDPATH**/ ?>
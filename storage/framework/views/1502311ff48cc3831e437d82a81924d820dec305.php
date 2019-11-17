<?php $__env->startSection('title', 'Mudar senha'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Mudar senha</h1>
<ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i> Mudar senha</a></li>
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
            <h3 class="box-title">Editar - <?php echo e($user->name); ?></h3>
        </div>
        <div class="box-body">
            <!-- if there are creation errors, they will show here -->
            <!--<?php echo e(Html::ul($errors->all())); ?> -->
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

            <?php echo e(Form::model($user, array('route' => array('self_update_password'), 'method' => 'PUT'))); ?>


            <div class="form-group">
                <?php echo e(Form::label('password_old', 'Senha Antiga')); ?>

                <?php echo e(Form::password('password_old', array('class' => 'form-control'))); ?>


                <?php echo e(Form::label('password_new', 'Senha Nova')); ?>

                <?php echo e(Form::password('password_new', array('class' => 'form-control'))); ?>

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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andrereis\projetos\workspace\feedback\resources\views/users/users_self_edit_password.blade.php ENDPATH**/ ?>
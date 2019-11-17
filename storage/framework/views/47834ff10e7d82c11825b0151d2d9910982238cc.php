<?php $__env->startSection('title', 'Usuário'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Usuário - Editar</h1>
<ol class="breadcrumb">
    <li><a href="<?php echo e(route('user.index')); ?>"><i class="fa fa-dashboard"></i> Usuário</a></li>
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
            <h3 class="box-title">Editar - <?php echo e($user->name); ?></h3>
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
                <?php echo e(Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT'))); ?>

            <div class="form-group">
                <?php echo e(Form::label('name', 'Nome')); ?>

                <?php echo e(Form::text('name', null, array('class' => 'form-control'))); ?>


                <?php echo e(Form::label('email', 'E-mail')); ?>

                <?php echo e(Form::text('email', null, array('class' => 'form-control'))); ?>

                
                <?php echo e(Form::label('password', 'Senha')); ?>

                
                <input type="password" name="password" class="form-control"> <!--placeholder="Password"-->

                <?php echo e(Form::label('confirm-password', 'Confirmar a senha')); ?>

                
                <input type="password" name="confirm-password" class="form-control"> <!--placeholder="Password"-->

                <br>
                
                <?php echo e(Form::label('perfil', 'Perfil')); ?>

                <?php echo e(Form::select('perfil', $perfis, null, array('class' => 'form-control'))); ?>

                
                <?php echo e(Form::label('status', 'Status:')); ?>

                <?php echo e(Form::radio('status', 1, true, ['class' => 'field'])); ?><label>ATIVO</label>
                <?php echo e(Form::radio('status', 0, false, ['class' => 'field'])); ?><label>INATIVO</label>

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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andrereis\projetos\workspace\feedback\resources\views/users/users_edit.blade.php ENDPATH**/ ?>
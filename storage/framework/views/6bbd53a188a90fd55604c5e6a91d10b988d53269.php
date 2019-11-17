<?php $__env->startSection('title', 'Usuário'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Usuário - Visualizar</h1>
<ol class="breadcrumb">
    <li><a href="<?php echo e(route('user.index')); ?>"><i class="fa fa-dashboard"></i> Usuário</a></li>
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
            <h3 class="box-title"><?php echo e($user->title); ?></h3>
        </div>
        <div class="box-body">
            <strong>Nome:</strong> <?php echo e($user->name); ?><br>
            <strong>E-mail:</strong> <?php echo e($user->email); ?><br>
            <strong>Perfil:</strong> <?php echo e($user->perfil); ?><br>
            <strong>Status:</strong>
                <?php if($user->status === 1): ?>
                    Ativo<br>
                <?php else: ?>
                    Inativo<br>
                <?php endif; ?>
                <strong>Criação:</strong> <?php echo e($user->created_at); ?><br>
                <strong>Atualização:</strong> <?php echo e($user->updated_at); ?><br>
            </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!--Footer-->
        </div>
        <!-- /.box-footer-->
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andrereis\projetos\workspace\feedback\resources\views/users/users_show.blade.php ENDPATH**/ ?>
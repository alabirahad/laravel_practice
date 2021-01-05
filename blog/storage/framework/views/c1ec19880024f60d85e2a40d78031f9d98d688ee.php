<?php $__env->startSection('content'); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo"><?php echo app('translator')->get('eng.REGISTRATION'); ?></a>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="now-ui-icons ui-1_zoom-bold"></i>
                        </div>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#pablo">
                        <i class="now-ui-icons media-2_sound-wave"></i>
                        <p>
                            <span class="d-lg-none d-md-block"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <ul class="navbar-nav ml-auto">
                        <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                        </li>
                        <?php if(Route::has('register')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre">
                               <i class="now-ui-icons users_single-02"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title"><?php echo app('translator')->get('eng.REGISTRATION_FORM'); ?></h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php endif; ?>
                    <?php echo Form::open(['url' => url('users/'.$users->id),'method' => 'patch','enctype' => 'multipart/form-data']); ?>

                    <?php echo method_field('PATCH'); ?>
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <!--<?php echo Form::hidden('id', $users->id); ?>-->
                         <div class="col-md-12">
                            <div class="form-group">
                                <?php echo Form::label('userGroup', __('eng.USER_GROUP')); ?>*
                                <?php echo Form::select('userGroup', $userGroupList, $users->user_group, ['class' => 'form-control','placeholder' =>  __('eng.PICK_USER_GROUP')]); ?>

                                <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo Form::label('course_id', __('eng.COURSE')); ?>*
                                <?php echo Form::select('course_id', $courseList, $users->course_id, ['class' => 'form-control','placeholder' =>  __('eng.PICK_COURSE')]); ?>

                                <span class="text-danger"><?php echo e($errors->first('course_id')); ?></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo Form::label('name', __('eng.NAME'));; ?>*
                                <?php echo Form::text('name',$users->name, ['class' => 'form-control','placeholder' => __('eng.ENTER_NAME')]);; ?>

                                <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo Form::label('username', __('eng.USERNAME'));; ?>*
                                <?php echo Form::text('username',$users->username, ['class' => 'form-control','placeholder' => __('eng.ENTER_USERNAME')]);; ?>

                                <span class="text-danger"><?php echo e($errors->first('username')); ?></span>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <?php echo Form::label('email', __('eng.EMAIL'));; ?>*
                                <?php echo Form::email('email',$users->email, ['class' => 'form-control','placeholder' => __('eng.ENTER_EMAIL')]);; ?>

                                <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo Form::label('number', __('eng.PHONE'));; ?>

                                <?php echo Form::text('number',$users->number, ['class' => 'form-control','placeholder' =>__('eng.ENTER_PHONE') ]);; ?>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo Form::label('designation', __('eng.DESIGNATION'));; ?>

                                <?php echo Form::text('designation',$users->designation, ['class' => 'form-control','placeholder' => __('eng.ENTER_DESIGNATION')]);; ?>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo Form::label('status', __('eng.STATUS'));; ?>

                                <?php echo Form::select('status', ['1' => 'Active', '2' => 'Inactive'] , $users->status);; ?>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo Form::label('photo', __('eng.PHOTO')); ?>

                                <?php echo Form::file('photo',['class'=>'form-control']); ?>

                                <?php echo Form::label('photo', __('eng.PRE_PHOTO')); ?>

                                <img src="<?php echo e(URL::to(asset('public/uploads/users/'.$users->photo))); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo Form::label('address', __('eng.ADDRESS'));; ?>

                                <?php echo Form::text('address',$users->address, ['class' => 'form-control','placeholder' => __('eng.ENTER_ADDRESS')]);; ?>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <?php echo Form::label('city', __('eng.CITY'));; ?>

                                <?php echo Form::text('city',$users->city, ['class' => 'form-control','placeholder' => __('eng.ENTER_CITY')]);; ?>

                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <?php echo Form::label('country', __('eng.COUNTRY'));; ?>

                                <?php echo Form::text('country',$users->country, ['class' => 'form-control','placeholder' => __('eng.ENTER_COUNTRY')]);; ?>

                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <?php echo Form::label('postalcode', __('eng.POSTAL_CODE'));; ?>

                                <?php echo Form::text('postalcode',$users->postalcode, ['class' => 'form-control','placeholder' => __('eng.ENTER_POSTAL_CODE')]);; ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <?php echo Form::submit(__('eng.UPDATE'), ['class' => 'btn btn-primary'] ); ?>

                            </div>
                        </div>
                        <div class="col-md-6 text-left">
                            <a href="<?php echo e(url('users')); ?>" class="btn btn-danger">
                                <?php echo app('translator')->get('eng.BACK_USER_TABLE'); ?>
                            </a>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\blog\resources\views/user/update.blade.php ENDPATH**/ ?>
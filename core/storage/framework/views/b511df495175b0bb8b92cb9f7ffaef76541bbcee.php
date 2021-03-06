<?php $__env->startPush('styles'); ?>
  <style media="screen">
    h3 {
      margin: 0px;
    }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1>SOCIAL SETTING</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">

          <div class="tile">
            <div class="row">

              <div class="col-md-12">
                <?php if($errors->any()): ?>
                   <div class="alert alert-danger">
                       <ul>
                           <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <li><?php echo e($error); ?></li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </ul>
                   </div>
               <?php endif; ?>
                <div class="card">
                  <div class="card-body">
                    <div class="">
                      <a href="https://fontawesome.com/icons?d=gallery" class="btn btn-primary float-left" target="_blank">Font awesome icons</a>
                      <p class="mb-2" style="clear:both; margin: 0px;"></p>
                    </div>
                    <form class="" action="<?php echo e(route('admin.social.store')); ?>" method="post">
                      <?php echo e(csrf_field()); ?>

                      <div class="row">
                        <div class="col-md-4">
                          <label for="">FONT AWESOME ICON CODE</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">fa fa-</span>
                            </div>
                            <input type="text" name="icon" class="form-control" placeholder="font awesome icon code" aria-label="Username" aria-describedby="basic-addon1">
                          </div>
                        </div>
                        <div class="col-md-8">
                          <label for="">URL</label>
                          <input type="text" name="title" class="form-control" placeholder="social link">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-info btn-block btn-lg">SUBMIT</button>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
              <div class="col-md-12" style="margin-top:20px;">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h5 style="color:white;margin:0px;"><i class="fa fa-list"></i> SOCIAL LIST</h5>
                  </div>
                  <div class="card-body">
                    <?php if(count($socials) == 0): ?>
                      <h3 class="text-center">NO SOCIAL LINKS FOUND</h3>
                    <?php else: ?>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">ICON</th>
                            <th scope="col">URL</th>
                            <th scope="col">DELETE</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $i=0;
                          ?>
                          <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <th scope="row"><?php echo e(++$i); ?></th>
                              <td><i class="fab fa-<?php echo e($social->fontawesome_code); ?>"></i></td>
                              <td><?php echo e($social->url); ?></td>
                              <td>
                               <button type="button" class="btn btn-danger btn-sm delete_button" data-toggle="modal" data-target="#DelModal<?php echo e($social->id); ?>">
                               <i class="fa fa-times"></i> DELETE
                               </button>
                              </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="DelModal<?php echo e($social->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <h4 class="text-center">Are you sure you want delete this?</h4>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                    <form style="display:inline-block;" class="" action="<?php echo e(route('admin.social.delete')); ?>" method="post">
                                      <?php echo e(csrf_field()); ?>

                                      <input type="hidden" name="socialID" value="<?php echo e($social->id); ?>">
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
     </div>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
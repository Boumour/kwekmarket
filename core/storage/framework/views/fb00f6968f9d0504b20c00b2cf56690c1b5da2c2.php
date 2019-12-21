<?php $__env->startSection('content'); ?>
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1>Banned Users Management</h1>
        </div>
     </div>
     <div class="row">
        <div class="col-md-12">
          <?php if(count($bannedUsers) == 0): ?>
            <div class="tile">
              <h3 class="tile-title float-left">Banned Users List</h3>
              <div class="float-right icon-btn">
                <form method="GET" class="form-inline" action="<?php echo e(route('admin.bannedUsersSearchResult')); ?>">
                   <input type="text" name="term" class="form-control" placeholder="Search by username">
                   <button class="btn btn-outline btn-circle  green" type="submit"><i
                      class="fa fa-search"></i></button>
                </form>
              </div>
              <p style="clear:both;margin:0px;"></p>
              <h2 class="text-center">NO BANNED USERS FOUND</h2>
            </div>
          <?php else: ?>
            <div class="tile">
               <h3 class="tile-title float-left">Banned Users List</h3>
               <div class="float-right icon-btn">
                 <form method="GET" class="form-inline" action="<?php echo e(route('admin.bannedUsersSearchResult')); ?>">
                    <input type="text" name="term" class="form-control" placeholder="Search by username">
                    <button class="btn btn-outline btn-circle  green" type="submit"><i
                       class="fa fa-search"></i></button>
                 </form>
               </div>
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">Name</th>
                           <th scope="col">Email</th>
                           <th scope="col">Username</th>
                           <th scope="col">Mobile</th>
                           <th scope="col">Details</th>
                        </tr>
                     </thead>
                     <tbody>
                       <?php $__currentLoopData = $bannedUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bannedUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                            <td data-label="Name"><?php echo e($bannedUser->first_name); ?></td>
                            <td data-label="Email"><?php echo e($bannedUser->email); ?></td>
                            <td data-label="Username"><a target="_blank" href="<?php echo e(route('admin.userDetails', $bannedUser->id)); ?>"><?php echo e($bannedUser->username); ?></a></td>
                            <td data-label="Mobile"><?php echo e($bannedUser->phone); ?></td>
                            <td  data-label="Details">
                               <a href="<?php echo e(route('admin.userDetails', $bannedUser->id)); ?>"
                                  class="btn btn-outline-primary ">
                               <i class="fa fa-eye"></i> View </a>
                            </td>
                         </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                  </table>
               </div>
               <div class="text-center">
                 <?php echo e($bannedUsers->appends(['term' => $term])->links()); ?>

               </div>
            </div>
          <?php endif; ?>
        </div>
     </div>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
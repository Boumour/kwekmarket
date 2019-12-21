<?php $__env->startPush('styles'); ?>
  <style media="screen">
    a.info {
      text-decoration: none;
    }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1>Dashboard</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-lg-4">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
          <a class="info" href="<?php echo e(route('admin.allUsers')); ?>">
            <h4>TOTAL USERS</h4>
            <p><b><?php echo e(\App\User::count()); ?></b></p>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-times fa-3x"></i>
          <a class="info" href="<?php echo e(route('admin.bannedUsers')); ?>">
            <h4>BANNED USERS</h4>
            <p><b><?php echo e(\App\User::where('status', 'blocked')->count()); ?></b></p>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="widget-small warning coloured-icon"><i class="icon fa fa-check fa-3x"></i>
          <a class="info" href="<?php echo e(route('admin.verifiedUsers')); ?>">
            <h4>VERIFIED USERS</h4>
            <p><b><?php echo e(\App\User::where('email_verified', 1)->where('sms_verified', 1)->count()); ?></b></p>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-4">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-mobile fa-3x"></i>
          <a class="info" href="<?php echo e(route('admin.mobileUnverifiedUsers')); ?>">
            <h4>MOBILE UNVERIFIED USERS</h4>
            <p><b><?php echo e(\App\User::where('sms_verified', 0)->count()); ?></b></p>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-envelope fa-3x"></i>
          <a class="info" href="<?php echo e(route('admin.emailUnverifiedUsers')); ?>">
            <h4>EMAIL UNVERIFIED USERS</h4>
            <p><b><?php echo e(\App\User::where('email_verified', 0)->count()); ?></b></p>
          </a>
        </div>
      </div>

    </div>
    <div class="row">
           <div class="col-md-12">
               <div class="tile">
                   <h3 class="tile-title">Product Upload Chart (Monthly)</h3>
                   <div class="embed-responsive embed-responsive-16by9">
                       <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                   </div>
               </div>
           </div>
       </div>
  </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <script type="text/javascript">
         var d = <?php echo json_encode($month); ?>;
         var m =  <?php echo json_encode($sold); ?>;
         var data = {
             labels: d,
             datasets: [
                 {
                     label: "My First dataset",
                     fillColor: "rgba(47, 79, 79,0.2)",
                     strokeColor: "rgba(47, 79, 79,1)",
                     pointColor: "rgba(47, 79, 79,1)",
                     pointStrokeColor: "#fff",
                     pointHighlightFill: "#fff",
                     pointHighlightStroke: "rgba(220,220,220,1)",
                     data: m
                 }
             ]
         };


         var ctxl = $("#lineChartDemo").get(0).getContext("2d");
         var lineChart = new Chart(ctxl).Line(data);

     </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
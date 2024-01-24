<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            
          
            
            <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Income</p>
                    <h5 class="font-weight-bolder mb-0">
                    <sup class="font-medium-1"><?= $currency ?></sup>
                                                <span class="text-success"  style="margin-right: 30px"><?= number_format($totalamount / 100, 2, ".", ".") ?></span>
                      
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Users</p>
                    <h5 class="font-weight-bolder mb-0">
                   <?= count($users); ?>
                      <span class="text-success text-sm font-weight-bolder">+3%</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Match Users</p>
                    <h5 class="font-weight-bolder mb-0">
                   <?= count($match); ?>
                      <span class="text-danger text-sm font-weight-bolder">-2%</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Vip users</p>
                    <h5 class="font-weight-bolder mb-0">
                    <?= $vip; ?>
                      <span class="text-success text-sm font-weight-bolder">+5%</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
<br>
   <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Paypal earning</p>
                    <h5 class="font-weight-bolder mb-0">
                   <sup class="font-medium-1"><?= $currency ?></sup>
                                                <span style="margin-right: 30px"><?= number_format($totalpaypal / 100, 2, ".", ".") ?></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Stripe earning</p>
                    <h5 class="font-weight-bolder mb-0">
                   <sup class="font-medium-1"><?= $currency ?></sup>
                <span style="margin-right: 30px"><?= number_format($totalstripe / 100, 2, ".", ".") ?></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Razorpay earning</p>
                    <h5 class="font-weight-bolder mb-0">
                   <sup class="font-medium-1"><?= $currency ?></sup>
                   <span style="margin-right: 30px"><?= number_format($totalrazorpay / 100, 2, ".", ".") ?></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Flutterwave Earning</p>
                    <h5 class="font-weight-bolder mb-0">
                        <sup class="font-medium-1"><?= $currency ?></sup>
                        
                                                <span style="margin-right: 30px"><?= number_format($totalflutterwave / 100, 2, ".", ".") ?></span>
                        
                  
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <br>
    
    <!-- start chart -->
    <div class="row">
        <!-- <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Mountly Transaction</h6>
                    <p class="card-description">Products that are creating the most revenue and
                        their sales throughout the year and the variation in behavior of sales.</p>
                    <div id="js-legend" class="chartjs-legend mt-4 mb-5"></div>
                    <div class="demo-chart">
                        <canvas id="salesChart" ></canvas>
                    </div>
                </div>
            </div>
        </div> -->
        
       
        
    </div>

    <div class="row">
        <!-- <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Mountly Transaction Merchant</h6>
                    <p class="card-description">Products that are creating the most revenue and
                        their sales throughout the year and the variation in behavior of sales.</p>
                    <div id="js-legend2" class="chartjs-legend mt-4 mb-5"></div>
                    <div class="demo-chart">
                        <canvas id="merchantChart"></canvas>
                    </div>
                </div>
            </div>
        </div> -->

    </div>
    <!-- end of chart -->
    <!-- start latest Transaction -->


    <!-- end of latest transaction -->
  </div>
</div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <!-- Dashboard Analytics Start -->
           
               
                </div>

            </section>
            <!-- Dashboard Analytics end -->

            <!-- Basic tabs start -->
            
           
            <section id="basic-tabs-components">
                <div class="row">
                    <div class="col">
                        <div class="card overflow-hidden">
                            
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center active" id="allactivity-tab" data-toggle="tab" href="#allactivity" aria-controls="allactivity" role="tab" aria-selected="true">
                                                <i class="feather icon-activity mr-25"></i>
                                                <span class="d-none d-sm-block text-center">All Activity</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="matchactivity-tab" data-toggle="tab" href="#matchactivity" aria-controls="macthactivity" role="tab" aria-selected="false">
                                                <i class="fa fa-exchange mr-25"></i>
                                                <span class="d-none d-sm-block text-center">Match Activity</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="likeactivity-tab" data-toggle="tab" href="#likeactivity" aria-controls="likeactivity" role="tab" aria-selected="false">
                                                <i class="fa fa-heart mr-25"></i>
                                                <span class="d-none d-sm-block text-center">Like Activity</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="visitactivity-tab" data-toggle="tab" href="#visitactivity" aria-controls="visitactivity" role="tab" aria-selected="false">
                                                <i class="fa fa-eye mr-25"></i>
                                                <span class="d-none d-sm-block text-center">Visit Activity</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="allactivity" aria-labelledby="allactivity-tab" role="tabpanel">
                                            <!-- Add rows table -->
                                            <section id="add-row">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">All Activity</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table add-rows">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No.</th>
                                                                                    <th style="width: 50px;">User</th>
                                                                                    <th></th>
                                                                                    <th class="text-center">Type</th>
                                                                                    <th class="text-right"></th>
                                                                                    <th style="width: 50px;">User</th>
                                                                                    <th class="text-center">Date</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $i = 1;
                                                                                foreach ($activity as $mc) { ?>
                                                                                    <tr>
                                                                                        <th><?= $i ?></th>
                                                                                        <th>
                                                                                            <div class="avatar mr-25"><img href="<?= base_url(); ?>user/detailusers/<?= $mc['userid1'] ?>" src="<?= base_url(); ?>images/users/<?= $mc['userimage1']; ?>" alt="avtar img holder" height="45" width="45">
                                                                                            </div>
                                                                                        </th>
                                                                                        <th><span class="text-left"><?= $mc['namauser1']; ?></span></th>
                                                                                        <th class="text-center">
                                                                                            <?php if ($mc['status1'] == 'like') { ?>
                                                                                                <h1 class="badge badge-success text-center"><?= $mc['status1']; ?></h1>
                                                                                            <?php } elseif ($mc['status1'] == 'visitor') { ?>
                                                                                                <h1 class="badge badge-warning text-center"><?= $mc['status1']; ?></h1>
                                                                                            <?php } elseif ($mc['status1'] == 'match') { ?>
                                                                                                <h1 class="badge badge-primary text-center"><?= $mc['status1']; ?></h1>
                                                                                            <?php } ?>

                                                                                        </th>
                                                                                        <th class="text-right"><span class="text-right"><?= $mc['namauser2']; ?></span></th>
                                                                                        <th>
                                                                                            <div class="avatar mr-25"><img href="<?= base_url(); ?>user/detailusers/<?= $mc['userid2'] ?>" src="<?= base_url(); ?>images/users/<?= $mc['userimage2']; ?>" alt="avtar img holder" height="45" width="45">
                                                                                            </div>
                                                                                        </th>
                                                                                        <th class="text-center">
                                                                                            <?= $mc['datem']; ?>
                                                                                        </th>
                                                                                    </tr>
                                                                                <?php $i++;
                                                                                } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!--/ Add rows table -->
                                        </div>
                                        <div class="tab-pane" id="matchactivity" aria-labelledby="matchactivity-tab" role="tabpanel">
                                            <!-- Add rows table -->
                                            <section id="add-row">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Match Activity</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table add-rows">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No.</th>
                                                                                    <th style="width: 50px;">User</th>
                                                                                    <th></th>
                                                                                    <th class="text-center">Type</th>
                                                                                    <th class="text-right"></th>
                                                                                    <th style="width: 50px;">User</th>
                                                                                    <th class="text-center">Date</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $i = 1;
                                                                                foreach ($match as $mc) { ?>
                                                                                    <tr>
                                                                                        <th><?= $i ?></th>
                                                                                        <th class="justify-content-center">
                                                                                            <div class="avatar mr-25"><img src="<?= base_url(); ?>images/users/<?= $mc['userimage1']; ?>" alt="avtar img holder" height="45" width="45">
                                                                                            </div>
                                                                                        </th>
                                                                                        <th><span class="text-left"><?= $mc['namauser1']; ?></span></th>
                                                                                        <th class="text-center">
                                                                                            <h1 class="badge badge-primary text-center">Match</h1>
                                                                                        </th>
                                                                                        <th class="text-right"><span class="text-right"><?= $mc['namauser2']; ?></span></th>
                                                                                        <th>
                                                                                            <div class="avatar mr-25"><img src="<?= base_url(); ?>images/users/<?= $mc['userimage2']; ?>" alt="avtar img holder" height="45" width="45">
                                                                                            </div>
                                                                                        </th>
                                                                                        <th class="text-center">
                                                                                            <?= $mc['datem']; ?>
                                                                                        </th>
                                                                                    </tr>
                                                                                <?php $i++;
                                                                                } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!--/ Add rows table -->
                                        </div>
                                        <div class="tab-pane" id="likeactivity" aria-labelledby="likeactivity-tab" role="tabpanel">
                                            <!-- Add rows table -->
                                            <section id="add-row">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Like Activity</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table add-rows">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No.</th>
                                                                                    <th style="width: 50px;">User</th>
                                                                                    <th></th>
                                                                                    <th class="text-center">Type</th>
                                                                                    <th class="text-right"></th>
                                                                                    <th style="width: 50px;">User</th>
                                                                                    <th class="text-center">Date</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $i = 1;
                                                                                foreach ($like as $lk) { ?>
                                                                                    <tr>
                                                                                        <th><?= $i ?></th>
                                                                                        <th class="justify-content-center">
                                                                                            <div class="avatar mr-25"><img src="<?= base_url(); ?>images/users/<?= $lk['userimage1']; ?>" alt="avtar img holder" height="45" width="45">
                                                                                            </div>
                                                                                        </th>
                                                                                        <th><span class="text-left"><?= $lk['namauser1']; ?></span></th>
                                                                                        <th class="text-center">
                                                                                            <h1 class="badge badge-success text-center">Like</h1>
                                                                                        </th>
                                                                                        <th class="text-right"><span class="text-right"><?= $lk['namauser2']; ?></span></th>
                                                                                        <th>
                                                                                            <div class="avatar mr-25"><img src="<?= base_url(); ?>images/users/<?= $lk['userimage2']; ?>" alt="avtar img holder" height="45" width="45">
                                                                                            </div>
                                                                                        </th>
                                                                                        <th class="text-center">
                                                                                            <?= $lk['datem']; ?>
                                                                                        </th>
                                                                                    </tr>
                                                                                <?php $i++;
                                                                                } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!--/ Add rows table -->
                                        </div>
                                        <div class="tab-pane" id="visitactivity" aria-labelledby="visitactivity-tab" role="tabpanel">
                                            <!-- Add rows table -->
                                            <section id="add-row">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Visit Activity</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table add-rows">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No.</th>
                                                                                    <th style="width: 50px;">User</th>
                                                                                    <th></th>
                                                                                    <th class="text-center">Type</th>
                                                                                    <th class="text-right"></th>
                                                                                    <th style="width: 50px;">User</th>
                                                                                    <th class="text-center">Date</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $i = 1;
                                                                                foreach ($visit as $vst) { ?>
                                                                                    <tr>
                                                                                        <th><?= $i ?></th>
                                                                                        <th class="justify-content-center">
                                                                                            <div class="avatar mr-25"><img src="<?= base_url(); ?>images/users/<?= $vst['userimage1']; ?>" alt="avtar img holder" height="45" width="45">
                                                                                            </div>
                                                                                        </th>
                                                                                        <th><span class="text-left"><?= $vst['namauser1']; ?></span></th>
                                                                                        <th class="text-center">
                                                                                            <h1 class="badge badge-warning text-center">Visit</h1>
                                                                                        </th>
                                                                                        <th class="text-right"><span class="text-right"><?= $vst['namauser2']; ?></span></th>
                                                                                        <th>
                                                                                            <div class="avatar mr-25"><img src="<?= base_url(); ?>images/users/<?= $vst['userimage2']; ?>" alt="avtar img holder" height="45" width="45">
                                                                                            </div>
                                                                                        </th>
                                                                                        <th class="text-center">
                                                                                            <?= $vst['datev']; ?>
                                                                                        </th>
                                                                                    </tr>
                                                                                <?php $i++;
                                                                                } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!--/ Add rows table -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- Basic Tag Input end -->

        </div>

    </div>
</div>
</div>
<!-- END: Content-->
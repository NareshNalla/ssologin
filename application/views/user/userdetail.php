<!-- BEGIN: Content-->
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body"> 
                <div id="user-profile">
                                        <div class="col-lg-6 col-12">
                                <div class="">
                                        
                                
                                <div class="card-body pr-5 pl-5">
                            <div class="row">
                        <div class="col-12">
                            <div class="profile-header mb-2">
                                <div class="relative">
                                    <div class="cover-container d-flex align-items-center justify-content-center">
                                        <img  class="rounded-circle img-border box-shadow-1" alt="Card image" style="height: 400px; width: 400px;" src="<?= base_url(); ?>images/users/<?= $users['userimage']; ?>" >
                                    </div>
                                    <div class="profile-img-container d-flex align-items-center justify-content-center">
                                    <?php if ($vip == 1) { ?>
                                        <img src="<?= base_url(); ?>images/icon/badge.svg" class="rounded-circle img-border box-shadow-1" alt="Card image">
                                                <?php } ?>
                                    </div>
                                </div>
                                
                                <div class="mb-5">
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                <h5 class="card-title"><?= $users['fullname']; ?>
                                    </h5>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <br>

                                <div class="overflow-hidden">
                        
                            <div class="card-content">

                                <div class="card-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                            <a
                                                class="nav-link active"
                                                id="usermatched-tab"
                                                data-toggle="tab"
                                                href="#usermatched"
                                                aria-controls="usermatched"
                                                role="tab"
                                                aria-selected="false">User Matched</a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link"
                                                id="userliked-tab"
                                                data-toggle="tab"
                                                href="#userliked"
                                                aria-controls="userliked"
                                                role="tab"
                                                aria-selected="false">User Liked</a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link"
                                                id="uservisited-tab"
                                                data-toggle="tab"
                                                href="#uservisited"
                                                aria-controls="uservisited"
                                                role="tab"
                                                aria-selected="false">User Visited</a>
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link"
                                                id="usersubs-tab"
                                                data-toggle="tab"
                                                href="#usersubs"
                                                aria-controls="usersubs"
                                                role="tab"
                                                aria-selected="false">User Subscription</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">

                                    <div
                                            class="tab-pane active"
                                            id="usermatched"
                                            aria-labelledby="usermatched-tab"
                                            role="tabpanel">
                                            <!-- Add rows table -->

                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">User Matched</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table add-rows">
                                                                <thead>
                                                                    <tr>
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
                                                                            foreach ($match as $mc) { ?>
                                                                    <tr>
                                                                    <th>
                                                                                        <div class="avatar mr-25"><img
                                                                                            href="<?= base_url(); ?>user/detailusers/<?= $mc['userid1'] ?>"
                                                                                            src="<?= base_url(); ?>images/users/<?= $mc['userimage1']; ?>"
                                                                                            alt="avtar img holder"
                                                                                            height="45"
                                                                                            width="45">
                                                                                        </div>
                                                                                    </th>
                                                                                    <th><span class="text-left"><?= $mc['namauser1']; ?></span></th>
                                                                                    <th class="text-center">
                                                                                    <h1 class="badge badge-primary text-center">matched</h1>
                                                                                    </th>
                                                                                    <th class="text-right"><span class="text-right"><?= $mc['namauser2']; ?></span></th>
                                                                                    <th>
                                                                                        <div class="avatar mr-25"><img
                                                                                            href="<?= base_url(); ?>user/detailusers/<?= $mc['userid2'] ?>"
                                                                                            src="<?= base_url(); ?>images/users/<?= $mc['userimage2']; ?>"
                                                                                            alt="avtar img holder"
                                                                                            height="45"
                                                                                            width="45">
                                                                                        </div>
                                                                                    </th>
                                                                        <th class="text-center">
                                                                        <?= $mc['created']; ?>
                                                                        </th>
                                                                    </tr>
                                                                    <?php }?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div
                                            class="tab-pane"
                                            id="userliked"
                                            aria-labelledby="userliked-tab"
                                            role="tabpanel">
                                            <!-- Add rows table -->

                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">User Liked</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table add-rows">
                                                                <thead>
                                                                    <tr>
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
                                                                            foreach ($like as $lk) { ?>
                                                                    <tr>
                                                                    <th>
                                                                                        <div class="avatar mr-25"><img
                                                                                            href="<?= base_url(); ?>user/detailusers/<?= $lk['userid1'] ?>"
                                                                                            src="<?= base_url(); ?>images/users/<?= $lk['userimage1']; ?>"
                                                                                            alt="avtar img holder"
                                                                                            height="45"
                                                                                            width="45">
                                                                                        </div>
                                                                                    </th>
                                                                                    <th><span class="text-left"><?= $lk['namauser1']; ?></span></th>
                                                                                    <th class="text-center">
                                                                                    <h1 class="badge badge-success text-center">liked</h1>
                                                                                    </th>
                                                                                    <th class="text-right"><span class="text-right"><?= $lk['namauser2']; ?></span></th>
                                                                                    <th>
                                                                                        <div class="avatar mr-25"><img
                                                                                            href="<?= base_url(); ?>user/detailusers/<?= $lk['userid2'] ?>"
                                                                                            src="<?= base_url(); ?>images/users/<?= $lk['userimage2']; ?>"
                                                                                            alt="avtar img holder"
                                                                                            height="45"
                                                                                            width="45">
                                                                                        </div>
                                                                                    </th>
                                                                        <th class="text-center">
                                                                        <?= $lk['created']; ?>
                                                                        </th>
                                                                    </tr>
                                                                    <?php }?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div
                                            class="tab-pane"
                                            id="uservisited"
                                            aria-labelledby="uservisited-tab"
                                            role="tabpanel">
                                            <!-- Add rows table -->

                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">User Visited</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table add-rows">
                                                                <thead>
                                                                    <tr>
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
                                                                            foreach ($visit as $vst) { ?>
                                                                    <tr>
                                                                    <th>
                                                                                        <div class="avatar mr-25"><img
                                                                                            href="<?= base_url(); ?>user/detailusers/<?= $vst['userid1'] ?>"
                                                                                            src="<?= base_url(); ?>images/users/<?= $vst['userimage1']; ?>"
                                                                                            alt="avtar img holder"
                                                                                            height="45"
                                                                                            width="45">
                                                                                        </div>
                                                                                    </th>
                                                                                    <th><span class="text-left"><?= $vst['namauser1']; ?></span></th>
                                                                                    <th class="text-center">
                                                                                    <h1 class="badge badge-warning text-center">Visited</h1>
                                                                                    </th>
                                                                                    <th class="text-right"><span class="text-right"><?= $vst['namauser2']; ?></span></th>
                                                                                    <th>
                                                                                        <div class="avatar mr-25"><img
                                                                                            href="<?= base_url(); ?>user/detailusers/<?= $vst['userid2'] ?>"
                                                                                            src="<?= base_url(); ?>images/users/<?= $vst['userimage2']; ?>"
                                                                                            alt="avtar img holder"
                                                                                            height="45"
                                                                                            width="45">
                                                                                        </div>
                                                                                    </th>
                                                                        <th class="text-center">
                                                                        <?= $vst['created']; ?>
                                                                        </th>
                                                                    </tr>
                                                                    <?php }?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div
                                            class="tab-pane"
                                            id="usersubs"
                                            aria-labelledby="usersubs-tab"
                                            role="tabpanel">
                                            <!-- Add rows table -->

                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">User Subscription</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table add-rows">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>INV</th>
                                                                        <th>Amount</th>
                                                                        <th>Purchase Date</th>
                                                                        <th>Expired</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i = 1;
                                                                                foreach ($purchase as $prc) { 
                                                                                if ($prc['status'] == 1) { ?>
                                                                                <tr>
                                                                                    <th><?= $i ?></th>
                                                                                    <th><?= $prc['invoice'] ?></th>
                                                                                    <th>
                                                                                    <?= $currency ?>
                                                                                    <?= number_format($prc['amount'] / 100, 2, ".", ".") ?>
                                                                                    </th>
                                                                                    <th><?= $prc['created'] ?></th>
                                                                                    <th><?= $prc['expired'] ?></th>
                                                                                    <th>
                                                                                        <?php if ($prc['status'] == 1) { ?>
                                                                                            <h1 class="badge badge-success">Success</h1>
                                                                                        <?php } else { ?>
                                                                                            <h1 class="badge badge-danger">Failed</h1>
                                                                                        <?php } ?>
                                                                                    </th>
                                                                                </tr>
                                                                                <?php } $i++; } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <br>
                    <section id="profile-info">
                        <div class="row">
                            <div class="col-lg-5 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Main Info</h4>
                                        <a 
                                        data-toggle="modal"
                                        data-target="#maininfo">
                                        <i class="feather icon-edit cursor-pointer ml-1"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <p><?= $users['about']; ?></p>
                                        <div class="mt-1">
                                            <h6 class="mb-0">user Id:</h6>
                                            <p><?= $users['userid']; ?></p>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Name:</h6>
                                            <p><?= $users['fullname']; ?></p>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Gender:</h6>
                                            <p>
                                            <?php if ($users['gender'] == 'male') { ?>
                                                    Male
                                                <?php } else { ?>
                                                Female
                                                <?php } ?>
                                            </p>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Age:</h6>
                                            <p><?= $age ?></p>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Phone:</h6>
                                            <p><?= $users['country_code']; ?> <?= $users['phone_number']; ?></p>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Email:</h6>
                                            <p><?= $users['email']; ?></p>
                                        </div>
                                        <div class="mt-1">
                                            <button 
                                            type="button" 
                                            class="btn btn-icon btn-warning text-white mr-25 p-25"
                                            data-toggle="modal"
                                            data-target="#large1">
                                            <i class="feather icon-eye"></i> <?= $totalvisitor ?></button>

                                            <button 
                                            type="button" 
                                            class="btn btn-icon btn-success mr-25 p-25"
                                            data-toggle="modal"
                                            data-target="#large2">
                                            <i class="feather icon-heart"></i> <?= $totalliked ?></button>

                                            <button 
                                            type="button" 
                                            class="btn btn-icon btn-primary p-25"
                                            data-toggle="modal"data-target="#large3">
                                            <i class="feather icon-users"></i> <?= $totalmatch ?></button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card">
                                    <div class="card-content">
                                <div class="card-body">
                                    <h4 class="card-title">Gallery</h4>
                                    <a class="text-primary" data-toggle="modal" data-target="#xlarge">
                                        See All Gallery
                                    </a>
                                </div>
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <?php
                                    $i = 1;
                                                        foreach ($gallery as $glr) { 
                                                            if ( $i == 1) { ?>
                                        <div class="carousel-item active">
                                        <?php } else {?>
                                            <div class="carousel-item">
                                                <?php } ?>
                                                <img
                                                    src="<?= base_url(); ?>images/users/<?= $glr['imagename']; ?>"
                                                    class="d-block w-100"
                                                    alt="First slide"
                                                    style="width: 400px; height: 400px">
                                            </div>

                                            <?php if ($i++ == 3) break; }?>

                                        </div>
                                        <a
                                            class="carousel-control-prev"
                                            href="#carousel-example-generic"
                                            role="button"
                                            data-slide="prev">
                                            <span class="fa fa-angle-left icon-prev" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a
                                            class="carousel-control-next"
                                            href="#carousel-example-generic"
                                            role="button"
                                            data-slide="next">
                                            <span class="fa fa-angle-right icon-next" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <button
                                            type="button"
                                            class="btn btn-primary"
                                            data-toggle="modal"
                                            data-target="#large">
                                            Add Gallery
                                        </button>
                                    </div>
                                    <div class="modal-size-xl mr-1 mb-1 d-inline-block"></div>
                                </div>
                            </div>
                            </div>
                            
                              <div class="col-lg-5 col-12">
                            <div class="card">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Detail Info</h4>
                                        <a
                                        data-toggle="modal"
                                        data-target="#detailinfo"
                                        ><i class="feather icon-edit cursor-pointer ml-1"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <div class="mt-1">
                                            <h6 class="mb-0">Height:</h6>
                                            <p><?= $users['height']; ?> cm</p>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Weight:</h6>
                                            <p><?= $users['weight']; ?> cm</p>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Date of Birth:</h6>
                                            <p><?= $users['birthday']; ?></p>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Relationship:</h6>
                                            <p><?= $users['relationship']; ?></p>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Nation:</h6>
                                            <p><?= $users['nation']; ?></p>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Occupation:</h6>
                                            <p><?= $users['occupation']; ?></p>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Company:</h6>
                                            <p><?= $users['company']; ?></p>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Interesting:</h6>
                                            <p><?= $users['interesting']; ?></p>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Joined:</h6>
                                            <p><?= $users['created']; ?></p>
                                        </div>
                                    </div>
                                </div>
                           
                            
                            <br>


                            <input type="hidden" id="iduser" value="<?= $users['userid']; ?>"/>
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4 class="mb-0">User Match Meter</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body px-0 pb-0">
                                        <div id="goal-overview-chart" class="mt-75"></div>
                                        <div class="row text-center mx-0">
                                            <div class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                                                <p class="mb-50">Liked</p>
                                                <p class="font-large-1 text-bold-700"><?= $totallike ?></p>
                                            </div>
                                            <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                                                <p class="mb-50">Matched</p>
                                                <p class="font-large-1 text-bold-700"><?= $totalmatch ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                            
        
                            </div>

                          
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- edit profil main info-->
    <div
        class="modal fade text-left"
        id="maininfo"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Main Info</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pr-2 pl-2">

                    <section id="basic-vertical-layouts">
                        <?= form_open_multipart('user/editmaininfo'); ?>
                        <form class="form form-vertical">
                            <div class="form-body">
                                <div class="row">
                                    <!-- start edit main info form -->

                                    <input type="hidden" name="userid" value="<?= $users['userid']; ?>">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Profile Image</label>
                                            <input
                                                type="file"
                                                name="userimage"
                                                class="dropify"
                                                data-max-file-size="1mb"
                                                data-default-file="<?= base_url(); ?>images/users/<?= $users['userimage']; ?>"/>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="fullname">Name</label>
                                            <input
                                                type="text"
                                                id="fullname"
                                                class="form-control"
                                                name="fullname"
                                                placeholder="enter name"
                                                value="<?= $users['fullname']; ?>"
                                                required="required"></div>
                                    </div>

                                    <div class="col-12 form-group">
                                    <label for="gender">
                                        Gender
                                    </label>
                                    <select class="select2 form-control" id="data-gender" name="gender" required>
                                        <option value="male" <?php if ($users['gender'] == 'male') { ?>selected<?php } ?>>Male</option>
                                        <option value="female" <?php if ($users['gender'] == 'female') { ?>selected<?php } ?>>Female</option>
                                    </select>
                                </div>

                                    <div class="col-12">
                                        <label>Phone</label>

                                        <div class="row">

                                            <input type="hidden" name="userid" value="<?= $users['userid']; ?>">
                                            <input type="hidden" id="country" value="<?= $users['country_code']; ?>">

                                            <div class="form-group col-4">
                                                <input
                                                    type="tel"
                                                    id="txtPhone"
                                                    class="form-control"
                                                    name="country_code"
                                                    required="required">
                                            </div>
                                            <div class=" form-group col-8">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="phone_number"
                                                    placeholder="enter phone number"
                                                    value="<?= $users['phone_number']; ?>"
                                                    required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input
                                                type="email"
                                                id="email"
                                                class="form-control"
                                                name="email"
                                                placeholder="enter email"
                                                value="<?= $users['email']; ?>"
                                                required="required"></div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input
                                                type="password"
                                                id="password"
                                                class="form-control"
                                                name="password"
                                                placeholder="enter password"
                                                value="<?= $users['password']; ?>"
                                                required="required"></div>
                                    </div>

                                    <!-- end of edit main info form -->

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?= form_close(); ?>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- edit profil main info-->

    <!-- edit profil detail info-->
    <div
        class="modal fade text-left"
        id="detailinfo"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Detail Info</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pr-2 pl-2">

                    <section id="basic-vertical-layouts">
                        <?= form_open_multipart('user/editdetailinfo'); ?>
                        <form class="form form-vertical">
                            <div class="form-body">
                                <div class="row">
                                    <!-- start driver info form -->

                                    <input type="hidden" name="userid" value="<?= $users['userid']; ?>">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="height">Height</label>
                                            <input
                                                type="text"
                                                id="height"
                                                class="form-control"
                                                name="height"
                                                placeholder="enter height (cm)"
                                                value="<?= $users['height']; ?>"
                                                required="required"></div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="weight">Weight</label>
                                            <input
                                                type="text"
                                                id="weight"
                                                class="form-control"
                                                name="weight"
                                                placeholder="enter height (kg)"
                                                value="<?= $users['weight']; ?>"
                                                required="required"></div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="dateofbirth">Date Of Birth</label>
                                            <input
                                                type="date"
                                                id="dateofbirth"
                                                class="form-control"
                                                name="birthday"
                                                value="<?= $users['birthday'] ?>"
                                                required="required"></div>
                                    </div>

                                    <div class="col-12 form-group">
                                                    <label for="relationship">
                                                        Relationship
                                                    </label>
                                                    <select
                                                        class="select2 form-control"
                                                        name="relationship"
                                                        required="required">
                                                        <option value="Single" <?php if ($users['relationship'] == 'Single') { ?>selected<?php } ?>>Single</option>
                                                        <option value="In a Relationship" <?php if ($users['relationship'] == 'In a Relationship') { ?>selected<?php } ?>>In a Relationship</option>
                                                        <option value="Engaged" <?php if ($users['relationship'] == 'Engaged') { ?>selected<?php } ?>>Engaged</option>
                                                        <option value="Married" <?php if ($users['relationship'] == 'Married') { ?>selected<?php } ?>>Married</option>
                                                        <option value="Complicated" <?php if ($users['relationship'] == 'Complicated') { ?>selected<?php } ?>>Complicated</option>
                                                        <option value="Widow" <?php if ($users['relationship'] == 'Widow') { ?>selected<?php } ?>>Widow</option>
                                                        <option value="Widower" <?php if ($users['relationship'] == 'Widower') { ?>selected<?php } ?>>Widower</option>
                                                        <option value="Divorced" <?php if ($users['relationship'] == 'Divorced') { ?>selected<?php } ?>>Divorced</option>
                                                    </select>
                                                </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nation">Nation</label>
                                            <input
                                                type="text"
                                                id="nation"
                                                class="form-control"
                                                name="nation"
                                                placeholder="enter nation"
                                                value="<?= $users['nation']; ?>"
                                                required="required"></div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="occupation">Occupation</label>
                                            <input
                                                type="text"
                                                id="occupation"
                                                class="form-control"
                                                name="occupation"
                                                placeholder="enter occupation"
                                                value="<?= $users['occupation']; ?>"
                                                required="required"></div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="company">Company</label>
                                            <input
                                                type="text"
                                                id="company"
                                                class="form-control"
                                                name="company"
                                                placeholder="enter company"
                                                value="<?= $users['company']; ?>"
                                                required="required"></div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="interesting">Interesting</label>
                                            <input
                                                type="text"
                                                id="interesting"
                                                class="form-control"
                                                name="interesting"
                                                placeholder="ex: swiming, reading, dancing"
                                                value="<?= $users['interesting']; ?>"
                                                required="required"></div>
                                    </div>

                                    <div class="col-12">
                                    <div class="form-group">
                                        <label for="about">Bio</label>
                                        <fieldset class="form-group">
                                            <textarea class="form-control" id="basicTextarea" rows="3" name="about" required><?= $users['about'] ?></textarea>
                                        </fieldset>
                                    </div>
                                </div>

                                    <!-- end of driver info form -->

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?= form_close(); ?>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- edit profil detail info-->

    <!-- modal gallery -->
    <div
    class="modal fade text-left"
    id="xlarge"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel16"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">All Gallery</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section id="card-caps">
                    <div class="row">
                        <?php
                                                        foreach ($gallery as $glr) { ?>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-content">

                                    <img
                                        class="card-img img-fluid"
                                        src="<?= base_url(); ?>images/users/<?= $glr['imagename']; ?>"
                                        alt="Card image"
                                        style="width: 400px; height: 400px">
                                    <div class="card-img-overlay overflow-hidden">
                                        <a
                                            class="btn btn-danger text-white"
                                            href="<?= base_url(); ?>user/deletegallery/<?= $glr['id'] ?>/<?= $users['userid']; ?>">
                                            <i class="feather icon-trash-2 text-white mr-1"></i>Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </section>
            </div>
        </div>
    </div>
    </div>
<!-- modal gallery -->

<!-- modal add gallery -->
    <div
        class="modal fade text-left"
        id="large"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Upload Galery</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <section id="basic-vertical-layouts">
                        <?= form_open_multipart('user/addgallery'); ?>
                        <form class="form form-vertical">
                            <div class="form-body">
                                <div class="row">
                                    <!-- start add gallery -->

                                    <input type="hidden" name="userid" value="<?= $users['userid']; ?>">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Gallery</label>
                                            <input type="file" name="imagename" class="dropify" data-max-file-size="1mb"/>
                                        </div>
                                    </div>

                                    <!-- end of add gallery -->

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?= form_close(); ?>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- modal add gallery -->

    <!-- modal visitor -->
<div
    class="modal fade text-left"
    id="large1"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel17"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Visitor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table add-rows">
                                    <thead>
                                        <tr>
                                            <th>User Id</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                                            foreach ($visitor as $vtr) { ?>
                                        <tr>
                                            <th>
                                                <?= $vtr['userid1']; ?>
                                            </th>
                                            <th>
                                                <div class="avatar"><img
                                                    src="<?= base_url(); ?>images/users/<?= $vtr['userimage1']; ?>"
                                                    alt="avtar img holder"
                                                    height="45"
                                                    width="45"></div>
                                            </th>
                                            <th>
                                                <?= $vtr['namauser1']; ?>
                                            </th>
                                            <th>
                                                <a
                                                    href="<?= base_url(); ?>user/detailusers/<?= $vtr['userid1'] ?>"
                                                    class="btn-sm btn-outline-primary">View</a>
                                            </th>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<!-- end modal visitor -->

<!-- modal liked -->
<div
    class="modal fade text-left"
    id="large2"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel17"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Liked</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table add-rows">
                                    <thead>
                                        <tr>
                                            <th>User Id</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                                            foreach ($liked as $lkd) { ?>
                                        <tr>
                                            <th>
                                                <?= $lkd['userid1'] ?>
                                            </th>
                                            <th>
                                                <div class="avatar"><img
                                                    src="<?= base_url(); ?>images/users/<?= $lkd['userimage1']; ?>"
                                                    alt="avtar img holder"
                                                    height="45"
                                                    width="45"></div>
                                            </th>
                                            <th>
                                                <?= $lkd['namauser1']; ?>
                                            </th>
                                            <th>
                                                <a
                                                    href="<?= base_url(); ?>user/detailusers/<?= $lkd['userid1'] ?>"
                                                    class="btn-sm btn-outline-primary">View</a>
                                            </th>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<!--end modal liked -->

<!--modal matched -->
<div
    class="modal fade text-left"
    id="large3"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel17"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Matched</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table add-rows">
                                    <thead>
                                        <tr>
                                            <th>User Id</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                                            foreach ($match as $mc) { ?>
                                        <tr>
                                            <th>
                                                <?= $mc['userid2'] ?>
                                            </th>
                                            <th>
                                                <div class="avatar"><img
                                                    src="<?= base_url(); ?>images/users/<?= $mc['userimage2']; ?>"
                                                    alt="avtar img holder"
                                                    height="45"
                                                    width="45"></div>
                                            </th>
                                            <th>
                                                <?= $mc['namauser2']; ?>
                                            </th>
                                            <th>
                                                <a
                                                    href="<?= base_url(); ?>user/detailusers/<?= $mc['userid2'] ?>"
                                                    class="btn-sm btn-outline-primary">View</a>
                                            </th>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<!--end modal matched -->
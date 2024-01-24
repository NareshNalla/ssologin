<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');?>

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">

          

            <!-- Add rows table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Trending User</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table add-rows">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>User Id</th>
                                                    <th>Trending</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Gender</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $i = 1;
                                                foreach ($trending as $trd) { ?>
                                                    <tr>
                                                        <th><?= $i ?></th>
                                                        <th><?= $trd['userid']; ?></th>
                                                        <th>#<?= $trd['number']; ?></th>
                                                        <th>
                                                            <div class="avatar mr-1"><img src="<?= base_url('images/users/') . $trd['userimage']; ?>" alt="avtar img holder" height="45" width="45"></div>
                                                        </th>
                                                        <th><?= $trd['fullname']; ?></th>
                                                        <th><?= $trd['gender']; ?></th>
                                                        <th>
                                                            <?php if ($trd['statususer'] == 1) { ?>
                                                                <h1 class="badge badge-success">Active</h1>
                                                            <?php } else { ?>
                                                                <h1 class="badge badge-secondary">Blocked</h1>
                                                            <?php } ?>
                                                        </th>
                                                        <th>
                                                            <span>
                                                                <a href="<?= base_url(); ?>user/detailusers/<?= $trd['userid'] ?>">
                                                                    <i class="feather icon-eye text-primary"></i>
                                                                </a>
                                                            </span>
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

        </div>
    </div>
</div>
<!-- END: Content-->
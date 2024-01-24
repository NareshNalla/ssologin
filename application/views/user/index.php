<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <!-- Basic tabs start -->
            <section id="basic-tabs-components">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <h4 class="card-title">Users</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <a class="btn btn-primary mb-2 text-white" href="<?= base_url(); ?>user/adduserview">
                                        <i class="feather icon-plus"></i>Add User</a>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="alluser-tab" data-toggle="tab" href="#alluser" aria-controls="alluser" role="tab" aria-selected="true">All User</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="blockuser-tab" data-toggle="tab" href="#blockuser" aria-controls="blockuser" role="tab" aria-selected="false">Blocked User</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="alluser" aria-labelledby="alluser-tab" role="tabpanel">

                                            <!-- Add rows table -->
                                            <section id="basic-datatable">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">All User</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table add-rows">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No.</th>
                                                                                    <th>User Id</th>
                                                                                    <th>Image</th>
                                                                                    <th>Name</th>
                                                                                    <th>Gender</th>
                                                                                    <th>Status</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                                <?php $i = 1;
                                                                                foreach ($users as $us) { ?>
                                                                                    <tr>
                                                                                        <th><?= $i ?></th>
                                                                                        <th><?= $us['userid']; ?></th>
                                                                                        <th>
                                                                                            <div class="avatar mr-1"><img src="<?= base_url('images/users/') . $us['userimage']; ?>" alt="avtar img holder" height="45" width="45"></div>
                                                                                        </th>
                                                                                        <th><?= $us['fullname']; ?></th>
                                                                                        <th><?= $us['gender']; ?></th>
                                                                                        <th>
                                                                                            <?php if ($us['statususer'] == 1) { ?>
                                                                                                <h1 class="badge badge-success">Active</h1>
                                                                                            <?php } else { ?>
                                                                                                <h1 class="badge badge-secondary">Blocked</h1>
                                                                                            <?php } ?>
                                                                                        </th>
                                                                                        <th>

                                                                                            <span class="">
                                                                                                <a href="<?= base_url(); ?>user/detailusers/<?= $us['userid'] ?>">
                                                                                                    <i class="feather icon-eye text-primary"></i>
                                                                                                </a>
                                                                                            </span>
                                                                                            <?php if ($us['statususer'] == 1) { ?>
                                                                                                <span class="mr-1 ml-1">
                                                                                                    <a href="<?= base_url(); ?>user/block/<?= $us['userid']; ?>">
                                                                                                        <i class="feather icon-unlock text-dark"></i>
                                                                                                    </a>
                                                                                                </span>
                                                                                            <?php } else { ?>
                                                                                                <span class="mr-1 ml-1">
                                                                                                    <a href="<?= base_url(); ?>user/unblock/<?= $us['userid']; ?>">
                                                                                                        <i class="feather icon-lock text-success"></i>
                                                                                                    </a>
                                                                                                </span>
                                                                                            <?php } ?>
                                                                                            <span class="action-delete">
                                                                                                <a onclick="return confirm ('Are You Sure?')" href="<?= base_url(); ?>user/deleteusers/<?= $us['userid']; ?>">
                                                                                                    <i class="feather icon-trash text-danger"></i></a>
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
                                            <!--/ Add rows table -->

                                        </div>
                                        <div class="tab-pane" id="blockuser" aria-labelledby="blockuser-tab" role="tabpanel">
                                            <!-- Add rows table -->
                                            <section id="basic-datatable">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Blocked User</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table add-rows">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>User Id</th>
                                                                                    <th>Trending</th>
                                                                                    <th>Image</th>
                                                                                    <th>Name</th>
                                                                                    <th>Gender</th>
                                                                                    <th>Age</th>
                                                                                    <th>Status</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                                <?php $i = 1;
                                                                                foreach ($users as $us) {
                                                                                    if ($us['statususer'] == 0) { ?>
                                                                                        <tr>
                                                                                            <th><?= $i ?></th>
                                                                                            <th><?= $us['userid']; ?></th>
                                                                                            <th>
                                                                                                <div class="avatar mr-1"><img src="<?= base_url('images/users/') . $us['userimage']; ?>" alt="avtar img holder" height="45" width="45"></div>
                                                                                            </th>
                                                                                            <th><?= $us['fullname']; ?></th>
                                                                                            <th><?= $us['gender']; ?></th>
                                                                                            <th>
                                                                                                <?php if ($us['statususer'] == 1) { ?>
                                                                                                    <h1 class="badge badge-success">Active</h1>
                                                                                                <?php } else { ?>
                                                                                                    <h1 class="badge badge-secondary">Blocked</h1>
                                                                                                <?php } ?>
                                                                                            </th>
                                                                                            <th>
                                                                                                <span class="">
                                                                                                    <a href="<?= base_url(); ?>user/detailusers/<?= $us['userid'] ?>">
                                                                                                        <i class="feather icon-eye text-primary"></i>
                                                                                                    </a>
                                                                                                </span>
                                                                                                <?php if ($us['statususer'] == 1) { ?>
                                                                                                    <span class="mr-1 ml-1">
                                                                                                        <a href="<?= base_url(); ?>user/block/<?= $us['userid']; ?>">
                                                                                                            <i class="feather icon-unlock text-dark"></i>
                                                                                                        </a>
                                                                                                    </span>
                                                                                                <?php } else { ?>
                                                                                                    <span class="mr-1 ml-1">
                                                                                                        <a href="<?= base_url(); ?>user/unblock/<?= $us['userid']; ?>">
                                                                                                            <i class="feather icon-lock text-success"></i>
                                                                                                        </a>
                                                                                                    </span>
                                                                                                <?php } ?>
                                                                                                <span class="action-delete">
                                                                                                    <a onclick="return confirm ('Are You Sure?')" href="<?= base_url(); ?>user/deleteusers/<?= $us['userid']; ?>">
                                                                                                        <i class="feather icon-trash text-danger"></i></a>
                                                                                                </span>
                                                                                            </th>
                                                                                        </tr>

                                                                                <?php $i++;
                                                                                    }
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
                </div>
        </div>
        </section>
        <!-- Basic Tag Input end -->

    </div>
</div>
</div>
<!-- END: Content-->
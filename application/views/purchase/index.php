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
                    <div class="col">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <h4 class="card-title">Subscription Activity</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center active" id="success-tab" data-toggle="tab" href="#success" aria-controls="success" role="tab" aria-selected="true">
                                                <i class="feather icon-check mr-25"></i>
                                                <span class="d-none d-sm-block text-center">Success</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="failed-tab" data-toggle="tab" href="#failed" aria-controls="failed" role="tab" aria-selected="false">
                                                <i class="feather icon-alert-circle mr-25"></i>
                                                <span class="d-none d-sm-block text-center">Failed</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="success" aria-labelledby="success-tab" role="tabpanel">
                                            <!-- Add rows table -->
                                            <section id="add-row">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Success</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table add-rows">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="width: 20px;" class="justify-content-center">No.</th>
                                                                                    <th style="width: 50px;" class="justify-content-center">User</th>
                                                                                    <th style="width: 100px;">User Id</th>
                                                                                    <th>INV</th>
                                                                                    <th>Amount</th>
                                                                                    <th>Status</th>
                                                                                    <th>Purchase Date</th>
                                                                                    <th>Expired</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $i = 1;
                                                                                foreach ($purchase as $prc) {
                                                                                    if ($prc['status'] == 1) { ?>
                                                                                        <tr>
                                                                                            <th><?= $i ?></th>
                                                                                            <th class="justify-content-center">
                                                                                                <?php if ($prc['username'] != '') { ?>
                                                                                                    <div class="avatar mr-25"><img src="<?= base_url(); ?>images/users/<?= $prc['userimage']; ?>" alt="avtar img holder" height="45" width="45">
                                                                                                    </div>
                                                                                                    <span class="d-none d-sm-block text-center"><?= $prc['username']; ?></span>
                                                                                                <?php } else { ?>
                                                                                                    <h1 class="badge badge-secondary">user deleted</h1>
                                                                                                <?php } ?>
                                                                                            </th>
                                                                                            <th><?= $prc['id_user'] ?></th>
                                                                                            <th><?= $prc['invoice'] ?></th>
                                                                                            <th>
                                                                                                <?= $currency ?>
                                                                                                <?= number_format($prc['amount'] / 100, 2, ".", ".") ?>
                                                                                            </th>
                                                                                            <th>
                                                                                                <?php if ($prc['status'] == 1) { ?>
                                                                                                    <h1 class="badge badge-success">Success</h1>
                                                                                                <?php } else { ?>
                                                                                                    <h1 class="badge badge-danger">Failed</h1>
                                                                                                <?php } ?>
                                                                                            </th>
                                                                                            <th><?= $prc['created'] ?></th>
                                                                                            <th><?= $prc['expired'] ?></th>
                                                                                        </tr>
                                                                                <?php }
                                                                                    $i++;
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
                                        <div class="tab-pane" id="failed" aria-labelledby="failed-tab" role="tabpanel">
                                            <!-- Add rows table -->
                                            <section id="add-row">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Success</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table add-rows">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="width: 20px;" class="justify-content-center">No.</th>
                                                                                    <th style="width: 50px;" class="justify-content-center">User</th>
                                                                                    <th style="width: 100px;">User Id</th>
                                                                                    <th>INV</th>
                                                                                    <th>Amount</th>
                                                                                    <th>Status</th>
                                                                                    <th>Purchase Date</th>
                                                                                    <th>Expired</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $i = 1;
                                                                                foreach ($purchase as $prc) {
                                                                                    if ($prc['status'] != 1) { ?>
                                                                                        <tr>
                                                                                            <th><?= $i ?></th>
                                                                                            <th class="justify-content-center">
                                                                                                <?php if ($prc['username'] != '') { ?>
                                                                                                    <div class="avatar mr-25"><img src="<?= base_url(); ?>images/users/<?= $prc['userimage']; ?>" alt="avtar img holder" height="45" width="45">
                                                                                                    </div>
                                                                                                    <span class="d-none d-sm-block text-center"><?= $prc['username']; ?></span>
                                                                                                <?php } else { ?>
                                                                                                    <h1 class="badge badge-secondary">user deleted</h1>
                                                                                                <?php } ?>
                                                                                            </th>
                                                                                            <th><?= $prc['id_user'] ?></th>
                                                                                            <th><?= $prc['invoice'] ?></th>
                                                                                            <th>
                                                                                                <?= $currency ?>
                                                                                                <?= number_format($prc['amount'] / 100, 2, ".", ".") ?>
                                                                                            </th>
                                                                                            <th>
                                                                                                <?php if ($prc['status'] == 1) { ?>
                                                                                                    <h1 class="badge badge-success">Success</h1>
                                                                                                <?php } else { ?>
                                                                                                    <h1 class="badge badge-danger">Failed</h1>
                                                                                                <?php } ?>
                                                                                            </th>
                                                                                            <th><?= $prc['created'] ?></th>
                                                                                            <th><?= $prc['expired'] ?></th>
                                                                                        </tr>
                                                                                <?php }
                                                                                    $i++;
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

            </section>
            <!-- Basic Tag Input end -->

        </div>

    </div>
</div>
</div>
<!-- END: Content-->
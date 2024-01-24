<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- withdraw data start -->
            <section id="" class="">
                <div class="card-header">
                    <h4>VIP Package<span>
                            <a class="btn btn-success float-right mb-1 text-white" href="<?= base_url(); ?>subscription/addsubscriptionview">
                                <i class="feather icon-plus mr-1"></i>Add</a></span></h4>
                </div>
                <div class="table-responsive">
                    <table class="table data-thumb-view">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Periode</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($subscription as $subs) { ?>
                                <tr>
                                    <td></td>
                                    <td><?= $i ?></td>
                                    <td class="product-img">
                                        <div class="">
                                            <img src="<?= base_url('images/subs/') . $subs['icon']  ?>">
                                        </div>
                                    </td>
                                    <td><?= $subs['title'] ?></td>
                                    <td class="text-danger"><?= $subs['time'] ?> <?= $subs['type'] ?></td>
                                    <td class="text-primary">
                                        <?= $currency ?>
                                        <?= number_format($subs['price'] / 100, 2, ".", ".") ?>
                                    </td>
                                    <td>
                                        <?php if ($subs['status'] == 1) { ?>
                                            <h1 class="badge badge-success">Active</h1>
                                        <?php } else { ?>
                                            <h1 class="badge badge-secondary">NonActive</h1>
                                        <?php } ?>
                                    </td>
                                    <td>

                                        <span class="mr-1">
                                            <a href="<?= base_url(); ?>subscription/editsubscriptionview/<?= $subs['id'] ?>">
                                                <i class="feather icon-edit text-primary"></i>
                                            </a>
                                        </span>

                                        <span>
                                            <a onclick="return confirm ('Are You Sure?')" href="<?= base_url(); ?>subscription/deletesubs/<?= $subs['id'] ?>">
                                                <i class="feather icon-trash text-danger"></i>
                                            </a>
                                        </span>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>

            </section>
            <!-- end of withdraw data -->
        </div>
    </div>
</div>
<!-- END: Content-->
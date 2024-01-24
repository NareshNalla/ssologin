<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">

            <div class="row justify-content-center">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">

                                <?= form_open_multipart('setting/editstripe'); ?>
                                <form class="form form-vertical">
                                    <div class="form-body">
                                        <div class="row">

                                            <input type="hidden" name="id" value="<?= $setting['id'] ?>" />

                                            <div class="col-12">
                                                <h5 class="text-muted">Stripe Settings
                                                </h5>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <div class="form-group">
                                                    <label for="stripesecretkey">Stripe Secret Key</label>
                                                    <input type="text" class="form-control" id="stripesecretkey" name="stripe_secret_key" value="<?= $setting['stripe_secret_key']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="stripepublishedkey">Stripe Published Key</label>
                                                    <input type="text" class="form-control" id="stripepublishedkey" name="stripe_published_key" value="<?= $setting['stripe_published_key']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="stripe_status">Stripe Mode</label>
                                                    <select name="stripe_status" id="stripe_status" class="select2 form-group" style="width:100%">
                                                        <option value="1" <?php if ($setting['stripe_status'] == '1') { ?>selected<?php } ?>>Development Mode</option>
                                                        <option value="2" <?php if ($setting['stripe_status'] == '2') { ?>selected<?php } ?>>Published</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="stripe_active">Stripe Status</label>
                                                    <select name="stripe_active" id="stripe_active" class="select2 form-group" style="width:100%">
                                                        <option value="1" <?php if ($setting['stripe_active'] == '1') { ?>selected<?php } ?>>Active</option>
                                                        <option value="0" <?php if ($setting['stripe_active'] == '0') { ?>selected<?php } ?>>NonActive</option>
                                                    </select>
                                                </div>

                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                </form>
                                <?= form_close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END: Content-->
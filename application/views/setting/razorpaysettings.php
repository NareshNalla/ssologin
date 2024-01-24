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

                                <?= form_open_multipart('setting/editrazorpay'); ?>
                                <form class="form form-vertical">
                                    <div class="form-body">
                                        <div class="row">

                                            <input type="hidden" name="id" value="<?= $setting['id'] ?>" />

                                            <div class="col-12">
                                                <h5 class="text-muted">Razorpay Settings
                                                </h5>
                                            </div>
                                            <div class="col-12 mt-1">
                                                <div class="form-group">
                                                    <label for="rzp_key">Razorpay Key</label>
                                                    <input type="text" class="form-control" id="rzp_key" name="rzp_key" value="<?= $setting['rzp_key'] ?>" required>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="rzp_active">Razorpay Status</label>
                                                    <select name="rzp_active" id="rzp_active" class="select2 form-group" style="width:100%">
                                                        <option value="1" <?php if ($setting['rzp_active'] == '1') { ?>selected<?php } ?>>Active</option>
                                                        <option value="0" <?php if ($setting['rzp_active'] == '0') { ?>selected<?php } ?>>NonActive</option>
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
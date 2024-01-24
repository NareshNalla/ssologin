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

                                <?= form_open_multipart('setting/editpaypal'); ?>
                                <form class="form form-vertical">
                                    <div class="form-body">
                                        <div class="row">

                                            <input type="hidden" name="id" value="<?= $setting['id'] ?>" />

                                            <div class="col-12">
                                                <h5 class="text-muted">Paypal Settings
                                                </h5>
                                            </div>
                                            <div class="col-12 mt-1">
                                                <div class="form-group">
                                                    <label for="paypalkey">PayPal Key</label>
                                                    <input type="text" class="form-control" id="paypalkey" name="paypal_key" value="<?= $setting['paypal_key'] ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="paypalcurrency">PayPal Currency</label>
                                                    <input type="text" class="form-control" id="paypalcurrency" name="app_currency_text" value="<?= $setting['app_currency_text'] ?>" required>
                                                    <a Paypal href="https://developer.paypal.com/docs/api/reference/currency-codes/">
                                                        <p class="mt-1">Paypal Currency</p>
                                                    </a>
                                                </div>


                                                <div class="form-group">
                                                    <label for="paypal_mode">PayPal Mode</label>
                                                    <select name="paypal_mode" id="paypal_mode" class="select2 form-group" style="width:100%">
                                                        <option value="1" <?php if ($setting['paypal_mode'] == '1') { ?>selected<?php } ?>>Development Mode</option>
                                                        <option value="2" <?php if ($setting['paypal_mode'] == '2') { ?>selected<?php } ?>>Published</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="paypal_active">PayPal Status</label>
                                                    <select name="paypal_active" id="paypal_active" class="select2 form-group" style="width:100%">
                                                        <option value="1" <?php if ($setting['paypal_active'] == '1') { ?>selected<?php } ?>>Active</option>
                                                        <option value="0" <?php if ($setting['paypal_active'] == '0') { ?>selected<?php } ?>>NonActive</option>
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
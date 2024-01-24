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

                                <?= form_open_multipart('setting/editapp'); ?>
                                <form class="form form-vertical">
                                    <div class="form-body">
                                        <div class="row">
                                            <!-- start app settings form -->

                                            <input type="hidden" name="id" value="<?= $setting['id'] ?>" />

                                            <div class="col-12">
                                                <h5 class="text-muted">App Settings
                                                </h5>
                                            </div>

                                            <div class="col-12 mt-2">
                                                <div class="form-group">
                                                    <label for="app_email">App Email</label>
                                                    <input type="email" class="form-control" name="app_email" placeholder="enter app email" value="<?= $setting['app_email'] ?>" required="required"></div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="app_name">App Name</label>
                                                    <input type="text" class="form-control" name="app_name" placeholder="enter app name" value="<?= $setting['app_name'] ?>" required="required"></div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="app_contact">App Contact Number</label>
                                                    <input type="text" class="form-control" name="app_contact" placeholder="enter app contact" value="<?= $setting['app_contact'] ?>" required="required"></div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="app_website">App Website</label>
                                                    <input type="text" class="form-control" name="app_website" placeholder="enter app website" value="<?= $setting['app_website'] ?>" required="required"></div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="app_currency">App Currency</label>
                                                    <input type="text" class="form-control" name="app_currency" placeholder="enter app currency" value="<?= $setting['app_currency'] ?>" required="required"></div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="app_currency">FCM Key</label>
                                                    <input type="text" class="form-control" name="fcm_key" placeholder="enter fcm key" value="<?= $setting['fcm_key'] ?>" required="required"></div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="app_linkgoogle">App Google Link</label>
                                                    <input type="text" class="form-control" name="app_linkgoogle" placeholder="enter app linkgoogle" value="<?= $setting['app_linkgoogle'] ?>" required="required"></div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="privacypolicy">Privacy Policy</label>
                                                    <textarea type="text" class="form-control" id="summernoteExample1" name="app_privacy_policy" required="required"><?= $setting['app_privacy_policy']; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="aboutus">About Us</label>
                                                    <textarea type="text" class="form-control" id="summernoteExample2" name="app_aboutus" required="required"><?= $setting['app_aboutus']; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="appaddress">App Address</label>
                                                    <textarea type="text" class="form-control" id="summernoteExample3" name="app_address" required="required"><?= $setting['app_address']; ?></textarea>
                                                </div>
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
<!-- END: Content-->
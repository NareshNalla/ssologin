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

                                <?= form_open_multipart('setting/editflutterwave'); ?>
                                <form class="form form-vertical">
                                    <div class="form-body">
                                        <div class="row">

                                            <input type="hidden" name="id" value="<?= $setting['id'] ?>" />

                                            <div class="col-12">
                                                <h5 class="text-muted">Flutterwave Settings
                                                </h5>
                                            </div>
                                            <div class="col-12 mt-1">
                                                <div class="form-group">
                                                    <label for="fw_key">Flutterwave Key</label>
                                                    <input type="text" class="form-control" id="fw_key" name="fw_key" value="<?= $setting['fw_key'] ?>" required>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="fw_enc">Flutterwave Key</label>
                                                    <input type="text" class="form-control" id="fw_enc" name="fw_enc" value="<?= $setting['fw_enc'] ?>" required>
                                                </div>
                    

                                                <div class="form-group">
                                                    <label for="fw_mode">Flutterwave Mode</label>
                                                    <select name="fw_mode" id="fw_mode" class="select2 form-group" style="width:100%">
                                                        <option value="1" <?php if ($setting['fw_mode'] == '1') { ?>selected<?php } ?>>Development Mode</option>
                                                        <option value="2" <?php if ($setting['fw_mode'] == '2') { ?>selected<?php } ?>>Published</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fw_active">Flutterwave Status</label>
                                                    <select name="fw_active" id="fw_active" class="select2 form-group" style="width:100%">
                                                        <option value="1" <?php if ($setting['fw_active'] == '1') { ?>selected<?php } ?>>Active</option>
                                                        <option value="0" <?php if ($setting['fw_active'] == '0') { ?>selected<?php } ?>>NonActive</option>
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
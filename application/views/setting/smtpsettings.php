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

                                <?= form_open_multipart('setting/editsmtp'); ?>
                                <form class="form form-vertical">
                                    <div class="form-body">
                                        <div class="row">

                                            <input type="hidden" name="id" value="<?= $setting['id'] ?>" />

                                            <div class="col-12">
                                                <h5 class="text-muted">SMTP Settings
                                                </h5>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <div class="form-group">
                                                    <label for="smtphost">SMTP Host</label>
                                                    <input type="text" value="<?= $setting['smtp_host']; ?>" class="form-control" id="smtphost" name="smtp_host" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="smtpport">SMTP Port</label>
                                                    <input type="text" class="form-control" id="smtpport" name="smtp_port" value="<?= $setting['smtp_port']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="smtpusername">SMTP User Name</label>
                                                    <input type="text" class="form-control" id="smtpusername" name="smtp_username" value="<?= $setting['smtp_username']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="smtppassword">SMTP Password</label>
                                                    <input type="password" class="form-control" id="smtppassword" name="smtp_password" autocomplete="off" value="<?= $setting['smtp_password']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="smtpform">SMTP Form</label>
                                                    <input type="text" class="form-control" id="smtpfrom" name="smtp_from" value="<?= $setting['smtp_from']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="smtp_secure">SMTP Secure</label>
                                                    <select class="select2 form-group" name="smtp_secure" id="smtp_secure">
                                                        <option value="tls" <?php if ($setting['smtp_secure'] == 'tls') { ?>selected<?php } ?>>TLS</option>
                                                        <option value="ssl" <?php if ($setting['smtp_secure'] == 'ssl') { ?>selected<?php } ?>>SSL</option>
                                                    </select>
                                                </div>

                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mb-1">Save</button>
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
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

                                <?= form_open_multipart('sendemail/sendemaildata'); ?>
                                <form class="form form-vertical">
                                    <div class="form-body">
                                        <div class="row">
                                            <!-- start send email template -->
                                            <div class="col-12 form-group">
                                                <label for="newscategory">Send To</label>
                                                <select id="getFname" onchange="admSelectCheck(this);" class="select2 form-group" style="width:100%" name="sendto">
                                                    <option id="users" value="users">Users</option>
                                                    <option id="others" value="other">Others</option>
                                                </select>
                                            </div>

                                            <div id="usercheck" style="display:block;" class="col-12 form-group">
                                                <label for="username">Users Name</label>
                                                <select class="select2 form-group" style="width:100%" name="emailpelanggan">
                                                    <?php foreach ($users as $us) { ?>
                                                        <option value="<?= $us['email'] ?>" class="text-secondary"><?= $us['fullname'] ?> (<?= $us['email'] ?>) </option>
                                                    <?php } ?>

                                                </select>
                                            </div>

                                            <div id="otherscheck" style="display:none;" class="col-12 form-group">
                                                <label for="others">Others</label>
                                                <input type="email" class="form-control" id="linktes" placeholder="enter email Address" name="emailothers">
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="title">title</label>
                                                <input type="text" class="form-control" id="title" placeholder="enter email Address" name="subject" required>
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="emailcontent">Email Content</label>
                                                <textarea type="text" class="form-control" style="justify-content: flex-start;" id="summernoteExample1" placeholder="Location" name="content" required></textarea>
                                            </div>
                                            <!-- end of send email template -->

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1">Send</button>
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
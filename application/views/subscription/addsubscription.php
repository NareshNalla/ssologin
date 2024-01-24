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

                                <?= form_open_multipart('subscription/addsubs'); ?>
                                <form class="form form-vertical">
                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-12">
                                                <h5 class="text-muted">Add Subscription
                                                </h5>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <div class="form-group">
                                                    <label>Subscription Image</label>
                                                    <input type="file" name="package_icon" class="dropify" data-max-file-size="1mb" data-default-file="" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" class="form-control" name="title" placeholder="enter subscription package title" required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label>Periode</label>

                                                <div class="row">

                                                    <div class="form-group col-6">
                                                        <input type="text" class="form-control" name="time" required="required" placeholde="enter amount of periode">
                                                    </div>
                                                    <div class=" form-group col-6">
                                                        <select name="type" class="select2 form-group" style="width:100%">
                                                            <option value="day">Day</option>
                                                            <option value="month">Month</option>
                                                            <option value="year">Year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input type="text" class="form-control" name="price" placeholder="enter price" data-type="currency" required="required"></div>
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="status">
                                                    Status
                                                </label>
                                                <select class="select2 form-control" id="status" name="status" required="required">
                                                    <option value="1">Active</option>
                                                    <option value="0">NonActive</option>
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
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <!-- users add start -->

            <section id="basic-vertical-layouts">
                <div class="row match-height justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add User</h4>
                            </div>
                            <br>
                            <div class="card-content">
                                <div class="card-body">
                                    <?= form_open_multipart('user/adduser'); ?>
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">
                                                <!-- start driver info form -->

                                                <h5 class="col-12 text-muted">User Main Info
                                                </h5>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Profile Image</label>
                                                        <input type="file" name="userimage" class="dropify" data-max-file-size="1mb" data-default-file="" />
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="fullname">Name</label>
                                                        <input type="text" id="fullname" class="form-control" name="fullname" placeholder="enter name" required="required"></div>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="gender">
                                                        Gender
                                                    </label>
                                                    <select class="select2 form-control" id="data-gender" name="gender" required="required">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>

                                                <div class="col-12">
                                                    <label>Phone</label>

                                                    <div class="row">

                                                        <input type="hidden" id="addcountry" value="+62">

                                                        <div class="form-group col-4">
                                                            <input type="tel" id="txtPhone" class="form-control" name="country_code" required="required">
                                                        </div>
                                                        <div class=" form-group col-8">
                                                            <input type="text" class="form-control" name="phone_number" placeholder="enter phone number" required="required">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="email" class="form-control" name="email" placeholder="enter email" required="required"></div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" id="password" class="form-control" name="password" placeholder="enter password" required="required"></div>
                                                </div>

                                                <h5 class="col-12 text-muted mt-2">User Detail Info
                                                </h5>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="height">Height</label>
                                                        <input type="text" id="height" class="form-control" name="height" placeholder="enter height (cm)" required="required"></div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="weight">Weight</label>
                                                        <input type="text" id="weight" class="form-control" name="weight" placeholder="enter height (kg)" required="required"></div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="dateofbirth">Date Of Birth</label>
                                                        <input type="date" id="dateofbirth" class="form-control" name="birthday" required="required"></div>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="relationship">
                                                        Relationship
                                                    </label>
                                                    <select class="select2 form-control" name="relationship" required="required">
                                                        <option value="Single">Single</option>
                                                        <option value="In a Relationship">In a Relationship</option>
                                                        <option value="Engaged">Engaged</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Complicated">Complicated</option>
                                                        <option value="Widow">Widow</option>
                                                        <option value="Widower">Widower</option>
                                                        <option value="Divorced">Divorced</option>
                                                    </select>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="nation">Nation</label>
                                                        <input type="text" id="nation" class="form-control" name="nation" placeholder="enter nation" required="required"></div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="occupation">Occupation</label>
                                                        <input type="text" id="occupation" class="form-control" name="occupation" placeholder="enter occupation" required="required"></div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="company">Company</label>
                                                        <input type="text" id="company" class="form-control" name="company" placeholder="enter company" required="required"></div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="interesting">Interesting</label>
                                                        <input type="text" id="interesting" class="form-control" name="interesting" placeholder="ex: swiming, reading, dancing" required="required"></div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="about">Bio</label>
                                                        <fieldset class="form-group">
                                                            <textarea class="form-control" id="basicTextarea" rows="3" name="about" required="required"></textarea>
                                                        </fieldset>
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
            </section>
            <!-- users add ends -->
        </div>
    </div>
</div>
<!-- END: Content-->
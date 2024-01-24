<div class="sidenav-overlay"></div>
<div class="drag-target"></div>


<?php if ($this->session->flashdata('success')) { ?>

    <section id="animation">

        <div id="type-success">

            <input type="hidden" id="desctoast" value="<?php echo $this->session->flashdata('success'); ?>" />
        </div>
    </section>
<?php } ?>

<?php if ($this->session->flashdata('danger')) { ?>

    <section id="animation">

        <div id="type-danger">

            <input type="hidden" id="desctoast" value="<?php echo $this->session->flashdata('danger'); ?>" />
        </div>
    </section>
<?php } ?>

<?php if ($this->session->flashdata('demo')) { ?>

    <section id="animation">

        <div id="type-danger">

            <input type="hidden" id="desctoast" value="<?php echo $this->session->flashdata('demo'); ?>" />
        </div>
    </section>
<?php } ?>

<!-- BEGIN: Footer-->
<footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                Made by <i class="fa fa-heart"></i>
                <a href="https://dating.indratech.in/" class="font-weight-bold" target="_blank">indratech</a> © <script>
                  document.write(new Date().getFullYear())
                </script>,
                for a Better World.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="#" class="nav-link text-muted" target="_blank"></a>
                </li>
                <li class="nav-item">
                  <a href="https://dating.indratech.in/" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
               
              </ul>
            </div>
          </div>
        </div>
      </footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/vendors.min.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/extensions/toastr.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="<?= base_url(); ?>asset/node_modules/dropify/dist/js/dropify.min.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/intlTelInput-jquery.min.js"></script>

<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>


<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?= base_url(); ?>asset/app-assets/js/core/app-menu.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/js/core/app.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/js/scripts/components.js"></script>

<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<?php if ($view == "dashboard") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/dashboard.js"></script>
<?php } ?>

<?php if ($view == "editadmin") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/dropify.js"></script>
<?php } ?>

<?php if ($view == "trending") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/extensions/swiper.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/trending.js"></script>
<?php } ?>

<?php if ($view == "detailuser") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/forms/select/form-select2.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/dropify.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/modal/components-modal.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/countrycode.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/detailuser.js"></script>
<?php } ?>

<?php if ($view == "adduser") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/forms/select/form-select2.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/dropify.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/adduser.js"></script>
<?php } ?>

<?php if ($view == "appsettings") { ?>
    <script src="<?= base_url(); ?>asset/node_modules/summernote/dist/summernote-bs4.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/dropify.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/forms/select/form-select2.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/quilleditor.js"></script>
<?php } ?>

<?php if ($view == "addsubscription") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="<?= base_url(); ?>asset/node_modules/summernote/dist/summernote-bs4.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/dropify.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/forms/select/form-select2.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/quilleditor.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/duit.js"></script>
<?php } ?>

<?php if ($view == "sendemail") { ?>
    <script src="<?= base_url(); ?>asset/node_modules/summernote/dist/summernote-bs4.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/forms/select/form-select2.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/quilleditor.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/sendemail.js"></script>
<?php } ?>

<script src="<?= base_url(); ?>asset/app-assets/js/scripts/datatables/datatable.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/js/scripts/ui/data-list-view.js"></script>




<?php if ($this->session->flashdata('success')) { ?>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/toastrsuccess.js"></script>
<?php } ?>

<?php if ($this->session->flashdata('danger') || $this->session->flashdata('demo')) { ?>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/IndraTech/toastrerror.js"></script>
<?php } ?>
<!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
 <!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
 <!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
 <!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
 <!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
 <!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
 <!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<script
src="https://kit.fontawesome.com/3c520e368e.js"
crossorigin="anonymous"
></script>

<script
src="https://kit.fontawesome.com/3c520e368e.js"
crossorigin="anonymous"
></script>

<script>
document
  .getElementById("chooseFileButtonImporter")
  .addEventListener("click", function () {
    document.getElementById("fileInputImporter").click();
  });

document
  .getElementById("fileInputImporter")
  .addEventListener("change", function () {
    if (this.files.length > 0) {
      document.getElementById("importForm").submit();
    }
  });
</script>
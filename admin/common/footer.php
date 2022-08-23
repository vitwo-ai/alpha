<!-- /.content-wrapper -->
<footer class="main-footer text-muted">
    <strong class="text-muted"><a href="<?=ADMIN_URL?>"><?= getAdministratorSettings("footer"); ?></a></strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Date :</b> <?= date("d-m-Y"); ?>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="../public/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- sweetalert2 -->
<script src="../public/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- ChartJS -->
<script src="../public/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../public/assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../public/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../public/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../public/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../public/assets/plugins/moment/moment.min.js"></script>
<script src="../public/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../public/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="../public/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../public/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../public/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../public/assets/plugins/jszip/jszip.min.js"></script>
<script src="../public/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../public/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../public/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../public/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- BS-Stepper -->
<script src="../public/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>

<!-- AdminLTE App -->
<script src="../public/assets/AdminLte/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../public/assets/AdminLte/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../public/assets/AdminLte/dist/js/pages/dashboard.js"></script>
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
  $(function () {
    $(".defaultDataTable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#defaultDataTable_wrapper .col-md-6:eq(0)');
	
    /*$('#defaultDataTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });*/
  });

  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

</script>
</body>
</html>

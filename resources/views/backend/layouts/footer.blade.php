    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
        </div>
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{url('assets')}}/backend/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{url('assets')}}/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{url('assets')}}/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{url('assets')}}/backend/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{url('assets')}}/backend/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{url('assets')}}/backend/plugins/raphael/raphael.min.js"></script>
    <script src="{{url('assets')}}/backend/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{url('assets')}}/backend/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{url('assets')}}/backend/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{url('assets')}}/backend/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{url('assets')}}/backend/dist/js/pages/dashboard2.js"></script>

    <script src="{{url('ckeditor')}}/ckeditor.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#finter').on('change',function(){
            var url = $(this).val();
            if(url) {
                window.location =  url;
            }
            return false;
        });
    });
</script>
</body>

</html>
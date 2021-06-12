<script src="{{ url ('js/sweetalert.min.js') }}"></script>
<!-- jQuery -->
<script src="{{ url ('panel/js/jquery/jquery.min.js') }}"></script>
<!-- jQuery -->
<!-- Bootstrap -->
<script src="{{ url ('panel/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<!-- Bootstrap -->
<!-- AdminLTE App -->
<script src="{{ url ('panel/js/dist/adminlte.js') }}"></script>
<!-- AdminLTE App -->
<!-- OPTIONAL SCRIPTS -->
<script src="{{ url ('panel/js/dist/demo.js') }}"></script>
<!-- OPTIONAL SCRIPTS -->
<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="{{ url ('panel/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jVectorMap -->
<script src="{{ url ('panel/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ url ('panel/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ url ('panel/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- PAGE SCRIPTS -->
<script src="{{ url ('panel/js/dist/pages/dashboard2.js') }}"></script>
<!--  toastr -->
<script src="{{ url('js/toastr.min.js') }}"></script>
   @toastr_render
<!--  toastr -->

<script>
    count_message();
    function count_message() {
        $.ajax({
            url:"{{route('company.ticket.count')}}",
            method:"post",
            data:{'_token': "{{csrf_token()}}"},
            success:function (data) {
                $('#message_count_top').text(data.count);
                if(data.count > 0)
                {
                    $('#message_count_sidebar').text(data.count);
                    $('#message_date_top').text(data.time);
                }
                else
                {
                    $('#message_count_sidebar').text('')
                    $('#message_date_top').text('');
                }
            }
        })
    }
</script>

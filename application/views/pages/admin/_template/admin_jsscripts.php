	<!-- Scripts -->
	<script type="text/javascript" src="<?=base_url()?>assets/admin/js/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/admin/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/admin/js/popper.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/admin/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/admin/js/navigation.js"></script>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal",
                mouseWheel:{ scrollAmount: 500 }
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
            // Nav links
            $(function() {
                var path = window.location.pathname.split("/").pop();
                $(".nav-item a[href*='" + path +"']").addClass("thisactive");
            });
            $(document).ready(function() {
                $('#dtPop').DataTable();
            });
            $('#generatePass').click(function(){
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                for (var i = 0; i < 20; i++)
                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                $('#passInput').val(text);
            });
        });
    </script>

</html>
    
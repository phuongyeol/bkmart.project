
</section>

<!-- Jquery Core Js -->
<!-- <script src="public/plugins/jquery/jquery.min.js"></script> -->

<!-- DATATABLE -->
<script src="public/plugins/DataTables/datatables.min.js"></script>
<script src="public/plugins/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script src="public/plugins/DataTables/DataTables-1.10.16/js/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
		$('#myTable').DataTable();
	})
</script>

<!-- Bootstrap Core Js -->
<script src="public/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="public/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="public/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="public/plugins/node-waves/waves.js"></script>

<!-- Sweet alert -->
<script src="public/plugins/sweetalert/sweetalert.min.js" ></script>
<script type="text/javascript">
	$(function(){

      // $('.example').on('click', .)
      $('.delete').click(function(e){
      	e.preventDefault();
      	var url = $(this).attr('href');
      	console.log(url);

      	swal({
      		title: "Are you sure?",
      		// text: "You will not be able to recover this imaginary file!",
      		type: "warning",
      		showCancelButton: true,
      		confirmButtonColor: '#DD6B55',
      		confirmButtonText: 'Yes, delete it!',
      		cancelButtonText: "No, cancel plx!",
      		closeOnConfirm: false,
      		closeOnCancel: false
      	},
      	function(isConfirm){
      		if (isConfirm){
      			swal("Deleted!", "It has been deleted!", "success");
      			window.location.href = url;
      		} else {
      			swal("Cancelled", "Your data is safe 🙂", "error");
      		}
      	});
      })
  });   
</script>

<!-- Custom Js -->
<script src="public/js/admin.js"></script>
<script src="public/js/pages/index.js"></script>

<!-- Demo Js -->
<script src="public/js/demo.js"></script>
</body>

</html>
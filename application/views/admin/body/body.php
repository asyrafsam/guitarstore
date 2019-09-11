<body>
	<div class="container">
		<br>
		<div class="row col-md-12">
		<table cellspacing="5">
			<tr>
				<td><!-- <a href="<?= base_url(); ?>Book/home"> -->HOME</a></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>MANAGE GUITAR</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>CONTACT US</td>
			</tr>
		</table>
		</div>
		<br>
		<h3>Guitar Storess</h3>

		<button class="btn btn-success" onclick="add_guitar()"><i class="glyphicon glyphicon-plus"></i>Add Guitar</button>
		<br>
		<br>
		<table id="table_id" class="table table-stripped table-bordered">
			<thead>
 			<!-- setiap table kene ada satu <tr> per <thead> untuk taknak bagi error pada js dataTables -->
			<tr>
				<th>Guitar Code</th>
				<th>Guitar Brand</th>
				<th>Guitar Price</th>
				<th>Guitar Category</th>
				<th>Action</th><!-- ni kegunaan untuk create button onclick baru contohnya update dan delete -->
			</tr>
			</thead>

			<tbody>
			<?php
			foreach($guitars as $g){

			?>
				<tr>
				<!-- Cara penarikan data untuk read lain dari insert update -->
					<td><?php echo $g->g_code ;?></td>
					<td><?php echo $g->g_brand ;?></td>
					<td><?php echo $g->g_price ;?></td>
					<td><?php echo $g->g_category ;?></td>
					<td>
					<!-- Setiap kali onclick mesti create function baru kat bawah untuk kegunaan fungsi button -->
					<!-- sama je untuk button update dan delete sebab cari data pakai id -->
						<button class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></button>
						<button class="btn btn-danger" onclick="delete_guitar(<?php echo $g->g_code; ?>)"><i class="glyphicon glyphicon-remove"></i></button>
					</td>
				</tr>
		<?php
				}
		?>
			</tbody>
		</table>
	</div>

	<script type="text/javascript">
			
			/*javascript untuk memaparkan search, dan sangatlah penting*/
			/*banyak lagi jenis, boleh search google*/
			$(document).ready(function() {
				$('#table_id').DataTable();

			})

			function add_guitar(){
				$('#form')[0].reset();
				$('#modal_form').modal('show');
			}

			function save(){

				$.ajax({
	                				url : "<?php echo site_url('admin/insertguitar/') ;?>",
	                				type : "POST",
	                				data : $('#form').serialize(),
	                				dataType : "JSON",
	                				success: function(data){
				                        $('#modal_form').modal('hide');
				                        location.reload();

                   				},
                    				error: function (jqXHR, textStatus, errorThrown){
                    					alert('error at adding data to ajax');
                    			}
                    

            	});
			}

			function delete_guitar(g_code){
				if(confirm('Are you sure?')) {
							
						$.ajax({
	                				url:"<?php echo site_url('admin/guitar_delete/') ;?>/" +g_code,
	                				type : "POST",
	                				dataType : "JSON",
	                				success: function(data){
				                        location.reload();

                   				},
                    				error: function (jqXHR, textStatus, errorThrown){
                    					alert('error at deleting data');
                    			}
                    

            				});
					//ajax delete data dari database
				}
			}


	</script>

	<div class="modal fade" id="modal_form" role="dialog">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
		      		<div class="modal-header">
		        			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        	<h4 class="modal-title">Modal title</h4>
		      			</div>
		      			<div class="modal-body form">
		      			<!-- ni lah kegunaan action pada form <th>Action</th> -->
		      			<form action="#" id="form" class="form-horizontal" enctype="multipart/form-data">
		      				<!-- <input type="hidden" value="" name="guitar_id"> -->

		      				<div class="form-body">
		      					<div class="form-group">
		      						<label class="control-label col-md-3">Guitar Code</label>
		      						<div class="col-md-9">
		      							<input type="text" name="code" placeholder="Code" class="form-control">
		      						</div>
		      					</div>
		      				</div>

		      				<div class="form-body">
		      					<div class="form-group">
		      						<label class="control-label col-md-3">Guitar Brand</label>
		      						<div class="col-md-9">
		      							<input type="text" name="brand" placeholder="Brand" class="form-control">
		      						</div>
		      					</div>
		      				</div>

		      				<div class="form-body">
		      					<div class="form-group">
		      						<label class="control-label col-md-3">Guitar Price</label>
		      						<div class="col-md-9">
		      							<input type="text" name="price" placeholder="Price" class="form-control">
		      						</div>
		      					</div>
		      				</div>

		      				<div class="form-body">
		      					<div class="form-group">
		      						<label class="control-label col-md-3">Guitar Category</label>
		      						<div class="col-md-9">
		      							<input type="text" name="category" placeholder="Category" class="form-control">
		      						</div>
		      					</div>
		      				</div>

		      			</form>
		      			</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        		<button type="button" class="btn btn-primary" onclick="save()">Submit</button>
		      		</div>
    			</div><!-- /.modal-content -->
  			</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</body>
</html>
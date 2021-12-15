<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<?php $this->load->view('layout/navbar'); ?>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<?php $this->load->view('layout/sidebar'); ?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title"><?php echo $tittle; ?></h3>

					<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Divisi</h3>
								</div>
								<div class="panel-body">
									<?php echo $this->session->flashdata('flash'); ?>
									<div style="margin-bottom:20px;">
										<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah">
							 		 		Tambah Data
										</button>
									</div>
									<table class="table table-hover">
										<thead>
											<tr>
												<th>No.</th>
												<th>Divisi</th>
												<th>Tingkat Divisi</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; ?>
											<?php foreach($divisi as $dvs): ?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $dvs->divisi; ?></td>
												<td><?php if ($dvs->level == 1) {
													echo 'direktur utama';
												} else { echo 'divisi';} ?></td>
												<td><a href="" title="" data-toggle="modal" data-target="#modalEdit" class="btn btn-primary tombol-edit-divisi" data-iddivisi="<?php echo $dvs->id_divisi; ?>" data-divisi="<?php echo $dvs->divisi; ?>" data-level="<?php echo $dvs->level; ?>" >Edit</a> &nbsp; <a href="<?php echo base_url() ?>divisi/hapus/<?php echo $dvs->id_divisi; ?>" title="" class="btn btn-danger tombol-hapus">Hapus</a></td>
		
												<?php $no++; ?>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		
		<!-- modal tambah -->
		<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Divisi</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="<?php echo base_url()?>divisi/tambah" method="post">

		        	<div class="form-group">
		        		<label for="divisi">Divisi</label>
		        		<input type="text" name="divisi" class="form-control divisi" placeholder="Masukan divisi">
		        	</div>

		        	<div class="form-group">
		        		<label for="divisi">Tingkat divisi</label>
		        		<select name="level" class="form-control">
		        			<option value="2">Divisi</option>
		        			<option value="1">Direktur Utama</option>
		        		</select>
		        	</div>
		        	
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save</button>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>

			<!-- modal edit -->
			<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Divisi</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="<?php echo base_url()?>divisi/edit" method="post">
		        	
		        	<input type="hidden" name="id_divisi" class="id_divisi">

		        	<div class="form-group">
		        		<label for="divisi">Divisi</label>
		        		<input type="text" name="divisi" class="form-control divisi" placeholder="Masukan divisi">
		        	</div>

		        	<div class="form-group">
		        		<label for="divisi">Tingkat divisi</label>
		        		<select name="level" class="form-control level">
		        			<option value="2">Divisi</option>
		        			<option value="1">Direktur Utama</option>
		        		</select>
		        	</div>

		        	
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save</button>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a>
</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->


</body>
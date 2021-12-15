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
									<h3 class="panel-title">Data Jabatan</h3>
								</div>

								<div class="panel-body">
								<?php echo $this->session->flashdata('flash'); ?>
									<div style="margin-bottom:20px;">
										<button type="button" class="btn btn-success" <?php if ($cekdivisi['id_divisi']<1) {
											echo "disabled";
										} ?> data-toggle="modal" data-target="#exampleModalCenter">
							 		 		Tambah Data
										</button>
									</div>
									<table class="table table-hover mt-5">
										<thead>
											<tr>
												<th>No.</th>
												<th>Jabatan</th>
												<th>Divisi</th>
												<th>Tingkat Jabatan</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; ?>
											<?php foreach($jabatan as $jbt): ?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $jbt->jabatan; ?></td>
												<td><?php echo $jbt->divisi; ?></td>
<td><?php if($jbt->level == 1){echo 'Direktur Utama';}else if($jbt->level == 2){echo 'Direktur';}else if($jbt->level == 3){echo 'Manager';}else if($jbt->level == 4){echo 'Supervisor';}else if($jbt->level == 5){echo 'Koordinator';}else{echo 'Staff';} ?></td>
												<td><a href="#" title="" class="btn btn-primary tombol-edit" data-toggle="modal" data-target="#modalEdit" data-id_jabatan="<?php echo $jbt->id_jabatan; ?>" data-jabatan="<?php echo $jbt->jabatan; ?>" data-divisi="<?php echo $jbt->id_divisi; ?>" data-level="<?php echo $jbt->level; ?>">Edit</a> &nbsp; <a href="<?php echo base_url()?>jabatan/hapus/<?php echo $jbt->id_jabatan; ?>" title="" class="btn btn-danger tombol-hapus">Hapus</a></td>
												<?php $no++ ?>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
						</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>

		<!-- modal -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Jabatan</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="<?php echo base_url()?>jabatan/tambah" method="post">
		        	

		        	<div class="form-group">
		        		<label for="jabatan">Divisi</label>
		        		
		        		<select name="divisi" class="form-control" required>
							<?php foreach($divisi as $dvs): ?>
							<option value="<?php echo $dvs->id_divisi; ?>" ><?php echo $dvs->divisi; ?></option>
							<?php endforeach; ?>
						</select>
		        	</div>

		        	<div class="form-group">
		        		<label for="jabatan">Jabatan</label>
		        		<input type="text" name="jabatan" class="form-control" placeholder="Masukan jabatan" required>
		        	</div>

		        	<div class="form-group">
		        		<label for="level">Tingkat Jabatan</label>
		        		<select name="level" class="form-control" required>
		        			<option value="1" <?php if ($cekjabatan['level'] > 0) {
		        				echo 'disabled';
		        			} ?>>Direktur Utama</option>
		        			<option value="2">Direktur</option>
		        			<option value="3">Manager</option>
		        			<option value="4">Supervisor</option>
		        			<option value="5">Koordinator</option>
		        			<option value="6">Staff</option>
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
		        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Jabatan</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="<?php echo base_url()?>jabatan/edit" method="post">
		        	
		        	<input type="hidden" name="id_jabatan" class="id_jabatan">

		        	<div class="form-group">
		        		<label for="jabatan">Divisi</label>
		        		<select name="divisi" class="form-control divisi">
							<?php foreach($divisi as $dvs): ?>
							<option value="<?php echo $dvs->id_divisi; ?>"><?php echo $dvs->divisi; ?></option>
							<?php endforeach; ?>
						</select>
		        	</div>

		        	<div class="form-group">
		        		<label for="jabatan">Jabatan</label>
		        		<input type="text" name="jabatan" class="form-control jabatan" placeholder="Masukan jabatan">
		        	</div>

		        	<div class="form-group">
		        		<label for="level">Tingkat Jabatan</label>
		        		<select name="level" class="form-control level">
		        			<option value="1" <?php if ($cekjabatan['level'] > 0) {
		        				echo 'disabled';
		        			} ?>>Direktur Utama</option>
		        			<option value="2">Direktur</option>
		        			<option value="3">Manager</option>
		        			<option value="4">Supervisor</option>
		        			<option value="5">Koordinator</option>
		        			<option value="6">Staff</option>
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
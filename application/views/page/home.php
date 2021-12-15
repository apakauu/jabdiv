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
					<h3 class="page-title">Dashboard</h3>
					<?php echo $this->session->flashdata('login'); ?>
					<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Keseluruhan</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover dataTable">
										<thead>
											<tr>
												<th>No.</th>
												<th>Divisi</th>
												<th>Jabatan</th>
												<th>Level</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=1; ?>
											<?php foreach($data_semua as $data): ?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $data->divisi; ?></td>
												<td><?php echo $data->jabatan; ?></td>
												<td><?php echo $data->level; ?></td>
											</tr>
											<?php $no++; ?>
										<?php endforeach;?>

										</tbody>
									</table>
								</div>
							</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
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
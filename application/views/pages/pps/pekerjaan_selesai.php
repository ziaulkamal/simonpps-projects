<div class="container-fluid">

	<div class="page-header">
		<div class="row">
			<div class="col-sm-6 pt-5">
				<h3><?= $pageTitle ?></h3>
				<?php $this->load->view('partials/breadcumb');?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="basic-1">
							<thead>
								<tr>
									<th>No</th>
									<th>Satuan Kerja</th>
									<th>Nama Pekerjaan</th>
									<th>Status</th>
									<th>Dokumen</th>
									<th>Tanggal</th>
								</tr>
							</thead>
							<tbody>
								<?php $no =1; foreach ($data as $res) { ?>
									<tr>
										<th><?= $no++ ?></th>
										<td><?= ucwords($res->asal_satkerPE) ?></td>
										<td><?= ucwords($res->nama_pkjPE) ?></td>
										<td><?php if ($res->outputSts == 2) {
											echo "Pekerjaan Diberhentikan";
										}elseif($res->outputSts == 1) {
											echo "Pekerjaan Selesai Tuntas";
										} ?></td>
										<td><?php if ($res->outputSts == 2) { ?>
											<a href="<?= base_url('pps/pekerjaan/diselesaikan/'.$res->IN16ST); ?>" class="btn btn-outline-info btn-air-info btn-xs" >IN.16</a>
											<?php }elseif($res->outputSts == 1) { ?>
												<a href="<?= base_url('pps/pekerjaan/diselesaikan/'.$res->IN17ST); ?>" class="btn btn-outline-info btn-air-info btn-xs" >IN.17</a>
												<a href="<?= base_url('pps/pekerjaan/diberhentikan/'.$res->IN2ST); ?>" class="btn btn btn-outline-danger btn-air-danger btn-xs">IN.2</a>
										<?php } ?></td>
										<td><?= $res->updateDateST?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



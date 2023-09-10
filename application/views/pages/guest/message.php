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
				<?php $this->load->view('partials/alerts');?>
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="basic-1">
							<thead>
								<tr>
									<th>No</th>
									<!-- <th>Asal Dinas</th> -->
									<th>Nama Pekerjaan</th>
									<th>Status Berkas</th>
									<th>Dokumen Balasan</th>
									<th>Tanggal</th>

								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($data as $d) { 
                                    if ($d->jns_dokDO == 'diterima' || $d->jns_dokDO == 'ditolak') { ?>
								<tr>
									<td><?= $i++; ?></td>
									<!-- <td><?= $d->asal_satkerPE ?></td> -->
									<td><?= $d->nama_pkjPE; ?></td>

									<td><?= 'Dokumen '.ucwords(($d->jns_dokDO))?></td>
									<td>
										<?php if ($d->jns_dokDO == 'diterima') { ?>
										<a href="<?= base_url('public/lampiran/').$d->IN13DO; ?>" target="_blank"
											class="btn btn-outline-success btn-air-success btn-xs">Download Dokumen
											IN.13</a>
										<a href="<?= base_url('public/lampiran/').$d->IN2DO; ?>" target="_blank"
											class="btn btn-outline-info btn-air-info btn-xs">Download Dokumen IN.2</a>
										<?php }else {?>
										<a href="<?= base_url('public/lampiran/').$d->IN14DO; ?>" target="_blank"
											class="btn btn-outline-danger btn-air-danger btn-xs">Download Dokumen
											IN.14</a>
										<?php } ?>
									</td>
									<td>
										<?= $d->updateDateDO; ?>
									</td>
								</tr>
								<?php } } ?>


							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

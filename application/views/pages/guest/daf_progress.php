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
									<th>Nama Proyek</th>
									<th>Tanggal/Bulan/Tahun</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1 ;?>
								<?php foreach ($data as $d) { ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= ucwords($d->pkj_namaPR) ?></td>
									<td><?= $d->waktuPR; ?></td>
									<td>
										<a href="#" class="span badge rounded-pill pill-badge-warning" type="button"
											data-bs-toggle="modal"
											data-bs-target="#modal-detail-<?= $d->id_progPR; ?>">Lihat Detail</a>
										<a href="" class="span badge rounded-pill pill-badge-secondary" type="button"
											data-bs-toggle="modal"
											data-bs-target="#modal-progress-<?= $d->id_progPR; ?>">Lihat Progress</a>
									</td>
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

<?php foreach ($data as $d) { ?>
<div class="modal fade bd-example-modal-lg" id="modal-detail-<?= $d->id_progPR; ?>" tabindex="-1" role="dialog"
	aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detail Progress Pekerjaan </h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<table class="display table table-bordered" id="basic-2">
							<tbody>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Nama Proyek</td>
									<td class="f-w-600 txt-dark">: <?= $d->pkj_namaPR; ?></td>
								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Tanggal/Bulan/Tahun</td>
									<td class="f-w-600 txt-dark">: <?= $d->waktuPR; ?></td>
								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Rencana Progress</td>
									<td class="f-w-600 txt-dark">: <?= $d->rcn_progPR; ?>%</td>
								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Realisasi Progress</td>
									<td class="f-w-600 txt-dark">: <?= $d->rl_progPR; ?>%</td>
								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Deviasi</td>
									<td class="f-w-600 txt-dark">: <?= $d->deviasiPR; ?>%</td>
								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Realisasi Keuangan</td>
									<td class="f-w-600 txt-dark">: <?= 'Rp.'.number_format($d->rl_keuanPR,2,',','.'); ?></td>
								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Laporan Bulanan</td>
									<td class="f-w-600 txt-dark">: <?= $d->lp_bulanPR; ?></td>
								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Item Pekerjaan Terbaru</td>
									<td class="f-w-600 txt-dark">: <a class="btn btn-pill btn-outline-primary btn-air-primary btn-xs" href="<?= base_url('public/lampiran/'). $d->it_pkjPR ?>" target="_blank">Lihat Foto</a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<!-- modal terima -->
<div class="modal fade bd-example-modal-lg modal-terima" id="exampleModalCenter" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalCenter" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Kirim Pemberitahuan</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="" method="POST">
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3 row">
								<label class="col-md-4 col-form-label">PPS IN.16</label>
								<div class="col-md-8"><input class="form-control" type="file"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3 row">
								<label class="col-md-4 col-form-label">PPS IN.17</label>
								<div class="col-md-8"><input class="form-control" type="file"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3 row">
								<label class="col-md-4 col-form-label">Pesan</label>
								<div class="col-md-8"><textarea class="form-control" id="" rows="3"
										placeholder="Isi pesan...."></textarea></div>
							</div>
						</div>
					</div>
					<button class="btn btn-primary" type="submit">Kirim</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- modal terima -->

<?php foreach ($data as $d) { ?>
<div class="modal fade bd-example-modal-lg" id="modal-progress-<?= $d->id_progPR; ?>" tabindex="-1" role="dialog"
	aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content col-12">
			<div class="modal-header">
				<h5 class="modal-title"><b>Riwayat Aktivitas : (<?= ucwords($d->pkj_namaPR); ?>)</b></h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
			<table class="table">
				<thead class="thead-dark">
				<tr>
					<th scope="col">No.</th>
					<th scope="col">Rencana</th>
					<th scope="col">Realisasi</th>
					<th scope="col">Deviasi</th>
					<th scope="col">Realisasi Keuangan</th>
					<th scope="col">Foto Pekerjaan</th>
					<th scope="col">Laporan Bulanan</th>
					<th scope="col">Tanggal Update</th>
				</tr>
				</thead>
				<tbody>
					<?php $setNo = 1; foreach ($this->guest->getTrackByIdProgress($d->id_progPR)->result() as $datas) { ?>
						<tr>
							<th scope="row"><?= $setNo++; ?></th>
							<td><?= $datas->rcnProgress ?>%</td>
							<td><?= $datas->rlProgress ?>%</td>
							<td><?= $datas->deviasiProgress ?>%</td>
							<td><?= $datas->rlKeuangan ?></td>
							<td>
								<a class="btn btn-pill btn-outline-primary btn-air-primary btn-xs" href="<?= base_url('public/lampiran/').$datas->fotoPekerjaan ?>" target="_blank">Lihat Foto</a>	
							</td>
							<td><?= $datas->lpBulanan ?></td>
							<td><?= $datas->updateDateTrack ?></td>
						</tr>
					<?php } ?>


				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
<?php }?>

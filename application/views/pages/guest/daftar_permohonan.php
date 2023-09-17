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
									<th>Surat Permohonan</th>
									<th>Surat Keputusan Proyek Strategis</th>
									<th>OPSI</th>

								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($data as $d) { 
									if ($d->jns_dokDO != 'selesai') { ?>
								<tr>
									<td><?= $i++; ?></td>
									<!-- <td><?= $d->asal_satkerPE ?></td> -->
									<td><?= $d->nama_pkjPE; ?></td>
									<td><a href="" data-bs-toggle="tooltip" data-bs-placement="right"
											title="Download File"><?= pathinfo($d->s_permohonanPE, PATHINFO_BASENAME); ?></a>
									</td>
									<td><a href="" data-bs-toggle="tooltip" data-bs-placement="right"
											title="Download File"><?= pathinfo($d->skp_straPE, PATHINFO_BASENAME); ?></a>
									</td>
									<td>
										<a href="#" class="btn btn-pill btn-outline-info btn-air-info btn-xs"
											type="button" data-bs-toggle="modal"
											data-bs-target="#modal-<?= $d->id_pemohonPE; ?>">Lihat Detail</a>

										<?php switch ($d->jns_dokDO) {
											case 'diterima': ?>

										<a href="<?= base_url('guest/pekerjaan/create/').$d->id_pemohonPE; ?>"
											class="btn btn-pill btn-success btn-air-success btn-xs">Kirim Progress</a>
										<?php break;
											case 'ditindak': ?>
										<a href="<?= base_url('public/lampiran/').$d->ud_pprDO; ?>" target="_blank"
											class="btn btn-pill btn-outline-warning btn-air-warning btn-xs">Download
											Undangan Pemaparan</a>
										<?php break;
											
											default: ?>
										<a href="<?= base_url('guest/permohonan/delete/').$d->id_pemohonPE; ?>"
											class="btn btn-pill btn-danger btn-air-danger btn-xs">Hapus</a>
										<?php break;
										}?>
									</td>
								</tr>
								<?php }
								 } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php foreach ($data as $d) { ?>
<div class="modal fade bd-example-modal-lg" id="modal-<?= $d->id_pemohonPE; ?>" tabindex="-1" role="dialog"
	aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detail Pemohon </h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<table class="display table table-bordered" id="basic-2">
							<tbody>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Asal Satuan Kerja</td>
									<td class="f-w-600 txt-dark">: <?= $d->asal_satkerPE; ?></td>
								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Nama Pekerjaan</td>
									<td class="f-w-600 txt-dark">: <?= $d->nama_pkjPE; ?></td>
								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Sumber Pembiayaan</td>
									<td class="f-w-600 txt-dark">: <?= $d->sumber_pbyPE; ?></td>
								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Pagu Anggaran</td>
									<td class="f-w-600 txt-dark">: <?= "Rp " . number_format($d->pagu_aggPE,2,',','.'); ?></td>
								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Nilai Kontrak</td>
									<td class="f-w-600 txt-dark">: <?= "Rp " . number_format($d->nil_kontrakPE,2,',','.'); ?></td>
								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Jangka Waktu Dimulai</td>
									<td class="f-w-600 txt-dark">: <?= $d->jw_StartpelaksanaanPE; ?></td>
								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Jangka Waktu Berakhir</td>
									<td class="f-w-600 txt-dark">: <?= $d->jw_EndpelaksanaanPE; ?></td>
								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Lokasi Pekerjaan</td>
									<td class="f-w-600 txt-dark">: <?= $d->lokasi_pkjPE; ?></td>
								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Timeline Pelaksanaan Tahapan</td>
									<td class="f-w-600 txt-dark"><a href="<?= base_url('public/lampiran/').$d->timtah_pelakPE; ?>" class="btn btn-outline-success btn-air-success btn-xs" data-bs-toggle="tooltip" data-bs-placement="right" title="Download File"><?= pathinfo($d->timtah_pelakPE, PATHINFO_BASENAME); ?></a></td>

								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Surat Permohonan</td>
									<td class="f-w-600 txt-dark"><a href="<?= base_url('public/lampiran/').$d->s_permohonanPE; ?>" class="btn btn-outline-success btn-air-success btn-xs" data-bs-toggle="tooltip" data-bs-placement="right" title="Download File"><?= pathinfo($d->s_permohonanPE, PATHINFO_BASENAME); ?></a></td>

								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Surat Keputusan Proyek Strategis</td>
									<td class="f-w-600 txt-dark"><a href="<?= base_url('public/lampiran/').$d->skp_straPE; ?>" class="btn btn-outline-success btn-air-success btn-xs" data-bs-toggle="tooltip" data-bs-placement="right" title="Download File"><?= pathinfo($d->skp_straPE, PATHINFO_BASENAME); ?></a></td>

								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Tahapan Berjalan</td>
									<td class="f-w-600 txt-dark">: <?= $d->t_berjalanPE; ?></td>
								</tr>
								<tr>
									<td class="f-w-700 txt-dark" style="width:50%">Potensi Pengaruh Keberhasilan</td>
									<td class="f-w-600 txt-dark">: <?= $d->pp_keberPE; ?></td>
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

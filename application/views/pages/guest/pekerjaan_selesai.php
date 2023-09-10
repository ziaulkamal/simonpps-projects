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
				<?php $this->load->view('partials/alerts', $data, FALSE);
				?>
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
									<td>
										<?php if ($res->surveyIdST == NULL) { ?>
										<a href="<?= base_url('#'); ?>" class="btn btn-outline-success btn-xs"
											type="button" data-bs-toggle="modal" data-bs-target="#exampleModalmdo">Isi
											Survey Sebelum Download</a>
										<?php } else {if ($res->outputSts == 2) { ?>
										<a href="<?= base_url('pps/pekerjaan/diselesaikan/'.$res->IN16ST); ?>"
											class="btn btn-outline-info btn-air-info btn-xs">IN.16</a>
										<?php }elseif($res->outputSts == 1) { ?>
										<a href="<?= base_url('pps/pekerjaan/diselesaikan/'.$res->IN17ST); ?>"
											class="btn btn-outline-info btn-air-info btn-xs">IN.17</a>
										<a href="<?= base_url('pps/pekerjaan/diberhentikan/'.$res->IN2ST); ?>"
											class="btn btn btn-outline-danger btn-air-danger btn-xs">IN.2</a>
										<?php }}?>

									</td>
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


<?php foreach ($data as $res) { ?>
<div class="modal fade" id="exampleModalmdo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Survey Kepuasan Layanan</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form class="needs-validation"
				action="<?= base_url('guest/pekerjaan/sendSurvey/').$res->id_statusST; ?>" method="POST"
				enctype="multipart/form-data">
			<div class="modal-body">
					<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
						value="<?= $this->security->get_csrf_hash(); ?>">

					<div class="mb-3">
						<label class="col-form-label" for="message-text">Pekerjaan:</label>
						<input class="form-control" type="text"
									value="<?= $res->nama_pkjPE ?>" readonly>
					</div>
					<div class="mb-3">
						<label class="col-form-label" for="message-text">Pesan Masukan:</label>
						<textarea name="masukan" class="form-control"></textarea>
					</div>
					<div class="mb-3">
						<label class="col-form-label" for="message-text">Rating Kepuasan:</label>
						<div class="rating-container">
							<div class="star-ratings">
								<div class="stars stars-example-fontawesome-o">
									<select id="u-rating-fontawesome-o" name="rating"
										data-current-rating="5" autocomplete="off">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option selected value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select><span class="title current-rating font-primary">Rating diberikan: <span
											class="value digits"></span></span><span
										class="title your-rating font-primary hidden">Rating diberikan: <span
											class="value digits"></span><a class="clear-rating"
											href="javascript:void(0)"><i class="fa fa-times-circle"></i></a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
					<button class="btn btn-primary" type="submit">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php }?>

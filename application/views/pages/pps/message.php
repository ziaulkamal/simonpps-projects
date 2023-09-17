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
									<th>Asal Dinas</th>
									<th>Nama Pekerjaan</th>
									<th>Pesan Kepuasan</th>
									<th>Rating</th>
									<th>Tanggal</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($data as $d) { ?>
								<tr>
									<td><?= $i++; ?></td>
									<td><?= $d->asal_satkerPE ?></td>
									<td><?= $d->nama_pkjPE; ?></td>
									<td><?= $d->pesanMasukan; ?></td>
									<td><?= $d->ratingNum; ?></td>
									<td><?= $d->updateDaate; ?></td>
								</tr>
								<?php  } ?>


							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

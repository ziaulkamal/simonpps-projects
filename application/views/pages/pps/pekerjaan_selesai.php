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
					<a href="<?= base_url('export'); ?>" class="btn btn-outline-primary btn-air-primary btn-sm"> Export PDF</a>
						<table class="display myTable" id="basic-1">
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
								<?php $no = 1; foreach ($data as $res) { ?>
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
												<a href="<?= base_url('public/lampiran/').$res->IN17ST; ?>" target="_blank" class="btn btn-outline-info btn-air-info btn-xs" >IN.17</a>
												<a href="<?= base_url('public/lampiran/').$res->IN2ST; ?>" target="_blank" class="btn btn btn-outline-danger btn-air-danger btn-xs">IN.2</a>
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


<!-- <script>
        function exportsToPDF() {
            // Mendapatkan referensi elemen canvas
            const canvas = document.getElementById("pdfCanvas");

            // Mengatur ukuran canvas sesuai kebutuhan
            const pdfWidth = canvas.width;
            const pdfHeight = canvas.height;

            // Membuat objek jsPDF
            const doc = new jsPDF({
				orientation: "l", // "l" untuk landscape
			unit: "mm",
			format: [160, 90], // Ukuran halaman dengan rasio 16:9
            });

            // Mendapatkan referensi elemen tabel berdasarkan ID
            const table = document.getElementById("basic-1");

            // Menggambar tabel ke elemen canvas
            doc.html(table, {
                callback: function (pdf) {
                    // Simpan dokumen PDF sebagai file
                    pdf.save("table.pdf");

                    // Menampilkan gambar PDF di elemen canvas
                    const pdfDataURL = pdf.output("datauristring");
                    const ctx = canvas.getContext("2d");
                    const img = new Image();

                    img.src = pdfDataURL;
                    img.onload = function () {
                        ctx.drawImage(img, 110, 0, pdfWidth, pdfHeight);
                        canvas.style.display = "block";
                    };
                },
                x: 10,
                y: 10,
            });
        }
</script> -->



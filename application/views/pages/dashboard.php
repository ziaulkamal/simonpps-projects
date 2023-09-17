<div class="container-fluid general-widget">
	<div class="col-sm-12 col-xl-12 col-lg-12">
		<?php $this->load->view('partials/alerts'); ?>
	</div>
	<div class="row">
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card o-hidden border-0">
				<div class="bg-primary b-r-4 card-body">
					<div class="media static-top-widget">
						<div class="align-self-center text-center"><i data-feather="file-text"></i></div>
						<div class="media-body"><span class="m-0">Jumlah Permohonan</span>
							<h4 class="mb-0 counter">21</h4><i class="icon-bg" data-feather="file-text"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card o-hidden border-0">
				<div class="bg-secondary b-r-4 card-body">
					<div class="media static-top-widget">
						<div class="align-self-center text-center"><i data-feather="box"></i></div>
						<div class="media-body"><span class="m-0">Arsipan</span>
							<h4 class="mb-0 counter">15</h4><i class="icon-bg" data-feather="box"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card o-hidden border-0">
				<div class="bg-primary b-r-4 card-body">
					<div class="media static-top-widget">
						<div class="align-self-center text-center"><i data-feather="clipboard"></i></div>
						<div class="media-body"><span class="m-0">Proyek Selesai</span>
							<h4 class="mb-0 counter">10</h4><i class="icon-bg" data-feather="clipboard"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card o-hidden border-0">
				<div class="bg-secondary b-r-4 card-body">
					<div class="media static-top-widget">
						<div class="align-self-center text-center"><i data-feather="users"></i></div>
						<div class="media-body"><span class="m-0">Jumlah Pengguna</span>
							<h4 class="mb-0 counter">12</h4><i class="icon-bg" data-feather="users"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-xl-6 box-col-6">
				<div class="card">
					<div class="card-header pb-0">
						<h5>Diagram Proyek Selesai</h5>
					</div>
					<div class="card-body">
						<div id="basic-bars"></div>
					</div>
				</div>
			</div>
             <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Tingkat Survey Kepuasan </h5>
                  </div>
                  <div class="card-body apex-chart">
                    <div id="piecharts"></div>
                  </div>
                </div>
            </div>
		</div>
	</div>

</div>
	</div>
	<!-- Container-fluid Ends-->
</div>
		<!-- footer start-->
		<footer class="footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 footer-copyright text-center font-dark">
						<script>
						document.write(new Date().getFullYear())
					</script> © SIMON-PPS
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="<?= base_url('public/')?>js/jquery-3.5.1.min.js"></script>
	<script src="<?= base_url('public/')?>js/icons/feather-icon/feather.min.js"></script>
	<script src="<?= base_url('public/')?>js/icons/feather-icon/feather-icon.js"></script>
	<script src="<?= base_url('public/')?>js/sidebar-menu.js"></script>
	<script src="<?= base_url('public/')?>js/config.js"></script>
	<script src="<?= base_url('public/')?>js/bootstrap/popper.min.js"></script>
	<script src="<?= base_url('public/')?>js/bootstrap/bootstrap.min.js"></script>
	<script src="<?= base_url('public/')?>js/rating/jquery.barrating.js"></script>
    <script src="<?= base_url('public/')?>js/rating/rating-script.js"></script>

	<?php if (isset($dashboard)) { ?>
	<script src="<?= base_url('public/')?>js/chart/apex-chart/apex-chart.js"></script>
    <script src="<?= base_url('public/')?>js/chart/apex-chart/stock-prices.js"></script>
    <!-- <script src="<?= base_url('public/')?>js/chart/apex-chart/chart-custom.js"></script> -->
	<script>
var options2 = {
    chart: {
        height: 350,
        type: 'bar',
        toolbar: {
            show: false
        }
    },
    plotOptions: {
        bar: {
            horizontal: true,
        }
    },
    dataLabels: {
        enabled: false
    },
    series: [{
        data: <?php echo json_encode($nilai_satker); ?>
    }],
    xaxis: {
        categories: <?php echo json_encode($label_satker); ?>
    },
    colors: ['#24695C']
}

var chart2 = new ApexCharts(
    document.querySelector("#basic-bars"),
    options2
);

chart2.render();


// pie chart
var options8 = {
    chart: {
        width: 380,
        type: 'pie',
    },
    labels: <?php echo json_encode($label_survey); ?>,
    series: <?php echo json_encode($nilai_survey); ?>,
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200
            },
            legend: {
                position: 'bottom'
            }
        }
    }],
    colors: ['#24695C', '#D224FF', '#222222', '#717171', '#e2c636', '#FF5733', '#33FF57', '#5733FF', '#FF3333', '#33FF33']

}

var chart8 = new ApexCharts(
    document.querySelector("#piecharts"),
    options8
);

chart8.render();
	</script>
	<?php }?>

	<?php if (isset($dataTable)) { ?>
	<script src="<?= base_url('public/')?>js/datatable/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('public/')?>js/datatable/datatables/datatable.custom.js"></script>
	<script src="<?= base_url('public/')?>js/tooltip-init.js"></script>
	<script src="<?= base_url('public/')?>js/chart-widget.js"></script>
	<?php }?>
	<script src="<?= base_url('public/')?>js/script.js"></script>
	<script src="<?= base_url('public/')?>js/extra-js/jquery.mask.js"></script>
	<script type="text/javascript">
            $(document).ready(function(){

                // Format mata uang.
                $( '.uang' ).mask('000.000.000.000.000', {reverse: true});

            })
            $(document).ready(function(){

                // Format persen.
                $( '.persen' ).mask('00', {reverse: true});

            })
        </script>
</body>

</html>
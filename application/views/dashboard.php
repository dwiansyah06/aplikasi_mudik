<div class="page-title-area">
		<div class="row align-items-center">
				<div class="col-sm-12">
						<div class="breadcrumbs-area clearfix">
								<h4 class="page-title pull-left">Dashboard</h4>
								<ul class="breadcrumbs pull-left">
										<li><a href="index.html">Home</a></li>
										<li><span>Table Basic</span></li>
								</ul>
						</div>
				</div>
		</div>
</div>

<div class="main-content-inner">
		<div class="row">
			<?php
				if ($this->session->userdata('level') == 'admin') {
					foreach($rute as $row):
						echo '
						<div class="col-md-4">
								<div class="single-report mb-xs-30 mt-5">
										<div class="s-report-inner pr--20 pt--30 mb-3">
												<div class="icon"><i class="ti-user"></i></div>
												<div class="s-report-title d-flex justify-content-between">
														<h4 class="header-title mb-0">Jumlah penumpang rute '.$row->asal.' ke '.$row->tujuan.'</h4>
												</div>
												<div class="d-flex justify-content-between pb-2">
														<h2>'.$row->jum_pendaftar.' orang</h2>
														<span>dari '.$row->slot.' slot</span>
												</div>
										</div>
										<canvas id="coin_sales1" height="100"></canvas>
								</div>
						</div>
						';
					endforeach;
				}
			?>

		</div>
</div>

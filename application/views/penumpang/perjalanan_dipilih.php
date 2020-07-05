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
      <div class="col-md-12">
        <div class="card mt-5">
          <div class="card-body">
            <div class="single-table">
              <div class="table-responsive">
                  <table class="table text-center table-bordered table-hover">
                      <thead class="bg-light">
                          <tr>
                              <th scope="col">No</th>
                              <th scope="col">No Tiket</th>
                              <th scope="col">Transportasi</th>
                              <th scope="col">Asal</th>
                              <th scope="col">Tujuan</th>
                              <th scope="col">Jadwal Keberangkatan</th>
                              <th scope="col">Orang diajak</th>
                              <th scope="col">Status</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach($perjalanan_dipilih as $row): ?>
                          <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= cetak($row->tiket) ?></td>
                            <td class="text-center"><?= cetak($row->moda_transportasi) ?></td>
                            <td class="text-center"><?= cetak($row->asal) ?></td>
                            <td class="text-center"><?= cetak($row->tujuan) ?></td>
                            <td class="text-center"><?= cetak($row->jadwal) ?></td>
                            <td class="text-center"><?= cetak($row->jum_orang) ?> Orang</td>
                            <td class="text-center">
                              <?php
                                if ($row->status == 0) {
                                  echo '<span class="badge badge-pill badge-primary">Belum Diverifikasi Admin</span>';
                                } elseif ($row->status == 1) {
                                	echo '<span class="badge badge-pill badge-success"><span class="ti-check"></span> Disetujui</span>';
                                } else {
																	echo '<span class="badge badge-pill badge-danger"><span class="ti-close"></span> Tidak Disetujui</span>';
																}
                              ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                  </table>
              </div>
          </div>
          </div>
        </div>
      </div>
		</div>
</div>

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
      <div class="col-md-12 mt-5">
        <div class="card">
          <div class="card-body">
            <div class="single-table">
              <div class="table-responsive">
                  <table class="table text-center table-bordered table-hover">
                      <thead class="bg-light">
                          <tr>
                              <th scope="col">No Tiket</th>
                              <th scope="col">Transportasi</th>
                              <th scope="col">Asal</th>
                              <th scope="col">Tujuan</th>
                              <th scope="col">Jadwal Keberangkatan</th>
															<th scope="col">Slot</th>
															<th scope="col">Jumlah Penumpang</th>
                              <th scope="col">Nama Penumpang</th>
                              <th scope="col">Orang diajak</th>
                              <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach($tiket as $row): ?>
                          <tr>
                            <td class="text-center"><?= cetak($row->tiket) ?></td>
                            <td class="text-center"><?= cetak($row->moda_transportasi) ?></td>
                            <td class="text-center"><?= cetak($row->asal) ?></td>
                            <td class="text-center"><?= cetak($row->tujuan) ?></td>
                            <td class="text-center"><?= cetak($row->jadwal) ?></td>
														<td class="text-center"><?= cetak($row->slot) ?> Orang</td>
														<td class="text-center"><?= cetak($row->jum_pendaftar) ?> Orang</td>
                            <td class="text-center"><?= cetak($row->nama) ?></td>
                            <td class="text-center"><?= cetak($row->jum_orang) ?> Orang</td>
                            <td class="text-center">
                              <?php
                                if ($row->status == 0) {
                                  echo '
                                    <button type="button" class="btn btn-sm btn-rounded btn-primary btnVerifTiket" data-id="'.$row->Id_tiket.'" data-jum="'.$row->jum_orang.'" data-perjalanan="'.$row->Id_perjalanan.'">Verifikasi Tiket</button>
                                  ';
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

<div class="modal fade" id="modalVerifTiket" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Verifikasi Tiket ini</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>

            <form id="VerifTiket" method="post">
              <div class="modal-body">
								<?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                  <div class="form-group">
                    <label>Keputusan</label>
                    <input type="hidden" id="idTiket" name="id_tiket" >
										<input type="hidden" id="jumOrang" name="jumlah_orang" >
										<input type="hidden" id="Prjlnan" name="id_perjalanan" >
                    <select class="form-control" name="verifikasi" required>
                      <option disabled selected value="">Pilih Keputusuan</option>
                      <option value="1">Disetujui</option>
											<option value="2">Tidak Disetujui</option>
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>

        </div>
    </div>
</div>

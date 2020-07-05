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
        <div class="mt-5">
          <button type="button" class="btn btn-rounded btn-primary mb-3" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="fa fa-plus-circle"></span> Tambah Data Keberangkatan</button>
        </div>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="single-table">
              <div class="table-responsive">
                  <table class="table text-center table-bordered table-hover">
                      <thead class="bg-light">
                          <tr>
                              <th scope="col">No</th>
                              <th scope="col">Transportasi</th>
                              <th scope="col">Asal</th>
                              <th scope="col">Tujuan</th>
                              <th scope="col">Jadwal Keberangkatan</th>
                              <th scope="col">Slot</th>
															<th scope="col">Jumlah Pendaftar</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach($mudik as $row): ?>
                          <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= cetak($row->moda_transportasi) ?></td>
                            <td class="text-center"><?= cetak($row->asal) ?></td>
                            <td class="text-center"><?= cetak($row->tujuan) ?></td>
                            <td class="text-center"><?= cetak($row->jadwal) ?></td>
                            <td class="text-center"><?= cetak($row->slot) ?> Orang</td>
														<td class="text-center"><?= cetak($row->jum_pendaftar) ?> Orang</td>
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

<div class="modal fade bd-example-modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Keberangkatan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>

            <form id="addKeberangkatan" method="post">
              <div class="modal-body">
								<?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                <div class="form-group">
                    <label>Transportasi</label>
                    <select class="form-control" name="_transport" required>
                      <option selected disabled value="">Pilih Moda Transportasi</option>
                      <option>Bus</option>
                      <option>Kapal</option>
                    </select>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Asal</label>
                        <select class="form-control" name="_asal" required>
                          <option selected disabled value="">Pilih Kota Asal</option>
                          <?php
													foreach ($kota as $key => $value) {
															foreach ($value as $row) {
																echo "<option>".$row->nama."</option>";
															}
														}
													?>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Tujuan</label>
                        <select class="form-control" name="_tujuan" required>
                          <option selected disabled value="">Pilih Kota Tujuan</option>
													<?php
													foreach ($kota as $key => $value) {
															foreach ($value as $row) {
																echo "<option>".$row->nama."</option>";
															}
														}
													?>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Jadwal Keberangkatan</label>
                        <input class="form-control" type="datetime-local" name="_jadwal" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label" required>Slot</label>
                        <input class="form-control" type="number" name="_slot" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>

        </div>
    </div>
</div>

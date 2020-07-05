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
      <?php foreach($mudik as $row): ?>
        <div class="col-lg-4 col-md-6 mt-5">
            <div class="card card-bordered">
                <div class="card-body">
                    <h5 class="title">Perjalanan dari <?= $row->asal ?> ke <?= $row->tujuan ?></h5>
                    <table class="table table-bordered">
                      <tr>
                        <?php
                          if ($row->moda_transportasi == "Bus") {$icon = "fa fa-car";} else {$icon = "fa fa-ship";}
                        ?>
                        <td class="text-center"><span class="<?= $icon ?>"></span></td>
                        <td><?= $row->moda_transportasi ?></td>
                      </tr>
                      <tr>
                        <td class="text-center"><span class="fa fa-map-signs"></span></td>
                        <td><?= $row->asal ?> <strong>(Asal)</strong></td>
                      </tr>
                      <tr>
                        <td class="text-center"><span class="fa fa-map-marker"></span></td>
                        <td><?= $row->tujuan ?> <strong>(Tujuan)</strong></td>
                      </tr>
                      <tr>
                        <td class="text-center"><span class="fa fa-calendar"></span></td>
                        <td><?= $row->jadwal ?></td>
                      </tr>
                      <tr>
                        <td class="text-center"><span class="fa fa-users"></span></td>
                        <td><?= $row->slot ?> Orang</td>
                      </tr>
											<tr>
                        <td class="text-center">Slot Tersedia</td>
                        <td><?= $row->slot - $row->jum_pendaftar ?> Orang lagi</td>
                      </tr>

                    </table>
                    <button class="btn btn-primary btn-block ClaimPerjalanan" data-perjalanan="<?= $row->Id_perjalanan ?>">Claim Perjalanan</button>
                </div>
            </div>
        </div>
      <?php endforeach; ?>
		</div>
</div>

<div class="modal fade" id="exampleModalCenter" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yakin memilih perjalanan ini?</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>

            <form id="ChooseTrip" method="post">
              <div class="modal-body">
								<?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                  <div class="form-group">
                    <label>Jumlah orang yang diajak</label>
                    <input type="hidden" id="idPerjalanan" name="id_perjalanan" >
                    <select class="form-control" name="jumOrang" required>
                      <option disabled selected value="">Pilih jumlah orang yang diajak</option>
                      <?php
                        for ($i=0; $i <= 5; $i++) {
                          echo '
                            <option>'.$i.'</option>
                          ';
                        }
                      ?>
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

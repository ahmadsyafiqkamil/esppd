<div class="content-wrapper">

  <!-- Vertical form options -->
  <div class="row">
    <div class="col-md">

      <!-- Basic layout-->
      <!-- <?php echo form_open_multipart('client/status_kwitansi/'.$data_kwitansi->id_kwitansi, 'class="form-horizontal"'); ?> -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title">Detil Kwitansi</h5>
          <div class="heading-elements">
            <!-- <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
            <li><a data-action="close"></a></li>
          </ul> -->
        </div>
      </div>

      <div class="panel-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>No Kwitansi</label>
            <div class="form-control-static"><?php echo $data_kwitansi->no_kwitansi ?></div>
          </div>

          <div class="form-group">
            <label>No SPPD</label>
            <div class="form-control-static"><?php echo $data_kwitansi->no_sppd ?></div>
          </div>

          <div class="form-group">
            <label>Kota</label>
            <div class="form-control-static"><?php echo $data_kwitansi->nama_kota ?></div>
          </div>

          <div class="form-group">
            <label>Total Biaya Perjalanan</label>
            <div class="form-control-static"><?php echo 'Rp.'.number_format($data_kwitansi->total_biaya, 0, ".", "."); ?></div>
          </div>

          <hr>
          <div class="form-group">
            <div class="table-responsive">
              <label>Pegawai yang Berangkat</label>
              <table class="table table-framed">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NIP</th>
                    <th>NAMA</th>
                    <th>Total Biaya Harian</th>
                    <th>Total Biaya Transportasi</th>
                    <th>Total Biaya Hotel</th>

                  </tr>
                </thead>
                <tbody>
                  <?php $i =0;
                  foreach ($data_detil_kwitansi as $p ):
                    $i++;
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $p->nip; ?></td>
                      <td><?php echo $p->nama_pegawai; ?></td>
                      <td><?php echo 'Rp.'.number_format($p->total_lupsum, 0, ".", "."); ?></td>
                      <td><?php echo 'Rp.'.number_format($p->total_transport, 0, ".", "."); ?></td>
                      <td><?php echo 'Rp.'.number_format($p->total_hotel, 0, ".", "."); ?></td>

                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

            <hr>
            <div class="table-responsive">
              <label>Rincian Biaya Lain</label>
              <table class="table table-framed">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Item</th>
                    <th>Jumlah</th>
                    <th>Total</th>

                  </tr>
                </thead>
                <tbody>
                  <?php $i =0;
                  foreach ($data_detil_kwitansi_biaya_lain as $p ):
                    $i++;
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $p->nama_item; ?></td>
                      <td><?php echo $p->jumlah_item; ?></td>
                      <td><?php echo 'Rp.'.number_format($p->total_biaya, 0, ".", "."); ?></td>
                    </tr>
                  <?php endforeach; ?>


                </tbody>
              </table>
            </div>
          </div>
          <hr>
          <!-- <div class="form-group">
            <label><?php echo lang('cnt_126'); ?></label>
            <textarea rows="5" cols="5" class="form-control" name="perihal" placeholder="Enter your message here"></textarea>
          </div> -->

          <div class="text-right">
            <a href="<?php echo base_url('client/tolak_kwitansi/').$data_kwitansi->id_kwitansi; ?>" type="button"  class="btn ">Tolak Kwitansi</a>
            <a href="<?php echo base_url('client/setuju_kwitansi/').$data_kwitansi->id_kwitansi; ?>" type="button"  class="btn btn-primary">Setuju Kwitansi</a>
          </div>
        </div>

      </div>
    </div>
    <!-- <?php echo form_close(); ?> -->
    <!-- /basic layout -->

  </div>


</div>
</div>

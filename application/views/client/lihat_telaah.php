<div class="content-wrapper">

  <!-- Vertical form options -->
  <div class="row">
    <div class="col-md">

      <!-- Basic layout-->
      <?php echo form_open_multipart('client/input_telaah/'.$data_sppd->id_sppd, 'class="form-horizontal"'); ?>
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title"><?php echo lang('cnt_117'); ?></h5>
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
            <label><?php echo lang('cnt_118'); ?></label>
            <div class="form-control-static"><?php echo $data_sppd->id_sppd ?></div>
          </div>

          <div class="form-group">
            <label><?php echo lang('cnt_119'); ?></label>
            <div class="form-control-static"><?php echo $data_sppd->nama_kota ?></div>
          </div>

          <div class="form-group">
            <label><?php echo lang('cnt_120'); ?></label>
            <div class="form-control-static"><?php echo $data_sppd->tugas_sppd ?></div>
          </div>

          <div class="form-group">
            <label><?php echo lang('cnt_121'); ?></label>
            <?php if ($data_sppd->kegiatan_sppd == 0) {
              echo "<div class='form-control-static'>Kegiatan</div>";
            }else {
              echo "<div class='form-control-static'>Undangan</div>";
            } ?>

          </div>
          <hr>
          <div class="form-group">
            <div class="table-responsive">
              <label><?php echo lang('cnt_122'); ?></label>
              <table class="table table-framed">
                <thead>
                  <tr>
                    <th>#</th>
                    <th><?php echo lang('cnt_123'); ?></th>
                    <th><?php echo lang('cnt_124'); ?></th>

                  </tr>
                </thead>
                <tbody>
                  <?php $i =0;
                  foreach ($pegawai_diusulkan->result() as $p ):
                    $i++;
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $p->nip_pegawai; ?></td>
                      <td><?php echo $p->nama_pegawai; ?></td>

                    </tr>
                  <?php endforeach; ?>


                </tbody>
              </table>
            </div>

            <hr>
            <div class="table-responsive">
              <label><?php echo lang('cnt_125'); ?></label>
              <table class="table table-framed">
                <thead>
                  <tr>
                    <th>#</th>
                    <th><?php echo lang('cnt_123'); ?></th>
                    <th><?php echo lang('cnt_124'); ?></th>

                  </tr>
                </thead>
                <tbody>
                  <?php $i =0;
                  foreach ($pegawai_pengikut->result() as $p ):
                    $i++;
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $p->nip_pegawai; ?></td>
                      <td><?php echo $p->nama_pegawai; ?></td>

                    </tr>
                  <?php endforeach; ?>


                </tbody>
              </table>
            </div>
          </div>
          <hr>
          <div class="form-group">
            <label><?php echo lang('cnt_126'); ?></label>
            <textarea rows="5" cols="5" class="form-control" name="perihal" placeholder="Enter your message here"></textarea>
          </div>

          <div class="text-right">
            <button type="submit" class="btn btn-primary"><?php echo lang('cnt_127'); ?></button>
          </div>
        </div>

      </div>
    </div>
    <?php echo form_close(); ?>
    <!-- /basic layout -->

  </div>


</div>
</div>

<div class="content-wrapper">
  <div class="panel panel-flat">
    <?=$this->session->flashdata('notif')?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h6 class="panel-title"><?php echo lang('cnt_134'); ?></h6>
        <div class="heading-elements panel-nav">
          <ul class="nav nav-tabs nav-tabs-bottom">
            <li class="active"><a href="#panel-tab1" data-toggle="tab"> <?php echo lang('cnt_135'); ?></a></li>
            <li><a href="#panel-tab2" data-toggle="tab"> <?php echo lang('cnt_136'); ?></a></li>
            <li><a href="#panel-tab3" data-toggle="tab"> <?php echo lang('cnt_137'); ?></a></li>
            <li><a href="#panel-tab4" data-toggle="tab"> <?php echo lang('cnt_138'); ?></a></li>
            <li><a href="#panel-tab5" data-toggle="tab"> <?php echo lang('cnt_139'); ?></a></li>
            <li><a href="#panel-tab6" data-toggle="tab"> <?php echo lang('cnt_140'); ?></a></li>

          </ul>
        </div>
      </div>

      <div class="panel-tab-content tab-content">
        <div class="tab-pane active has-padding" id="panel-tab1">

          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title"><?php echo lang('cnt_135'); ?></h5>
              <div class="heading-elements">
                <ul class="icons-list">
                  <!-- <li><a data-action="collapse"></a></li> -->
                  <!-- <li><a data-action="reload"></a></li> -->
                  <!-- <li><a data-action="close"></a></li> -->
                </ul>
              </div>
            </div>

            <div class="panel-body">
              <div class="text-left">
                <?php echo form_open_multipart('client/tambah_provinsi', 'class="form-horizontal"'); ?>
                <fieldset class="content-group">
                  <div class="form-group">
                    <label class="control-label col-lg-2"><?php echo lang('cnt_135'); ?></label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" name="nama" required>
                    </div>
                  </div>

                  <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                  </div>
                </fieldset>
                <?php echo form_close(); ?>
                <!-- <a href="<?php echo base_url(); ?>client/tambah_nota" type="button" class="btn btn-primary" onclick=""><?php echo lang('cnt_83'); ?> </a> -->
              </div>
            </div>

            <table class="table datatable-basic">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th class="text-center"><?php echo lang('cnt_47'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($provinsi->result() as $pro ):
                  $i++;
                  ?>

                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $pro->nama ?></td>
                    <td>4</td>
                  </tr>
                <?php endforeach; ?>

              </tbody>
            </table>
          </div>
        </div>


        <div class="tab-pane has-padding" id="panel-tab2">

          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title"><?php echo lang('cnt_136'); ?></h5>
              <div class="heading-elements">
                <ul class="icons-list">
                  <!-- <li><a data-action="collapse"></a></li> -->
                  <!-- <li><a data-action="reload"></a></li> -->
                  <!-- <li><a data-action="close"></a></li> -->
                </ul>
              </div>
            </div>
            <div class="panel-body">
              <div class="text-left">
                <?php echo form_open_multipart('client/tambah_kota_tujuan', 'class="form-horizontal"'); ?>
                <fieldset class="content-group">
                  <div class="form-group">
                    <label class="control-label col-lg-2"><?php echo lang('cnt_135'); ?></label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" name="nama" required>
                    </div>
                  </div>

                  <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                  </div>
                </fieldset><?php echo form_close(); ?>
              </div>
            </div>

            <table class="table datatable-basic">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th class="text-center"><?php echo lang('cnt_47'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($kota->result() as $pro ):
                  $i++;
                  ?>

                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $pro->nama ?></td>
                    <td>4</td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="tab-pane has-padding" id="panel-tab3">

          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title"><?php echo lang('cnt_137'); ?></h5>
              <div class="heading-elements">
                <ul class="icons-list">
                  <!-- <li><a data-action="collapse"></a></li> -->
                  <!-- <li><a data-action="reload"></a></li> -->
                  <!-- <li><a data-action="close"></a></li> -->
                </ul>
              </div>
            </div>
            <div class="panel-body">
              <div class="text-left">
                <?php echo form_open_multipart('client/tambah_transportasi', 'class="form-horizontal"'); ?>
                <fieldset class="content-group">
                  <!-- <legend class="text-bold">Basic selects</legend> -->

                  <div class="form-group">
                    <label class="control-label col-lg-2">Moda Transportasi</label>
                    <div class="col-lg-10">
                      <select name="transport" class="form-control">
                        <?php foreach ($transport->result() as $t): ?>
                          <option value="<?php  echo $t->id;?>"><?php echo $t->nama; ?></option>
                        <?php endforeach; ?>

                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Eselon</label>
                    <div class="col-lg-10">
                      <select name="eselon" class="form-control">

                        <?php foreach ($eselon->result() as $k): ?>
                          <option value="<?php echo $k->id; ?>"><?php echo $k->nama; ?></option>
                        <?php endforeach; ?>

                      </select>
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label class="control-label col-lg-2">Kota</label>
                    <div class="col-lg-10">
                      <select name="kota" class="form-control">
                        <?php foreach ($kota->result() as $t): ?>
                          <option value="<?php  echo $t->id;?>"><?php echo $t->nama; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <label class="control-label col-lg-2">Jumlah</label>
                    <div class="col-lg-10">
                      <input type="text" name="jumlah" class="form-control">
                    </div>
                  </div>
                  <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                  </div>


                </fieldset>
                <?php echo form_close(); ?>
              </div>
            </div>

            <table class="table datatable-basic">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Transportasi</th>
                  <th>Eselon</th>
                  <!-- <th>Destinasi</th> -->
                  <th>Biaya Transportasi</th>
                  <th class="text-center"><?php echo lang('cnt_47'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($biaya_transport->result() as $pro ):
                  $i++;
                  ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $pro->nama_transport ?></td>
                    <td><?php echo $pro->eselon ?></td>
                    <!-- <td><?php echo $pro->nama_kota ?></td> -->
                    <td><?php echo 'Rp.'.number_format($pro->jumlah_transport, 0, ".", "."); ?></td>
                    <td>action</td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="tab-pane has-padding" id="panel-tab4">

          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title"><?php echo lang('cnt_138'); ?></h5>
              <div class="heading-elements">
                <ul class="icons-list">
                  <!-- <li><a data-action="collapse"></a></li> -->
                  <!-- <li><a data-action="reload"></a></li> -->
                  <!-- <li><a data-action="close"></a></li> -->
                </ul>
              </div>
            </div>
            <div class="panel-body">
              <div class="text-left"><?php echo form_open_multipart('client/tambah_biaya_lain_lain', 'class="form-horizontal"'); ?>
                <fieldset class="content-group">

                  <div class="form-group">
                    <label class="control-label col-lg-2">Nama</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" name="nama" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Nominal</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" name="nominal" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Keterangan</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" name="keterangan" required>
                    </div>
                  </div>

                  <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                  </div>
                </fieldset><?php echo form_close(); ?>
              </div>
            </div>

            <table class="table datatable-basic">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Nominal</th>
                  <th>Keterangan</th>
                  <th class="text-center"><?php echo lang('cnt_47'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($biaya_lain->result() as $pro ):
                  $i++;
                  ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $pro->nama ?></td>
                    <td><?php echo 'Rp.'.number_format($pro->jumlah, 0, ".", "."); ?></td>
                    <td><?php echo $pro->ket ?></td>
                    <td>4</td>
                  </tr>
                <?php endforeach; ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane has-padding" id="panel-tab5">

          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title"><?php echo lang('cnt_139'); ?></h5>
              <div class="heading-elements">
                <ul class="icons-list">
                  <!-- <li><a data-action="collapse"></a></li> -->
                  <!-- <li><a data-action="reload"></a></li> -->
                  <!-- <li><a data-action="close"></a></li> -->
                </ul>
              </div>
            </div>
            <div class="panel-body">
              <div class="text-left"><?php echo form_open_multipart('client/tambah_lupsum', 'class="form-horizontal"'); ?>
                <fieldset class="content-group">
                  <div class="form-group">
                    <label class="control-label col-lg-2">Kota</label>
                    <div class="col-lg-10">
                      <select name="kota" class="form-control">
                        <?php foreach ($kota->result() as $t): ?>
                          <option value="<?php  echo $t->id;?>"><?php echo $t->nama; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Nominal</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" name="nominal" required>
                    </div>
                  </div>

                  <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                  </div>
                </fieldset><?php echo form_close(); ?>
              </div>
            </div>

            <table class="table datatable-basic">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Destinasi</th>
                  <th>Uang Harian</th>
                  <th class="text-center"><?php echo lang('cnt_47'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($lupsum->result() as $pro ):
                  $i++;
                  ?>

                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $pro->nama_kota ?></td>
                    <td><?php echo 'Rp.'.number_format($pro->jumlah_biaya, 0, ".", "."); ?></td>
                    <td>4</td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane has-padding" id="panel-tab6">

          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title"><?php echo lang('cnt_140'); ?></h5>
              <div class="heading-elements">
                <ul class="icons-list">
                  <!-- <li><a data-action="collapse"></a></li> -->
                  <!-- <li><a data-action="reload"></a></li> -->
                  <!-- <li><a data-action="close"></a></li> -->
                </ul>
              </div>
            </div>
            <div class="panel-body">
              <div class="text-left">
                <?php echo form_open_multipart('client/tambah_biaya_hotel', 'class="form-horizontal"'); ?>
                <fieldset class="content-group">

                  <div class="form-group">
                    <label class="control-label col-lg-2">Eselon</label>
                    <div class="col-lg-10">
                      <select name="eselon" class="form-control">

                        <?php foreach ($eselon->result() as $k): ?>
                          <option value="<?php echo $k->id; ?>"><?php echo $k->nama; ?></option>
                        <?php endforeach; ?>

                      </select>
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label class="control-label col-lg-2">Kota</label>
                    <div class="col-lg-10">
                      <select name="kota" class="form-control">
                        <?php foreach ($kota->result() as $t): ?>
                          <option value="<?php  echo $t->id;?>"><?php echo $t->nama; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div> -->

                  <div class="form-group">
                    <label class="control-label col-lg-2">Nominal</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" name="nominal" required>
                    </div>
                  </div>

                  <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                  </div>
                </fieldset><?php echo form_close(); ?>
              </div>
            </div>

            <table class="table datatable-basic">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Eselon</th>
                  <!-- <th>Destinasi</th> -->
                  <th>Biaya Hotel</th>
                  <th class="text-center"><?php echo lang('cnt_47'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($hotel->result() as $pro ):
                  $i++;
                  ?>

                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $pro->eselon ?></td>
                    <!-- <td><?php echo $pro->nama_kota ?></td> -->
                    <td><?php echo 'Rp.'.number_format($pro->jumlah, 0, ".", "."); ?></td>
                    <td>4</td>
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

<script type="text/javascript">

$.extend( $.fn.dataTable.defaults, {
  autoWidth: false,
  columnDefs: [{
    orderable: false,
    width: '100px'
  }],
  dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
  language: {
    search: '<span>Filter:</span> _INPUT_',
    searchPlaceholder: 'Type to filter...',
    lengthMenu: '<span>Show:</span> _MENU_',
    paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
  },
  drawCallback: function () {
    $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
  },
  preDrawCallback: function() {
    $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
  }
});


// Basic datatable
$('.datatable-basic').DataTable();
// $('.datatable-tab1').DataTable();
// $('.datatable-tab2').DataTable();
// $('.datatable-tab3').DataTable();
// $('.datatable-tab4').DataTable();
// $('.datatable-tab5').DataTable();
// $('.datatable-tab6').DataTable();

</script>

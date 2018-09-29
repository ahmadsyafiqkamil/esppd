<div class="content-wrapper">
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title"><?php echo lang('cnt_20'); ?></h5>
      <div class="heading-elements">
        <ul class="icons-list">
          <!-- <li><a data-action="collapse"></a></li> -->
          <!-- <li><a data-action="reload"></a></li> -->
          <!-- <li><a data-action="close"></a></li> -->
        </ul>
      </div>
    </div>
    <div class="panel-body">
      <div class="text-right">
        <button type="button" data-toggle="modal"
        data-target="#tambah-data"
        class="btn btn-primary" onclick=""><?php echo lang('cnt_43'); ?> <i class="glyphicon glyphicon-user position-right"></i></button>
      </div>
    </div>
    <table class="table datatable-basic">
      <thead>
        <tr>
          <th><?php echo lang('cnt_48'); ?></th>
          <th><?php echo lang('cnt_44'); ?></th>
          <th><?php echo lang('cnt_45'); ?></th>
          <th><?php echo lang('cnt_62'); ?></th>
          <th class="text-center"><?php echo lang('cnt_47'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 0; ?>
        <?php foreach ($pegawai->result() as $p): ?>
          <?php $i++;?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $p->nip_pegawai; ?></td>
            <td><?php echo $p->nama_pegawai; ?></td>
            <td><?php echo $p->nama_instansi; ?></td>
            <td>
              <button type="button"
              data-toggle="modal"
              data-target="#edit-data"
              class="btn btn-info"
              onclick="ubahDataPegawai( '<?php echo $p->nip_pegawai; ?>','<?php echo $p->nip_pegawai; ?>','<?php echo $p->nama_pegawai; ?>')"
              >Ubah</button>
              <a href="<?php echo base_url('client/pegawai_delete/').$p->nip_pegawai; ?>">
                <button type="button" class="btn btn-danger btn-sm" id="sweet_warning">delete</button>
              </td>
            </tr>

          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Ubah Data</h4>
        </div>
        <?php echo form_open_multipart('client/pegawai_update', 'class="form-horizontal"'); ?>
        <div class="modal-body">
          <div class="form-group">
            <label class="col-lg-2 col-sm-2 control-label"><?php echo lang('cnt_44') ; ?></label>
            <div class="col-lg-10">
              <input type="text" class="form-control" disabled="disabled" id="nip" name="nip" placeholder="Tuliskan NIP">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 col-sm-2 control-label"><?php echo lang('cnt_45'); ?></label>
            <div class="col-lg-10">
              <input type="text" class="form-control"  id="nama" name="nama" placeholder="Tuliskan Nama">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 col-sm-2 control-label"><?php echo lang('cnt_64'); ?></label>
            <div class="col-lg-10">
              <input type="password" class="form-control"  name="password" placeholder="Tuliskan Password">
            </div>
          </div>
          <fieldset class="content-group">
            <div class="form-group">
              <label class="control-label col-lg-2"><?php echo lang('cnt_63'); ?></label>
              <div class="col-lg-10">
                <input type="file" class="file-styled-primary" name="foto" required>
              </div>
            </div>
          </fieldset>
          <div class="form-group">
            <label class="control-label col-lg-2"><?php echo lang('cnt_62') ?></label>
            <div class="col-lg-10">
              <select name="instansi" class="form-control">
                <?php foreach ($instansi->result() as $j): ?>
                  <option value="<?php echo $j->id; ?>"><?php echo $j->nama; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>

  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Ubah Data</h4>
        </div>
        <?php echo form_open_multipart('client/pegawai_add', 'class="form-horizontal"'); ?>
        <div class="modal-body">
          <div class="form-group">
            <label class="col-lg-2 col-sm-2 control-label"><?php echo lang('cnt_44') ; ?></label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="nip" name="nip" placeholder="Tuliskan NIP">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 col-sm-2 control-label"><?php echo lang('cnt_45'); ?></label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Tuliskan Nama">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 col-sm-2 control-label"><?php echo lang('cnt_64'); ?></label>
            <div class="col-lg-10">
              <input type="password" class="form-control" name="password" placeholder="Tuliskan Password">
            </div>
          </div>
          <fieldset class="content-group">
            <div class="form-group">
              <label class="control-label col-lg-2"><?php echo lang('cnt_63'); ?></label>
              <div class="col-lg-10">
                <input type="file" class="file-styled-primary" name="foto" required>
              </div>
            </div>
          </fieldset>
          <div class="form-group">
            <label class="control-label col-lg-2"><?php echo lang('cnt_62') ?></label>
            <div class="col-lg-10">
              <select name="instansi" class="form-control">
                <?php foreach ($instansi->result() as $j): ?>
                  <option value="<?php echo $j->unit_id; ?>"><?php echo $j->nama; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>


        <div class="modal-footer">
          <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
  <script type="text/javascript">

  function ubahDataPegawai (id,nip, nama){
    $('#id').val(id);
    $('#nip').val(nip);
    $('#nama').val(nama);
    // $('#golongan').val(golongan);
  }

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
</script>

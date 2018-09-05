
<button type="button" name="button"></button>
<div class="content-wrapper">
  <!-- Javascript sourced data -->
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title"><?php echo lang('cnt_20'); ?></h5>
      <div class="heading-elements">
        <ul class="icons-list">
          <li><a data-action="collapse"></a></li>
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
          <th><?php echo lang('cnt_46'); ?></th>
          <th class="text-center"><?php echo lang('cnt_47'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 0; ?>
        <?php foreach ($pegawai->result() as $p): ?>
          <?php $i++;?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $p->nip; ?></td>
            <td><?php echo $p->username; ?></td>
            <td><?php echo $p->golongan; ?></td>
            <td>
              <button type="button"
              data-toggle="modal"
              data-target="#edit-data"
              class="btn btn-info"
              onclick="ubahDataPegawai( '<?php echo $p->user_id; ?>','<?php echo $p->nip; ?>','<?php echo $p->username; ?>', '<?php echo $p->golongan; ?>')"
              >Ubah</button>
              <a href="#" type="button" class="btn btn-danger btn-sm" id="sweet_combine" >Delete</a>
            </td>
          </tr>

        <?php endforeach; ?>
        </tbody>
      </table>
      <!-- /basic datatable -->
    </div>
    <!-- /javascript sourced data -->

  </div>

  <!--  modal update data-->
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Ubah Data</h4>
        </div>
        <form class="form-horizontal" action="<?php site_url("client/pegawai_update") ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="modal-body">
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label"><?php echo lang('cnt_44') ; ?></label>
              <div class="col-lg-10">
                <input type="hidden" id="id" name="id">
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
              <label class="control-label col-lg-2"><?php echo lang('cnt_56') ?></label>
              <div class="col-lg-10">
                <select name="select" class="form-control">
                  <?php foreach ($jabatan->result() as $j): ?>
                    <option value="<?php echo $j->id; ?>"><?php echo $j->jabatan; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-2"><?php echo lang('cnt_46'); ?></label>
              <div class="col-lg-10">
                <select name="select" class="form-control">
                  <?php foreach ($golongan->result() as $g): ?>
                    <option value="<?php echo $g->id; ?>"><?php echo $g->golongan; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- tambah -->
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Ubah Data</h4>
        </div>
        <form class="form-horizontal" action="<?php site_url("client/pegawai_update") ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="modal-body">
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label"><?php echo lang('cnt_44') ; ?></label>
              <div class="col-lg-10">
                <!-- <input type="hidden" id="id" name="id"> -->
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
              <label class="control-label col-lg-2"><?php echo lang('cnt_56') ?></label>
              <div class="col-lg-10">
                <select name="select" class="form-control">
                  <?php foreach ($jabatan->result() as $j): ?>
                    <option value="<?php echo $j->id; ?>"><?php echo $j->jabatan; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-2"><?php echo lang('cnt_46'); ?></label>
              <div class="col-lg-10">
                <select name="select" class="form-control">
                  <?php foreach ($golongan->result() as $g): ?>
                    <option value="<?php echo $g->id; ?>"><?php echo $g->golongan; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">

  function ubahDataPegawai (id,nip, nama, golongan){
    $('#id').val(id);
    $('#nip').val(nip);
    $('#nama').val(nama);
    $('#golongan').val(golongan);
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

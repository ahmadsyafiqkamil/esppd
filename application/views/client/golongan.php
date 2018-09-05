<div class="content-wrapper">
  <!-- Javascript sourced data -->
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title"><?php echo lang('cnt_22'); ?></h5>
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
        data-target="#tambah-data" class="btn btn-primary"><?php echo lang('cnt_51'); ?> <i class="glyphicon glyphicon-user position-right"></i></button>
      </div>
    </div>

    <table class="table datatable-basic">
      <thead>
        <tr>
          <th><?php echo lang('cnt_57'); ?></th>
          <th><?php echo lang('cnt_58'); ?></th>
          <th><?php echo lang('cnt_50'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 0; ?>
        <?php foreach ($golongan->result() as $g): ?>
          <?php $i++;?>
          <tr>
            <td><?php echo $g->id; ?></td>
            <td><?php echo $g->golongan; ?></td>
            <td>
              <button type="button"
              data-toggle="modal"
              data-target="#edit-data"
              class="btn btn-info"
              onclick="ubahDataPegawai( '<?php echo $g->id; ?>','<?php echo $g->golongan; ?>')"
              >Ubah</button>
              <a href="#" type="button" class="btn btn-danger btn-sm" id="sweet_combine" >Delete</a>
            </td>
          </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
  </div>
  <!-- /javascript sourced data -->

</div>
<!-- ubah data -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Ubah Data</h4>
      </div>
      <form class="form-horizontal" action="<?php site_url("client/golongan_update") ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <div class="form-group">
            <label class="col-lg-2 col-sm-2 control-label"><?php echo lang('cnt_49') ; ?></label>
            <div class="col-lg-10">
              <input type="text" class="form-control " id="id" name="id" disabled="disabled">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 col-sm-2 control-label"><?php echo lang('cnt_46'); ?></label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="golongan" name="nama" placeholder="Tuliskan Golongan">
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

              <input type="text" class="form-control" id="nip" name="nip" placeholder="ID Golongan" disabled="disabled">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 col-sm-2 control-label"><?php echo lang('cnt_45'); ?></label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Tuliskan Nama">
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

function ubahDataPegawai (id,golongan){
  $('#id').val(id);
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

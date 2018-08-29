
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
        <button type="button" class="btn btn-primary"><?php echo lang('cnt_43'); ?> <i class="glyphicon glyphicon-user position-right"></i></button>
      </div>
    </div>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
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
            <td><?php echo $p->username; ?></td>
            <td><?php echo $p->name; ?></td>
            <td><?php echo $p->nama; ?></td>
            <td>
              <a
              href="javascript:;"
              data-id="<?php echo $p->id; ?>"
              data-nip="<?php echo $p->username; ?>"
              data-nama="<?php echo $p->name; ?>"
              data-golongan="<?php echo $p->nama; ?>"
              data-toggle="modal" data-target="#edit-data">
              <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-info">Ubah</button>
            </a>
            <a href="#" type="button" class="btn btn-danger btn-sm" id="sweet_combine" >Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
    <!-- /basic datatable -->
  </div>
  <!-- /javascript sourced data -->

</div>

<!--  modal edit data-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Ubah Data</h4>
      </div>
      <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <div class="form-group">
            <label class="col-lg-2 col-sm-2 control-label">Nama</label>
            <div class="col-lg-10">
              <input type="hidden" id="id" name="id">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Tuliskan Nama">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 col-sm-2 control-label">Alamat</label>
            <div class="col-lg-10">
              <textarea class="form-control" id="alamat" name="alamat" placeholder="Tuliskan Alamat"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 col-sm-2 control-label">Pekerjaan</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Tuliskan Pekerjaan">
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

<!--  modal update data-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Ubah Data</h4>
      </div>
      <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <div class="form-group">
            <label class="col-lg-2 col-sm-2 control-label">Nama</label>
            <div class="col-lg-10">
              <input type="hidden" id="id" name="id">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Tuliskan Nama">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 col-sm-2 control-label">Alamat</label>
            <div class="col-lg-10">
              <textarea class="form-control" id="alamat" name="alamat" placeholder="Tuliskan Alamat"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 col-sm-2 control-label">Pekerjaan</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Tuliskan Pekerjaan">
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

$(document).ready(function() {
  $('#example').DataTable();
} );

$(document).ready(function() {
  // Untuk sunting
  $('#edit-data').on('show.bs.modal', function (event) {
    var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
    var modal          = $(this)

    // Isi nilai pada field
    modal.find('#id').attr("value",div.data('id'));
    modal.find('#nip').attr("value",div.data('nama'));
    modal.find('#nama').html(div.data('alamat'));
    modal.find('#golongan').attr("value",div.data('pekerjaan'));
  });
});


</script>

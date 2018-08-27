<script type="text/javascript">

$(document).ready(function() {
  $('#example').DataTable();
} );

</script>
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
          <th><?php echo lang('cnt_47'); ?></th>
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
            <td class="text-center">
              <ul class="icons-list">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-menu9"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="<?php site_url()?>client/pegawai_update/<?php echo $p->id ?>" data-toggle="modal" data-target="#modal_form_horizontal">Edit</li>
                      <li><a href="<?php site_url()?>client/pegawai_delete/<?php echo $p->id ?>">Hapus</li>
                      </ul>
                    </li>
                  </ul>
                </td>
              </tr>
            <?php endforeach; ?>

          </table>
          <!-- /basic datatable -->
        </div>
        <!-- /javascript sourced data -->

      </div>

      <div id="modal_form_horizontal" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title"><?php echo lang('cnt_52'); ?></h5>
            </div>

            <form action="#" class="form-horizontal">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label col-sm-3"><?php echo lang('cnt_44'); ?></label>
                  <div class="col-sm-9">
                    <input type="text" placeholder="" class="form-control" value="<?php echo $p->username; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3"><?php echo lang('cnt_45'); ?></label>
                  <div class="col-sm-9">
                    <input type="text" placeholder="" class="form-control" value="<?php echo $p->name; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3"><?php echo lang('cnt_46'); ?></label>
                  <div class="col-sm-9">
                    <input type="text" placeholder="" class="form-control" value="<?php echo $p->nama; ?>">
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit form</button>
                </div>
              </form>
            </div>
          </div>
        </div>

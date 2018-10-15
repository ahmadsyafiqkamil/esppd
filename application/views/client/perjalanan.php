<div class="content-wrapper">
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title"><?php echo lang('cnt_96'); ?></h5>
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
        <!-- <a href="<?php echo base_url(); ?>client/tambah_nota" type="button" class="btn btn-primary" onclick=""><?php echo lang('cnt_83'); ?> </a> -->
      </div>
    </div>

    <table class="table datatable-basic">
      <thead>
        <tr>
          <th><?php echo lang('cnt_97'); ?></th>
          <th><?php echo lang('cnt_91'); ?></th>
          <th><?php echo lang('cnt_69'); ?></th>
          <th><?php echo lang('cnt_98'); ?></th>
          <th class="text-center"><?php echo lang('cnt_47'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($sppd->result() as $s): ?>
          <tr>
            <td><?php echo $s->no_spd; ?></td>
            <td><?php echo $s->tugas; ?></td>
            <td><?php echo $s->nama_kota; ?></td>
            <td><?php echo $s->mata_anggaran; ?></td>
            <td><a  href="<?php echo base_url(); ?>client/cetak_sppd/<?php echo $s->id_sppd;?>" type="button" class="btn bg-blue">Detail<i class="glyphicon glyphicon-tasasition-right"></i></a>
              <a href="<?php echo base_url(); ?>client/hapus_sppd/<?php echo $s->id_sppd;?>" type="button" class="btn bg-warning"> Hapus <i class="glyphicon glyphicon-remove position-right"></i> </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
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
</script>

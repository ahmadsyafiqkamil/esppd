<div class="content-wrapper">
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title"><?php echo lang('cnt_95'); ?></h5>
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
          <th><?php echo lang('cnt_89'); ?></th>
          <th><?php echo lang('cnt_90'); ?></th>
          <th><?php echo lang('cnt_75'); ?></th>
          <th><?php echo lang('cnt_91'); ?></th>
          <th class="text-center"><?php echo lang('cnt_47'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dataSPPD->result() as $sppd ):
          $pegawai = json_decode($sppd->nama_pegawai,true);
          ?>
          <tr>
            <td><?php echo $sppd->no_spd; ?></td>
            <td><?php foreach ($pegawai as $p ) {
              echo '<li>'.$p.'</li>';
            } ?></td>
            <td><?php echo $sppd->nama_kota; ?></td>
            <td><?php echo $sppd->tugas; ?></td>
            <td><a href="<?php echo base_url(); ?>client/cetak" type="button" class="btn bg-blue">cetak<i class="glyphicon glyphicon-print position-right"></i></a>
              <a type="button" class="btn bg-warning"> Hapus <i class="glyphicon glyphicon-remove position-right"></i> </a>
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

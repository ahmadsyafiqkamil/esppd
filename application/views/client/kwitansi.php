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
          <th><?php echo lang('cnt_130'); ?></th>
          <th><?php echo lang('cnt_131'); ?></th>
          <th><?php echo lang('cnt_132'); ?></th>
          <th><?php echo lang('cnt_133'); ?></th>
          <th class="text-center"><?php echo lang('cnt_47'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($kwitansi->result() as $kw ): ?>
          <tr>
            <td><?php echo $kw->no_kwitansi; ?></td>
            <td><?php echo 'Rp.'.number_format($kw->total_uang, 0, ".", "."); ?></td>
            <td><?php echo $kw->no_sppd; ?></td>
            <td><?php switch ($kw->status_sppd) {
              case 1:
              echo "sudah ditelaah";
              break;
              case 2:
              echo "Disetujui Kepala Dinas";
              break;
              case 3:
              echo "Ditolak Kepala Dinas";
              break;
              case 4:
              echo "Lanjut SPT";
              break;
              case 5:
                echo "SPPD Ditolak";
                break;
                case 6:
                  echo "SPPD Rampun";
                  break;
                  case 7:
                    echo "Sudah Pulang dari Perjalanan Dinas";
                    break;
              default:
              echo "Belum Ditelaah";
              break;
            } ?></td>
            <td>action</td>
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

<div class="content-wrapper">
  <div class="panel panel-flat">
    <?=$this->session->flashdata('notif')?>
    <div class="panel-heading">
      <h5 class="panel-title">Kwitansi</h5>
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
            <td><?php echo $kw->no_sppd; ?></td>
            <td><?php echo 'Rp.'.number_format($kw->total_biaya, 0, ".", "."); ?></td>
            <td><?php switch ($kw->status_kwitansi) {
              case 1:
              echo "Kwitansi diterima";
              break;
              default:
              echo "Kwitansi ditolak";
              break;
            } ?></td>
            <td><a href="<?php echo base_url('client/detil_kwitansi/').$kw->id_kwitansi; ?>"> detail </a></td>
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

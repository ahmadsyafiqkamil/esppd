<div class="content-wrapper">
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title"><?php echo lang('cnt_88'); ?></h5>
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
          <th><?php echo lang('cnt_48'); ?></th>
          <th><?php echo lang('cnt_86'); ?></th>
          <th><?php echo lang('cnt_87'); ?></th>
          <th><?php echo lang('cnt_79'); ?></th>
          <th class="text-center"><?php echo lang('cnt_47'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 0; ?>
        <?php foreach ($telaah->result() as $t): ?>
          <?php $i++;?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $t->perihal_telaah; ?></td>
            <td><?php echo nice_date($t->tanggal_mulai_telaah, 'd-m-y') ; ?> sd <?php echo nice_date($t->tanggal_selesai_telaah,'d-m-y'); ?></td>
            <td><?php
            switch ($t->status_telaah) {
              case 0:
              echo "<span class='label bg-blue'>Menunggu Konfirmasi</span>";
              break;
              case 1:
              echo "<span class='label bg-success'>DISETUJUI</span>";
              break;

              case '2':
              echo "<span class='label bg-warning'>DITOLAK</span>";
              break;
              default:
              echo "<span class='label bg-green'>Sudah Dibuatkan SPPD</span>";
              break;
            }
            ?></td>
            <td><a type="button" class="btn bg-green-400"> Lihat </a>
              <?php $level = $this->session->userdata('level');
              if ($level == 'User')
              {

              }
              elseif ($level == 'SuperAdmin')
              {
                if ($t->status_telaah == 1) {
                  if (!isset($t->spt_sppd)) {
                    echo '<a type="button" class="btn bg-grey-400"> Buat SPT </a>';
                  }
                }
              }
              else
              {

              } ?>
              <a type="button" class="btn bg-warning"> Hapus </a>
              <a type="button" class="btn bg-teal-400"> Print </a>

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

<div class="content-wrapper">
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title"><?php echo lang('cnt_82'); ?></h5>
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
        <a href="<?php echo base_url(); ?>client/tambah_nota" type="button" class="btn btn-primary" onclick=""><?php echo lang('cnt_83'); ?> </a>
      </div>
    </div>

    <table class="table datatable-basic">
      <thead>
        <tr>
          <th><?php echo lang('cnt_48'); ?></th>
          <th><?php echo lang('cnt_75'); ?></th>
          <th><?php echo lang('cnt_76'); ?></th>
          <th><?php echo lang('cnt_77'); ?></th>
          <th><?php echo lang('cnt_78'); ?></th>
          <th><?php echo lang('cnt_79'); ?></th>
          <th class="text-center"><?php echo lang('cnt_47'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 0; ?>
        <?php foreach ($usulan->result() as $usul): ?>
          <?php $i++;?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $usul->nama_kota; ?></td>
            <td><?php if ($usul->kegiatan == 0) {
              echo lang('cnt_80');
            }else {
              echo lang('cnt_81');
            } ?></td>
            <td><?php echo $usul->tugas; ?></td>
            <td><?php if (empty($biayalain->result())) {
              echo '<a type="button" class="btn bg-warning-400" disabled="disabled"> Tidak ada </a>';
            }else {
              echo '<a type="button" class="btn bg-blue-400"> Ada </a>';
            }?></td>
            <td>
              <?php switch ($usul->status_sppd) {
                case 0:
                echo "<span class='label bg-blue'>Belum Disetujui</span>";
                break;
                case 1:
                echo "<span class='label bg-success'>Diterima</span>";
                break;
                case 2:
                echo "<span class='label bg-warning'>Ditolak</span>";
                break;
                default:
                echo "<span class='label bg-orange'>Belum ada data</span>";
                break;
              } ?></td>
              <td>
                <?php if ($usul->status_sppd == 1) {
                  if ($usul->kegiatan == 1) {
                    if ($usul->sppd_telaah == 1) {
                      echo "<span class='label bg-success'>Telah di telaah</span>";
                    }else {
                      echo "<span class='label bg-success'>Buat Telaah</span>";
                    }
                  }elseif (!$usul->spt_sppd ) {
                    echo "<span class='label bg-success'>Buat SPT</span>";
                  }
                }else {
                  $level = $this->session->userdata('level');
                  if ($level == 'User') {
                    echo '<a type="button" class="btn bg-teal-400"> Ubah </a>';
                    echo '<a type="button" class="btn bg-green-400"> Hapus </a>';

                  }elseif ($level == 'SuperAdmin') {
                    echo '<a type="button" class="btn bg-teal-400"> Ubah </a>';
                    echo '<a type="button" class="btn bg-green-400"> Hapus </a>';
                    echo '<a type="button" class="btn bg-brown-400"> Setujui </a>';
                    echo '<a type="button" class="btn bg-grey-400"> Tolak </a>';
                  }else {
                    echo '<a type="button" class="btn bg-teal-400"> Ubah </a>';
                    echo '<a type="button" class="btn bg-green-400"> Hapus </a>';
                    echo '<a type="button" class="btn bg-brown-400"> Setujui </a>';
                    echo '<a type="button" class="btn bg-grey-400"> Tolak </a>';
                  }
                } ?>
                <a type="button" class="btn bg-blue-400"> Detail </a>
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

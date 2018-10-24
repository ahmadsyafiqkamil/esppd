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
      <?=$this->session->flashdata('notif')?>
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
          <!-- <th><?php echo lang('cnt_78'); ?></th> -->
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
            <!-- <td></td> -->
            <td>
              <?php switch ($usul->status_sppd) {
                case 0:
                echo "<span class='label bg-blue'>Belum ditelaah</span>";
                break;
                case 1:
                echo "<span class='label bg-success'>Sudah ditelaah, Menunggu Persetujuan Kepala Dinas</span>";
                break;
                case 2:
                echo "<span class='label bg-success'>Disetujui Kepala Dinas</span>";
                break;
                case 3:
                echo "<span class='label bg-orange'>Ditolak Kepala Dinas</span>";
                break;
                case 4:
                echo "<span class='label bg-orange'>Lanjut SPT</span>";
                break;
                case 5:
                echo  "<span class='label bg-orange'>SPPD Ditolak</span>";
                break;
                default:
                echo "<span class='label bg-orange'>Pulang</span>";
                break;
              } ?></td>
              <td>
                <ul class="icons-list">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="icon-menu9"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                      <?php if ($usul->status_sppd == 2) {
                        // $link_spt = base_url().'client/tambahSPT/'.$usul->id_sppd;
                        $id_sppd = $usul->id_sppd;
                        echo '<li><a data-toggle="modal" data-target="#tambah_spt" onclick="id_spt('.$id_sppd.')"> Buat SPT </a></li>';
                      } ?>
                      <!-- <li><a class="glyphicon glyphicon-list-alt"> Lihat </a></li> -->

                      <!-- <?php if ($usul->status_sppd == 1) {
                      if ($usul->kegiatan == 1) {
                      if ($usul->sppd_telaah == 1) {
                      echo "<li><span class='label bg-success'>Telah di telaah</span></li>";
                    }else {
                    echo "<li><label class='label bg-success'>Buat Telaah</label></li>";
                  }
                }elseif (!$usul->spt_sppd ) {
                echo "<li><a  class='label bg-success' data-toggle='modal'
                data-target='#tambah_spt'>Buat SPT</a></li>";
              }
            }else {
            $level = $this->session->userdata('level');
            if ($level == 'User') {
            echo '<li><a"> Ubah </a></li>';
            echo '<li><a "> Hapus </a></li>';

          }elseif ($level == 'SuperAdmin') {
          echo '<li><a > Ubah </a></li>';
          echo '<li><a > Hapus </a></li>';
          echo '<li><a > Setujui </a></li>';
          echo '<li><a > Tolak </a></li>';
        }else {
        echo '<li><a > Ubah </a></li>';
        echo '<li><a > Hapus </a></li>';
        echo '<li><a > Setujui </a></li>';
        echo '<li><a > Tolak </a></li>';
      }
    } ?> -->
    <?php
    $link_telaah =base_url().'client/lihat_telaah/'.$usul->id_sppd;
    ?>
    <?php if ($usul->status_sppd ==0) {
      echo '<li> <a href="'.$link_telaah.'" > Telaah </a></li>';
    }else {
      echo "<li><span class='label bg-success'>Sudah Ditelaah</span></li>";
    } ?>
  </ul>
</li>
</ul>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>

<div id="tambah_spt" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <span class="text-semibold modal-title">Tambah Nomor Surat Perintah Tugas</span>
      </div>

      <?php echo form_open_multipart('client/tambahSPT', 'class="form-horizontal"'); ?>
      <div class="modal-body">
        <div class="form-group">
          <div class="row">
            <div class="col-sm-12">
              <label>No SPT</label>
              <input type="hidden" name="id" id="id">
              <input name="spt" type="text" placeholder="Masukan NO SPT" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<script type="text/javascript">
function id_spt(id) {
  $('#id').val(id);
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

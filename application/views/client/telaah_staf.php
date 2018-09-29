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
      <?=$this->session->flashdata('notif')?>
      <div class="text-right">
        <!-- <a href="<?php echo base_url(); ?>client/tambah_nota" type="button" class="btn btn-primary" onclick=""><?php echo lang('cnt_83'); ?> </a> -->
      </div>
    </div>

    <table class="table datatable-basic">
      <thead>
        <tr>
          <th><?php echo lang('cnt_48'); ?></th>
          <!-- <th><?php echo lang('cnt_107'); ?></th> -->
          <th><?php echo lang('cnt_126'); ?></th>
          <th><?php echo lang('cnt_87'); ?></th>
          <th><?php echo lang('cnt_79'); ?></th>
          <th class="text-center"><?php echo lang('cnt_47'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 0; ?>
        <?php foreach ($telaah_staf->result() as $t): ?>
          <?php $i++;?>

            <tr>
              <td><?php echo $i; ?></td>
              <!-- <td><?php echo $t->tugas; ?></td> -->
              <td><?php echo $t->perihal; ?></td>
              <td><?php echo nice_date($t->tanggal_mulai, 'd-m-y') ; ?> sd <?php echo nice_date($t->tanggal_selesai,'d-m-y'); ?></td>
              <td>

                <?php
                switch ($t->status) {
                  case 0:
                  echo "<span class='label bg-blue'>Menunggu Konfirmasi Kepala Dinas</span>";
                  break;
                  case 1:
                  echo "<span class='label bg-success'>Telaah Ditelaah</span>";
                  break;

                  case '2':
                  echo "<span class='label bg-warning'>DITOLAK</span>";
                  break;
                  default:
                  echo "<span class='label bg-green'>Sudah Dibuatkan SPPD</span>";
                  break;
                }
                ?>
              </td>
              <td>
                <ul class="icons-list">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="icon-menu9"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                      <!-- <li><a data-toggle="modal" data-target="#modal_lihat_sppd" class="glyphicon glyphicon-list-alt"> Lihat </a></li> -->
                      <?php $level = $this->session->userdata('level');
                      if ($level == 'User')
                      {

                      }
                      elseif ($level == 'SuperAdmin')
                      {
                        if ($t->status == 1) {

                        }elseif ($t->status == 0) {
                          if (!isset($t->no_spt)) {
                            $linkSetuju = base_url().'client/setuju_sppd/'.$t->id;
                            $linkTolak = base_url().'client/tolak_sppd/'.$t->id;
                            // $lihat_telaah = base_url().'client/lihat_telaah/'.$t->id;
                            // echo '<li><a class="glyphicon glyphicon-plus"> Buat SPT </a></li>';
                            echo '<li><a href ="'.$linkSetuju.'" class="glyphicon glyphicon-thumbs-up" id="sukses"> Setuju </a></li>';
                            echo '<li><a href="'.$linkTolak.'" class="glyphicon glyphicon-thumbs-down"> Tolak </a></li>';
                          }
                        }
                      }
                      else
                      {

                      } ?>
                      <li><a class="glyphicon glyphicon-remove"> Hapus </a></li>
                      <!-- <li><a class="glyphicon glyphicon-print"> Print </a></li> -->
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

  $('#sukses').on('click', function() {
      swal({
          title: "",
          text: "Anda Menyetujui Usulan Perjalanan Dinas",
          confirmButtonColor: "#66BB6A",
          type: "success"
      });
  });
  </script>

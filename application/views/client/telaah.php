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
          <th><?php echo lang('cnt_107'); ?></th>
          <!-- <th><?php echo lang('cnt_126'); ?></th> -->
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
              <td><?php echo $t->tugas; ?></td>
              <!-- <td><?php echo $telaah_staf->result()->perihal; ?></td> -->
              <td><?php echo nice_date($t->tanggal_mulai, 'd-m-y') ; ?> sd <?php echo nice_date($t->tanggal_selesai,'d-m-y'); ?></td>
              <td>

                <?php
                switch ($t->status) {
                  case 0:
                  echo "<span class='label bg-blue'>Menunggu Konfirmasi Kepala Dinas</span>";
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
                          if (!isset($t->no_spt)) {
                            echo '<li><a class="glyphicon glyphicon-plus"> Buat SPT </a></li>';
                          }
                        }elseif ($t->status == 0) {
                          $linkSetuju = base_url().'client/setuju_telaah/'.$t->id;
                          $linkTolak = base_url().'client/tolak_telaah/'.$t->id;
                          $lihat_telaah = base_url().'client/lihat_telaah/'.$t->id;
                          echo '<li><a href="'.$lihat_telaah.'"  class="glyphicon glyphicon-th"> Telaah </a></li>';
                          // echo '<li><a  data-toggle="modal" data-target="#modal_persetujuan" class="glyphicon glyphicon-asterisk"> Setuju </a></li>';
                          echo '<li><a href ="'.$linkSetuju.'" class="glyphicon glyphicon-thumbs-up" id="sukses"> Setuju </a></li>';
                          echo '<li><a href="'.$linkTolak.'" class="glyphicon glyphicon-thumbs-down"> Tolak </a></li>';
                        }
                      }
                      else
                      {

                      } ?>
                      <li><a class="glyphicon glyphicon-remove"> Hapus </a></li>
                      <li><a class="glyphicon glyphicon-print"> Print </a></li>
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

  <!-- <div id="modal_telaah" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Vertical form</h5>
        </div>

        <form action="#">
          <div class="modal-body">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-6">
                  <label>First name</label>
                  <input type="text" placeholder="Eugene" class="form-control">
                </div>

                <div class="col-sm-6">
                  <label>Last name</label>
                  <input type="text" placeholder="Kopyov" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-sm-6">
                  <label>Address line 1</label>
                  <input type="text" placeholder="Ring street 12" class="form-control">
                </div>

                <div class="col-sm-6">
                  <label>Address line 2</label>
                  <input type="text" placeholder="building D, flat #67" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-sm-4">
                  <label>City</label>
                  <input type="text" placeholder="Munich" class="form-control">
                </div>

                <div class="col-sm-4">
                  <label>State/Province</label>
                  <input type="text" placeholder="Bayern" class="form-control">
                </div>

                <div class="col-sm-4">
                  <label>ZIP code</label>
                  <input type="text" placeholder="1031" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-sm-6">
                  <label>Email</label>
                  <input type="text" placeholder="eugene@kopyov.com" class="form-control">
                  <span class="help-block">name@domain.com</span>
                </div>

                <div class="col-sm-6">
                  <label>Phone #</label>
                  <input type="text" placeholder="+99-99-9999-9999" data-mask="+99-99-9999-9999" class="form-control">
                  <span class="help-block">+99-99-9999-9999</span>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-framed">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($variable as $key => $value): ?>

                  <?php endforeach; ?>
                  <tr>
                    <td>1</td>
                    <td>Eugene</td>
                    <td>Kopyov</td>
                    <td>Kopyov</td>
                  </tr>

                </tbody>
              </table>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit form</button>
          </div>
        </form>
      </div>
    </div>
  </div> -->

  <div id="modal_persetujuan" class="modal fade">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title"><?php echo lang('cnt_117'); ?></h5>
        </div>

        <?php echo form_open_multipart('client/pegawai_update', 'class="form-horizontal"'); ?>
        <div class="modal-body">

        </div>
        <?php echo form_close(); ?>

        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  // function setuju (){
  //   <?php foreach ($telaah->result() as $t): ?>
  //     alert(<?php echo $t->id ?>);
  //   <?php endforeach; ?>
  //
  //   // $('#golongan').val(golongan);
  // }

  // $('#setuju').on('click', function() {
  //         swal({
  //             title: "Good job!",
  //             text: "You clicked the button!",
  //             confirmButtonColor: "#66BB6A",
  //             type: "success"
  //         });
  //     });
  ;

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

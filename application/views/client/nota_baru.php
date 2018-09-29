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
    <?php echo form_open_multipart('client/tambah_usulan', 'class="form-horizontal"'); ?>
    <!-- border -->
    <div class="panel panel-primary panel-bordered">
      <div class="panel-heading">
        <h6 class="panel-title"><?php echo lang('cnt_66'); ?></h6>
        <div class="heading-elements">
          <!-- <ul class="icons-list">
          <li><a data-action="collapse"></a></li>
          <li><a data-action="reload"></a></li>
          <li><a data-action="close"></a></li>
        </ul> -->
      </div>
    </div>

    <div class="panel-body">
      <!-- start -->
      <fieldset class="content-group">
        <!-- <legend class="text-bold"></legend> -->
        <div class="form-group">
          <label class="control-label col-lg-2"><?php echo lang('cnt_99'); ?></label>
          <div class="col-lg-8">
            <div id="itemlist">
              <div class="row">
                <div class="col-lg-8">
                      <select name="jenis_input[0]" class="form-control">
                        <?php foreach ($pegawai->result() as $p ): ?>
                          <option value="<?php echo $p->nip_pegawai; ?>"><?php echo $p->nama_pegawai; ?></option>
                        <?php endforeach; ?>
                      </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button type="button" class="btn bg-blue" onclick="additem();"><?php echo lang('cnt_100'); ?><i class="glyphicon glyphicon-tasasition-right"></i></button>
      </fieldset>
      <!-- end -->
      <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
    </div>

  </div>
  <!-- border -->
  <?php echo form_close(); ?>
</div>
</div>

<script>
    var i = 1;
    function additem() {
//                menentukan target append
        var itemlist = document.getElementById('itemlist');

//                membuat element
        var row = document.createElement('div');
        var jenis = document.createElement('div');
        var aksi = document.createElement('div');

//                meng append element
        itemlist.appendChild(row);
        row.appendChild(jenis);
        row.appendChild(aksi);

        row.setAttribute('class', 'row');
        jenis.setAttribute('class', 'col-lg-8');
        aksi.setAttribute('class', 'col-lg-2');

//                membuat element input
        var jenis_input = document.createElement('select');
        jenis_input.setAttribute('name', 'jenis_input[' + i + ']');
        jenis_input.setAttribute('class', 'form-control');

        var option = null;
        <?php foreach ($pegawai->result() as $p ): ?>
        option = document.createElement("option");
        option.text = "<?php echo $p->nama_pegawai; ?>";
        option.value = "<?php echo $p->nip_pegawai; ?>";
        jenis_input.appendChild(option);
        <?php endforeach; ?>

        var hapus = document.createElement('span');

//                meng append element input
        jenis.appendChild(jenis_input);
        aksi.appendChild(hapus);

        hapus.innerHTML = '<button class="btn btn-xs btn-danger"><i class="icon-trash"></i></button>';
//                membuat aksi delete element
        hapus.onclick = function () {
            row.parentNode.removeChild(row);
        };

        i++;
    }
</script>


<?php echo form_open_multipart('client/tambah_usulan', 'class="form-horizontal"'); ?>
<div class="content-wrapper">
  <!-- Form horizontal -->
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title"><?php echo lang('cnt_65'); ?></h5>
      <div class="heading-elements">
        <ul class="icons-list">
          <!-- <li><a data-action="collapse"></a></li> -->
          <!-- <li><a data-action="reload"></a></li> -->
          <!-- <li><a data-action="close"></a></li> -->
        </ul>
      </div>
    </div>
    <div class="panel-body">
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
        <div class="form-group">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-2">
                  <label class="display-block text-semibold">Perjalanan Dinas Berdasarkan</label>
                </div>
                <div class="col-lg-8">
                  <label class="radio-inline">
                    <input type="radio" value="1"  name="tipe_perjalanan_dinas" >
                    <?php echo lang('cnt_73'); ?>
                  </label>

                  <label class="radio-inline">
                    <input type="radio" value="0" name="tipe_perjalanan_dinas">
                    <?php echo lang('cnt_74'); ?>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <label class="display-block text-semibold">
                Pegawai Yang Diusulkan :
              </label>
            </div>
            <div class="col-lg-12">
              <div id="itemlist">
                <div class="row">
                  <label class="control-label col-lg-2">Nama Pegawai : </label>
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
            <div class="col-lg-12 text-right">
              <label class="display-block text-semibold">
                <button type="button" class="btn bg-blue"  onclick="additem_pegawai_diusulkan();">
                  Tambah Pegawai
                  <i class="glyphicon glyphicon-tasasition-right"></i></button>

                </label>
              </div>
            </div>
            <!-- <div class="form-group">
            <div id="divPegawai"></div>
          </div> -->
          <div class="form-group" id="list_pegawai_diusulkan">
            <!-- menampilkan tabel dari tambah-nota_pegawai_diusulkan -->
          </div>
        </div>
      </div>
    </div>


    <div class="panel panel-primary panel-bordered">
      <div class="panel-heading">
        <h6 class="panel-title">Usulan Pegawai Pengikut Perjalanan Dinas</h6>
        <div class="heading-elements">
          <!-- <ul class="icons-list">
          <li><a data-action="collapse"></a></li>
          <li><a data-action="reload"></a></li>
          <li><a data-action="close"></a></li>
        </ul> -->
      </div>
    </div>

    <div class="panel-body">
      <div class="form-group">
        <div class="row">
          <div class="col-lg-12">
            <label class="display-block text-semibold">
              Usulan Pegawai Pengikut :
            </label>
          </div>
          <div class="col-lg-12">
            <div id="itemlist_pegawai_pengikut">
              <div class="row">
                <label class="control-label col-lg-2">Nama Pegawai : </label>
                <div class="col-lg-8">
                  <select name="nama_pegawai_pengikut[0]" class="form-control">
                    <?php foreach ($pegawai->result() as $p ): ?>
                      <option value="<?php echo $p->nip_pegawai; ?>"><?php echo $p->nama_pegawai; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 text-right">
            <label class="display-block text-semibold">
              <button type="button" class="btn bg-blue"  onclick="additem_pegawai_pengikut();">
                Tambah Pegawai Pengikut
                <i class="glyphicon glyphicon-tasasition-right"></i></button>

              </label>
            </div>
          </div>
          <!-- <div class="form-group">
          <div id="divPegawai"></div>
        </div> -->
        <div class="form-group" id="list_pegawai_diusulkan">
          <!-- menampilkan tabel dari tambah-nota_pegawai_diusulkan -->
        </div>
      </div>
    </div>
  </div>


  <div class="panel panel-primary panel-bordered">
    <div class="panel-heading">
      <h6 class="panel-title"><?php echo lang('cnt_68'); ?></h6>
      <div class="heading-elements">
        <!-- <ul class="icons-list">
        <li><a data-action="collapse"></a></li>
        <li><a data-action="reload"></a></li>
        <li><a data-action="close"></a></li>
      </ul> -->
    </div>
  </div>

  <div class="panel-body">
    <div class="form-group">
      <label class="control-label col-lg-2"><?php echo lang('cnt_102');?></label>
      <div class="col-lg-10">
        <select name="prov_berangkat" class="form-control">
          <?php foreach ($provinsi->result() as $pro ): ?>
            <option value="<?php echo $pro->id; ?>"><?php echo $pro->nama; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-2"><?php echo lang('cnt_103');?></label>
      <div class="col-lg-10">
        <select name="kota_berangkat" class="form-control">
          <?php foreach ($kota->result() as $k ): ?>
            <option value="<?php echo $k->id; ?>"><?php echo $k->nama; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

  </div>
</div>


<div class="panel panel-primary panel-bordered">
  <div class="panel-heading">
    <h6 class="panel-title"><?php echo lang('cnt_69'); ?></h6>
    <div class="heading-elements">
      <!-- <ul class="icons-list">
      <li><a data-action="collapse"></a></li>
      <li><a data-action="reload"></a></li>
      <li><a data-action="close"></a></li>
    </ul> -->
  </div>
</div>

<div class="panel-body">

  <div class="form-group">
    <label class="control-label col-lg-2"><?php echo lang('cnt_102');?></label>
    <div class="col-lg-10">
      <select name="prov_tujuan" class="form-control">
        <?php foreach ($provinsi->result() as $pro ): ?>
          <option value="<?php echo $pro->id; ?>"><?php echo $pro->nama; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-lg-2"><?php echo lang('cnt_103');?></label>
    <div class="col-lg-10">
      <select name="kota_tujuan" class="form-control">
        <?php foreach ($kota->result() as $k ): ?>
          <option value="<?php echo $k->id; ?>"><?php echo $k->nama; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

</div>
</div>

<div class="panel panel-primary panel-bordered">
  <div class="panel-heading">
    <h6 class="panel-title"><?php echo lang('cnt_70'); ?></h6>
    <div class="heading-elements">
      <!-- <ul class="icons-list">
      <li><a data-action="collapse"></a></li>
      <li><a data-action="reload"></a></li>
      <li><a data-action="close"></a></li>
    </ul> -->
  </div>
</div>

<div class="panel-body">

  <div class="form-group">
    <label class="col-lg-2 control-label"><?php echo lang('cnt_104'); ?></label>
    <div class="col-lg-10">
      <select class="form-control" name="pptk">
        <?php foreach ($ttd->result() as $t): ?>
          <option value="<?php echo $t->id_ttd; ?>"><?php echo $t->nama_pegawai; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-2 control-label"><?php echo lang('cnt_105'); ?></label>
    <div class="col-lg-10">
      <select class="form-control" name="transport">
        <?php foreach ($jenis_transport->result() as $t): ?>
          <option value="<?php echo $t->id; ?>"><?php echo $t->nama; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-2 control-label"><?php echo lang('cnt_106'); ?></label>
    <div class="col-lg-10">
      <input type="text" class="form-control" placeholder="Mata Anggaran" name="anggaran">
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-2 control-label"><?php echo lang('cnt_107'); ?></label>
    <div class="col-lg-10">
      <textarea rows="5" cols="5" class="form-control" placeholder="Perihal Perjalanan Dinas" name="perihal"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-2 control-label"><?php echo lang('cnt_108'); ?></label>
    <div class="col-lg-10">
      <div class="input-group">
        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
        <input name="mulai_tanggal" type="text" class="form-control pickadate" placeholder="<?php echo lang('cnt_108'); ?>&hellip;">
      </div>
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-2 control-label"><?php echo lang('cnt_109'); ?></label>
    <div class="col-lg-10">
      <div class="input-group">
        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
        <input name="selesai_tanggal" type="text" class="form-control pickadate" placeholder="<?php echo lang('cnt_109'); ?>&hellip;">
      </div>
    </div>
  </div>

</div>
</div>

<div class="panel panel-primary panel-bordered">
  <div class="panel-heading">
    <h6 class="panel-title"><?php echo lang('cnt_71'); ?></h6>
    <div class="heading-elements">
      <!-- <ul class="icons-list">
      <li><a data-action="collapse"></a></li>
      <li><a data-action="reload"></a></li>
      <li><a data-action="close"></a></li>
    </ul> -->
  </div>
</div>

<div class="panel-body">

  <!--  -->
  <div class="form-group">

    <!--  -->

    <div class="form-group">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-2">
              <label class="display-block text-semibold"><?php echo lang('cnt_112'); ?></label>
            </div>
            <div class="col-lg-8">
              <label class="radio-inline">
                <input type="radio" value="1"  name="blain" class="biayalain">
                <?php echo lang('cnt_110'); ?>
              </label>

              <label class="radio-inline">
                <input type="radio" value="0" name="blain" class="biayalain">
                <?php echo lang('cnt_111'); ?>
              </label>
            </div>
          </div>
        </div>

        <div id="form-input">
          <div class="col-lg-12">
            <label class="display-block text-semibold">
              <?php echo lang('cnt_113'); ?>
            </label>
          </div>
          <div class="col-lg-12">
            <div id="itemlist_biaya_lain">
              <div class="row">
                <label class="control-label col-lg-2"><?php echo lang('cnt_114'); ?> </label>
                <div class="col-lg-8">
                  <select name="biayalain[0]" class="form-control">
                    <?php foreach ($biaya_lain->result() as $p ): ?>
                      <option value="<?php echo $p->id; ?>"><?php echo $p->nama; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 text-right">
            <label class="display-block text-semibold">
              <button type="button" class="btn bg-blue"  onclick="additem_biaya_lain();">
                <?php echo lang('cnt_115'); ?>
                <i class="glyphicon glyphicon-tasasition-right"></i></button>

              </label>
            </div>

          </div>

        </div>

      </div>

    </div>
  </div>
</div>
  <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
  <?php echo form_close(); ?>
</div>

</div>
</div>

<script>

$(document).ready(function(){
  $("#form-input").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
  $(".biayalain").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
    if ($("input[name='blain']:checked").val() == "1" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
    $("#form-input").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
  } else {
    $("#form-input").slideUp("fast");  //Efek Slide Up (Menghilangkan Form Input)
  }
});
});

var i = 1;
function additem_pegawai_diusulkan() {
  //                menentukan target append
  var itemlist = document.getElementById('itemlist');

  //                membuat element
  var row = document.createElement('div');
  var label = document.createElement('label');
  var jenis = document.createElement('div');
  var aksi = document.createElement('div');

  //                meng append element
  itemlist.appendChild(row);
  row.appendChild(label);
  row.appendChild(jenis);
  row.appendChild(aksi);

  row.setAttribute('class', 'row');
  label.setAttribute('class', 'control-label col-lg-2');
  jenis.setAttribute('class', 'col-lg-8');
  aksi.setAttribute('class', 'col-lg-2');

  //                membuat element input
  var jenis_input = document.createElement('select');
  jenis_input.setAttribute('name', 'jenis_input[' + i + ']');
  jenis_input.setAttribute('class', 'form-control');

  label.innerHTML = "Nama Pegawai : ";

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


var i_pengikut = 1;
function additem_pegawai_pengikut() {
  // menentukan target append
  var itemlist = document.getElementById('itemlist_pegawai_pengikut');

  //                membuat element
  var row = document.createElement('div');
  var label = document.createElement('label');
  var jenis = document.createElement('div');
  var aksi = document.createElement('div');

  //                meng append element
  itemlist.appendChild(row);
  row.appendChild(label);
  row.appendChild(jenis);
  row.appendChild(aksi);

  row.setAttribute('class', 'row');
  label.setAttribute('class', 'control-label col-lg-2');
  jenis.setAttribute('class', 'col-lg-8');
  aksi.setAttribute('class', 'col-lg-2');

  //                membuat element input
  var jenis_input = document.createElement('select');
  jenis_input.setAttribute('name', 'nama_pegawai_pengikut[' + i_pengikut + ']');
  jenis_input.setAttribute('class', 'form-control');

  label.innerHTML = "Nama Pegawai : ";

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

  i_pengikut++;
}

var i_biaya_lain = 1;
function additem_biaya_lain() {
  // menentukan target append
  var itemlist = document.getElementById('itemlist_biaya_lain');

  //                membuat element
  var row = document.createElement('div');
  var label = document.createElement('label');
  var jenis = document.createElement('div');
  var aksi = document.createElement('div');

  //                meng append element
  itemlist.appendChild(row);
  row.appendChild(label);
  row.appendChild(jenis);
  row.appendChild(aksi);

  row.setAttribute('class', 'row');
  label.setAttribute('class', 'control-label col-lg-2');
  jenis.setAttribute('class', 'col-lg-8');
  aksi.setAttribute('class', 'col-lg-2');

  //                membuat element input
  var jenis_input = document.createElement('select');
  jenis_input.setAttribute('name', 'biayalain[' + i_biaya_lain + ']');
  jenis_input.setAttribute('class', 'form-control');

  label.innerHTML = "Nama Pegawai : ";

  var option = null;
  <?php foreach ($biaya_lain->result() as $p ): ?>
  option = document.createElement("option");
  option.text = "<?php echo $p->nama; ?>";
  option.value = "<?php echo $p->id; ?>";
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

  i_biaya_lain++;
}

</script>

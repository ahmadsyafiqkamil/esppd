
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

        <?php echo form_open_multipart('client/instansi_pro', 'class="form-horizontal"'); ?>
        <div class="form-group">
          <label class="display-block text-semibold"><?php echo lang('cnt_72'); ?></label>
          <label class="radio-inline">
            <input type="radio" name="radio-unstyled-inline-left" >
            <?php echo lang('cnt_73'); ?>
          </label>

          <label class="radio-inline">
            <input type="radio" name="radio-unstyled-inline-left">
            <?php echo lang('cnt_74'); ?>
          </label>

          <div class="form-group">
            <input type="hidden" name="pegawai_count" value="1" id="pegawai_count">
            <label class="control-label col-lg-2"><?php echo lang('cnt_99'); ?></label>
            <!-- <div id="file_block"> -->
            <div class="col-lg-8">
              <select name="pegawai_count_1" class="form-control" id="pegawai_count">
                <?php foreach ($pegawai->result() as $p ): ?>
                  <option value="<?php echo $p->nip_pegawai; ?>"><?php echo $p->nama_pegawai; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <button type="button" class="btn bg-blue" onclick="tambah_pegawai()"><?php echo lang('cnt_100'); ?><i class="glyphicon glyphicon-tasasition-right"></i></button>
            <!-- </div> -->
            <div id="divPegawai"></div>
          </div>
        </div>
      </div>
    </div>


    <div class="panel panel-primary panel-bordered">
      <div class="panel-heading">
        <h6 class="panel-title"><?php echo lang('cnt_67'); ?></h6>
        <div class="heading-elements">
          <!-- <ul class="icons-list">
          <li><a data-action="collapse"></a></li>
          <li><a data-action="reload"></a></li>
          <li><a data-action="close"></a></li>
        </ul> -->
      </div>
    </div>

    <div class="panel-body">

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

</div>
</div>
</div>


</div>
</div>

<script type="text/javascript">

function tambah_pegawai() {
  var count = document.getElementById("pegawai_count").value;
  var string =
  '<label class="control-label col-lg-2"><?php echo lang('cnt_99'); ?></label>'+
  '<div class="col-lg-8">'+
  '<select name="pegawai_count_'+count+'" class="form-control" id="pegawai_count">'+
  '<?php foreach ($pegawai->result() as $p ): ?>'+
  '<option value="<?php echo $p->nip_pegawai; ?>"><?php echo $p->nama_pegawai; ?></option>'+
  '<?php endforeach; ?>'+
  '</select>'+
  '</div>'+
  '<button type="button" class="btn bg-blue" onclick="hapuspegawai(pegawai_count_'+count+')"><?php echo lang('cnt_101'); ?><i class="glyphicon glyphicon-tasasition-right"></i></button>';
  $("#divPegawai").append(string);
  count = (count-1)+2;
  document.getElementById("pegawai_count").value = count;
}
function hapuspegawai(pegawai_count) {
  $(pegawai_count).remove();
}
</script>

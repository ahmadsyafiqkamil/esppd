<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-default">
  <div class="sidebar-content">

    <!-- Main navigation -->
    <div class="sidebar-category sidebar-category-visible">
      <div class="sidebar-user-material">
        <div class="category-content">
          <div class="sidebar-user-material-content">
            <a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-responsive" alt=""></a>
            <h6>Victoria Baker</h6>
            <span class="text-size-small">Santa Ana, CA</span>
          </div>

          <div class="sidebar-user-material-menu">
            <a href="#user-nav" data-toggle="collapse"><span><?php echo lang('cnt_12'); ?></span> <i class="caret"></i></a>
          </div>
        </div>

        <div class="navigation-wrapper collapse" id="user-nav">
          <ul class="navigation">
            <li><a href="#"><i class="icon-user-plus"></i> <span><?php echo lang('cnt_13'); ?></span></a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="icon-cog5"></i> <span><?php echo lang('cnt_14'); ?></span></a></li>
            <li><a href="#"><i class="icon-switch2"></i> <span><?php echo lang('cnt_15'); ?></span></a></li>
          </ul>
        </div>
      </div>

      <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

          <!-- Main -->
          <li class="navigation-header"><span><?php echo lang('cnt_16'); ?></span> <i class="icon-menu" title="Main pages"></i></li>
          <li class="active"><a href="<?php echo site_url("client/") ?>"><i class="icon-home4"></i> <span><?php echo lang('cnt_17'); ?></span></a></li>
          <li>
            <a href="#"><i class="icon-stack2"></i> <span><?php echo lang('cnt_18'); ?></span></a>
            <ul>
              <li><a href="<?php echo site_url("client/instansi") ?>"><?php echo lang('cnt_19'); ?></a></li>
              <li><a href="<?php echo site_url("client/pegawai") ?>"><?php echo lang('cnt_20'); ?></a></li>
              <li><a href="<?php echo site_url("client/biaya") ?>"><?php echo lang('cnt_21'); ?></a></li>
              <li><a href="<?php echo site_url("client/golongan") ?>"><?php echo lang('cnt_22'); ?></a></li>
              <li><a href="<?php echo site_url("client/transport") ?>"><?php echo lang('cnt_23'); ?></a></li>
              <li><a href="<?php echo site_url("client/ttd") ?>"><?php echo lang('cnt_24'); ?></a></li>
            </ul>
          </li>
          <li>
            <a href="#"><i class="icon-stack3"></i> <span><?php echo lang('cnt_25'); ?></span></a>
            <ul>
              <li><a href="<?php echo site_url("client/usulan_baru") ?>"><?php echo lang('cnt_26'); ?></a></li>
              <li><a href="<?php echo site_url("client/telaah_baru") ?>"><?php echo lang('cnt_27'); ?></a></li>
              <li><a href="<?php echo site_url("client/tugas") ?>"><?php echo lang('cnt_28'); ?></a></li>
              <li><a href="<?php echo site_url("client/perjalanan") ?>"><?php echo lang('cnt_29'); ?></a></li>
            </ul>
          </li>
          <li><a href="<?php echo site_url("client/kwitansi") ?>"><i class="icon-stack4"></i><?php echo lang('cnt_30'); ?></a></li>
          <li><a href="<?php echo site_url("client/riil") ?>"><i class="icon-grid"></i><?php echo lang('cnt_31'); ?></a></li>

          <li>
            <a href="#"><i class="icon-stack3"></i> <span><?php echo lang('cnt_32'); ?></span></a>
            <ul>
              <li><a href="<?php echo site_url("client/rtahun") ?>"><?php echo lang('cnt_33'); ?></a></li>
              <li><a href="<?php echo site_url("client/rbulan") ?>"><?php echo lang('cnt_34'); ?></a></li>
              <li><a href="<?php echo site_url("client/log") ?>"><?php echo lang('cnt_35'); ?></a></li>
            </ul>
          </li>
          <!-- /page kits -->

        </ul>
      </div>
    </div>
    <!-- /main navigation -->

  </div>
</div>
<!-- /main sidebar -->

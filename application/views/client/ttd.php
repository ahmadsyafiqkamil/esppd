<div class="content-wrapper">
  <!-- Scrollable datatable -->
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title"><?php echo lang('cnt_20'); ?></h5>
      <div class="heading-elements">
        <ul class="icons-list">
          <li><a data-action="collapse"></a></li>
          <li><a data-action="reload"></a></li>
          <!-- <li><a data-action="close"></a></li> -->
        </ul>
      </div>
    </div>

    <div class="panel-body">
      <div class="text-right">
        <button type="button" class="btn btn-primary"><?php echo lang('cnt_43'); ?> <i class="glyphicon glyphicon-user position-right"></i></button>
      </div>
    </div>

    <table class="table datatable-scroll-y" width="100%">
      <thead>
        <tr>
          <th><?php echo lang('cnt_48'); ?></th>
          <th><?php echo lang('cnt_44'); ?></th>
          <th><?php echo lang('cnt_45'); ?></th>
          <th><?php echo lang('cnt_46'); ?></th>
          <th><?php echo lang('cnt_47'); ?></th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Marth</td>
          <td><a href="#">Enright</a></td>
          <td>Traffic Court Referee</td>
          <td>22 Jun 1972</td>
          <td><span class="label label-success">Active</span></td>
          <td class="text-center">
            <ul class="icons-list">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-menu9"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                  <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                  <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                </ul>
              </li>
            </ul>
          </td>
        </tr>

      </tbody>
    </table>
  </div>
  <!-- /scrollable datatable -->

</div>

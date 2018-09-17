<div class="content-wrapper">
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title"><?php echo lang('cnt_20'); ?></h5>
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
        <a href="<?php echo site_url("client/tambah_nota"); ?>" type="button" class="btn btn-primary"><?php echo lang('cnt_59'); ?> <i class="glyphicon glyphicon-user position-right"></i></a>
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

      </tbody>
    </table>
    <!-- /basic datatable -->
  </div>
  <!-- /javascript sourced data -->



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

<div class="content-wrapper">
  <!-- Javascript sourced data -->
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title"><?php echo lang('cnt_20'); ?></h5>
      <div class="heading-elements">
        <ul class="icons-list">
          <li><a data-action="collapse"></a></li>
          <!-- <li><a data-action="reload"></a></li> -->
          <!-- <li><a data-action="close"></a></li> -->
        </ul>
      </div>
    </div>

    <div class="panel-body">
      <!-- <div class="text-right">
        <button type="button" class="btn btn-primary"><?php echo lang('cnt_43'); ?> <i class="glyphicon glyphicon-user position-right"></i></button>
      </div> -->
    </div>

    <table class="table datatable-js">
      <thead>
        <tr>
          <th><?php echo lang('cnt_48'); ?></th>
          <th><?php echo lang('cnt_44'); ?></th>
          <th><?php echo lang('cnt_45'); ?></th>
          <th><?php echo lang('cnt_46'); ?></th>
          <th><?php echo lang('cnt_47'); ?></th>

        </tr>
      </thead>
    </table>
  </div>
  <!-- /javascript sourced data -->

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

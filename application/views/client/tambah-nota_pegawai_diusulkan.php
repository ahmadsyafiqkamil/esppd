
<table class="table datatable-basic">
      <thead>
        <tr>
          <th style="width: 2%">No</th>
          <th>NIP</th>
          <th>Nama</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $no = 0;
      foreach ($list_pegawai_diusulkan->result() as $r):
        $no ++ ;
        ?>
          <tr>
            <td style="widtd: 2%"><?php echo $no; ?></td>
            <td><?php echo $r->nip_pegawai; ?></td>
            <td><?php echo $r->nama_pegawai; ?></td>
          </tr>
          <?php endforeach ?>
      </tbody>
    </table>



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

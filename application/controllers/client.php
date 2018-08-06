<?php
/**
*
*/
class Client extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->template->set_error_view("error/login_error.php");
    $this->template->set_layout("layout/client_layout.php");

  }
  public function index()
  {
    $this->template->loadExternal(
      '	<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
    	<script type="text/javascript" src="assets/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>

    	<script type="text/javascript" src="assets/js/core/app.js"></script>
    	<script type="text/javascript" src="assets/js/pages/extra_fullcalendar.js"></script>

    	<script type="text/javascript" src="assets/js/plugins/ui/ripple.min.js"></script>'
      );

      $this->template->loadResponsiveSidebar("layout/sidebar");
      $this->template->loadContent("client/index.php", array());
  }
}

?>

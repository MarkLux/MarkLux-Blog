<?php

  class Admin extends CI_Controller
  {
    public function __construct()
    {
      $this->check_admin();
      parent::__construct();
      $this->load->helper(array('form','url'));
      $this->load->model('User_Model');
      $this->load->library('form_validation');
    }

    public function index()
    {
      $data['login_status'] = 1;
      $data['user_name'] = $_SESSION['user_name'];
      $data['is_admin'] = $_SESSION['is_admin'];

      $data['title'] = "Mark Lux|Admin";
      $data['base_url'] = base_url();

      $this->load->view('templates/html_header.php',$data);
      $this->load->view('templates/head_navigation.php');
      $this->load->view('admin_view/main.php');
      $this->load->view('templates/html_footer.php');
    }

    public function add_new()
    {

    }

    private function check_admin()
    {
      session_start();
      if(!empty($_SESSION['is_admin']))
        return;
      else
      {
        show_404();
        exit;
      }
    }
  }

 ?>

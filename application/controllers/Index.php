<?php

  class Index extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('Blog_Model');
      $this->load->helper('url');
    }

    public function index()
    {
      //检测用户的登陆状态
      session_start();
      if(!empty($_SESSION['login_status']))
      {
        $data['login_status'] = 1;
        $data['user_name'] = $_SESSION['user_name'];
        $data['is_admin'] = $_SESSION['is_admin'];
      }
      else
      {
        $data['login_status'] = 0;
      }

      //初始化视图的数据

      $data['base_url'] = base_url();
      $data['category_list'] = $this->Blog_Model->get_category();
      $data['title'] = "Mark Lux";
      $data['blog_data'] = $this->Blog_Model->get_latest_10();

      $this->load->view('templates/html_header.php',$data);
      $this->load->view('templates/head_navigation.php');
      $this->load->view('templates/header.php');
      $this->load->view('index_view/navigation.php');
      $this->load->view('index_view/latest_blogs.php');
      $this->load->view('templates/html_footer.php');
    }

    public function quit()
    {
      session_start();
      if(!empty($_SESSION['login_status']))
      {
        //简单粗暴
        session_destroy();
        header("Location: http://localhost/mark/index.php/index");
      }
      else
      {
        show_404();
      }
    }
  }

 ?>

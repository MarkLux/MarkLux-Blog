<?php

  class Admin extends CI_Controller
  {
    public function __construct()
    {
      $this->check_admin();
      parent::__construct();
      $this->load->helper(array('form','url'));
      $this->load->model('User_Model');
      $this->load->model('Blog_Model');
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
      //设置表单验证规则
      $this->form_validation->set_rules('blog_title','标题','required',array('required' => '%s不能为空'));
      $this->form_validation->set_rules('blog_md_code','文本','required',array('required' => '%s不能为空'));

      //视图数据
      $data['login_status'] = 1;
      $data['user_name'] = $_SESSION['user_name'];
      $data['is_admin'] = $_SESSION['is_admin'];
      $data['title'] = "Mark Lux|Admin";
      $data['base_url'] = base_url();

      if($this->form_validation->run() == FALSE)
      {
        $data['category'] = $this->Blog_Model->get_category();
        $this->load->view('templates/html_header.php',$data);
        $this->load->view('templates/head_navigation.php');
        $this->load->view('admin_view/add_new.php');
        $this->load->view('templates/html_footer.php');
      }
      else
      {
        //封装表单数据
        $row['blog_title'] = $this->input->post('blog_title');
        $row['blog_category'] = $this->input->post('blog_category');
        $row['blog_md_code'] = $this->input->post('blog_md_code');

        //插入数据库中
        $status =  $this->Blog_Model->insert_new($row);

        //根据情况来跳转

        if(!empty($status))
        {
          $this->load->view('templates/html_header.php',$data);
          $this->load->view('templates/head_navigation.php');
          $this->load->view('admin_view/operate_ok.php');
          $this->load->view('templates/html_footer.php');
        }
      }
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

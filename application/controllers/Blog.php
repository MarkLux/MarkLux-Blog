<?php

  class Blog extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('Blog_Model');
      $this->load->helper('url');
      $this->load->library('pagination');
    }

    public function view($category,$cur = 0)
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

      //解码
      $category = urldecode($category);

      //封装分页信息数组

      $splitPage['current_page'] = $cur;
      $splitPage['category'] = $category;
      $splitPage['page_size'] = 20;
      $splitPage['total_number'] = $this->Blog_Model->get_total_num($category);

      //初始化分页类

      $config['base_url'] = base_url()."index.php/blog/view/".$category;
      $config['total_rows'] = $splitPage['total_number'];
      $config['per_page'] = $splitPage['page_size'];
      $config['num_links'] = 5;
      $config['use_page_numbers'] = TRUE;
      $config['first_link'] = '首页';
      $config['last_link'] = '末页';

      $this->pagination->initialize($config);

      //封装视图数据

      $data['links'] = $this->pagination->create_links();
      $data['title'] = "Blog|".$category;
      $data['article_data'] = $this->Blog_Model->get_splitpage($splitPage);
      $data['base_url'] = base_url();

      $this->load->view('templates/html_header.php',$data);
      $this->load->view('templates/head_navigation.php');
      $this->load->view('templates/header.php');
      $this->load->view('blog_view/list_view.php');
      $this->load->view('templates/html_footer.php');
    }
  }

 ?>

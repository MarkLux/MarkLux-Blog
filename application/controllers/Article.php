<?php

  class Article extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('Blog_Model');
    }

    //注意以后需要修改这里的url路由
    public function index($id=1)
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

      $article_content = $this->Blog_Model->get_article($id);

      //视图数据
      $data['article_content'] = $article_content[0];
      $data['title'] = $article_content[0]['blog_title'];

      //加载视图

      $this->load->view('templates/html_header.php',$data);
      $this->load->view('templates/head_navigation.php');
      $this->load->view('templates/header.php');
      $this->load->view('article_view/main.php');
      $this->load->view('templates/html_footer.php');
    }
  }

 ?>

<?php

  class Admin extends CI_Controller
  {
    private $data;//用来放视图数据的容器

    public function __construct()
    {
      $this->check_admin();

      parent::__construct();

      $this->load->helper(array('form','url'));
      $this->load->model(array('User_Model','Blog_Model','Category_Model'));
      $this->load->library(array('form_validation','pagination'));

      $this->data['login_status'] = 1;
      $this->data['user_name'] = $_SESSION['user_name'];
      $this->data['is_admin'] = $_SESSION['is_admin'];
      $this->data['title'] = "Mark Lux|Admin";
      $this->data['base_url'] = base_url();
    }

    public function index()
    {

      $this->load->view('templates/html_header.php',$this->data);
      $this->load->view('templates/head_navigation.php');
      $this->load->view('templates/header.php');
      $this->load->view('admin_view/main.php');
      $this->load->view('templates/html_footer.php');
    }

    public function add_new()
    {
      //设置表单验证规则
      $this->form_validation->set_rules('blog_title','标题','required',array('required' => '%s不能为空'));
      $this->form_validation->set_rules('blog_md_code','文本','required',array('required' => '%s不能为空'));


      if($this->form_validation->run() == FALSE)
      {
        $this->data['category'] = $this->Category_Model->get_category();
        $this->load->view('templates/html_header.php',$this->data);
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
        $row['blog_create_time'] = $this->input->post('blog_create_time');

        //插入数据库中
        $status =  $this->Blog_Model->insert_new($row);

        //根据情况来跳转

        if(!empty($status))
        {
          $this->load->view('templates/html_header.php',$this->data);
          $this->load->view('templates/head_navigation.php');
          $this->load->view('admin_view/operate_ok.php');
          $this->load->view('templates/html_footer.php');
        }
        else
        {
          $this->load->view('templates/html_header.php',$this->data);
          $this->load->view('templates/head_navigation.php');
          $this->load->view('admin_view/operate_failed.php');
          $this->load->view('templates/html_footer.php');
        }
      }
    }

    //删除和修改的列表
    public function article_manage($category,$cur=0)
    {
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

      $this->data['links'] = $this->pagination->create_links();
      $this->data['article_data'] = $this->Blog_Model->get_splitpage($splitPage);

      $this->load->view('templates/html_header.php',$this->data);
      $this->load->view('templates/head_navigation.php');
      //$this->load->view('templates/header.php');
      $this->load->view('admin_view/article_list.php');
      $this->load->view('templates/html_footer.php');

    }

    public function edit($id=1)
    {

      //设置表单验证规则
      $this->form_validation->set_rules('blog_title','标题','required',array('required' => '%s不能为空'));
      $this->form_validation->set_rules('blog_md_code','文本','required',array('required' => '%s不能为空'));

      $this->data['article_data'] = $this->Blog_Model->get_article($id);

      if($this->form_validation->run() == FALSE)
      {
        $this->data['category'] = $this->Category_Model->get_category();
        $this->load->view('templates/html_header.php',$this->data);
        $this->load->view('templates/head_navigation.php');
        $this->load->view('admin_view/edit.php');
        $this->load->view('templates/html_footer.php');
      }
      else
      {
        //封装表单数据
        $row['blog_id'] = $id;
        $row['blog_title'] = $this->input->post('blog_title');
        $row['blog_category'] = $this->input->post('blog_category');
        $row['blog_md_code'] = $this->input->post('blog_md_code');
        $row['blog_create_time'] = $this->input->post('blog_create_time');

        //更新替换
        $status =  $this->Blog_Model->update($row);

        if(!empty($status))
        {
          $this->load->view('templates/html_header.php',$this->data);
          $this->load->view('templates/head_navigation.php');
          $this->load->view('admin_view/operate_ok.php');
          $this->load->view('templates/html_footer.php');
        }
        else
        {
          $this->load->view('templates/html_header.php',$this->data);
          $this->load->view('templates/head_navigation.php');
          $this->load->view('admin_view/operate_failed.php');
          $this->load->view('templates/html_footer.php');
        }

      }
    }

    //删除视图
    public function del($id,$flag=0)
    {
      $this->data['del_id'] = $id;

      if($flag == 0)
      {
        $this->load->view('templates/html_header.php',$this->data);
        $this->load->view('templates/head_navigation.php');
        $this->load->view('admin_view/del_confirm.php');
        $this->load->view('templates/html_footer.php');
      }
      else
      {
        $status = $this->Blog_Model->delete($id);
        if(!empty($status))
        {
          $this->load->view('templates/html_header.php',$this->data);
          $this->load->view('templates/head_navigation.php');
          $this->load->view('admin_view/operate_ok.php');
          $this->load->view('templates/html_footer.php');
        }
        else
        {
          $this->load->view('templates/html_header.php',$this->data);
          $this->load->view('templates/head_navigation.php');
          $this->load->view('admin_view/operate_failed.php');
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

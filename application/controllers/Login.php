<?php

  class Login extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->helper(array('form','url'));
      $this->load->model(array('User_Model','Blog_Model'));
      $this->load->library('form_validation');
    }

    public function index()
    {
      //设置验证规则
      $this->form_validation->set_rules('user_name','用户名','required',array('required' => '%s不能为空'));
      $this->form_validation->set_rules('user_pwd','密码','required|callback_check_pwd',array('required' => '%s不能为空'));

      if($this->form_validation->run() == FALSE)
      {
        //视图数据
        $data['base_url'] = base_url();
        $data['title'] = "Login";
        $data['category_list'] = $this->Blog_Model->get_category();

        //重新加载登陆视图
        $this->load->view('templates/html_header',$data);
        $this->load->view('templates/head_navigation');
        //$this->load->view('templates/header');
        $this->load->view('login_view/form');
        $this->load->view('templates/html_footer');
      }
      else
      {
        $user_name = $this->input->post('user_name');
        session_start();
        $_SESSION['user_name'] = $user_name;
        $_SESSION['login_status'] = TRUE;
        $_SESSION['is_admin'] = $this->User_Model->is_admin($user_name);
        //setcookie("usr_name",$user_name);
        header("Location:http://localhost/mark/index.php/index");
      }
    }

    public function check_pwd($pwd)
    {
      if($this->User_Model->check_user($this->input->post('user_name'),md5($pwd))==TRUE)
      {
        return TRUE;
      }
      else
      {
        $this->form_validation->set_message('check_pwd','用户名或密码错误');
        return FALSE;
      }
    }

  }

?>

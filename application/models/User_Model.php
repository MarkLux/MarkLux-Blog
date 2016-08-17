<?php

  class User_Model extends CI_Model
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    //此方法仅用于注册时检查用户名是否存在
    public function is_user_exist($name)
    {
      $query = $this->db->get_where('users',array('user_name' => $name));
      if(isset($query))
        return TRUE;
      else
        return FALSE;
    }

    //检查用户名状态
    public function check_user($name,$pwd)
    {
      $query = $this->db->get_where('users',array('user_name' => $name));

      $res = $query->result_array();

      if(!empty($res)&&$res[0]['user_pwd'] == $pwd)
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }

    //检查用户是否是管理员
    public function is_admin($name)
    {
      $query = $this->db->get_where('users',array('user_name' => $name));
      $res = $query->result_array();
      if($res[0]['is_admin']==1)
        return TRUE;
      return FALSE;
    }
  }

 ?>

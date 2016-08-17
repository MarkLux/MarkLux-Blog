<?php

  class Blog_Model extends CI_Model
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    //获取最新的10条博文（放置于首页）
    public function get_latest_10()
    {
      $query = $this->db->get('blog',10,0);
      $res = $query->result_array();
      return $res;
    }

    //根据编号来获取一篇博文的信息

    public function get_article($id)
    {
      $query = $this->db->get_where('blog',array('blog_id' => $id));
      $res = $query->result_array();
      return $res;
    }
  }

 ?>

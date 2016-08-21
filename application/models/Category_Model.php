<?php

  class Category_Model extends CI_Model
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    //获取所有分类
    public function get_category()
    {
      $query = $this->db->get('category');

      return $query->result_array();
    }
  }

 ?>

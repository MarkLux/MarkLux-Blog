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

    //修改
    public function update($data)
    {
      $query = $this->db->replace('category',$data);
      return $query;
    }

    //删除
    public function delete($id)
    {
      $query = $this->db->delete('category',array('category_id' => $id));
      return $query;
    }
  }

 ?>

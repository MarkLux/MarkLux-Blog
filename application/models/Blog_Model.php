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
      $query = $this->db->query("select * from blog order by blog_create_time desc limit 0,10");
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

    //返回指定分类的文章数量
    public function get_total_num($category)
    {
      if($category == "all")
      {
        $sql = "SELECT COUNT(*) FROM blog";
      }
      else
      {
        $sql = "SELECT COUNT(*) FROM blog WHERE blog_category =".$this->db->escape($category);
      }

      $query = $this->db->query($sql);

      $arr = $query->row_array();

      return $arr['COUNT(*)'];
    }

    //获取分页显示的数据
    public function get_splitpage($splitPage)
    {
      if($splitPage['category'] == "all"){
        $sql = "select * from blog order by blog_create_time desc limit "
        .$this->db->escape($splitPage['start_num']).",".$this->db->escape($splitPage['page_size']);
      }
      else {
        $sql = "select * from blog where blog_category = "
        .$this->db->escape($splitPage['category'])." order by blog_create_time desc limit "
        .$this->db->escape($splitPage['start_num']).",".$this->db->escape($splitPage['page_size']);
      }

      $query = $this->db->query($sql);

      return $query->result_array();
    }

    //插入一条新条目
    public function insert_new($data)
    {
      //$query = $this->db->query("INSERT INTO blog(blog_title,blog_category,blog_md_code) values($row['blog_title'],$row['blog_category'],$row['blog_md_code'])");
      $query = $this->db->insert('blog',$data);
      return $query;
    }

    //更新一个条目的内容
    public function update($data)
    {
      //使用查询构造器类的话需要在数组中带入主键
      $query = $this->db->replace('blog',$data);
      return $query;
    }

    //根据id删除一个条目
    public function delete($id)
    {
      $query = $this->db->delete('blog',array('blog_id' => $id));
      return $query;
    }

    //获取分类目录
    public function get_category()
    {
      $query = $this->db->get('category');

      return $query->result_array();
    }
  }

 ?>

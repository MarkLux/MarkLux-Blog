<div class="container">
  <div class= "page-header">
    <h2><?php echo $category_now; ?></h2>
  </div>
<?php foreach ($article_data as $row): ?>

  <div class="thumbnail">
    <div class="container">
    <h2><?php echo $row['blog_title']; ?></h2>
    <p>
      分类： <a href="<?php echo $base_url;?>index.php/admin/article_manage/<?php echo $row['blog_category']; ?>"><?php echo $row['blog_category']; ?></a> &nbsp &nbsp 时间： <?php echo $row['blog_create_time']; ?> <br>
    </p>
    <p>
      <a class="btn btn-primary btn-lg" href="<?php echo $base_url?>index.php/article/index/<?php echo $row['blog_id'];?>" role="button">阅读</a>
      <a class="btn btn-primary btn-lg" href="<?php echo $base_url?>index.php/admin/edit/<?php echo $row['blog_id'];?>">编辑</a>
      <a class="btn btn-primary btn-lg" href="<?php echo $base_url?>index.php/admin/del/<?php echo $row['blog_id'];?>">删除</a>
    </p>
    </div>
  </div>

<?php endforeach; ?>

<nav><ul class= "pagination"><?php echo $links; ?></ul></nav>
</div>
<hr>

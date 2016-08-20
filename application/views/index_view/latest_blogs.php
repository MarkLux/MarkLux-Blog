  <div class="contnt">
  <?php foreach ($blog_data as $row): ?>

    <div class="jumbotron">
      <div class="container">
      <h2><?php echo $row['blog_title']; ?></h2>
      <p>
        分类： <a href="<?php echo $base_url;?>index.php/blog/view/<?php echo $row['blog_category']; ?>"><?php echo $row['blog_category']; ?></a> &nbsp &nbsp 时间： <?php echo $row['blog_create_time']; ?> <br>
      </p>
      <p><?php echo substr($row['blog_md_code'],0,50);?></p>
      <p>
        <a class="btn btn-primary btn-lg" href="<?php echo $base_url?>index.php/article/index/<?php echo $row['blog_id'];?>" role="button">阅读</a>
      </p>
      </div>
    </div>

  <?php endforeach; ?>

  <a class="btn btn-primary btn-lg" href="<?php echo $base_url;?>index.php/blog/view/all">查看全部</a>
    <hr>
</div>

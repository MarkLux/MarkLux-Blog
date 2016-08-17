<div id="latest_10">
  <?php foreach ($blog_data as $row): ?>

    <div class="blog_digest">
      <h3><a href="http://localhost/mark/index.php/article/index/<?php echo $row['blog_id'];?>"><?php echo $row['blog_title']; ?></a></h3>
      分类： <a href="#"><?php echo $row['blog_category']; ?></a> &nbsp &nbsp 时间： <?php echo $row['blog_create_time']; ?> <br>
      <?php echo substr($row['blog_md_code'],0,50);?>
      <hr>
    </div>

  <?php endforeach; ?>

  <a href="#">查看全部</a>
    <hr>
</div>

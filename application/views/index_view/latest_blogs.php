<div id="latest_10">
  <?php foreach ($blog_data as $row): ?>

    <div class="blog_digest">
      <h3><a href="<?php echo $base_url?>index.php/article/index/<?php echo $row['blog_id'];?>"><?php echo $row['blog_title']; ?></a></h3>
      分类： <a href="<?php echo $base_url;?>index.php/blog/view/<?php echo $row['blog_category']; ?>"><?php echo $row['blog_category']; ?></a> &nbsp &nbsp 时间： <?php echo $row['blog_create_time']; ?> <br>
      <?php echo substr($row['blog_md_code'],0,50);?>
      <hr>
    </div>

  <?php endforeach; ?>

  <a href="<?php echo $base_url;?>index.php/blog/view/all">查看全部</a>
    <hr>
</div>

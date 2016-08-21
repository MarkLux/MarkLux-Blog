<div class="container">
<h1><?php echo $article_content['blog_title']; ?></h1>
<p>
分类： <a href="<?php echo $base_url;?>index.php/blog/view/<?php echo $article_content['blog_category']; ?>"><?php echo $article_content['blog_category']; ?></a> &nbsp &nbsp 时间： <?php echo $article_content['blog_create_time']; ?> <br>
</p>
<div id="article_md_view">
  <?php echo $article_md; ?>
</div>
</div>

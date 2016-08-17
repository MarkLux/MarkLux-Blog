
<h2><?php echo $article_content['blog_title']; ?></h2>
<br>
分类： <a href="#"><?php echo $article_content['blog_category']; ?></a> &nbsp &nbsp 时间： <?php echo $article_content['blog_create_time']; ?> <br>
<hr>
<div class="article_md_view">
  <?php echo $article_content['blog_md_code']; ?>
</div>
<button type="button" name="button" onclick="show()">Test</button>
<hr>
<script src="../js/markdown.js">
</script>
<script>
  function show()
  {
    alert("Oh Shit");
    var view = document.getElementById('article_md_view');
    view.innerHTML = markdown.toHTML(view.innerHTML);
  }
</script>

<div id="head_navigation">
  {Site_Favicon}&nbsp&nbsp
  <a href="<?php echo $base_url;?>index.php/index">首页</a>&nbsp&nbsp
  <a href="#">博文</a>&nbsp&nbsp
  <a href="#">Pub</a>&nbsp&nbsp&nbsp&nbsp&nbsp
  <?php if(!empty($login_status)): ?>
    <a href="#"><?php echo $user_name ?></a> &nbsp
      <?php if($is_admin == 1): ?>
        <a href="#">管理</a>
      <?php endif; ?>
    <a href="http://localhost/mark/index.php/index/quit">退出登陆</a>
  <?php else: ?>
    <a href="http://localhost/mark/index.php/login">登陆</a>
    <a href="#">注册</a>
  <?php endif; ?>
  <hr>
</div>

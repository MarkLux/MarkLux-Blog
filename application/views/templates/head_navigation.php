
<!-- navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <!-- <span class="icon-bar"></span> -->
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo $base_url;?>index.php/index">MarkLux</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>
          <a href="<?php echo $base_url;?>index.php/index">首页
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class = "dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-labelledby="dropdownMenu4">
            博文
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="<?php echo $base_url;?>index.php/blog/view/all">全部</a>
            <?php foreach($category_list as $row):?>
              <a href="<?php echo $base_url;?>index.php/blog/view/<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?></a>
            <?php endforeach;?>
          </ul>
        </li>
        <li>
          <a href="#">Pub</a>
        </li>
      </ul>

    <?php if(!empty($login_status)): ?>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-labelledby="dropdownMenu4">
            <?php echo $user_name ?>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="#">个人资料</a>
            </li>
            <?php if($is_admin == 1): ?>
            <li>
              <a href="<?php echo $base_url;?>index.php/admin">管理</a>
            </li>
          <?php endif;?>
            <li>
              <a href="<?php echo $base_url;?>index.php/index/quit">登出</a>
            </li>
          </ul>
        </li>
      </ul>
    <?php else: ?>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="<?php echo $base_url;?>/index.php/login">登陆</a>
        </li>
      </ul>
    <?php endif;?>

    </div>
    <!-- /.navbar-collapse -->
  </div>
</nav>
<div  style="height:51px">
</div>

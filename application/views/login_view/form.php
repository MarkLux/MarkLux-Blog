<div class="container">
  <h1>登陆</h1>

<div id="login_form">
  <?php echo validation_errors(); ?>

  <?php echo form_open('login') ?>

  <h4>用户名</h4>
  <input type="text" name="user_name" size="20" value="<?php echo set_value('admin_name'); ?>"/>
  <h4>密码</h4>
  <input type="password" name="user_pwd" size="20" />
  <br><br>
  <input type="submit"  value="登陆" />

  </form>

</div>
</div>

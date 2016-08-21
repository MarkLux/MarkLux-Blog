<div class="container">
  <h1>登陆</h1>

<div id="login_form">
<?php echo validation_errors(); ?>

  <?php echo form_open('login') ?>
<div class="form_group">
  <label>用户名</label>
  <input class="form-control" type="text" name="user_name" size="20" value="<?php echo set_value('admin_name'); ?>"/>
</div>

<div class="form_group">
  <label>密码</label>
  <input class="form-control" type="password" name="user_pwd" size="20" />
</div>
<br>
<button type="submit" class="btn btn-default">登陆</button>

  </form>

</div>
</div>


<div class="container">

<div class="row">

  <div class="col-md-6" id="add_new_form" >


  <h1>添加文章</h1>

  <?php echo validation_errors(); ?>

  <?php echo form_open('admin/add_new') ?>

  <h3>标题</h3>
  <input class="form-control" type="text" name="blog_title" size="20" value="<?php echo set_value('blog_title'); ?>"/>
  <h3>分类</h3>
  <select name="blog_category" class="form-control">
    <?php foreach ($category as $row):?>
      <option><?php echo $row['category_name'];?></option>
    <?php endforeach; ?>
  </select>
  <input type="hidden" name="blog_create_time" value="<?php echo date("Y-m-d h:i");?>">
  <br>
  <h3>文本内容</h3>
  <textarea  class="form-control" rows="5" name="blog_md_code" id="text_editor" oninput="update()">
  <?php echo set_value('blog_md_code'); ?>
  </textarea>
  <br>
  <button type="submit" class="btn btn-default">提交</button>

  </form>
  </div>
  <div class="col-md-6">

    <h3>实时预览</h3>
    <div id="preview">

    </div>

  </div>
</div>
</div>

<script>
  var editor = document.getElementById('text_editor');
  var preview = document.getElementById('preview');
  var parser = new HyperDown;

  function update()
  {
    preview.innerHTML = parser.makeHtml(editor.value);
  }
</script>

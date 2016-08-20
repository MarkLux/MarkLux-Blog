
<div class="container">
  <div id="add_new_form">


  <h1>添加文章</h1>

  <?php echo validation_errors(); ?>

  <?php echo form_open('admin/add_new') ?>

  <h3>标题</h3>
  <input type="text" name="blog_title" size="20" value="请在这里输入标题"/>
  <h3>分类</h3>
  <select name="blog_category">
    <?php foreach ($category as $row):?>
      <option><?php echo $row['category_name'];?></option>
    <?php endforeach; ?>
  </select>
  <br>
  <h3>文本内容</h3>
  <textarea rows="5" cols="80" name="blog_md_code" id="text_editor" oninput="update()">
    请使用markdown语法
  </textarea>
  <br>
  <input type="submit"  value="提交" />

  </form>
</div>
<h3>实时预览</h3>
<div id="preview">

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

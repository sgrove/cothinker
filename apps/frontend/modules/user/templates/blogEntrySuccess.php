<?php use_helper('Date', 'Number', 'I18N', 'Form', 'Javascript', 'Star', 'Global') ?>
  <div id="project-tabs">
    <ul>
	<?php echo nav_tabs('profile', 'blog', $profile); ?>
    </ul>
  </div>

<h1>Blog Entry</h1>
<?php echo form_tag('user/blogEntry', array('class' => 'blog-form')) ?>
	<ul>
	<li><?php echo label_for('title', __('Title')), input_tag('title') ?></li>
	<li><?php echo label_for('body', __('Body')), textarea_tag('body') ?></li>
	<li><?php echo label_for('image', 'Upload Image'), input_file_tag('image', array()) ?></li>
	<li><?php echo submit_tag('Post', array('class' => 'btn')) ?>  <?php echo submit_tag('Cancel', array('class' => 'btn')) ?></li>
	</ul>
</form>


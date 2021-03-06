<?php
// auto-generated by sfPropelCrud
// date: 2008/04/04 15:24:10
?>
<?php use_helper('I18N', 'Javascript', 'Form', 'Object') ?>

<div>
  <?php echo form_remote_tag(array(
              'update' => 'pager-holder',
              'url'    => 'user/ajaxUserPager',
              'loading'  => "Element.show('form-search-indicator')",
              'complete' => "Element.hide('form-search-indicator');".visual_effect('highlight', 'pager-holder'),
              )) ?>
    <fieldset id='ajax_filter_fieldset' class="borderless">
      <span id="project-title">
        <?php echo input_auto_complete_tag('user_name','','user/autoComplete?field=name','autocomplete=false','use_style=true') ?>
      </span>
      <span>
        <label for="campus">campus: <?php echo select_tag('user_campus', objects_for_select($campuses, 'getId', 'getName', '', array('include_blank'=>true)), array('class'=>'xxx')) ?></label>
        <label for="department">department: <?php echo select_tag('user_department', objects_for_select($departments, 'getId', 'getName', '', array('include_blank'=>true)), array('class'=>'xxx')) ?></label>
      </span>
      <span id="update_button">
        <?php echo submit_tag('Search', array()) ?>
      </span>
      <div style="height:20px;display:inline;">
        <p id="form-search-indicator" style="display:none">
        	<?php echo image_tag('indicator.gif') ?> Searching users...
        </p>
      </div>
    </fieldset>
  </form>
</div>
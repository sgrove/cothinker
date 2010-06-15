<?php use_helper('Javascript', 'PagerNavigation', 'Global', 'I18N')?>

<?php //include_partial('mailNavigation') ?>

<?php echo nav_tabs('messages', $tab); ?>

<div id="mail-nav">
  <?php echo link_to_function(image_tag('remove').' '.__('Delete Selected'), 'document.messages_list.submit()') ?>
  <?php //echo link_to(image_tag('mark').' '.__('Mark Selected'), '#') ?>
</div>
 
<?php include_partial('list', array('pager' => $messages)) ?>
<div id="pager-navigation">
  <?php //echo pager_navigation($messages, 'messages/showUserMailbox', array()) ?>
</div>
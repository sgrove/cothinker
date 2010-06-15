<?php use_helper('Date', 'Number', 'I18N', 'Form', 'Javascript', 'Star', 'Global', 'sfFileGallery') ?>

<?php echo nav_tabs('project', $tab, $project); ?>

<div style="border: 1px solid #72BE44;background-color: #D9E1FF;padding: 4px;margin-bottom: 10px;">
  <p style="float:right;text-align:right;">
    Task belongs to <?php echo $task->getSingleUser('user')->getProfile()->getFullName() ?><br />
    Assigned by <?php echo link_to($task->getSfGuardUser()->getProfile(), '@show_user?user='.$task->getSfGuardUser()->getProfile()->getUuid()) ?> on <?php echo format_date($task->getCreatedAt()) ?><br />
    <a href="#comments"><?php echo icon_tag('comment').' '.$task->getNbComments().' Comments' ?></a>
    <?php echo icon_tag('folder'). ' '.get_nb_files('Task', $task->getId()).' Files '; if ($sf_user->isAuthenticated() && $project->hasPermission('create-task', $sf_user->getId())) { echo icon_tag('notes_edit').' '.link_to('Edit Task', '@edit_project_task?project='.$project->getSlug().'&task='.$task->getUuid()); } ?>
  </p>
  <p style="float:left;">
    <h2><?php echo link_to($task->getName(), '@show_project_task?project='.$project->getSlug().'&task='.$task->getUuid()) ?></h2>
    <?php echo nl2br($task->getDescription()) ?>
  </p>
  <p style="clear: both;">&nbsp;</p>
</div>

<div id='files-holder' style='padding:4px;width:48%;float:right;'>
  <h3><a id="files"><?php echo ucwords(__('Files')) ?></a></h3>
  <div style='background-color:#D9E1FF;border:1px solid #72BE44;padding: 4px;'>
    <?php if ($task->getProject()->hasPermission('create-task')): ?><div style="border-bottom: 1px solid white; padding-bottom: 2px;margin-bottom: 4px;"> <?php echo file_link_to_add('task', $task->getId(), array('icon' => 'true', 'modalbox' => 'true')) ?></div><?php endif; ?>
      <?php foreach(sfFileGalleryPeer::getFiles('task', $task->getId()) as $file): ?>
        <div class="file-holder">
          <span style="float:right;"><?php echo 'Added by '.link_to("Sean Grove", '#').' on '.format_date($file->getCreatedAt()) ?></span><?php echo link_to($file->getName(), "@download_file?id=".$file->getUuid()) ?>
          <div style="border-top:1px solid white;margin-top:2px;padding-top:4px;"><?php echo $file->getDescription() ?></div>
        </div>

      <?php endforeach; ?>
    </div>
  </div>

  <div id='comments-holder' style='padding:4px;width:48%;float:left;'>
    <h3><a id="comments"><?php echo ucwords(__('Comments')) ?></a></h3>
    <?php
    include_component('sfComment', 'commentList', array('object' => $task));
    if ($sf_user->isAuthenticated())
      include_component('sfComment', 'commentForm', array('object' => $task));
    ?>
  </div>
  <div style="clear:both;">&nbsp;</div>

<?php use_helper('Date', 'Form', 'Javascript', 'Global', 'sfIcon') ?>

<?php if ($message->getsfGuardUserRelatedBySenderId()->getId() == $sf_user->getId()) { $tab = 'sent'; } else { $tab = 'inbox'; } ?>

<?php echo nav_tabs('messages', $tab); ?>

<?php $original = $message->getUuid(); $messages = $message->getThread() ?>
<?php foreach($messages as $message): ?>

<div class="message-view-single" <?php if ($original == $message->getUuid()) echo "style='background-color:#D9E1FF'" ?>>
  <a id="message_<?php echo $message->getUuid() ?>">&nbsp;</a>
  <?php echo link_to(image_tag($message->getSfGuardUserRelatedBySenderId()->getProfile()->getThumbnail(), array('class' => 'sender-pic')), 'user/show?user='.$message->getsfGuardUserRelatedBySenderId()->getProfile()->getUuid()) ?>
  <ul>
    <li>
      <?php echo ucwords(__('from')) ?>:<br />    
      <?php echo ucwords(__('to')) ?>:<br />      
      <?php echo ucwords(__('subject')) ?>:<br />
      <?php echo span_button(icon_tag('mail_edit').' '.ucwords(__('reply')), 'messages/reply?message='.$message->getUUID()) ?>
    </li>
    <li>
      <?php
        if ($message->getsfGuardUserRelatedBySenderId()->getId() == $sf_user->getId())
        {
          echo "You<br />";
        }
        else
        {
          echo link_to($message->getsfGuardUserRelatedBySenderId()->getProfile(), 'user/show?user='.$message->getsfGuardUserRelatedBySenderId()->getProfile()->getUuid()).'<br />';
        }
        ?>
      <?php
        if ($message->getsfGuardUserRelatedByRecipientId()->getId() == $sf_user->getId())
        {
          echo "You <br />";
        }
        else
        {
          echo link_to($message->getsfGuardUserRelatedByRecipientId()->getProfile(), 'user/show?user='.$message->getsfGuardUserRelatedByRecipientId()->getProfile()->getUuid()).'<br />';
        }
        ?>
      <?php echo $message->getSubject() ?><br />
      <?php echo span_button(icon_tag('mail_remove').' '.ucwords(__('delete')), 'messages/delete?message='.$message->getUUID()) ?>
    </li>
  </ul>
  <br />
  <div class="msg-body"><?php echo $message->getFormattedBody() ?></div>
</div>
<?php endforeach; ?>
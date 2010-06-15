<?php use_helper('Text', 'Date', 'I18N', 'Global') ?>

<?php $folder = $sf_params->get('folder') ?>
<?php if (!isset($folder)): ?>
  <?php $folder = 'inbox'; ?>
<?php endif; ?>

<?php // Just a one-time check for outbox ?>
<?php $from = __('From') ?>
<?php if ($folder == "sent") $from = __('To') ?>
  <div class="mail-listing-fields mail-new">
    <ul>
        <li style="float:left;min-width: 2%;">&nbsp;</li>
        <li style="float:left;min-width: 15%;"><?php echo $from ?></li>
        <li style="float:left;">Subject</li>
        <li style="float:right;">Date</li>
    </ul>
  </div>

<?php echo form_tag('messages/deleteMessages', array('name' => 'messages_list')) ?>
<?php $counter = 1 ?>
<?php foreach($pager->getResults() as $result): ?>
<?php $counter += 1 ?>
<?php $rowCount = $counter % 2 ?>
  <div class="mail-listing-fields <?php if($result->getReadAt() == null) echo 'mail-new' ?>">
    <ul>
        <li style="float:left;min-width: 2%;"><?php echo checkbox_tag('messages[]', $result->getUuid(), false, array()) ?></li>
        <li style="float:left;min-width: 15%;"><?php if ($folder == 'sent') { echo link_to($result->getsfGuardUserRelatedByRecipientId()->getProfile(), 'user/show?user='.$result->getsfGuardUserRelatedByRecipientId()->getProfile()->getUuid()); } else { echo link_to($result->getsfGuardUserRelatedBySenderId()->getProfile(), 'user/show?user='.$result->getsfGuardUserRelatedBySenderId()->getProfile()->getUuid()); }?></li>
        <li style="float:left;"><?php echo link_to($result->getAbbrSubject(70), 'messages/view?message='.$result->getUuid().'&tab='.$folder.'#message_'.$result->getUuid()) ?></li>
        <li style="float:right;"><?php echo format_date($result->getCreatedAt(), 'hh:mm').' '.format_date($result->getCreatedAt()) ?></li>
    </ul>
  </div>
<?php endforeach; ?>
  <div class="inbox-pager-navigation">
    <?php if (count($pager->getResults()) == 0): ?>
      No messages - but don't feel too lonely, we like you a lot!
    <?php else: ?>
    <ul>
    <li style="float:left;"><?php echo ucwords(__('messages')) ?> <?php echo $pager->getFirstIndice() ?> to <?php echo $pager->getLastIndice() ?></li>
    <?php if ($pager->getPage() != $pager->getLastPage()): ?><li style="float:right;"><?php echo link_to('Next '.$pager->getMaxPerPage().image_tag('ajnext',array('class' => 'nav_rarrow')), 'messages/showUserMailbox?tab='.$folder.'&page='.$pager->getNextPage()) ?></li><?php endif; ?>
    <?php if ($pager->getPage() != 1): ?><li style="float:right;margin-right:10px;"><?php echo link_to(image_tag('ajback',array('class' => 'nav_rarrow')).' Previous '.$pager->getMaxPerPage(), 'messages/showUserMailbox?tab='.$folder.'&page='.$pager->getPreviousPage()) ?></li><?php endif; ?>
    <li style="clear:both;">&nbsp;</li>
    </ul>
    <?php endif; ?>
  </div>
</div>


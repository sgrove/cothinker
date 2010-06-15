<?php use_helper('Date', 'sfIcon'); ?>
<div class="sf_comment" id="sf_comment_<?php echo $comment['Id'] ?>">
  <p class="sf_comment_info">
      <?php echo icon_tag('comment').' ' ?>
      <?php if (!is_null($comment['AuthorId'])): ?>
        <?php
        $user_config = sfConfig::get('app_sfPropelActAsCommentableBehaviorPlugin_user');
        $class = $user_config['class'];
        $toString = $user_config['toString'];
        $peer = sprintf('%sPeer', $class);
        $author = call_user_func(array($peer, 'retrieveByPk'), $comment['AuthorId']);
        echo __('Posted by %1%', array('%1%' => '<span class="sf_comment_author">'.link_to($author->getProfile()->getFullName(), 'user/show?user='.$author->getProfile()->getUuid()).'</span>'));
        ?><?php else: ?><?php echo $comment['AuthorName'] ?><?php endif; ?>,
    <?php echo __('%1% ago', array('%1%' => distance_of_time_in_words(strtotime($comment['CreatedAt'])))) ?>
  </p>
  <p class="sf_comment_text">
    <?php echo $comment['Text']; ?>
  </p>
</div>
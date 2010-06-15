<?php use_helper('Date') ?>
<tr>
  <td class="thread_name">
    
    <?php if ($topic->getIsSticked()): ?>
      <?php echo image_tag('/sfSimpleForumPlugin/images/note.png', array(
        'align' => 'bottom',
        'alt'   => __('Sticked topic'),
        'title' => __('Sticked topic')
      )) ?>
    <?php endif; ?>
    <?php if ($topic->getIsLocked()): ?>
      <?php echo image_tag('/sfSimpleForumPlugin/images/lock.png', array(
        'align' => 'bottom',
        'alt'   => __('Locked topic'),
        'title' => __('Locked topic')
      )) ?>
    <?php endif; ?>
    <?php if (!$topic->getIsLocked() && !$topic->getIsSticked()): ?>
      <?php $image = $topic->getNbReplies() ? 'comments' : 'comment'  ?>
      <?php echo image_tag('/sfSimpleForumPlugin/images/'.$image.'.png', array(
        'align' => 'bottom'
      )) ?>
    <?php endif; ?>
    
    <?php echo link_to(
      $topic->getTitle(),
      '@show_forum_topic?id='.$topic->getId().'&project='.$project->getSlug().'&stripped_title='.$topic->getStrippedTitle().'&forum_name='.$forum->getStrippedName(),
      array('class' => $topic->getIsNew() ? 'new' : '')) ?>
      
    <?php $pages = ceil(($topic->getNbPosts()) / sfConfig::get('app_sfSimpleForumPlugin_max_per_page', 10)) ?>
    <?php if ($pages > 1): ?>
      <?php echo link_to(
        '(last page)',
        '@show_forum_topic?id='.$topic->getId().'&project='.$project->getSlug().'&stripped_title='.$topic->getStrippedTitle().'&forum_name='.$forum->getStrippedName().'&page='.$pages
      ) ?>
    <?php endif; ?>
    
    <?php if ($include_forum): ?>
      in <?php echo link_to(
        $topic->getsfSimpleForumForum()->getName(),
        '@show_project_forum?forum_name='.$topic->getsfSimpleForumForum()->getStrippedName().'&project='.$project->getSlug()
      ) ?>
    <?php endif; ?>
    
    <?php include_partial('forums/topic_moderator_actions', array('topic' => $topic, 'user_is_moderator' => $user_is_moderator)) ?>
    
  </td>
  <td class="thread_replies"><?php echo $topic->getNbReplies() ?></td>

  <?php if (sfConfig::get('app_sfSimpleForumPlugin_count_views', true)): ?>
  <td class="thread_views"><?php echo $topic->getNbViews() ?></td>
  <?php endif; ?>

  <td class="thread_recent">
    <?php $message_link = $topic->getNbReplies() ? __('Last reply') : __('Posted') ?>
    <?php $latest_post = $topic->getsfSimpleForumPost() ?>
    <?php echo $message_link . ' ' . __('%date% ago by %author%', array(
      '%date%'   => distance_of_time_in_words($latest_post->getCreatedAt('U')),
      '%author%' => get_partial('forums/author_name', array('author' => $latest_post->getAuthorName(), 'sf_cache_key' => $latest_post->getAuthorName()))
      )) ?>

    <?php if ($topic->getNbReplies()): ?>
      (<?php echo link_to(__('view'), '@show_forum_post?id='.$topic->getLatestPostId().'&project='.$project->getSlug().'&forum_name='.$topic->getsfSimpleForumForum()->getStrippedName()) ?>)
    <?php endif; ?>

  </td>

</tr>
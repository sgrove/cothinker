<?php use_helper('I18N', 'Pagination', 'sfSimpleForum', 'Validation', 'Global') ?>

<?php if (!isset($tab)) $tab = 'forums' ?>
<?php echo nav_tabs('project', $tab, $project); ?>

  <?php echo forum_breadcrumb(array(
    array(sfConfig::get('app_sfSimpleForumPlugin_forum_name', 'Forums'), 'forums/projectForumList?project='.$project->getSlug()),
    array($topic->getsfSimpleForumForum()->getName(), 'forums/forum?forum_name='.$topic->getsfSimpleForumForum()->getStrippedName().'&project='.$project->getSlug()),
    $topic->getTitle()
  )) ?>

<?php if(sfConfig::get('app_sfSimpleForumPlugin_use_feeds', true)): ?>
<?php slot('auto_discovery_link_tag') ?>
  <?php echo auto_discovery_link_tag('rss', 'forums/topicFeed?id='.$topic->getId().'&stripped_title='.$topic->getStrippedTitle(), array('title' => $feed_title)) ?>
<?php end_slot() ?>
<?php endif; ?>

<div class="sfSimpleForum">
  
  <h1><?php echo $topic->getTitle() ?></h1>

  <ul class="forum_actions">
    <?php if ($sf_user->hasCredential('moderator')): ?>
      <li><?php echo link_to(
        $topic->getIsSticked() ? __('Unstick') : __('Stick'), 
        'forums/toggleStick?id='.$topic->getId()
      ) ?></li>
      <li><?php echo link_to(
        $topic->getIsLocked() ? __('Unlock') : __('Lock'), 
        'forums/toggleLock?id='.$topic->getId()
      ) ?></li>
    <?php endif ?>
  </ul>
    
  <div class="forum_figures">
    <?php echo format_number_choice('[1]1 message, no reply|(1,+Inf]%posts% messages', array('%posts%' => $post_pager->getNbResults()), $post_pager->getNbResults()) ?> 
    <?php if (sfConfig::get('app_sfSimpleForumPlugin_count_views', true)): ?>
    - <?php echo format_number_choice('[0,1]1 view|(1,+Inf]%views% views', array('%views%' => $topic->getNbViews()), $topic->getNbViews()) ?>
    <?php endif; ?>
    <?php if(sfConfig::get('app_sfSimpleForumPlugin_use_feeds', true)): ?>
      <?php echo link_to(image_tag('/sfSimpleForumPlugin/images/feed-icon.png', 'align=top'), 'forums/topicFeed?id='.$topic->getId().'&stripped_title='.$topic->getStrippedTitle(), 'title='.$feed_title) ?>
    <?php endif; ?>    
  </div>
  
  <?php include_partial('forums/post_list', array('posts' => $post_pager->getResults(), 'include_topic' => false, 'project' => $project, )) ?>
  
  <?php echo pager_navigation($post_pager, '@show_forum_topic?id='.$topic->getId().'&stripped_title='.$topic->getStrippedTitle().'&project='.$project->getSlug().'&forum_name='.$topic->getsfSimpleForumForum()->getStrippedName()) ?>
  
  <?php if (!$topic->getIsLocked() && $sf_user->isAuthenticated()): ?>
    
    <h2>
      <?php echo __('Post a reply') ?>
    </h2>
    <?php include_partial('forums/add_post_form', array('topic' => $topic, 'project' => $project)) ?>
      
  <?php elseif (!$topic->getIsLocked() && !$sf_user->isAuthenticated()): ?>
    
    <ul class="forum_actions">
        <li><?php echo link_to(
          __('Post a reply'), 
          sfConfig::get('sf_login_module').'/'.sfConfig::get('sf_login_action')
        ) ?></li>
    </ul>
    
  <?php elseif ($topic->getIsLocked() && $sf_user->isAuthenticated()): ?>
    
    <?php echo __('This topic was locked by a forum moderator. No reply can be added.') ?>
    
  <?php endif; ?>
</div>
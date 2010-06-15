<?php use_helper('I18N', 'Pagination', 'sfSimpleForum', 'Global') ?>

<?php echo nav_tabs('project', $tab, $project); ?>

<?php if (sfConfig::get('app_sfSimpleForum_include_breadcrumb', true)): ?>
  <?php echo forum_breadcrumb(array(
    array(sfConfig::get('app_sfSimpleForumPlugin_forum_name', 'Forums'), '@project_forums?project='.$project->getSlug()),
    $forum->getName()
  )) ?>
<?php endif; ?>

<div class="sfSimpleForum">
  
  <h1><?php echo $forum->getName() ?></h1>

  <ul class="forum_actions">
    <li><?php echo link_to(__('New topic'), '@create_forum_topic?forum_name='.$forum->getStrippedName().'&project='.$project->getSlug()) ?></li>
  </ul>
  
  <?php include_partial('forums/figures', array(
    'display_topic_link'  => false,
    'nb_topics'           => $forum->getNbTopics(),
    'topic_rule'          => '',
    'display_post_link'   => true,
    'nb_posts'            => $forum->getNbPosts(),
    'post_rule'           => '@list_forum_latest_posts?forum_name='.$forum->getStrippedName().'&project='.$project->getSlug(),
    'feed_rule'           => '@list_forum_latest_posts_feed?forum_name='.$forum->getStrippedName().'&project='.$project->getSlug(),
    'feed_title'          => $feed_title
  )) ?>
  
  <?php if ($forum->getNbTopics()): ?>
    
    <?php include_partial('forums/topic_list', array('topics' => $topics, 'include_forum' => false, 'project' => $project, 'forum' => $forum)) ?>
    
    <?php echo pager_navigation($topic_pager, 'forums/forum?forum_name='.$forum->getStrippedName().'&project='.$project) ?>
  <?php else: ?>
    <p><?php echo __('There is no topic in this discussion yet. Perhaps you would like to %start%?', array('%start%' =>  link_to(__('start a new one'), 'forums/createTopic?forum_name='.$forum->getStrippedName().'&project='.$project->getSlug()))) ?></p>
  <?php endif; ?>

</div>
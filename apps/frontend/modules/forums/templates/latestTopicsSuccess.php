<?php use_helper('I18N', 'Pagination', 'sfSimpleForum', 'Global') ?>

<?php if (!isset($tab)) $tab = 'forums' ?>
<?php echo nav_tabs('project', $tab, $project); ?>

<?php $title = __('Latest topics') ?>

<?php if (sfConfig::get('app_sfSimpleForum_include_breadcrumb', true)): ?>
<?php slot('forum_navigation') ?>
  <?php echo forum_breadcrumb(array(
    array(sfConfig::get('app_sfSimpleForumPlugin_forum_name', 'Forums'), 'forums/forumList'),
    $title
  )) ?>
<?php end_slot() ?>
<?php endif; ?>

<div class="sfSimpleForum">
  
  <h1><?php echo $title ?></h1>

  <?php if (sfConfig::get('app_sfSimpleForumPlugin_allow_new_topic_outside_forum', true)): ?>
  <ul class="forum_actions">
    <li><?php echo link_to(__('New topic'), 'forums/createTopic'.'&project='.$project->getSlug()) ?></li>
  </ul>    
  <?php endif; ?>
  
  <?php include_partial('forums/figures', array(
    'display_topic_link'  => false,
    'nb_topics'           => $topics_pager->getNbResults(),
    'topic_rule'          => '',
    'display_post_link'   => true,
    'nb_posts'            => sfSimpleForumPostPeer::doCount(new Criteria()),
    'post_rule'           => 'forums/latestPosts?project='.$project->getSlug(),
    'feed_rule'           => 'forums/latestTopicsFeed?project='.$project->getSlug(),
    'feed_title'          => $feed_title
  )) ?>
    
  <?php include_partial('forums/topic_list', array('topics' => $topics_pager->getResults(), 'project' => $project, 'include_forum' => true)) ?>
  
  <?php echo pager_navigation($topics_pager, 'forums/latestTopics?project='.$project->getSlug()) ?>

</div>
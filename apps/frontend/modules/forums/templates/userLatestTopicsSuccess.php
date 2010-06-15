<?php use_helper('I18N', 'Pagination', 'sfSimpleForum', 'Global') ?>

<?php if (!isset($tab)) $tab = 'forums' ?>
<?php echo nav_tabs('project', $tab, $project); ?>

<?php $title = __('Topics by %user%', array('%user%' => get_partial('forums/author_name', array('author' => $user->getFullName(), 'sf_cache_key' => $username)))) ?>

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
    <li><?php echo link_to(__('New topic'), 'forums/createTopic') ?></li>
  </ul>    
  <?php endif; ?>
  
  <?php include_partial('forums/figures', array(
    'display_topic_link'  => false,
    'nb_topics'           => $topics_pager->getNbResults(),
    'topic_rule'          => '',
    'display_post_link'   => true,
    'nb_posts'            => sfSimpleForumPostPeer::countForUser($user->getUserId()),
    'post_rule'           => 'forums/userLatestPosts?username='.$username.'&project='.$project->getSlug(),
    'feed_rule'           => 'forums/userLatestTopicsFeed?username='.$username,
    'feed_title'          => $feed_title
  )) ?>
    
  <?php include_partial('forums/topic_list', array('topics' => $topics_pager->getResults(), 'project' => $project, 'include_forum' => true)) ?>
  
  <?php echo pager_navigation($topics_pager, 'forums/userLatestTopics?username='.$username.'&project='.$project->getSlug()) ?>

</div>
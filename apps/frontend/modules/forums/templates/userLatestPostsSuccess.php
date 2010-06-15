<?php use_helper('I18N', 'Pagination', 'sfSimpleForum', 'Global') ?>

<?php if (!isset($tab)) $tab = 'forums' ?>
<?php echo nav_tabs('project', $tab, $project); ?>

<?php $title = __('Messages by %user%', array('%user%' => get_partial('forums/author_name', array('author' => $user->getFullName(), 'sf_cache_key' => $username)))) ?>

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
  
  <?php include_partial('forums/figures', array(
    'display_topic_link'  => true,
    'nb_topics'           => sfSimpleForumTopicPeer::countForUser($user->getUserId()),
    'topic_rule'          => 'forums/userLatestTopics?username='.$username.'&project='.$project->getSlug(),
    'display_post_link'   => false,
    'nb_posts'            => $post_pager->getNbResults(),
    'post_rule'           => '',
    'feed_rule'           => 'forums/userLatestPostsFeed?username='.$username,
    'feed_title'          => $feed_title
  )) ?>
  
  <?php include_partial('forums/post_list', array('posts' => $post_pager->getResults(), 'include_topic' => true, 'project' => $project)) ?>
  
  <?php echo pager_navigation($post_pager, 'forums/userLatestPosts?username='.$username.'&project='.$project->getSlug()) ?>

</div>
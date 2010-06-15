<?php use_helper('I18N', 'Pagination', 'sfSimpleForum', 'Global') ?>

<?php if (!isset($tab)) $tab = 'forums' ?>
<?php echo nav_tabs('project', $tab, $project); ?>

<?php $title = __('Latest messages') ?>

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
    'display_topic_link'  => $nb_topics,
    'nb_topics'           => $nb_topics,
    'topic_rule'          => 'forums/latestTopics?project='.$project->getSlug(),
    'display_post_link'   => false,
    'nb_posts'            => $post_pager->getNbResults(),
    'post_rule'           => '',
    'feed_rule'           => 'forums/latestPostsFeed?&project='.$project->getSlug(),
    'feed_title'          => $feed_title
  )) ?>
  
  <?php include_partial('forums/post_list', array('posts' => $post_pager->getResults(), 'project' => $project, 'include_topic' => true)) ?>
  
  <?php echo pager_navigation($post_pager, 'forums/latestPosts?project='.$project->getSlug()) ?>

</div>
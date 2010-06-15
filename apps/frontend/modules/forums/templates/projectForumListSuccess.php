<?php use_helper('I18N', 'sfSimpleForum', 'Global') ?>

<?php echo nav_tabs('project', $tab, $project); ?>

<?php if (sfConfig::get('app_sfSimpleForum_include_breadcrumb', true)): ?>
  <?php echo forum_breadcrumb(array(
    sfConfig::get('app_sfSimpleForumPlugin_forum_name', 'Forums')
  )) ?>
<?php endif; ?> 

<div class="sfSimpleForum">
  
  <h1><?php echo __(sfConfig::get('app_sfSimpleForumPlugin_forum_name', 'Forums')) ?></h1>
  
  <?php if (sfConfig::get('app_sfSimpleForumPlugin_allow_new_topic_outside_forum', false)): ?>
  <ul class="forum_actions">
    <li><?php echo link_to(__('New topic'), '@create_forum_topic?project='.$project->getSlug()) ?></li>
  </ul>    
  <?php endif; ?>
  
  <?php include_partial('figures', array(
    'display_topic_link'  => true,
    'nb_topics'           => $nb_topics,
    'topic_rule'          => '@list_forums_latest_topics?project='.$project->getSlug(),
    'display_post_link'   => true,
    'nb_posts'            => $nb_posts,
    'post_rule'           => '@list_forums_latest_posts?project='.$project->getSlug(),
    'feed_rule'           => '@list_forums_latest_posts_feed?project='.$project->getSlug(),
    'feed_title'          => $feed_title
  )) ?>
  
  <?php $category = '' ?>
  <table id="fora">
    <thead>
    <tr>
      <th class="forum_name"><?php echo __('Forum') ?></th>
      <th class="forum_threads"><?php echo __('Topics') ?></th>
      <th class="forum_posts"><?php echo __('Messages') ?></th>
      <th class="forum_recent"><?php echo __('Last Message') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($project->getForumCategories() as $category): ?>
      <?php if (sfConfig::get('app_sfSimpleForumPlugin_display_categories', true)): ?>
      <tr class="category">
        <td class="category_header" colspan="4"><?php echo $category ?></td>
      </tr>        
    <?php endif ?>
      <?php foreach ($category->getFora() as $forum): ?>
        <?php include_partial('forums/forum', array('forum' => $forum, 'project' => $project)) ?>
      <?php endforeach; ?>
    <?php endforeach; ?>
    </tbody>
  </table>

</div>
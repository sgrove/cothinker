<?php use_helper('Date', 'Text', 'I18N') ?>
<tr>
  <td class="forum_name">
    <?php echo link_to($forum->getName(), '@show_project_forum?forum_name='.$forum->getStrippedName().'&project='.$project->getSlug()) ?><br />
    <?php echo simple_format_text($forum->getDescription(), array('class' => 'forum_description')) ?>
  </td>
  <td class="forum_threads"><?php echo $forum->getNbTopics() ?></td>
  <td class="forum_posts"><?php echo $forum->getNbPosts() ?></td>
  <td class="forum_recent">
    <?php if ($forum->getLatestPostId()): ?>
      <?php $latest_post = $forum->getsfSimpleForumPost(); ?>
      <?php echo link_to($latest_post->getTitle(), '@show_forum_post?id='.$latest_post->getId().'&project='.$project->getSlug().'&forum_name='.$latest_post->getsfSimpleforumForum()->getStrippedName()) ?><br />
      <?php echo __('%date% ago by %author%', array(
        '%date%'   => distance_of_time_in_words($latest_post->getCreatedAt('U')),
        '%author%' => get_partial('forums/author_name', array('author' => $latest_post->getAuthorName(), 'sf_cache_key' => $latest_post->getAuthorName()))
        )) ?>
    <?php endif ;?>
  </td>
</tr>
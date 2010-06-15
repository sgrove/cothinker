<?php use_helper('I18N', 'nahoWiki') ?>

<p class="wiki-diff-intro"><?php echo __('View below changes from %revision1% to %revision2% :', array(
    '%revision1%' => link_to_wiki($page->getWiki()->getProject()->getSlug(), $page->getName(), array('revision' => $revision1->getRevision())),
    '%revision2%' => link_to_wiki($page->getWiki()->getProject()->getSlug(), $page->getName(), array('revision' => $revision2->getRevision())),
  )) ?>(<?php echo $revision1->getRevision() ?>)</p>

<?php if (!trim($diff)): ?>
  <p class="wiki-diff-intro wiki-warning"><?php echo __('There is no difference between the selected revisions') ?></p>
<?php else: ?>
  <pre class="wiki-diff"><?php echo $diff ?></pre>
  <ul class="wiki-diff-links">
    <li><?php echo link_to_diff($page->getWiki()->getProject()->getSlug(), __('View reverse diff'), $page->getName(), $revision2->getRevision(), $revision1->getRevision()) ?></li>
    <li><?php echo link_to_raw_diff($page->getWiki()->getProject()->getSlug(), __('View raw unified diff'), $page->getName(), $revision1->getRevision(), $revision2->getRevision()) ?></li>
  </ul>
<?php endif ?>
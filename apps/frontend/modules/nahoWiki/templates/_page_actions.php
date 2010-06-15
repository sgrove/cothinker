<ul class="wiki-actions">
  <?php if ($canView): ?>
    <li class="wiki-action-view<?php echo $action == 'view' ? ' active' : '' ?>"><?php 
      echo link_to(__('View'), '@wiki_view?' . $uriParams) ?></li>
    <li class="wiki-action-edit<?php echo $action == 'edit' ? ' active' : '' ?>"><?php 
      echo link_to(__($canEdit ? 'Edit' : 'View source'), '@wiki_edit?' . $uriParams) ?></li>
    <li class="wiki-action-history<?php echo $action == 'history' || $action == 'diff' ? ' active' : '' ?>"><?php 
      echo link_to(__('History'), '@wiki_history?' . $uriParams) ?></li>
  <?php endif ?>
  <li class="wiki-action-index<?php echo $action == 'browse' ? ' active' : '' ?>"><?php 
      echo link_to(__('Index'), '@wiki_browse?' . $uriParams) ?></li>
</ul>
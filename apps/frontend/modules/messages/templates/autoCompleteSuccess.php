  <ul>
    <?php foreach ($results as $key => $value ): ?>
      <li id="<?php echo $key ?>"><?php echo str_replace($searchTerm, "<strong>$searchTerm</strong>", $value) ?></li>
    <?php endforeach; ?>
  </ul>
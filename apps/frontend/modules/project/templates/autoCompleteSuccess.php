  <ul>
    <?php foreach ($results as $key => $value ): ?>
      <li id="<?php echo $key ?>"><?php echo str_ireplace($searchTerm, "<strong>$searchTerm</strong>", $value) ?></li>
    <?php endforeach; ?>
  </ul>
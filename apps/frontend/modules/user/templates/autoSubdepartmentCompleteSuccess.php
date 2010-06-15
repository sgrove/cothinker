  <ul>
    <?php foreach ($results as $result): ?>
      <li style="color:black;" id="<?php echo $result->getName() ?>"><?php echo str_ireplace($searchTerm, "<strong>$searchTerm</strong>", $result->getName()) ?></li>
    <?php endforeach; ?>
  </ul>
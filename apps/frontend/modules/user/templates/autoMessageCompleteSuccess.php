  <ul>
    <?php foreach ($results as $result): ?>
      <li style="color:black;float:none;"><?php echo str_ireplace($searchTerm, "<strong>$searchTerm</strong>", $result->getFullName()) ?></li>
    <?php endforeach; ?>
  </ul>
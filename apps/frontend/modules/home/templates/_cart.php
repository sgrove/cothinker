<?php if (!$sf_user->getAttribute('cart')): ?>
  nothing yet in your shopping cart.
<?php else: ?>
  <?php foreach ($sf_user->getAttribute('cart') as $product_id => $quantity): ?>
    <div style="border:1px solid white;padding:2px;margin:2px;">
      <?php for ($i = 1; $i <= $quantity; $i++): ?>
        <?php echo image_tag('statusorb_g', array(
          'class' => 'cart-items',
          'id'    => 'item_'.$product_id.'_'.$i,
          'style' => '')) ?>
          <?php echo CampusPeer::retrieveByUuid($product_id) ?>
          <hr class="clear" />
        <?php endfor; ?>
    </div>
    <hr class="clear" />
  <?php endforeach; ?>
<?php endif; ?>

<hr class="clear" />
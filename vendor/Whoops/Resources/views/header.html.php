<div class="exception">
  <div class="exc-title">
    <?php foreach ($name as $i => $nameSection) : ?>
      <?php if ($i == count($name) - 1) : ?>
        <span class="exc-title-primary"><?php echo $tpl->escape($nameSection) ?></span>
      <?php else : ?>
        <?php echo $tpl->escape($nameSection) . ' \\' ?>
      <?php endif ?>
    <?php endforeach ?>
    <?php if ($code) : ?>
      <span title="Exception Code">(<?php echo $tpl->escape($code) ?>)</span>
    <?php endif ?>
  </div>
  <div class="exc-message">
    <?php if (!empty($message)) : ?>
      <span><?php echo $tpl->escape($message) ?></span>
      <?php if (count($previousMessages)) : ?>
        <div class="exc-title prev-exc-title">
          <span class="exc-title-secondary">Previous exceptions</span>
        </div>
        <ul>
          <?php foreach ($previousMessages as $i => $previousMessage) : ?>
            <li>
              <?php echo $tpl->escape($previousMessage) ?>
              <span class="prev-exc-code">(<?php echo $previousCodes[$i] ?>)</span>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif ?>
    <?php else : ?>
      <span class="exc-message-empty-notice">No message</span>
    <?php endif ?>
  </div>
</div>

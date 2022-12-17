<div>
  <?php if (1 == 1 and 2 == 2): ?>
  <h1>Selamat Datang Di <?php echo htmlspecialchars($data["title"]) ?></h1>
  <?php elseif (1 == 1): ?>
  <h1>ok</h1>
  <?php else: ?>
  <h1>salah!</h1>
  <?php endif; ?>
</div>

<?php include __DIR__ . "/" . "about" . ".kurumi.php" ?>

<?php foreach($data["hewan"] as $hewan ): ?>
<h1>
  <?php echo htmlspecialchars($hewan) ?>
</h1>
<?php endforeach; ?>

<div>
  <?php if (1 == 1): ?>
  <h1>Selamat Datang Di <?php echo $data['title'] ?></h1>
  <?php elseif (1 == 1): ?>
  <h1>ok</h1>
  <?php else: ?>
  <h1>salah!</h1>
  <?php endif; ?>
</div>


<?php foreach($data['hewan'] as $hewan ): ?>
<?php echo $hewan ?> <br />
<?php endforeach; ?>
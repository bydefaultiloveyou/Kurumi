<!DOCTYPE html>
<html lang="en">

<head>
  <title>error handling</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    <?php include __DIR__ . '/css/style.css'; ?>
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism-themes/1.9.0/prism-one-dark.min.css" integrity="sha512-c6S8OdtvoqZCbMfA1lWE0qd368pLdFvVHVILQzNizfowC+zV8rmVKdSlmL5SuidvATO0A7awDg53axd+s/9amw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/line-numbers/prism-line-numbers.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/line-highlight/prism-line-highlight.min.css" integrity="sha512-/yZlirVRhdToT7oiRODRoRwgYMwFnZYvUdie2MNHpv9XMIeWtwoVBqkkkQPOy9A+ZDYKysodYzr9cqsU7bsH0Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <section class="container section">
    <div>
      <p><?= $file ?></p>
      <h2><?= $message ?></h2>
      <!-- <span><?= $file ?></span> !-->
    </div>
    <div>
      <pre class="line-number" data-line="<?= $line ?>"><code class="language-php"><?= $content ?></code></pre>
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/line-highlight/prism-line-highlight.min.js" integrity="sha512-bteQ1XlrEhUJh3mGgo0bneDWpfAAfGxE2lIVPNUolk26uqqsMwHiH+CeWCCURtT3yrCsvgQP7xrdjWTMMopObQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/line-numbers/prism-line-numbers.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>

</html>

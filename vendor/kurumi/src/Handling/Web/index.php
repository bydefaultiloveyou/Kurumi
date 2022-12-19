<!DOCTYPE html>
<html lang="en">

<head>
  <title>error handling</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: sans-serif;
      background: #E5E7EB;
    }

    .container.section {
      position: absolute;
      left: 50%;
      width: calc(100% - 30px);
      transform: translateX(-50%);
    }

    .section div:nth-child(1) {
      padding: 30px;
      background: #fff;
      border-radius: 5px;
    }

    .section div:nth-child(1) p {
      display: inline;
      padding: 10px 15px;
      font-size: 16px;
      background: #F8F8F9;
      border-radius: 2px;
    }

    .section div:nth-child(1) h2 {
      font-size: 20px;
      padding: 20px 0;
      text-transform: capitalize;
    }

    .section div:nth-child(1) span {
      color: #fff;
      padding: 10px;
      background: rgb(255, 0, 0, .7);
      border-radius: 5px;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.21.0/themes/prism-tomorrow.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.21.0/plugins/line-numbers/prism-line-numbers.min.css" />
</head>

<body>
  <section class="container section">
    <div>
      <p>/public/views/<?= $filename; ?>.php</p>
      <h2><?= $message; ?></h2>
      <span><?= $filename; ?>.php Not Found!</span>
    </div>
    <div>
      <pre class="line-numbers"><code class="language-php">namespace Kurumi\Handling;
class Loads{
  public static function showError(string $filename)
  {
    $message = "trying to access a file that doesn't exist.";
    include __DIR__ . "/Web/index.php";
  }
}</code></pre>
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.21.0/plugins/line-numbers/prism-line-numbers.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.21.0/components/prism-core.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.21.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>

</html>

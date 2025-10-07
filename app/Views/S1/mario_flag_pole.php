<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mario Flag Pole</title>
    <style>
        body { font-family: monospace; font-size: 30px; text-align: center; margin-top: 40px;
               background-image: url("https://cdn.wallpapersafari.com/3/73/HNVEo3.jpg");
               background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed; }
        form { margin-bottom: 20px; }
        pre { text-align: left; display: inline-block; }
        .error { color: red; }
        .external-links a { background: white; color: black; padding: 8px; border-radius: 8px; }
        .external-links a:hover { color: blue; }
    </style>
</head>
<body>
    <div class="external-links">
        <a href="boxed_frame">BoxedFrame</a>
        <a href="honey_comb">Honeycomb</a>
    </div>
    <h1>Mario Flag Pole</h1>

    <form method="POST">
        <label for="size">Enter Flag Size:</label>
        <input type="number" name="size" id="size" min="1" step="1" value="<?= esc($size) ?>" required>
        <button type="submit" name="generate">Generate</button>
    </form>

    <?php if (!empty($error)): ?>
        <span class="error"><?= esc($error) ?></span>
    <?php endif; ?>

    <?php if (!empty($flag)): ?>
        <pre><?= esc($flag) ?></pre>
    <?php endif; ?>

</body>
</html>

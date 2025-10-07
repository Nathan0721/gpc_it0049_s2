<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honey Comb</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 450px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
        form label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }
        form input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }
        form input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        form input[type="submit"]:hover {
            background: #0056b3;
        }
        pre {
            background: #212529;
            color: #f8f9fa;
            padding: 20px;
            border-radius: 12px;
            font-size: 14px;
            line-height: 1.4;
            overflow-x: auto;
            margin-top: 25px;
        }
        .output-title {
            text-align: center;
            margin-top: 30px;
            font-size: 18px;
            color: #444;
        }
        .external-links { margin: auto; display: flex; justify-content: center; gap: 20px; margin-top: 5vh; }
        .external-links a { background: white; color: black; padding: 8px; border-radius: 8px; }
        .external-links a:hover { color: blue; }
    </style>
</head>
<body>
    <div class="external-links">
        <a href="./">MarioFlagPole</a>
        <a href="boxed_frame">BoxedFrame</a>
    </div>
    <div class="container">
        <h1>Honeycomb</h1>
        <form method="post">
            <label for="row">Rows</label>
            <input type="number" id="row" name="row" required value="<?= esc($rows) ?>">

            <label for="column">Columns</label>
            <input type="number" id="column" name="column" required value="<?= esc($cols) ?>">

            <input type="submit" value="Generate">
        </form>

        <?php if ($output !== null && $output !== ''): ?>
            <div class="output-title">Honeycomb (<?= esc($rows) ?> x <?= esc($cols) ?>)</div>
            <pre><?= esc($output) ?></pre>
        <?php endif; ?>
    </div>
</body>
</html>

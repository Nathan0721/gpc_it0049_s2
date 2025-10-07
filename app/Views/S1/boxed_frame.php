<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body {
            color: orangered;
            background-color: #131122;
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        h1 {
            margin-top: 5vh;
            text-align: center;
        }
        .boxedframeform {
            text-align: center;
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }
        .boxedframeform input {
            padding: 0.5rem;
            margin: 0.5rem;
        }
        .boxedframeform label {
            font-size: 1.5rem;
            font-weight: bold;
            display: block;
            margin-bottom: 0.5rem;
        }
        .boxedframeform fieldset {
            padding: 1rem;
            border: 2px solid white;
        }
        .boxedframeform input[type="submit"] {
            border: 2.5px solid white;
            color: orangered;
            font-weight: bold;
            background-color: #131122;
            cursor: pointer;
            padding: 0.8rem 1.5rem;
            margin-top: 1rem;
        }
        .boxedframeform input[type="submit"]:hover {
            color: #131122;
            background-color: orangered;
        }
        .boxedframeform input[type="submit"]:active {
            transform: scale(0.9);
        }
        .boxedframediv {
            width: 90%;
            border: 2.5px solid white;
            margin: 2rem auto;
            padding: 1rem;
            overflow: auto;
            text-align: center;
            margin-bottom: 5vh;
        }
        .boxedframediv pre {
            font-family: 'Courier New', monospace;
            font-size: 1.2rem;
            line-height: 1.2;
            color: orangered;
            margin: 0;
            white-space: pre;
        }
        #result {
            text-align: center;
            margin-top: 2rem;
        }
        .error {
            color: #ff6b6b;
            background-color: rgba(255, 107, 107, 0.1);
            border: 1px solid #ff6b6b;
            padding: 1rem;
            margin: 1rem auto;
            max-width: 500px;
            border-radius: 5px;
            text-align: center;
        }
        .external-links { margin: auto; display: flex; justify-content: center; gap: 20px; }
        .external-links a { background: white; color: black; padding: 8px; border-radius: 8px; }
        .external-links a:hover { color: blue; }
    </style>
</head>
<body>
    <div class="external-links">
        <a href="./">MarioFlagPole</a>
        <a href="honey_comb">Honeycomb</a>
    </div>
    <h1>📦 BoxedFrame</h1>
    
    <div class="boxedframeform">
        <form method="POST" action="<?= $_SERVER['REQUEST_URI'] ?>">
            <fieldset>
                <label for="rowsize">Row Size</label>
                <input type="number" id="rowsize" name="rowsize" min="1" max="50" value="<?= isset($_POST['rowsize']) ? $_POST['rowsize'] : $rowSize ?>" placeholder="Enter row size" required>
                
                <label for="columnsize">Column Size</label>
                <input type="number" id="columnsize" name="columnsize" min="1" max="100" value="<?= isset($_POST['columnsize']) ? $_POST['columnsize'] : $columnSize ?>" placeholder="Enter column size" required>
                
                <input type="submit" id="generate" name="generate" value="Generate">
            </fieldset>
        </form>
    </div>
    
    <?php if (isset($error)): ?>
        <div class="error">
            <?= $error ?>
        </div>
    <?php endif; ?>
    
    <div id="result">
        <?php if (!empty($frameOutput)): ?>
            <h1>✅ Result!</h1>
            <div class="boxedframediv">
                <pre><?= $frameOutput ?></pre>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

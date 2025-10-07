<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-image: url("https://asset.gecdesigns.com/img/background-templates/abstract-navy-red-background-design-sr17012401-1705501852665-cover.webp");
        }
        #login-div {
            width: 30%;
            margin: auto;
            padding: 2.5rem;
            margin-top: 25vh;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 100px;
            background: linear-gradient(
                135deg,
                rgba(25, 28, 75, 0.7),
                rgba(255, 51, 102, 0.4)
            );
            box-shadow: 
            0 0 25px rgba(255, 51, 102, 0.6),
            0 0 50px rgba(255, 0, 102, 0.4),
            0 0 80px rgba(0, 200, 255, 0.25);
        }
        #login-div h1 {
            color: white;
        }
        #login-div input, #login-div button {
            padding: 1rem;
            border: none;
            border-radius: 100px;
            font-weight: bold;
        }
        #login-div h1, #login-div input {
            font-family: "Trebuchet MS";
        }
        #login-div button {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        #login-div button:hover {
            background-color: cyan;
            transform: scale(0.925, 0.925);
        }
        #login-div button:active {
            color: white;
            background-color: crimson;
        }
        #login-div-inner {
            gap: 20px;
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }
        #register-link-div{
            width: 12.5%;
            margin: auto;
            padding: 1rem;
            margin-top: 5vh;
            display: flex;
            align-items: center;
            flex-direction: column;
            border-radius: 100px;
            background: linear-gradient(
                to bottom,
                rgba(0, 0, 0, 0.5),
                rgba(52, 50, 199, 0.5)
            );
        }
        #register-link-div a {
            color: white;
            font-family: "Trebuchet MS";
            text-decoration: none;
            transition: color 0.3s ease;
        }
        #register-link-div a:hover {
            color: cyan;
        }
        #register-link-div a:active {
            color: deepskyblue;
        }
        .validation-error, .validation-success {
            margin: auto;
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
        }
        .validation-error {
            color: red;
        }
        .validation-success {
            color: lime;
        }
    </style>
</head>
<body>
    <?php if (session()->get('success')): ?>
        <div class="validation-success">
            <?= session()->get('success') ?>
        </div>
    <?php endif; ?>
    <?php if (isset($validation)): ?>
        <div class="validation-error">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>
    <div id="login-div">
        <form action="/" method="post">
            <?= csrf_field() ?>
            <div id="login-div-inner">
                <h1>Log-In Form</h1>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
    <div id="register-link-div">
        <a href="/register"><h2>Register Here</h2></a>
    </div>
</body>
</html>
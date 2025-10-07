<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
        .alert {
            padding: 1rem;
            margin: 1rem auto;
            width: 30%;
            border-radius: 20px;
            text-align: center;
            font-family: "Trebuchet MS";
            font-weight: bold;
        }
        .alert-success {
            background-color: rgba(0, 255, 0, 0.2);
            color: lime;
            border: 2px solid lime;
        }
        .alert-error {
            background-color: rgba(255, 0, 0, 0.2);
            color: #ff6b6b;
            border: 2px solid #ff6b6b;
        }
        #register-div {
            width: 30%;
            margin: auto;
            padding: 2.5rem;
            margin-top: 10vh;
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
        #register-div h1, #register-div label {
            color: white;
            text-align: center;
        }
        #register-div input, #register-div button {
            padding: 1rem;
            border: none;
            border-radius: 100px;
            font-weight: bold;
        }
        #register-div h1, #register-div label, #register-div input {
            font-family: "Trebuchet MS";
        }
        #register-div button {
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            position: relative;
        }
        #register-div button:hover {
            background-color: cyan;
            transform: scale(0.925, 0.925);
        }
        #register-div button:active {
            color: white;
            background-color: crimson;
        }
        #register-div-inner {
            gap: 20px;
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }
        #login-link-div {
            width: 12.5%;
            margin: auto;
            padding: 1rem;
            margin-top: 5vh;
            margin-bottom: 10vh;
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
        #login-link-div a {
            color: white;
            font-family: "Trebuchet MS";
            text-decoration: none;
            transition: color 0.3s ease;
        }
        #login-link-div a:hover {
            color: cyan;
        }
        #login-link-div a:active {
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
    <div id="register-div">
        <form action="/register" method="post" id="registerForm">
            <?= csrf_field() ?>
            <div id="register-div-inner">
                <h1>Register Account</h1>
                <input type="text" name="first_name" placeholder="First Name" value="<?= set_value('first_name') ?>" required>
                <input type="text" name="middle_name" placeholder="Middle Name" value="<?= set_value('middle_name') ?>" required>
                <input type="text" name="last_name" placeholder="Last Name" value="<?= set_value('last_name') ?>" required>
                <input type="text" name="username" placeholder="Username" value="<?= set_value('username') ?>" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" required>
                <input type="tel" name="contact_number" placeholder="Contact Number" value="<?= set_value('contact_number') ?>" required>
                <label for="birthday">Birthday:</label>
                <input type="date" name="birthday" value="<?= set_value('birthday') ?>" required>
                <button type="submit">SUBMIT</button>
            </div>
        </form>
    </div>
    <div id="login-link-div">
        <a href="/"><h2>Login Here</h2></a>
    </div>
</body>
</html>
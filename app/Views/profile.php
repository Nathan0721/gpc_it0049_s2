<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
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
        #profile-div {
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
        #profile-div h1, #profile-div label, #profile-div p {
            color: white;
            text-align: center;
        }
        #profile-div input, #profile-div button {
            padding: 1rem;
            border: none;
            border-radius: 100px;
            font-weight: bold;
        }
        #profile-div h1, #profile-div label, #profile-div input, #profile-div p {
            font-family: "Trebuchet MS";
        }
        #profile-div button {
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }
        #profile-div button:hover {
            background-color: cyan;
            transform: scale(0.925, 0.925);
        }
        #profile-div button:active {
            color: white;
            background-color: crimson;
        }
        #profile-div-inner {
            gap: 20px;
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }
        #logout-link-div{
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
        #logout-link-div a {
            color: white;
            font-family: "Trebuchet MS";
            text-decoration: none;
            transition: color 0.3s ease;
        }
        #logout-link-div a:hover {
            color: cyan;
        }
        #logout-link-div a:active {
            color: deepskyblue;
        }
        .user-info {
            width: 100%;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            margin-bottom: 1rem;
        }
        .user-info p {
            margin: 0.5rem 0;
            font-size: 0.95rem;
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
    <div id="profile-div">
        <form action="/profile" method="post">
            <?= csrf_field() ?>
            <div id="profile-div-inner">
                <h1>User Information</h1>
                <div class="user-info">
                    <p><strong>Name:</strong> <?= esc(session()->get('first_name')) ?> <?= esc(session()->get('middle_name')) ?> <?= esc(session()->get('last_name')) ?></p>
                    <p><strong>Username:</strong> <?= esc(session()->get('username')) ?></p>
                    <p><strong>Email:</strong> <?= esc(session()->get('email')) ?></p>
                    <p><strong>Contact:</strong> <?= esc(session()->get('contact_number')) ?></p>
                    <p><strong>Birthday:</strong> <?= esc(session()->get('birthday')) ?></p>
                </div>
                <h1>Reset Password</h1>
                <input type="password" name="current_password" placeholder="Enter Current Password" required>
                <input type="password" name="new_password" placeholder="Enter New Password" required>
                <input type="password" name="confirm_new_password" placeholder="Re-Enter New Password" required>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
    <div id="logout-link-div">
        <a href="/logout"><h2>Logout Here</h2></a>
    </div>
</body>
</html>
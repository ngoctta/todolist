<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <section class="wrapper">
        <div class="login">
            <form class="form-login" method="post" action="index.php?controller=user&action=login">
                <div class="login-item">
                    <label for="username">Username</label>
                    <input type="text"
                           name="username"
                           class="form-control"
                           id="username"
                           placeholder="Enter user name"
                           required>
                </div>
                <div class="login-item">
                    <label for="password">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           id="password"
                           placeholder="Enter password"
                           required>
                </div>
                <button type="submit">Sent</button>
            </form>
        </div>
    </section>
</body>
</html>
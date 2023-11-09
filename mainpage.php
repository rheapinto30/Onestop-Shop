<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One-Stop Shop</title>
    <link rel="stylesheet" href="signin.css" />
</head>

<body bgcolor="#e0ecff">

    <form action="sample.php" class="sign-in-form" method="post">
        <h1 class="title">Are you a...</h1>
        <div class="submit">
            <i class="fas fa-user"></i>
            <input type="submit" class="btn" value="Customer" id="Customer" name="Customer" />
        </div>
    </form>
    <form action="dashboard.php" class="sign-in-form" method="post">
        <div class="submit">
            <i class="fas fa-lock"></i>
            <input type="submit" class="btn" value="Seller" id="Seller" name="Seller" />
        </div>
    </form>
</body>

</html>
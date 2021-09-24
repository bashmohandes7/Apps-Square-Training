<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body>
    <form action="store" method="post">
        <input type="text" name="name" placeholder="Enter your Name"> <br /><br />
        <input type="email" name="email" placeholder="Enter your Email"> <br /><br />
        <input type="password" name="password" placeholder="Enter your Password"> <br />
        <input type="submit" value="Add">
    </form>
</body>

</html>
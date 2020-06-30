<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bon Voyage</title>
    <link rel="stylesheet" href="style.css">
    <button id ="bb" type="button" onclick="location.href='註冊.html'">註冊</button>
    <header id="header"><h1>Bon Voyage</h1></header>
</head>
<body>
    <nav class="box">
        <form action="enter_check.php" method="post" >
            <input type="text" name ="account" placeholder="帳號">
            <input type="text" name ="password" placeholder="密碼">
            <input type="submit" name="submit" value="登入">
        </form>
    </nav>
    <?php
        /*include("連線.php");
        $link = mysqli_connect( $dbServer , $dbUser , $dbPass);
        mysqli_query($link , "SET NAMES 'UTF8'");
        mysqli_select_db($link,$dbName) or die("fail");
        
        $acc=$_POST['account'];
        $pass=$_POST['password'];
        $sql="SELECT 帳號,密碼 from 帳號";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result))
        {
            if($acc==$row[0] && $pass==$row[1])
            {

            }
        }*/
        
    ?>
</body>
</html>
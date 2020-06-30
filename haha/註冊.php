<?php
    error_reporting(E_ALL ^ E_NOTICE);
    header("Content-Type: text/html; charset=utf8");
    include("連線.php");
    $link = mysqli_connect( $dbServer , $dbUser , $dbPass);
    mysqli_query($link , "SET NAMES 'UTF8'");
    mysqli_select_db($link,$dbName) or die("fail");

    $sql="SELECT 會員ID from 帳號";
    $result=mysqli_query($conn,$sql);
    $i=0;$ID=0;
    while($row=mysqli_fetch_array($result))
    {
        if(empty($row))
        {
            $ID=1;
        }
        else
        {
            if($ID<=$row[0])
            {
                $ID=$row[0];
                $ID++;
            }
        }
    }
    $account = $_POST['acco'];
    $password = $_POST['pass'];
    if($account != null && $password != null)
    {
        $sql_acc = "INSERT INTO 帳號(會員ID,帳號,密碼)
        VALUE ( '$ID','$account','$password')";
        $retval_acc = mysqli_query( $link, $sql_acc );
        if(! $retval_acc )
        {
        die('註冊失敗: ' . mysqli_error($link));
        }
        echo "註冊成功";
        echo "
        <script>
        setTimeout(function(){window.location.href='登入.html';},1000);
        </script>
        ";//使用js 1秒後跳轉到登入頁面重試;
    }
    mysqli_close($link);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章列表</title>
    <link rel="stylesheet" type="text/css" href="style2.css" />
    <script type="text/javascript">
        function Click(){
            var num = '<?php echo $num ?>';
            setcookie("id","$num",time()+3600);
            document.getElementById("demo").innerHTML=<?php echo $_COOKIE["id"];?>
        }
        </script>
</head>
<body>
    <a class="logo" href="中立.php">
        <img  src="logo1.PNG"></a>
    <div class="top">
        <form action="中立.php" method="post" >
            <input name="sh" type="search" placeholder="Search..."><input type="submit" value="搜尋" style="text-align:right;" onclick="location.href=&quot;中立.php&quot;">
        </form>
        
    </div>
    <div class="top" id="A">
        <ul>
            <li>
                <a href="發文.php" style="margin-left:80%" >發文</a>
            </li>
            <li>
                <a href=" ">個人檔案</a>
            </li>
            <li>
                <a href=" ">收藏</a>
            </li>
            <li>
                <a href=" " >註冊
            </li></a>
        </ul>
    </div>
    <div>
    <?php
        include("連線.php");
        $link = mysqli_connect( $dbServer , $dbUser , $dbPass);
        mysqli_query($link , "SET NAMES 'UTF8'");
        mysqli_select_db($link ,$dbName) or die("fail");
        if(!empty($_POST['sh']))
        {
            $sql="SELECT topic from post where topic like '%".$_POST['sh']."%'";
            $result=mysqli_query($conn,$sql);
            echo '<table width="700" border="0">';
            $i=0;
            while($i<5)
            {
                $col[$i]=mysqli_fetch_array($result);
                if($col[$i]==null)
                break;
                echo "<tr><td><button type='button' onclick='location.href=&quot;&quot;'>".$col[$i][0]."</button></td></tr>";
                $i++;
            }
        }
        mysqli_close($link);
	?>
        <?php
            //header('Content-Type:text/html;charset=utf-8');
            include("連線.php");
            $sql="SELECT ID,topic from post";
            $result=mysqli_query($conn,$sql);
            echo '<p class="sort">
            <input style="margin-left:310px" type="button" name="中立" value="中立" onclick="location.href=&quot;sort.php?id=中立&quot;">
            <input type="button" name="藍" value="藍" onclick="location.href=&quot;sort.php?id=藍&quot;">
            <input type="button" name="綠" value="綠" onclick="location.href=&quot;sort.php?id=綠&quot;"></p></form>';
            if(empty($_POST['sh']))
            {
                echo "<form action ='內文.php' method='post'>";
                echo '<table width="700" border="0">';
                $i=0;
                    $row [$i]=mysqli_fetch_array($result); 
                    $row [$i]=mysqli_fetch_array($result); 
                    $row [$i]=mysqli_fetch_array($result); 
                    $row [$i]=mysqli_fetch_array($result); 
                    $row [$i]=mysqli_fetch_array($result);
                    $row [$i]=mysqli_fetch_array($result); 
                    $row [$i]=mysqli_fetch_array($result); 
                    $row [$i]=mysqli_fetch_array($result); 
                    $row [$i]=mysqli_fetch_array($result); 
                    $row [$i]=mysqli_fetch_array($result);
                    $i=0;
                while($i<5)
                {
                    $row [$i]=mysqli_fetch_array($result);
                    if(empty($row[0]))
                break;
                    $num=$row[$i][0];
                    echo "<tr><td><button type='button' name='$num' onclick='location.href=&quot;內文.php?id=".$num."&quot;'>".$row[$i][1]."</button></td></tr>";
                    echo '<p id="demo"></p>';
                    $i++;
                }
                echo "</table></form>";
            }
        ?>
    </div>
    <div class="footer">
        <ul class="splitter">
          <li>
            <ul >
              <li class="segment-0 selected-0"><a href="中立2.php" >◄</a></li>
              <li class="segment-1"><a href="中立.php">1</a></li>
              <li class="segment-2"><a href="中立2.php">2</a></li>
              <li class="segment-3"><a class="pagenow" href="中立3.php" >3</a></li>
              <li class="segment-3"><a href="中立3.php" >►</a></li>
            </ul>
          </li>
        </ul>
    </div>
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>-->
        <script src="分頁/jquery.quicksand.js"></script>
        <script src="分頁/jquery.easing.1.3.js"></script>
        <script src="分頁/jquery-animate-css-rotate-scale.js"></script>
        <script src="分頁/qstand.js"></script>
        
</body>

</html>
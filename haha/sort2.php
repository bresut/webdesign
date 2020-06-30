<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章列表</title>
    <style type="text/css">
        div{
            margin: 0;
            padding:0;
        }
        tr  td>button{
            margin-left:40px;
            height:80px;width: 700px ;
            text-align:left;
            padding-left: 10px;
            background:url('列表背景.png');
        }
        div tr>td>a{
            margin-left:40px;
            height:80px;width: 700px ;
            text-align:left;
            padding-left: 10px;
            background:url('列表背景.png');
        }
        .logo img{
            left:1000px;
            z-index: 100;
            border:0px;
            padding:0px;
            height:55px;
            margin:0;
        }
        .top{
            float:right;
            left: 0;
            right: 0;
        }
        .top form{
            float:right;
        }
        .top ul{
            background-color: #117e96;
            background: linear-gradient(130deg, white, #0faccf 75%);
            height: 40px;
            min-width: 320px;
            position: absolute;
            top: 60px;
            left: 0;
            right: 0;
            z-index: 0;
        }
        .top ul>li a{
            line-height:35px;
            padding:0px 12px;
            text-align: right;
            border-left: #ccc 1px solid;
            box-sizing: border-box;
        }
        #A ol,ul,li{
            display: inline;
            margin:0;
            padding:0;
        }
        a{
            text-decoration:none;
            cursor:pointer;
        }
        .sort {
            text-align: left;
            margin-left: 40px;
            margin-top: 3%;
        }
        .sort input{
            margin-right: 1%;
        }
        .pagenow {
            background: none;
            background-color: #ccc;
            color: #FFFFFF;
            -webkit-filter: none;
            filter: none;
        }
        .splitter>li>b{float: left;}
        .splitter>li>ul{
        border: solid 1px #ccc;
        padding: 6px;
        margin: 300px ;
        }
        .splitter>li>ul>li{
        padding: 10px;
        }
        .splitter>li>ul>li:hover{
       background: #ccc;
        }
        .splitter>li>ul>li:hover/*[class *='select']*/ a{
        color:#fff;
        }
        .footer{
            position: absolute;
            top: 650px;
            height: 10px;
        }
    </style>
</head>
<body>
    <a class="logo" href="sort.php?id=中立.php">
        <img  src="logo.PNG"></a>
    <div class="top">
        <form action="sort.php" method="post" >
            <input name="sh" type="search" placeholder="Search..."><input type="submit" value="搜尋" style="text-align:right;" onclick="location.href=&quot;sort.php&quot;">
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
    ini_set('display_errors','off'); 
    header('Content-Type:text/html;charset=utf-8');
            include("連線.php");
            $sort=$_GET['id'];
            $sql="SELECT * from post where tag='$sort'";
            $result=mysqli_query($conn,$sql);
            echo '<form action="中立.php" method="get"><p class="sort">
            <input type="button" name="中立" value="中立" onclick="location.href=&quot;sort.php?id=中立&quot;">
            <input type="button" name="藍" value="藍" onclick="location.href=&quot;sort.php?id=藍&quot;">
            <input type="button" name="綠" value="綠" onclick="location.href=&quot;sort.php?id=綠&quot;"></p></form>';
            {
                echo "<form action ='內文.php' method='get'>";
                echo '<table width="700" border="0">';
                if(!$result)
                {
                    echo ("Error: ".mysqli_error($conn));
                    exit();
                }
                $i=0;
                while($i<5)
                {
                    $row [$i]=mysqli_fetch_array($result);      
                    $row [$i]=mysqli_fetch_array($result);      
                    $row [$i]=mysqli_fetch_array($result);      
                    $row [$i]=mysqli_fetch_array($result);      
                    $row [$i]=mysqli_fetch_array($result);      
                    $row [$i]=mysqli_fetch_array($result);                                                                        // ".$num."
                    if($row[$i]==null)
                    break;
                    $num=$row[$i][0];
                    echo "<tr><td><button type='button' name='$num' onclick='location.href=&quot;內文.php?id=".$num."&quot;'>".$row[$i][2]."</button></td></tr>";
                    echo '<p id="demo"></p>';
                    $i++;
                }
                echo "</table></form>";
            }
                
                
    

    echo '<div class="footer">
        <ul class="splitter">
          <li>
            <ul >
              <li class="segment-0 selected-0"><a href="中立.php" >◄</a></li>
              <li class="segment-1"><a class="pagenow" href="中立.php">1</a></li>
              <li class="segment-2"><a href="中立2.php">2</a></li>
              <li class="segment-3"><a href="中立3.php" >3</a></li>
              <li class="segment-3"><a href="中立3.php" >►</a></li>
            </ul>
          </li>
        </ul>
    </div>'
    ?></div>
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>-->
        <script src="分頁/jquery.quicksand.js"></script>
        <script src="分頁/jquery.easing.1.3.js"></script>
        <script src="分頁/jquery-animate-css-rotate-scale.js"></script>
        <script src="分頁/qstand.js"></script>
        
</body>

</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>文章列表</title>
    <style type="text/css">
    body {
        background-image: url(https://prd-image-masters.caravan-stories.com.tw/c/u=0,a=0,r=auto,w=1500,sig=1.aEsS5rguGY7FUqWzwVeemEdv0RxdNBx74LLOzaCX_gY=/caravan-stories/masters/production-tw/attachments/87a2210ff7de1e950b27d3154eafc561.png);
    
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
}
        div{
            margin: 0;
            padding:0;
            border-color::#aaaaee;
            border-width:3px;
        }
        div tr>td>input{
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
        .top ul{
            background-color: #117e96;
            background: linear-gradient(130deg, black,white 75%);
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
            border-style: solid;
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
        #BH-pagebtn {
            text-align: center;
            padding: 10px 0;
            overflow: hidden;
        }
        .BH-pagebtnA {
            margin: 0 100px;
            text-align: center;
        }
        #BH-pagebtn .prev {
            float: left;
        }
        #BH-pagebtn .next {
            float: right;
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
        h1{
            position : relative;
            top :15%;
            text-align: center;
        }
        #nav{
        width: 50%;
        height: 100px;
        line-height: 1.5em;
        padding: 20px;
        margin-left:25%;
        margin-top:5%;
        background-color: #E8FFE8;
        border-radius: 24px;
        }
        h3{
            top : 100%;
            padding-left:100px;
        }
        #section{
        width: 50%;
        height: 500px;
        line-height: 1.5em;
        padding: 20px;
        margin-left:25%;
        margin-top:10px;
        background-color: #FFFF;
        border-radius: 24px;
        }
    </style>
</head>
<body>
    <a class="logo" href="sort.php">
        <img  src="logo1.PNG"></a>
    <div class="top" id="A">
            <input type="search"> <input type="button" value="搜尋"style="text-align:right;">
    </div>
    <div class="top" id="A">
        <ul>
            <li>
                <a href=" "style="margin-left:84%" >個人檔案</a>
            </li>
            <li>
                <a href=" ">收藏</a>
            </li>
            <li>
                <a href=" " >註冊
                </li></a>
        </ul>
    </div>
    <div  class="title">
        <?php
            ini_set("display_errors" , "on") ;
            include("連線.php");

            $link = mysqli_connect( $dbServer , $dbUser , $dbPass);
            mysqli_query($link , "SET NAMES 'UTF8'");
            mysqli_select_db($link ,$dbName) or die("fail");

            $id=$_GET['id'];
            echo '<table width="700" border="0">';

            $sql="SELECT ID,topic,content from post where ID=$id";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result))
            {
                if($row[0]>=0)
                {
                    echo "<div id='nav'><h1>".$row[1]."</h1></div>";
                    echo "<h3 id='section'>".$row[2]."</h3>";
                }
            }
            echo "</table>";
        ?>
    </div>
</boby>
</html>
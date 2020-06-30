<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>文章列表</title>
    <link rel="stylesheet" type="text/css" href="style2.css" />
    <a class="logo" href="中立.php">
        <img  src="logo1.PNG"></a>
    <div class="top" id="A">
        <ul>
            <li>
                <a href=" "style="margin-left:81%" >個人檔案</a>
            </li>
            <li>
                <a href=" ">收藏</a>
            </li>
            <li>
                <a href=" " >註冊</a>
                </li>
            <li>
                <a href=" 登入.html" >登出</a>
                </li></a>
        </ul>
    </div>
	
	
</head>
<body>
    <form action="發文.php" method="post" style="font-size:10px; margin-left: 40px;margin-top: 10%;">
		
		<select name="tag" style="font-size:16px; height:30px;">
			<option value="" disabled selected hidden>請選擇分類</option>
			<option value="中立">中立</option>
			<option value="藍">藍</option>
			<option value="綠">綠</option>
		</select>
		<p>
		<input type="text" name="topic" placeholder="請輸入文章標題" style="font-size:18px; width:800px;height:30px;" /><br>
		</P>
		
		<p>
		<textarea name="content" placeholder="請輸入內文" style="font-size:18px; width:800px; height:600px; " ></textarea>
		</p>
		
		<p>
		<input type="submit" value="發表文章"onclick="location.href=&quot;文章列表.php&quot;">
		</p>
	</form>
    <?php
    ini_set('display_errors','off'); 
        include("連線.php");

        $link = mysqli_connect( $dbServer , $dbUser , $dbPass);
        mysqli_query($link , "SET NAMES 'UTF8'");
        mysqli_select_db($link ,$dbName) or die("fail");

        $sql="SELECT ID from post";
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
        $tag_n=$_POST['tag'];
        $topic_n=$_POST['topic'];
        $content_w=$_POST['content'];
        if($tag_n != NULL&& $topic_n !=NULL && $content_w != NULL)
        {
            $sql_tag = "INSERT INTO post 
            (ID,tag,topic,content) 
            VALUES ('$ID','$tag_n','$topic_n','$content_w')";
            

            mysqli_select_db( $link, 'post' );
            $retval_tag = mysqli_query( $link, $sql_tag );
            if(! $retval_tag )
            {
            die('無法發表文章: ' . mysqli_error($link));
            }
            echo "發文成功"/*.$tag_n*/;
        }
        mysqli_close($link);
	?>
</body>
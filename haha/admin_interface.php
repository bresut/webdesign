<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
    <title>admin</title>
</head>
<body>
    <p>“ADD” 為避免系統出錯，如要新增請將要新增內容的資訊全部填滿！否則會無法新增</p>
    <form action='admin_interface.php' method='post'>
        <p>新增道具</p>
        <input type='text' name='item' placeholder='道具名稱' >
        <input type='text' name='memory' placeholder='記憶片段內容'>
        <input type='text' name='attractionitem' placeholder='景點名稱'>
        <p>新增縣市</p>
        <input type='text' name='Position' placeholder='方位'>
        <input type='text' name='District' placeholder='縣市'>
        <p>新增景點</p>
        <input type='text' name='Postal' placeholder='郵遞區號'>
        <input type='text' name='Attraction' placeholder='景點'>
        <input type='text' name='Description' placeholder='景點描述'>
        <input type='text' name='Address' placeholder='地址'>
        <p>新增地區</p>
        <input type='text' name='District_attraction' placeholder='縣市'>
        <input type='text' name='Town' placeholder='地區'>
        <input type='text' name='Postal_attraction' placeholder='郵遞區號'>
        <input type='submit' value='enter'>
        <p>新增謎題</p>
        <input type='text' name='Attraction_Puzzle' placeholder='景點'>
        <input type='text' name='Question' placeholder='謎題'>
        <input type='text' name='Option_1' placeholder='選項一'>
        <input type='text' name='Option_2' placeholder='選項二'>
        <input type='text' name='Option_3' placeholder='選項三'>
        <input type='text' name='Answer' placeholder='正解（請輸入1,2,3)'>


    </form> 
    
<?php 
        $server = "database-1.c2ccpjw7s7h5.us-east-1.rds.amazonaws.com";         # MySQL/MariaDB 伺服器
        $dbuser = "admin";       # 使用者帳號
        $dbpassword = "whysoserious"; # 使用者密碼
        $dbname = "test";    # 資料庫名稱
        header("Content-Type:text/html; charset=utf-8");

    
        $link = mysqli_connect( $server , $dbuser , $dbpassword);
        mysqli_query($link , "SET NAMES 'UTF8'");
        mysqli_select_db($link ,$dbname) or die("fail");

        $item_name=$_POST['item'];
        $Memory=$_POST['memory'];
        $Attraction_item=$_POST['attractionitem'];
        $Position=$_POST['Position'];
        $District=$_POST['District'];
        $Postal=$_POST['Postal'];
        $Attraction=$_POST['Attraction'];
        $Description=$_POST['Description'];
        $Address=$_POST['Address'];
        $District_attraction=$_POST['District_attraction'];
        $Town=$_POST['Town'];
        $Postal_attraction=$_POST['Postal_attraction'];



        if($item_name!=NULL&&$Memory!=NULL&&$Attraction_item!=NULL)//新增道具
        {
            $sql_item = "INSERT INTO Item 
            (Item_name,Memory,Attraction) 
            VALUES ('$item_name','$Memory','$Attraction_item')";

            mysqli_select_db( $link, 'Item' );
            $retval_item = mysqli_query( $link, $sql_item );
            if(! $retval_item )
            {
            die('無法新增道具: ' . mysqli_error($link));
            }
            echo "道具新增成功 新增道具".$item_name;
        }

        if($Position!=NULL&&$District!=NULL)//新增縣市
        {
            $sql_District = "INSERT INTO Administration 
            (Position,District) 
            VALUES ('$Position','$District')";

            mysqli_select_db( $link, 'Administration' );
            $retval_Administration = mysqli_query( $link, $sql_District );
            if(! $retval_Administration )
            {
            die('無法新增縣市: ' . mysqli_error($link));
            }
            echo "縣市新增成功 新增縣市".$District ;
        }


        if($Postal!=NULL&&$Attraction!=NULL&&$Description!=NULL&&$Address!=NULL)//新增景點
        {
            $sql_Sightseeing = "INSERT INTO Sightseeing
            (Postal,Attraction,Description,Address) 
            VALUES ('$Postal','$Attraction','$Description','$Address')";

            mysqli_select_db( $link, 'Sightseeing' );
            $retval_Sightseeing = mysqli_query( $link, $sql_Sightseeing );
            if(! $retval_Sightseeing )
            {
            die('無法新增景點: ' . mysqli_error($link));
            }
            echo "景點新增成功 新增景點".$Attraction;
        }


        if($Town!=NULL&&$Postal_attraction!=NULL&&$District_attraction!=NULL)//新增地區
        {
            $sql_Township = "INSERT INTO Township 
            (District,Town,Postal) 
            VALUES ('$District_attraction','$Town','$Postal_attraction')";

            mysqli_select_db( $link, 'Township' );
            $retval_Township = mysqli_query( $link, $sql_Township );
            if(! $retval_Township )
            {
            die('無法新增地區: ' . mysqli_error($link));
            }
            echo "地區新增成功 新增地區".$Town;
        }






        mysqli_close($link);
    ?>
</body>
</html>
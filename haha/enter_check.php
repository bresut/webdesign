<?php
header("Content-Type: text/html; charset=utf8");
if(!isset($_POST["submit"])){
exit("錯誤執行");
}//檢測是否有submit操作 
include('連線.php');//連結資料庫
$account = $_POST['account'];//post獲得使用者名稱錶單值
$password = $_POST['password'];//post獲得使用者密碼單值
if ($account && $password){//如果使用者名稱和密碼都不為空
$sql = "Select * from 帳號 where 帳號 = '$account' and 密碼='$password'";//檢測資料庫是否有對應的username和password的sql
$result=mysqli_query($conn,$sql);//執行sql
$row=mysqli_fetch_array($result);//返回一個數值
if(!empty($row)){//0 false 1 true
header("refresh:0;url=sort.php");//如果成功跳轉至welcome.html頁面
exit;
}else{
echo "使用者名稱或密碼錯誤";
echo "
<script>
setTimeout(function(){window.location.href='登入.html';},1000);
</script>
";//如果錯誤使用js 1秒後跳轉到登入頁面重試;
}
}else{//如果使用者名稱或密碼有空
echo "表單填寫不完整";
echo "
<script>
setTimeout(function(){window.location.href='登入.html';},1000);
</script>";
//如果錯誤使用js 1秒後跳轉到登入頁面重試;
}
mysqli_close($link);//關閉資料庫
?>
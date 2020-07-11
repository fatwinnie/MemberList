<?php
$host='localhost:8889';
$usr='root';
$password='root';
$dbname='test0706';      
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> 修改user資料 </title>
</head>
<body>
    <?php
        
        if(!empty($_GET['id'])){
            //連線 mysql資料庫
            $connect= mysqli_connect($host,$usr,$password,$dbname) or die('Error with MYSQL connection');
            if(!$connect){
                  die('Could not connect:'.mysqli_error());}

            //查詢id
            $id = intval($_GET['id']); 
            $result = mysqli_query($connect,"SELECT * FROM member WHERE memID=$id");
            if(mysqli_error($connect)){
                die('can not connect db');
            }
            //獲取結果陣列
            $result_arr = mysqli_fetch_assoc($result);} 
            else{
                die('id not define');
            }        
    ?>

    <form action="edituser_server.php" method="post">    
        <label>userID:</label> <input type="text" name="id" value= "<?php echo $result_arr['memID'] ?>">
        <label>Email:</label> <input type="text" name="email" value="<?php echo $result_arr['memEmail'] ?>">
        <label>Name:</label> <input type="text" name="name" value="<?php echo $result_arr['memName'] ?>">
        <input type="submit" value="提交修改">     
    </form>

</body>
</html>
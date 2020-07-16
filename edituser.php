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
            <table>
            <tr>
                
                <td><input type="hidden"  name="id" value="<?php echo $result_arr['memID']?>" > </br> </td>
            </tr>    
            <tr>
                <td> <p>Email:</p> </td>
                <td><input type="text" name="email" value="<?php echo $result_arr['memEmail']?>" > </br> </td>
            </tr>
            <tr>
                <td> <p>Name:</p> </td>
                <td> <input type="text" name="name" value="<?php echo $result_arr['memName']?>" ></br> </td>
            </tr>      
            <tr>
                <td> <p>Passowrd:</p> </td>
                <td> <input type="password" name="psd" value="<?php echo $result_arr['psd']?>"></br> </td>
            </tr>
            <tr>
                <td> <p>Retype Password: </p> </td>
                <td> <input type="password" name="repsd" value="<?php echo $result_arr['REpsd']?>"></br> </td>
            </tr>
             <!--<input type="submit" value="提交"> -->
            <tr>
                <td><input type="submit" name="button" id="button" value="提交修改" /></td>
                <td><button type="button" class="btn btn-primary btn-sm" onclick="location.href='memList.php'">取消返回</button></td>
            </tr>
            </table>
                 
        </form>

</body>
</html>
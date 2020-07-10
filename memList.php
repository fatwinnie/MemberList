<!DOCTYPE html>
<html>
<head>
<title>member List</title>
</head>
<body>
<a href="adduser.html">新增Member</a>
<table>
    <tr>
    <th>ID</th>
    <th>Email</th>
    <th>Name</th>
    <th>Edit/Delete</th>
    </tr>

<?php

$host='localhost:8889';
$usr='root';
$password='root';
$dbname='test0706';
//連結資料庫
$connect= mysqli_connect($host,$usr,$password,$dbname) or die('Error with MYSQL connection');
if(!$connect){
    die('Could not connect:'.mysqli_error());
}

//查詢資料表中的所有資料,並按照id降序排列
$result = mysqli_query($connect,"SELECT*FROM member ORDER BY memID ASC");
$row_count = mysqli_num_rows($result); 
//echo $row_count; //獲取資料表的資料條數

for($i=0;$i<$row_count;$i++){
    $result_arr = mysqli_fetch_assoc($result);
    $id = $result_arr['memID'];
    $email = $result_arr['memEmail'];
    $name = $result_arr['memName'];
    //print_r($result_arr);
    echo "<tr>
            <td>$id</td>
            <td>$email</td>
            <td>$name</td>
            <td><a href='edituser.php?id=$id'>修改</a> <a href='deleteuser.php?id=$id'>刪除</a></td>
        </tr>";
}
/*
$sql = "SELECT * FROM member ";
$result = mysqli_query($connect,$sql);

while($row=mysqli_fetch_assoc($result)){
    echo "$row[1]email:$row[2]";
}
*/

mysqli_close($connect);


?>

</table>
</body>
</html>
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
$sql = "SELECT * FROM member ";
$result = mysqli_query($connect,$sql);

while($row=mysqli_fetch_assoc($result)){
    echo "$row[0]-email:$row[1]";
}

mysqli_close($connect);


?>

</table>
</body>
</html>
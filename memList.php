<!DOCTYPE html>
<html>
<head>
<title>member List</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>


<!--<a href="adduser.html">新增Member</a>-->

<table class="table table-hover">
<thead>
      <tr>
        <th><input type='checkbox' name='allitem[]'> 全選</th>
        <th>ID</th>
        <th>Email</th>
        <th>Name</th>
        <th>Edit/Delete</th>
      </tr>
</thead>


    

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
            <td><input type='checkbox' name='item[]'></td>
            <td>$id</td>
            <td>$email</td>
            <td>$name</td>
            <td> <input type='button' onclick='javascript:location.href= `edituser.php?id=${id}`' value='修改'>
                 <input type='button' onclick='deleteRecord($id)' value='刪除'></td>
                 

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

<div calss="add-Btn">
    <button type="button" class="btn btn-primary btn-sm" onclick="location.href='adduser.html'">新增Member</button>
</div>
</body>
<script language="javascript">
function deleteRecord(id)
{
if(confirm("確實要刪除嗎?")) {
    location.href=`deleteuser.php?id=${id}`
alert("已經刪除！");
}else
alert("已經取消了刪除操作");
}
</script>
</html>
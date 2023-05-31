<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 
</head>
   <style>
        body{
            background-color:whitesmoke;
            font-family: 'tajawal', sans-serif;  
        }
        #mother{
            width: 100%;
            font-size: 20px;
        }
        main{
            float: left; 
            border: 1px solid gray;
            padding: 5px;
        }
        input{
            padding: 4px;
            border: 2px solid black;
            text-align: center;
            font-size: 17px;
            font-family: 'Tajawal', sans-serif;  
        }
        aside{
            text-align: center;
            width: 300px;
            float: right;
            border: 1px solid black;
            padding: 10px;
            font-size: 20px;
            background-color: silver;
            color: white;
        }
        #tbl{
            width: 890px;
            font-size: 20px;
            text-align: center;
        }
        #tbl:hover{
            background-color:white;
        }
        
        #tbl th{
            background-color: silver;
            color: black;
            font-size: 20px;
            padding: 10px;

        }
        aside button{
            width: 190px;
            padding: 8px;
            margin-top: 7px;
            font-family: 'Tajawal', sans-serif;  
            font-size: 17px;
            font-weight: bold;
        }
    </style>
<body dir="rtl">
    <?php 
    $host='localhost';
    $user='root';
    $pass='';
    $db='student1';
    $con= mysqli_connect($host,$user,$pass,$db);
    $res= mysqli_query($con,"select * from student");
    #var
    $id='';
    $name='';
    $address='address';
    if(isset($_POST['id'])){
        $id= $_POST['id'];
    }
    if(isset($_POST['name'])){
        $name= $_POST['name'];
    }
    if(isset($_POST['address'])){
        $address = $_POST['address'];
    }
    $sqls='';
    if(isset($_POST['add'])){
        $sqls = "insert into student value($id,'$name','$address')";
        mysqli_query($con,$sqls);
        header("location: home.php");
    }
    if(isset($_POST['del'])){
        $sqls= "delete from student where name='$name'";
        mysqli_query($con,$sqls);
        header("location: home.php");
    }
    ?>
    <div id="mother">
<form action="" method="post">
<aside>
<div id="div">
<img src="logo.png" alt="logo" width="140px">
<h3>لوحة المدير</h3>
<label> رقم الطالب : </label>
<input type="text" name="id" id="id"><br>
<label>إسم الطالب</label>
<input type="text" name="name" id="id"><br>
<label>عنوان الطالب</label>
<input type="text" name="address" id="address"><br>
<button name="add">إضافة طالب</button>
<button name="del">حذف الطالب</button>
</div>
</aside>

<main>
<table id='tbl'>
<tr>
    <th>الرقم التسلسلي</th>
    <th>اسم الطالب</th>
    <th>عنوان الطالب</th>
</tr>
<?php
while($row = mysqli_fetch_array($res)){
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['address']."</td>";
    echo "</tr>";

}
?>


</table>
</main>
</form>
    </div>
</body>
</html>
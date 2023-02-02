<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class = "container">
    <div class="h4 text-center alert alert-dark" role="alert">แสดงข้อมูลลูกค้า</div>
    <form action="sr.php" class="from-group my-3" method = "POST">
        <div class="row">
            <div class="col-6">
                <input type="text" placeholder="กรอกรหัสหรือชื่อที่ต้องการค้นหา" class="form-control" name="sr" required>

            </div>
          <div class="col-6">
            <input type="submit" value="ค้นหารหัสลูกค้า" class="btn btn-info" >

          </div>

        </div>
<table class="table">
  <thead class="thead-dark">
        <tr> 
            <th>เลขที่</th>
            <th>ชื่อ</th>
            <th>ที่อยู่</th>
            <th>เบอร์โทร</th>
            <th>วงเงินสินเชื่อ</th>
            <th>ยอดสินเชื่อ</th>
            <th>ลบไม่ได้ช่วยให้ลืม</th>
            
        </tr>
</thead>
<?php
$sql = " SELECT * FROM customer";
$result = mysqli_query ($Conn,$sql);
while ($row= mysqli_fetch_array($result)){
?>
        <tr> 
            <td><?=$row["cno"]?></td>
            <td><?=$row["cname"]?></td>
            <td><?=$row["caddress"]?></td>
            <td><?=$row["ctelno"]?></td>
            <td><?=$row["credit_lim"]?></td>
            <td><?=$row["curr_bal"]?></td>
            <td><a href="delete.php?cno=<?=$row["cno"]?>" class="btn btn-danger" onclick="del(this.href);return false;">ลบไม่ได้ช่วยให้ลืม</a></td>
        </tr>
        <?php
}

mysqli_close($Conn);
?>
    </table>
</body>
</div>
</html>
<script> language = "JavaScript"
function del (mypage){
    var agree = confirm("ต้องการที่จะลืมเค้าแล้วใช่หรือไหม");
    if (agree){
        wimdow.location=mypage;
    }
}
</script>

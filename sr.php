<?php
include'connect.php';
$sr = $_POST["sr"];

$sql = "SELECT * FROM customer WHERE cno ='$sr' OR cname ='$sr' ORDER BY cno ASC "; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
$result = mysqli_query($Conn, $sql); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql

$count = mysqli_num_rows($result); //เก็บผลที่ได้จากคำสั่ง $result เก็บไว้ในตัวแปร $count
$order = 1; //ให้เริ่มนับแถวจากเลข 1
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <title>รายชื่อพนักงานทั้งหมด</title>
</head>

<body>
<div class = "container">
    <div class="h4 text-center alert alert-dark" role="alert">ผลการค้นหาข้อมูลลูกค้า</div>
    <form action="sr.php" class="from-group my-3" method = "POST">
        <div class="row">
            <div class="col-6">
                <input type="text" placeholder="กรอกรหัสลูกค้าที่ต้องการค้นหา" class="form-control" name="emp_data " required>

            </div>
          <div class="col-6">
            <input type="submit" value="ค้นหารหัสลูกค้า" class="btn btn-info" >

          </div>

        </div>

    </form>
    <?php if ($count > 0) { ?>
      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
          <th>ลำดับ</th>
          <th>เลขที่</th>
            <th>ชื่อ</th>
            <th>ที่อยู่</th>
            <th>เบอร์โทร</th>
            <th>วงเงินสินเชื่อ</th>
            <th>ยอดสินเชื่อ</th>
            <th>ลบไม่ได้ช่วยให้ลืม</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?php echo $order++; ?></td>
              <td><?php echo $row["cno"]; ?></td>
              <td><?php echo $row["cname"]; ?></td>
              <td><?php echo $row["caddress"]; ?></td>
              <td><?php echo $row["ctelno"]; ?></td>
              <td><?php echo $row["credit_lim"]; ?></td>
              <td><?php echo $row["curr_bal"]; ?></td>
         
              <!--แก้ไขข้อมูล-->
             

              <!--ลบข้อมูล-->
              <td><a href="delete.php?cno=<?=$row["cno"]?>" class="btn btn-danger">ลบไม่ได้ช่วยให้ลืม</a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <div class="alert alert-danger">
        <b>ไม่พบข้อมูลพนักงาน!!</b>
      </div>
    <?php } ?>
    <a href="index.php" class="btn btn-success">กลับหน้าแรก</a>

  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>

</html>
<?php
include 'connect.php';
$id=$_GET['cno'];
$sql="DELETE FROM customer WHERE cno='$id' ";
if(mysqli_query($Conn,$sql)){
    echo "<script>alert('ลบข้อมูลเรียบร้อย');</script>";
    echo "<script>window.location='showdata.php';</script>";

}
else {
    echo "Error : " . $sql . "<br>" . mysqli_error($Conn);
    echo "<scriot>alert('ไม่สามารถลบข้อมูลได้');</script>";
}
mysqli_close($Conn);
?>
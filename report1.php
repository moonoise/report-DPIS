<?php include_once 'phpScript/function.php';?>
<!DOCTYPE html>
<html>
<?php include_once 'template/head.php';?>
<body>
<?php include_once 'template/menu.php';?>

<!-- Page Content -->
    <div class="container">
<p>
                          <form action="report1.php?page=report1" method="post" class="select">
                            เลือกประเภทพนักงาน::
                            <select class="per_type" name="per_type">
                              <option value="1">ข้าราชการ</option>
                              <option value="2">ลูกจ้างประจำ</option>
                              <option value="3">พนักงานราชการ</option>
                            </select>
                            ตั้งแต่ :: <input name="dateInput1" type="text" id="dateInput1" />
                            ถึง :: <input name="dateInput2" type="text" id="dateInput2" />

                            ::: <input type="submit" name="submit" value="OK">
                          </form>
                          </p>
                          <div id="myshowErrors"></div>

<?php
//$page = isset($_GET['page']) ? $_GET['page'] : "";

if (!empty($_GET['page'])) {

    $query = report1($_POST['dateInput1'], $_POST['dateInput2']);
    if (empty($query)) {echo "<span>variable is empty</span>";} else {
        $queryResult = report1($query['startDate'], $query['endDate'], $_POST['per_type']);
    }

}
?>

<div class='table-responsive'><table  class='table table-hover'>
                              <thead><tr class="info">
                                <td>เลขบัตรประจำตัวประชาชน</td>
                                <td>คำนำหน้า</td>
                                <td>ชื่อ</td>
                                <td>นามสกุล</td>
                                <td>ประเภทการโยกย้าย</td>
                                <td>เลขที่ตำแหน่ง</td>
                                <td>วันที่ดำรงตำแหน่ง</td>
                                <td>วันที่สิ้นสุดดำรงตำแหน่ง</td>
                                <td>กรม</td>
                                <td>สำนัก</td>
                                <td>ต่ำกว่าสำนัก 1 ระดับ</td>
                                <td>ต่ำกว่าสำนัก 2 ระดับ</td>
                                <td>วันที่ออกคำสั่ง</td>
                                <td>วันที่อัพเดทข้อมูล</td>
                              </tr></thead>

</table></div>








    </div>

<?php include_once 'template/footer.php';?>
<?php include_once 'template/js.php';?>
<script src="js/report1.js"></script>




</body>
</html>
<!DOCTYPE html>
<html>
<?php include_once('template/head.php'); ?>
<body>
<?php include_once('template/menu.php'); ?>

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
                          
    
    </div>

<?php include_once('template/footer.php'); ?>
<?php include_once('template/js.php'); ?>
<script src="js/report1.js"></script>

</body>
</html>
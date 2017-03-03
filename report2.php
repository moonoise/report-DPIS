<?php include_once 'phpScript/reportQuery.php';?>
<?php include_once 'phpScript/function.php';?>
<!DOCTYPE html>
<html>
    <?php include_once 'template/head.php';?>
    <body>
        <?php include_once 'template/menu.php';?>
        <!-- Page Content -->
        <div class="container">
            <p>
                <form action="report2.php?page=report" class="select" method="post">
                    เลือกประเภทพนักงาน::
                    <select class="per_type" name="per_type">
                        <option value="1">
                            ข้าราชการ
                        </option>
                        <option value="2">
                            ลูกจ้างประจำ
                        </option>
                        <option value="3">
                            พนักงานราชการ
                        </option>
                    </select>
                    ตั้งแต่ ::
                    <input id="dateInput1" name="dateInput1" type="text"/>
                    ถึง ::
                    <input id="dateInput2" name="dateInput2" type="text"/>
                    :::
                    <input name="submit" type="submit" value="OK">
                    </input>
                </form>
            </p>
            <div id="myshowErrors">
            </div>
<?php

if (!empty($_GET['page'])) {

    $query = dateYear543($_POST['dateInput1'], $_POST['dateInput2']);
    if (empty($query)) {echo "<span>variable is empty</span>";} else {
        $queryResult = report2($query['startDate'], $query['endDate'], $_POST['per_type']);

    }
}
?>
<div class='table-responsive display'><table  class='table table-hover' id="example" >
                              <thead><tr class="info">
                                <td>ชื่อปัจจุบัน</td>
                                <td>นามปัจจุบัน</td>
                                <td>ชื่อเดิม</td>
                                <td>นามสกุลเดิม</td>
                                </tr></thead>
                              <tbody>

<?php
if (!empty($queryResult)) {
    foreach ($queryResult as $row) {
        echo "<tr>";
        echo " <td>" . $row['PER_NAME'] . "</td>";
        echo " <td>" . $row['PER_SURNAME'] . "</td>";
        echo " <td>" . $row['NH_NAME'] . "</td>";
        echo " <td>" . $row['NH_SURNAME'] . "</td>";
        echo "</tr>";
    }
}
?>
</tbody>
</table>
   </div>



        </div>
        <?php include_once 'template/footer.php';?>

        <?php include_once 'template/js.php';?>
        <script src="js/report1.js">
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
    $('#example').DataTable(

    );
} );
        </script>
    </body>
</html>
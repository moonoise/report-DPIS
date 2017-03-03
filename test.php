<?php include_once 'phpScript/reportQuery.php';?>
<?php $result = reportTest($_POST['startdate'],$_POST['enddate'],$_POST['per_type']); 
	  if($result == false) {
	  	echo "error"; 
	  	exit();
	  }
?>
<?php 
//var_dump($result);

echo "<table border='1'>\n";
foreach ($result as $row) {
    echo "<tr>";
        echo " <td>" . $row['PER_CARDNO'] . "</td>";
        echo " <td>" . $row['PN_NAME'] . "</td>";
        echo " <td>" . $row['PER_NAME'] . "</td>";
        echo " <td>" . $row['PER_SURNAME'] . "</td>";
        echo " <td>" . $row['MOV_NAME'] . "</td>";
        echo " <td>" . $row['POH_POS_NO'] . "</td>";
        echo " <td>" . $row['POH_EFFECTIVEDATE'] . "</td>";
        echo " <td>" . $row['POH_ENDDATE'] . "</td>";
        echo " <td>" . $row['ORG_NAME'] . "</td>";
        echo " <td>" . $row['ORG_NAME3'] . "</td>";
        echo " <td>" . $row['POH_UNDER_ORG1'] . "</td>";
        echo " <td>" . $row['POH_UNDER_ORG2'] . "</td>";
        echo " <td>" . $row['POH_DOCNO'] . "</td>";
        echo " <td>" . $row['UPDATE_DATE'] . "</td>";
        echo "</tr>";
   
}
echo "</table>\n";

?>
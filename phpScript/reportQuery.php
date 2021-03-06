<?php
include_once 'connect/connect.inc.php';

function report1($requestStartDate, $requestEndDate, $requestPer_type)
{
    if (empty($requestStartDate) || empty($requestEndDate)) {
        return false;
    } else {
        $per_type = isset($requestPer_type) ? "AND per_personal.per_type = " . $_POST['per_type'] : "";
        $sql      = "SELECT
                          per_personal.per_cardno,
                          per_prename.pn_name,
                          per_personal.per_name,
                          per_personal.per_surname,
                          per_movment.mov_name,
                          per_positionhis.poh_pos_no,
                          per_positionhis.poh_effectivedate,
                          per_positionhis.poh_enddate,
                          per_org.org_name,
                          per_org3.org_name AS org_name3,
                          per_positionhis.poh_under_org1,
                          per_positionhis.poh_under_org2,
                          per_positionhis.poh_docno,
                          per_positionhis.update_date
                      FROM
                          per_personal
                      RIGHT JOIN
                          per_positionhis
                      ON per_personal.per_id = per_positionhis.per_id LEFT JOIN
                          per_movment
                      ON per_movment.mov_code = per_positionhis.mov_code LEFT JOIN
                          per_org
                      ON per_positionhis.org_id_2 = per_org.org_id LEFT JOIN
                          per_org per_org3
                      ON per_positionhis.org_id_3 = per_org3.org_id FULL JOIN
                          per_prename
                      ON per_personal.pn_code = per_prename.pn_code WHERE (
                          per_positionhis.update_date BETWEEN '$requestStartDate' AND '$requestEndDate') " . $per_type . " ORDER BY update_date DESC";
        $stid = oci_parse($GLOBALS['conn'], $sql);
        oci_execute($stid);
        oci_fetch_all($stid, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);

        disconnect($stid);

        return $res;
    }

}

function report2($requestStartDate, $requestEndDate, $requestPer_type)
{
    if (empty($requestStartDate) || empty($requestEndDate)) {
        return false;
    } else {
        $per_type = isset($requestPer_type) ? "AND per_personal.per_type = " . $_POST['per_type'] : "";
        $sql      = "SELECT
                  per_personal.per_name,
                  per_personal.per_surname,
                  per_namehis.nh_name,
                  per_namehis.nh_surname
              FROM
                  per_namehis
                  INNER JOIN per_personal ON per_personal.per_id = per_namehis.per_id
              WHERE per_namehis.UPDATE_DATE BETWEEN '$requestStartDate' AND '$requestEndDate' $per_type ";
        $stid = oci_parse($GLOBALS['conn'], $sql);
        oci_execute($stid);
        oci_fetch_all($stid, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);

        disconnect($stid);

        return $res;
    }
}

function disconnect($stid)
{

    oci_free_statement($stid);
    oci_close($GLOBALS['conn']);
}

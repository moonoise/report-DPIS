<?php
			function dateYear543($dateInput1 , $dateInput2 ){
								$s1= explode('-',$dateInput1);
                                $s2 = explode('-',$_POST['dateInput2']);
                             
                             //$mov_code = "AND (per_positionhis.mov_code = '103')";
                                //echo $_POST['dateInput1'].$_POST['dateInput2'];
                                //echo $s1[2].$s1[1].$s1[0];
                                $startDate = new DateTime(($s1[2]-543)."-".$s1[1]."-".$s1[0]);
                                $endDate = new DateTime(($s2[2]-543)."-".$s2[1]."-".$s2[0]);
                                $startDate = $startDate->format('Y-m-d H:i:s');
                                $endDate = $endDate->format('Y-m-d H:i:s');
                              

                              return ['startDate'=>$startDate,
                              		  'endDate'=>$endDate];
                }

?>
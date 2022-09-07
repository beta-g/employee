<?php
    session_start();
	if(isset($_POST['employee'])){
		$output = array('error'=>false);

		include 'conn.php';
		include 'timezone.php';
        $id=$_SESSION['id'];
        $Df_timeout="";
		$employee = $_POST['employee'];
		$status = $_POST['status'];
        $date_now = date('Y-m-d');
        $sql = "SELECT * FROM attendance WHERE employee_id='$id' and date='$date_now' ORDER BY time_in DESC LIMIT 1";
        $rs = $conn->query($sql);
        if($rs->num_rows > 0){
            $row=$rs->fetch_assoc();
            $df_timeout.=$row['time_out'];            
        }else {
            $df_timeout.="00:00:00";
        }//sahi h

		$sql = "SELECT * FROM employee WHERE employee_id = '$employee'";
		$query = $conn->query($sql);

		if($query->num_rows > 0){
			$row = $query->fetch_assoc();
			$id = $row['id'];

			$date_now = date('Y-m-d');

			if($status == 'in')
            {
				$sql = "SELECT * FROM attendance WHERE employee_id = '$id' AND date = '$date_now' ORDER BY time_out DESC";
				$query = $conn->query($sql);
                $rowA = $query->fetch_assoc();
                $lognow = date('H:i:s');
                echo $lognow." ** in-".$rowA['time_in']." *out- ".$rowA['time_out'];
                if($rowA['time_out']=="00:00:00" ||  ($rowA['time_in'] > $rowA['time_out'] )){
					$output['error'] = true;
					$output['message'] = 'You have timed in for today';
				}
				else{
					//updates
					$sched = $row['schedule_id'];
					$lognow = date('H:i:s');
					$sql = "SELECT * FROM schedules WHERE id = '$sched'";
					$squery = $conn->query($sql);
					$srow = $squery->fetch_assoc();
					$logstatus = ($lognow > $srow['time_in']) ? 0 : 1;
					//
					$sql = "INSERT INTO attendance (employee_id, date, time_in, status,time_out,num_hr) VALUES ('$id', '$date_now', NOW(), '$logstatus','$df_timeout','0')";
					if($conn->query($sql)){
						$output['message'] = 'Time in: '.$row['name'];
					}
					else{
						$output['error'] = true;
						$output['message'] = $conn->error."yah wala to nhi";
					}
                }
			}
			else{
				$sql = "SELECT *, attendance.id AS uid FROM attendance LEFT JOIN employee ON employee.id=attendance.employee_id WHERE attendance.employee_id = '$id' AND date = '$date_now' ORDER BY time_in DESC";
				$query = $conn->query($sql);
                $row = $query->fetch_assoc();
				if($row['time_out']>$row['time_in'] || $query->num_rows == 0){
					$output['error'] = true;
					$output['message'] = 'Cannot Timeout. No time in.';
				}
				else{
						$sql = "UPDATE attendance SET time_out = NOW() WHERE id = '".$row['uid']."'";
						if($conn->query($sql)){
							$output['message'] = 'Time out: '.$row['name'];
							$sql = "SELECT * FROM attendance WHERE id = '".$row['uid']."'";
							$query = $conn->query($sql);
							$urow = $query->fetch_assoc();

							$time_in = $urow['time_in'];
							$time_out = $urow['time_out'];

							
							$time_in = new DateTime($time_in);
							$time_out = new DateTime($time_out);
							$interval = $time_in->diff($time_out);
							$hrs = $interval->format('%h');
							$mins = $interval->format('%i');
							$mins = $mins/60;
							$int = $hrs + $mins;
//							if($int > 4){
//								$int = $int - 1;
//							}

							$sql = "UPDATE attendance SET num_hr = '$int' WHERE id = '".$row['uid']."'";
							$conn->query($sql);
						}
						else{
							$output['error'] = true;
							$output['message'] = $conn->error;
						}
					
					
				}
			}
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Employee ID not found';
		}
		
	}
	echo json_encode($output);
?>
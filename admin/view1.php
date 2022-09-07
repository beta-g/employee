    <?php
   session_start();
if($_SESSION['uname']){
    
        
        require_once('config.php');
	$limit = 6;

	if (isset($_POST['page_no'])) {
	    $page_no = $_POST['page_no'];
	}else{
	    $page_no = 1;
	}

	$offset = ($page_no-1) * $limit;

	$query = "SELECT * FROM employee LIMIT $offset, $limit";

	$result = mysqli_query($conn, $query);

	$output = "";

	if (mysqli_num_rows($result) > 0) {

	$output.="<table class='table table-light table-bordered border-secondary table-responsive w-auto small table-striped'>
		    <thead >
		        <tr>
                      <th>Employee ID</th>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Mobile</th> 
                       <th>Address</th>
                       <th colspan='2'>Action</th>
	               </tr>
		    </thead>
	         <tbody>";
        
        $btn="";
	while ($row = mysqli_fetch_assoc($result)) {
        
        if($row['status']=='Active')
                {
                    $btn="btn-success";
                }
                else
                {
                    $btn="btn-danger";
                }
         $data.='<button class="btn btn-primary '.$btn.'" onclick="AcivateUser('.$row['id'].',\''.str_replace("'", "\\'", $row['status']).'\')" name="activate" >'.$row['status'].'</button>';
        $data1='<button class="btn btn-primary btn-block btn-danger"  onclick="DeleteUser('.$row['id'].')" name="delete" >delete</button>';
        $data2="<td><a id='edit' href='edit.php?id=".$row['id']."' target='_self'><input type='button' class='btn btn-primary btn-block' id='edit' name='edit' value='edit'></a></td>";
        
	$output.="<tr>
	            
                <td>{$row['employee_id']}</td>
	            <td>{$row['name']}</td>
	            <td>{$row['email']}</td>
	            <td>{$row['mobile']}</td>
	            <td>{$row['address']}</td>
                <td>{$data}</td>
                <td>{$data2}</td>
                <td>{$data1}</td>
		 </tr>";
        
        
        $data="";
        $data1="";
        $data2="";
	} 
	$output.="</tbody>
		</table>";

	$sql = "SELECT * FROM employee";

	$records = mysqli_query($conn, $sql);

	$totalRecords = mysqli_num_rows($records);

	$totalPage = ceil($totalRecords/$limit);

	$output.="<ul class='pagination justify-content-center' style='margin:20px 0'>";

	for ($i=1; $i <= $totalPage ; $i++) { 
	   if ($i == $page_no) {
		$active = "active";
	   }else{
		$active = "";
	   }

	    $output.="<li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>";
	}

	$output .= "</ul>";

	echo $output;

	}
    
else
{
    echo " do not ";
}
    }
        ?>
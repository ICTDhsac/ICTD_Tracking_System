<?php
include 'includes/session.php';
if(isset($_POST["Import"])){
		

		echo $filename=$_FILES["file"]["tmp_name"];
		

		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
			while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
			{
				$sql = "SELECT * FROM task WHERE TaskID = '$emapData[0]'";
				$query = $conn->query($sql);

				if($query->num_rows < 1){
					$taskname = str_replace("'", '', $emapData[1]);	 
					$checklistitems = str_replace("'", '', $emapData[15]);
					$description = str_replace("'", '', $emapData[17]);	 
					$createdDate = date('Y-m-d', strtotime($emapData[7]));
					$startDate = date('Y-m-d', strtotime($emapData[8]));	 
					$dueDate = date('Y-m-d', strtotime($emapData[9]));	 		 
					$completedDate = date('Y-m-d', strtotime($emapData[12]));	 		 		 
					if ($emapData[5]=='') {
						if ($emapData[5]=='' && $emapData[5]=='ICTD'){
							$assignedto="Lowella Viray";
						}
						else{
							$assignedto=$emapData[13];	
						}
					} else {	
						$assignedto=$emapData[5];
					}	
						
					//It wiil insert a row to our subject table from our csv file`
					$sql = "INSERT into task (`TaskID`, `TaskName`, `BucketName`, `Progress`,`Priority`, `AssignedTo`, `CreatedBy`, `CreatedDate`, `StartDate`, `DueDate`, `IsRecurring`, `Late`, `CompletedDate`, `CompletedBy`, `CompletedChecklistItems`, `ChecklistItems`, `Labels`, `Description`) values ('$emapData[0]','$taskname','$emapData[2]','$emapData[3]','$emapData[4]','$assignedto','$emapData[6]','$createdDate','$startDate','$dueDate','$emapData[10]','$emapData[11]','$completedDate','$emapData[13]','$emapData[14]','$checklistitems','$emapData[16]','$description')";
					//we are using mysql_query function. it returns a resource on true else False on error
						
					//echo $sql;
					//end(); 
					$result = mysqli_query( $conn, $sql );
						/*if(!$result )
						{
							echo "<script type=\"text/javascript\">
									alert(\"Invalid File:Please Upload CSV File.\");
									window.location = \"task.php\"
								</script>";
						
						}*/

				}
			}
			fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	        echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"task.php\"
					</script>";
	        
			

			 //close of connection
			mysqli_close($conn); 
				
		
			
		 }
	}	 
?>		 
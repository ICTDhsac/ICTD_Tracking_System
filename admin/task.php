<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
  include '../timezone.php';
  $range_to = date('m/d/Y');
  $range_from = date('m/d/Y');
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Task
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Task</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              
			  <a href="#importnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Import</a>	
			  
			  <div class="pull-right">
                <form method="POST" class="form-inline" id="trackForm">
                  <div class="input-group">
					<div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
					  <?php
					  if(isset($_GET['fullname'])){
						   $fullname = $_GET['fullname']; 
						   } else {
						   $fullname = 'Select ICT Staff'; 	   
						   }
					  ?>
					<select class="form-control" id="fullname" name="fullname"  required>
                        <option value="Select ICT Staff" >Select ICT Staff</option>
                        <?php
						  
                          $sql = "SELECT * FROM employees ORDER BY lastname ASC";
						  //echo $sql;
						  
                          $query = $conn->query($sql);
                          while($srow = $query->fetch_assoc()){
							$fullname1 = $srow['firstname'] .' '. $srow['lastname']; 
							  if ($fullname1==$fullname){
							  $selected='selected';
						  } else {
							  $selected='';
						  }
                            echo "
                              <option value='".$fullname."' $selected >".$fullname1."</option>
                            ";
                          }
                        ?>
                      </select>	  
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
					     
                    <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range" value="<?php echo (isset($_GET['range'])) ? $_GET['range'] : $range_from.' - '.$range_to; ?>">
                  </div>
                  <button type="button" class="btn btn-success btn-sm btn-flat" id="accomplishment"><span class="glyphicon glyphicon-print"></span> Accomplishment</button>
                  <button type="button" class="btn btn-primary btn-sm btn-flat" id="form"><span class="glyphicon glyphicon-print"></span> Form</button>
					
                </form>
              </div> 	
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Task Name</th>
                  <th>Assigned To</th>
                  <th>Start Date</th>
                  <th>Completed Date</th>
                  <th>Labels</th>
				  <th>Manage</th>	
                </thead>
                <tbody>
                  <?php
					

                    if(isset($_GET['range'])){
						
                     $range = $_GET['range'];
					 $ex = explode(' - ', $range);
                     $from = date('Y-m-d', strtotime($ex[0]));
                     $to = date('Y-m-d', strtotime($ex[1]));
					 } else {
					 $to = date('Y-m-d');
                     $from = date('Y-m-d');	
					 }
					
					if(isset($_GET['fullname']) || isset($_GET['range'])){
                    $fullname=$_GET['fullname'];
					if ($fullname=='Select ICT Staff'){
					$sql = "SELECT * from task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (CompletedDate BETWEEN '$from' AND '$to')) ORDER BY AssignedTo ASC, DueDate DESC";		
					}
					else {
					$sql = "SELECT * from task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (CompletedDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' ORDER BY AssignedTo ASC, DueDate DESC";		
					}
					} else {
					$sql = "SELECT * from task ORDER BY AssignedTo ASC, DueDate DESC";	
					}
					
					
					//echo $sql;
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $status = ($row['Progress'])?'<span class="label label-sucess pull-right">In progress</span>':'<span class="label label-prmary pull-right">Completed</span>';
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".$row['TaskName'].$status."</td>
                          <td>".$row['AssignedTo']."</td>
                          <td>".$row['StartDate']."</td>
                          <td>".$row['DueDate']."</td>
						  <td>".$row['Labels']."</td>
                          <td>
                            
                            <button class='btn btn-danger btn-sm btn-flat delete' data-id='".$row['TaskID']."'><i class='fa fa-trash'></i> Delete</button>
                          </td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/import_modal.php'; ?>	
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
	getRow(id);
  });
  $("#fullname").on('change', function(){
    var range = $( "#reservation" ).val(); 
	var fullname = $( "#fullname option:selected" ).text();   
    window.location = 'task.php?range='+range+'&fullname='+fullname;
  });		
  $("#reservation").on('change', function(){
    var range = encodeURI($(this).val());
	var fullname = $( "#fullname option:selected" ).text();
    window.location = 'task.php?range='+range+'&fullname='+fullname;
  });
  

  $('#accomplishment').click(function(e){
    e.preventDefault();
    $('#trackForm').attr('action', 'accomplishment_generate.php');
    $('#trackForm').submit();
  });

  $('#form').click(function(e){
    e.preventDefault();
    $('#trackForm').attr('action', 'form_generate.php');
    $('#trackForm').submit();
  });	
	
});

	
	
function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'task_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.taskid').val(response.TaskID);
      $('.task_id').html(response.TaskID);
      $('.del_task_name').html(response.TaskName);
    
    }
  });
}
</script>
<?php include 'includes/datatable_initializer.php'; ?>
</body>
</html>

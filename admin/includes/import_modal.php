<!-- Add -->
<div class="modal fade" id="importnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Import Task</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="import.php" enctype="multipart/form-data">
          		  <div class="form-group">	
                  	<label for="employee" class="col-sm-3 control-label">CSV/Excel File:</label>

                  	<div class="col-sm-9">
                    	
						<input type="file" class="form-control" name="file" id="file" required>
                  	</div>
                </div>
                
                
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
				<button type="submit" id="submit" name="Import" class="btn btn-primary btn-flat" data-loading-text="Loading..."><i class="fa fa-upload"></i> Upload</button>
            	
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="task_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="task_delete.php">
            		<input type="hidden" class="taskid" name="id">
            		<div class="text-center">
	                	<p>DELETE Task</p>
	                	<h2 class="bold del_task_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


     
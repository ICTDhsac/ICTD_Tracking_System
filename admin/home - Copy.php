<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('m/d/Y');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
	
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
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
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM employees";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>

              <p>Total Employees</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="employee.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM task";
                $query = $conn->query($sql);
                $total = $query->num_rows;

                echo "<h3>".number_format($total, 0)."<sup style='font-size: 20px'></sup></h3>";
              ?>
          
              <p>Total Number of Task</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="task.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM task where BucketName='Completed'";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>"
              ?>
             
              <p>Completed Task</p>
            </div>
            <div class="icon">
              <i class="ion ion-clock"></i>
            </div>
            <a href="task.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM task where BucketName='In Progress'";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>"
              ?>

              <p>On-going Task</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
            <a href="task.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Accomplishment Report</h3>
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Select Year: </label>
                    <select class="form-control input-sm" id="select_year">
                      <?php
                        for($i=2015; $i<=2065; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
                          ";
                        }
                      ?>
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <br>
                <div id="legend" class="text-center"></div>
                <canvas id="barChart" style="height:350px"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- Chart Data -->
<?php
	
  $and = 'AND year(STR_TO_DATE(CompletedDate, "%m/%d/%Y")) = '.$year;
  $months = array();
  $lowella = array();
  $eric = array();
  $august = array();	
  $johnrey = array();	
  $nathan = array(); 	
  $lawrence = array();	
	
  for( $m = 1; $m <= 12; $m++ ) {
    $sql = "SELECT * FROM task WHERE ((month(STR_TO_DATE(StartDate, '%m/%d/%Y')) = $m) OR (month(STR_TO_DATE(DueDate, '%m/%d/%Y')) = $m))  AND (BucketName='Completed' OR BucketName='In Progress') AND AssignedTo = 'Lowella Viray' $and";
	//echo $sql;  
    $lvquery = $conn->query($sql);
	array_push($lowella, $lvquery->num_rows);

    $sql = "SELECT * FROM task WHERE ((month(STR_TO_DATE(StartDate, '%m/%d/%Y')) = $m) OR (month(STR_TO_DATE(DueDate, '%m/%d/%Y')) = $m)) AND (BucketName='Completed' OR BucketName='In Progress') AND AssignedTo = 'Eric Emilio Azanes' $and";
	//echo $sql;
    $eaquery = $conn->query($sql);
    array_push($eric, $eaquery->num_rows);
	
	$sql = "SELECT * FROM task WHERE ((month(STR_TO_DATE(StartDate, '%m/%d/%Y')) = $m) OR (month(STR_TO_DATE(DueDate, '%m/%d/%Y')) = $m)) AND (BucketName='Completed' OR BucketName='In Progress') AND AssignedTo = 'Agustin Sopoco' $and";
	//echo $sql; 
    $asquery = $conn->query($sql);
    array_push($august, $asquery->num_rows);
  
	$sql = "SELECT * FROM task WHERE ((month(STR_TO_DATE(StartDate, '%m/%d/%Y')) = $m) OR (month(STR_TO_DATE(DueDate, '%m/%d/%Y')) = $m)) AND (BucketName='Completed' OR BucketName='In Progress') AND AssignedTo = 'John Henry Canas' $and";
    $jcquery = $conn->query($sql);
    array_push($johnrey, $jcquery->num_rows);
  
	$sql = "SELECT * FROM task WHERE ((month(STR_TO_DATE(StartDate, '%m/%d/%Y')) = $m) OR (month(STR_TO_DATE(DueDate, '%m/%d/%Y')) = $m)) AND (BucketName='Completed' OR BucketName='In Progress') AND AssignedTo = 'Nathaniel Paul Bunag' $and";
    $nbquery = $conn->query($sql);
    array_push($nathan, $nbquery->num_rows);
	
	$sql = "SELECT * FROM task WHERE ((month(STR_TO_DATE(StartDate, '%m/%d/%Y')) = $m) OR (month(STR_TO_DATE(DueDate, '%m/%d/%Y')) = $m)) AND (BucketName='Completed' OR BucketName='In Progress') AND AssignedTo = 'Lawrence Miguel Segui' $and";
    $lsquery = $conn->query($sql);
    array_push($lawrence, $lsquery->num_rows);
    
    
    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $lowella = json_encode($lowella);
  $eric = json_encode($eric);
  $august = json_encode($august);	
  $johnrey = json_encode($johnrey);
  $nathan = json_encode($nathan); 	
  $lawrence = json_encode($lawrence);	

?>
<!-- End Chart Data -->
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'Lowella',
        fillColor           : 'RGBA(111,115,210,1)',
        strokeColor         : 'RGBA(111,115,210,1)',
        pointColor          : 'RGBA(111,115,210,1)',
        pointStrokeColor    : '#6F73D2',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'RGBA(111,115,210,1)',
        data                : <?php echo $lowella; ?>
      },
      {
        label               : 'Eric',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#83C9F4',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $eric; ?>
      },
  	  {
        label               : 'August',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $august; ?>
      },	
  		{
        label               : 'Johnrey',
        fillColor           : 'RGBA(231,112,21,1)',
        strokeColor         : 'RGBA(231,112,21,1)',
        pointColor          : '#E77015',
        pointStrokeColor    : 'RGBA(231,112,21,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'RGBA(231,112,21,1)',
        data                : <?php echo $johnrey; ?>
      },
	  {
        label               : 'Nathan',
        fillColor           : 'RGBA(231,49,21,1)',
        strokeColor         : 'RGBA(231,49,21,1)',
        pointColor          : '#E73115',
        pointStrokeColor    : 'RGBA(231,49,21,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'RGBA(231,49,21,1)',
        data                : <?php echo $nathan; ?>
      },
	  {
        label               : 'Lawrence',
        fillColor           : 'RGBA(28,21,231,1)',
        strokeColor         : 'RGBA(28,21,231,1)',
        pointColor          : '#1C15E7',
        pointStrokeColor    : 'RGBA(28,21,231,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'RGBA(28,21,231,1)',
        data                : <?php echo $lawrence; ?>
      }	
    ]
  }
  barChartData.datasets[1].fillColor   = '#00a65a'
  barChartData.datasets[1].strokeColor = '#00a65a'
  barChartData.datasets[1].pointColor  = '#00a65a'
  var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
</body>
</html>

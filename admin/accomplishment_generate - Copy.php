<?php
	include 'includes/session.php';

	function generateRow($from, $to, $fullname, $conn){
		$contents = '';
	 	//echo $from;
		//echo $to;
		//echo $fullname;
		//echo date('m/d/Y');
		$total = 0;
		$no = 0;
		$pm = 0;
		$ch = 0;
		$cs = 0;
		$cn = 0;
		$co = 0;
		$sh = 0;
		$ss = 0;
		$sn = 0;
		$sa = 0; 
		$so = 0;
		$pro = 0;
		$id = 0;
		$inv = 0;
		$ins = 0;
		$ict = 0;
		$issp = 0;
		$rec = 0;
		$proc = 0;
		$ca = 0;
		$cb = 0;
		$tasklv = 0;
		$taskea = 0;
		$taskas = 0;
		$taskjc = 0;
		$tasknb = 0;
		$taskls = 0;
		if (($fullname=='Select ICT Staff') && (($to==date('m/d/Y')) && ($from==date('m/d/Y')))){
		$sql = "SELECT * from task ORDER BY AssignedTo ASC, DueDate DESC";
			
		/*	
		$sqlpm = "SELECT count(*) as totalpm FROM task where Labels='Preventive Maintenance'";
		$querypm = $conn->query($sqlpm);
		$rowpm = $querypm->fetch_assoc();	
		$pm = $rowpm['totalpm'];
			
		$sqlch = "SELECT count(*) as totalch FROM task where Labels='Corrective Hardware'";
		$querych = $conn->query($sqlch);
		$rowch = $querych->fetch_assoc();	
		$ch = $rowch['totalch'];
			
		$sqlcs = "SELECT count(*) as totalcs FROM task where Labels='Corrective-Software'";
		$querycs = $conn->query($sqlcs);
		$rowcs = $querycs->fetch_assoc();	
		$cs = $rowcs['totalcs'];	
		
		$sqlcn = "SELECT count(*) as totalcn FROM task where Labels='Corrective-Network'";
		$querycn = $conn->query($sqlcn);
		$rowcn = $querycn->fetch_assoc();	
		$cn = $rowcn['totalcn'];	
			
		$sqlco = "SELECT count(*) as totalco FROM task where Labels='Corrective-Others'";
		$queryco = $conn->query($sqlco);
		$rowco = $queryco->fetch_assoc();	
		$co = $rowco['totalco'];	
		
		$sqlsh = "SELECT count(*) as totalsh FROM task where Labels='Support on Operation-Hardware'";
		$querysh = $conn->query($sqlsh);
		$rowsh = $querysh->fetch_assoc();	
		$sh = $rowsh['totalsh'];
			
		$sqlss = "SELECT count(*) as totalss FROM task where Labels='Support on Operation-Software'";
		$queryss = $conn->query($sqlss);
		$rowss = $queryss->fetch_assoc();	
		$ss = $rowss['totalss'];	
		
		$sqlsn = "SELECT count(*) as totalsn FROM task where Labels='Support on Operation-Network'";
		$querysn = $conn->query($sqlsn);
		$rowsn = $querysn->fetch_assoc();	
		$sn = $rowsn['totalsn'];	
			
		$sqlsa = "SELECT count(*) as totalsa FROM task where Labels='Support on Operation-Admin'";
		$querysa = $conn->query($sqlsa);
		$rowsa= $querysa->fetch_assoc();	
		$sa = $rowsa['totalsa'];
		
		$sqlso = "SELECT count(*) as totalso FROM task where Labels='Support on Operation-Others'";
		$queryso = $conn->query($sqlso);
		$rowso= $queryso->fetch_assoc();	
		$so = $rowso['totalso'];		
		
		$sqlpro = "SELECT count(*) as totalpro FROM task where Labels='Production'";
		$querypro = $conn->query($sqlpro);
		$rowpro = $querypro->fetch_assoc();	
		$pro = $rowpro['totalpro'];
			
		$sqlid = "SELECT count(*) as totalid FROM task where Labels='Information Dissemination'";
		$queryid = $conn->query($sqlid);
		$rowid = $queryid->fetch_assoc();	
		$id = $rowid['totalid'];
			
		$sqlinv = "SELECT count(*) as totalinv FROM task where Labels='Inventory'";
		$queryinv = $conn->query($sqlinv);
		$rowinv = $queryinv->fetch_assoc();	
		$inv = $rowinv['totalinv'];	
		
		$sqlins = "SELECT count(*) as totalins FROM task where Labels='Inspection'";
		$queryins = $conn->query($sqlins);
		$rowins = $queryins->fetch_assoc();	
		$ins = $rowins['totalins'];
		
		$sqlict = "SELECT count(*) as totalict FROM task where Labels='Implementation of ICT Systems'";
		$queryict = $conn->query($sqlict);
		$rowict = $queryict->fetch_assoc();	
		$ict = $rowict['totalict'];	
			
		$sqlissp = "SELECT count(*) as totalissp FROM task where Labels='ISSP'";
		$queryissp = $conn->query($sqlissp);
		$rowissp = $queryissp->fetch_assoc();	
		$issp = $rowissp['totalissp'];		
		
			
		$sqlrec = "SELECT count(*) as totalrec FROM task where Labels='Recruitment'";
		$queryrec = $conn->query($sqlrec);
		$rowrec = $queryrec->fetch_assoc();	
		$rec = $rowrec['totalrec'];
		
		$sqlproc = "SELECT count(*) as totalproc FROM task where Labels='Procurement'";
		$queryproc = $conn->query($sqlproc);
		$rowproc = $queryproc->fetch_assoc();	
		$proc = $rowproc['totalproc'];	
		
		$sqlca = "SELECT count(*) as totalca FROM task where Labels='Capability Building (Training Attended)'";
		$queryca = $conn->query($sqlca);
		$rowca = $queryca->fetch_assoc();	
		$ca = $rowca['totalca'];
			
		$sqlcb = "SELECT count(*) as totalcb FROM task where Labels='Capability Building (Training Conducted)'";
		$querycb = $conn->query($sqlcb);
		$rowcb = $querycb->fetch_assoc();	
		$cb = $rowcb['totalcb'];
					
		$sqltasklv = "SELECT count(*) as totaltasklv FROM task where AssignedTo like '%Lowella Viray%'";
		$querytasklv = $conn->query($sqltasklv);
		$rowtasklv = $querytasklv->fetch_assoc();	
		$tasklv = $rowtasklv['totaltasklv'];
		
		$sqltaskea = "SELECT count(*) as totaltaskea FROM task where AssignedTo like '%Eric Azanes%'";
		$querytaskea = $conn->query($sqltaskea);
		$rowtaskea = $querytaskea->fetch_assoc();	
		$taskea = $rowtaskea['totaltaskea'];
		
		$sqltaskas = "SELECT count(*) as totaltaskas FROM task where AssignedTo like '%Augustin Sopoco%'";
		$querytaskas = $conn->query($sqltaskas);
		$rowtaskas = $querytaskas->fetch_assoc();	
		$taskas = $rowtaskas['totaltaskas'];
			
		$sqltaskjc = "SELECT count(*) as totaltaskjc FROM task where AssignedTo like '%John Henry Canas%'";
		$querytaskjc = $conn->query($sqltaskjc);
		$rowtaskjc = $querytaskjc->fetch_assoc();	
		$taskjc = $rowtaskjc['totaltaskjc'];
			
		$sqltasknb = "SELECT count(*) as totaltasknb FROM task where AssignedTo like '%Nathaniel Paul Bunag%'";
		$querytasknb = $conn->query($sqltasknb);
		$rowtasknb = $querytasknb->fetch_assoc();	
		$tasknb = $rowtasknb['totaltasknb'];
		
		$sqltaskls = "SELECT count(*) as totaltaskls FROM task where AssignedTo like '%Lawrence Miguel Segui%'";
		$querytaskls = $conn->query($sqltaskls);
		$rowtaskls = $querytaskls->fetch_assoc();	
		$taskls = $rowtaskls['totaltaskls'];
		*/
		} 
		//Second Condition
		elseif (($fullname=='Select ICT Staff') && ($from!=date('m/d/Y')))  {
		$sql = "SELECT * from task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) ORDER BY AssignedTo ASC, DueDate DESC";	
		
		/*
		$sqlpm = "SELECT count(*) as totalpm FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Preventive Maintenance'";
		$querypm = $conn->query($sqlpm);
		$rowpm = $querypm->fetch_assoc();	
		$pm = $rowpm['totalpm'];
			
		$sqlch = "SELECT count(*) as totalch FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Corrective Hardware'";
		$querych = $conn->query($sqlch);
		$rowch = $querych->fetch_assoc();	
		$ch = $rowch['totalch'];
			
		$sqlcs = "SELECT count(*) as totalcs FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Corrective-Software'";
		$querycs = $conn->query($sqlcs);
		$rowcs = $querycs->fetch_assoc();	
		$cs = $rowcs['totalcs'];	
		
		$sqlcn = "SELECT count(*) as totalcn FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Corrective-Network'";
		$querycn = $conn->query($sqlcn);
		$rowcn = $querycn->fetch_assoc();	
		$cn = $rowcn['totalcn'];	
			
		$sqlco = "SELECT count(*) as totalco FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Corrective-Others'";
		$queryco = $conn->query($sqlco);
		$rowco = $queryco->fetch_assoc();	
		$co = $rowco['totalco'];	
		
		$sqlsh = "SELECT count(*) as totalsh FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Support on Operation-Hardware'";
		$querysh = $conn->query($sqlsh);
		$rowsh = $querysh->fetch_assoc();	
		$sh = $rowsh['totalsh'];
			
		$sqlss = "SELECT count(*) as totalss FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Support on Operation-Software'";
		$queryss = $conn->query($sqlss);
		$rowss = $queryss->fetch_assoc();	
		$ss = $rowss['totalss'];	
		
		$sqlsn = "SELECT count(*) as totalsn FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Support on Operation-Network'";
		$querysn = $conn->query($sqlsn);
		$rowsn = $querysn->fetch_assoc();	
		$sn = $rowsn['totalsn'];	
			
		$sqlsa = "SELECT count(*) as totalsa FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Support on Operation-Admin'";
		$querysa = $conn->query($sqlsa);
		$rowsa= $querysa->fetch_assoc();	
		$sa = $rowsa['totalsa'];
		
		$sqlso = "SELECT count(*) as totalso FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Support on Operation-Others'";
		$queryso = $conn->query($sqlso);
		$rowso= $queryso->fetch_assoc();	
		$so = $rowso['totalso'];		
		
		$sqlpro = "SELECT count(*) as totalpro FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Production'";
		$querypro = $conn->query($sqlpro);
		$rowpro = $querypro->fetch_assoc();	
		$pro = $rowpro['totalpro'];
			
		$sqlid = "SELECT count(*) as totalid FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Information Dissemination'";
		$queryid = $conn->query($sqlid);
		$rowid = $queryid->fetch_assoc();	
		$id = $rowid['totalid'];
			
		$sqlinv = "SELECT count(*) as totalinv FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Inventory'";
		$queryinv = $conn->query($sqlinv);
		$rowinv = $queryinv->fetch_assoc();	
		$inv = $rowinv['totalinv'];	
		
		$sqlins = "SELECT count(*) as totalins FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Inspection'";
		$queryins = $conn->query($sqlins);
		$rowins = $queryins->fetch_assoc();	
		$ins = $rowins['totalins'];
		
		$sqlict = "SELECT count(*) as totalict FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Implementation of ICT Systems'";
		$queryict = $conn->query($sqlict);
		$rowict = $queryict->fetch_assoc();	
		$ict = $rowict['totalict'];	
			
		$sqlissp = "SELECT count(*) as totalissp FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='ISSP'";
		$queryissp = $conn->query($sqlissp);
		$rowissp = $queryissp->fetch_assoc();	
		$issp = $rowissp['totalissp'];		
		
			
		$sqlrec = "SELECT count(*) as totalrec FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Recruitment'";
		$queryrec = $conn->query($sqlrec);
		$rowrec = $queryrec->fetch_assoc();	
		$rec = $rowrec['totalrec'];
		
		$sqlproc = "SELECT count(*) as totalproc FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Procurement'";
		$queryproc = $conn->query($sqlproc);
		$rowproc = $queryproc->fetch_assoc();	
		$proc = $rowproc['totalproc'];	
			
		$sqlcb = "SELECT count(*) as totalcb FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Capability Building (Training Conducted)'";
		$querycb = $conn->query($sqlcb);
		$rowcb = $querycb->fetch_assoc();	
		$cb = $rowcb['totalcb'];
		
		$sqlca = "SELECT count(*) as totalca FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and Labels='Capability Building (Training Attended)'";
		$queryca = $conn->query($sqlca);
		$rowca = $queryca->fetch_assoc();	
		$ca = $rowca['totalca'];		
		
		$sqltasklv = "SELECT count(*) as totaltasklv FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and AssignedTo like '%Lowella Viray%'";
		$querytasklv = $conn->query($sqltasklv);
		$rowtasklv = $querytasklv->fetch_assoc();	
		$tasklv = $rowtasklv['totaltasklv'];
		
		$sqltaskea = "SELECT count(*) as totaltaskea FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and AssignedTo like '%Eric Emilio Azanes%'";
		$querytaskea = $conn->query($sqltaskea);
		$rowtaskea = $querytaskea->fetch_assoc();	
		$taskea = $rowtaskea['totaltaskea'];
		
		$sqltaskas = "SELECT count(*) as totaltaskas FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and AssignedTo like '%Augustin Sopoco%'";
		$querytaskas = $conn->query($sqltaskas);
		$rowtaskas = $querytaskas->fetch_assoc();	
		$taskas = $rowtaskas['totaltaskas'];
			
		$sqltaskjc = "SELECT count(*) as totaltaskjc FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and AssignedTo like '%John Henry Canas%'";
		$querytaskjc = $conn->query($sqltaskjc);
		$rowtaskjc = $querytaskjc->fetch_assoc();	
		$taskjc = $rowtaskjc['totaltaskjc'];
			
		$sqltasknb = "SELECT count(*) as totaltasknb FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and AssignedTo like '%Nathaniel Paul Bunag%'";
		$querytasknb = $conn->query($sqltasknb);
		$rowtasknb = $querytasknb->fetch_assoc();	
		$tasknb = $rowtasknb['totaltasknb'];
		
		$sqltaskls = "SELECT count(*) as totaltaskls FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) and AssignedTo like '%Lawrence Miguel Segui%'";
		$querytaskls = $conn->query($sqltaskls);
		$rowtaskls = $querytaskls->fetch_assoc();	
		$taskls = $rowtaskls['totaltaskls'];
		*/
		}
		//third condition
		else{
		$sql = "SELECT * from task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%'  ORDER BY DueDate DESC";
		/*	
		$sqlpm = "SELECT count(*) as totalpm FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Preventive Maintenance'";
		$querypm = $conn->query($sqlpm);
		$rowpm = $querypm->fetch_assoc();	
		$pm = $rowpm['totalpm'];
			
		$sqlch = "SELECT count(*) as totalch FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Corrective Hardware'";
		$querych = $conn->query($sqlch);
		$rowch = $querych->fetch_assoc();	
		$ch = $rowch['totalch'];
			
		$sqlcs = "SELECT count(*) as totalcs FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Corrective-Software'";
		$querycs = $conn->query($sqlcs);
		$rowcs = $querycs->fetch_assoc();	
		$cs = $rowcs['totalcs'];	
		
		$sqlcn = "SELECT count(*) as totalcn FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Corrective-Network'";
		$querycn = $conn->query($sqlcn);
		$rowcn = $querycn->fetch_assoc();	
		$cn = $rowcn['totalcn'];	
			
		$sqlco = "SELECT count(*) as totalco FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Corrective-Others'";
		$queryco = $conn->query($sqlco);
		$rowco = $queryco->fetch_assoc();	
		$co = $rowco['totalco'];	
		
		$sqlsh = "SELECT count(*) as totalsh FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Support on Operation-Hardware'";
		$querysh = $conn->query($sqlsh);
		$rowsh = $querysh->fetch_assoc();	
		$sh = $rowsh['totalsh'];
			
		$sqlss = "SELECT count(*) as totalss FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Support on Operation-Software'";
		$queryss = $conn->query($sqlss);
		$rowss = $queryss->fetch_assoc();	
		$ss = $rowss['totalss'];	
		
		$sqlsn = "SELECT count(*) as totalsn FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Support on Operation-Network'";
		$querysn = $conn->query($sqlsn);
		$rowsn = $querysn->fetch_assoc();	
		$sn = $rowsn['totalsn'];	
			
		$sqlsa = "SELECT count(*) as totalsa FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Support on Operation-Admin'";
		$querysa = $conn->query($sqlsa);
		$rowsa= $querysa->fetch_assoc();	
		$sa = $rowsa['totalsa'];
		
		$sqlso = "SELECT count(*) as totalso FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Support on Operation-Others'";
		$queryso = $conn->query($sqlso);
		$rowso= $queryso->fetch_assoc();	
		$so = $rowso['totalso'];		
		
		$sqlpro = "SELECT count(*) as totalpro FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Production'";
		$querypro = $conn->query($sqlpro);
		$rowpro = $querypro->fetch_assoc();	
		$pro = $rowpro['totalpro'];
			
		$sqlid = "SELECT count(*) as totalid FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Information Dissemination'";
		$queryid = $conn->query($sqlid);
		$rowid = $queryid->fetch_assoc();	
		$id = $rowid['totalid'];
			
		$sqlinv = "SELECT count(*) as totalinv FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Inventory'";
		$queryinv = $conn->query($sqlinv);
		$rowinv = $queryinv->fetch_assoc();	
		$inv = $rowinv['totalinv'];	
		
		$sqlins = "SELECT count(*) as totalins FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Inspection'";
		$queryins = $conn->query($sqlins);
		$rowins = $queryins->fetch_assoc();	
		$ins = $rowins['totalins'];
		
		$sqlict = "SELECT count(*) as totalict FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Implementation of ICT Systems'";
		$queryict = $conn->query($sqlict);
		$rowict = $queryict->fetch_assoc();	
		$ict = $rowict['totalict'];	
			
		$sqlissp = "SELECT count(*) as totalissp FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='ISSP'";
		$queryissp = $conn->query($sqlissp);
		$rowissp = $queryissp->fetch_assoc();	
		$issp = $rowissp['totalissp'];		
		
			
		$sqlrec = "SELECT count(*) as totalrec FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Recruitment'";
		$queryrec = $conn->query($sqlrec);
		$rowrec = $queryrec->fetch_assoc();	
		$rec = $rowrec['totalrec'];
		
		$sqlproc = "SELECT count(*) as totalproc FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Procurement'";
		$queryproc = $conn->query($sqlproc);
		$rowproc = $queryproc->fetch_assoc();	
		$proc = $rowproc['totalproc'];	
			
		$sqlcb = "SELECT count(*) as totalcb FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Capability Building (Training Conducted)'";
		$querycb = $conn->query($sqlcb);
		$rowcb = $querycb->fetch_assoc();	
		$cb = $rowcb['totalcb'];
		
		$sqlca = "SELECT count(*) as totalca FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%' and Labels='Capability Building (Training Attended)'";
		$queryca = $conn->query($sqlca);
		$rowca = $queryca->fetch_assoc();	
		$ca = $rowca['totalca'];	
		*/
		$sqltask = "SELECT count(*) as totaltask FROM task WHERE ((StartDate BETWEEN '$from' AND '$to') OR (DueDate BETWEEN '$from' AND '$to')) AND AssignedTo like '%$fullname%'";
		$querytask = $conn->query($sqltask);
		$rowtask = $querytask->fetch_assoc();	
		$task = $rowtask['totaltask'];
		/*	
		if ($fullname=='Lowella Viray'){
		$tasklv = $task;
		} else {
		$tasklv = 0;	
		}
		
		if ($fullname=='Eric Emilio Azanes'){
		$taskea = $task;
		} else {
		$taskea = 0;	
		}	
		
		if ($fullname=='Augustin Sopoco'){
		$taskas = $task;
		} else {
		$taskas = 0;	
		}
		
		if ($fullname=='John Henry Canas'){
		$taskjc = $task;
		} else {
		$taskjc = 0;	
		}
			
		if ($fullname=='Nathaniel Paul Bunag'){
		$tasknb = $task;
		} else {
		$tasknb = 0;	
		}
		
		if ($fullname=='Lawrence Miguel Segui'){
		$taskls = $task;
		} else {
		$taskls = 0;	
		}
		*/	
		
		}
		//echo $sql;
		$query = $conn->query($sql);
		
		$interval=0;	
		$stafftask=0;
		while($row = $query->fetch_assoc()){
			$no = $no+1;
			if ($row['DueDate']=='') {
				$completeddate=$row['CompletedDate'];
			} else {
				$completeddate=$row['DueDate'];
			}
			if ($row['StartDate']=='') {
				$startdate=$row['CreatedDate'];
			} else {
				$startdate=$row['StartDate'];
			}
			if ($row['AssignedTo']=='') {
				if ($row['CompletedBy']=='' && $row['CreatedBy']=='ICTD'){
				$assignedto="Lowella Viray";
				}
				else{
				$assignedto=$row['CompletedBy'];	
				}
			} else {	
				$assignedto=$row['AssignedTo'];
			}
			
			if ($completeddate==""){
				$interval=1;
				$stafftask=1;
			} else{
			$startdate1 = new DateTime($startdate);
			$completeddate1 = new DateTime($completeddate);
			$interval = $startdate1->diff($completeddate1);
			$interval = $interval->format('%d') + 1;
			$stafftask=$interval;
			}
			$label = $row['Labels'];
		
		
			if ($label=="Preventive Maintenance"){
				$pm = $pm + $interval; 
			}
			if ($label=="Corrective Hardware"){
				$ch = $ch + $interval; 
			}
			if ($label=="Corrective-Software"){
				$cs = $cs + $interval; 
			}
			if ($label=="Corrective-Network"){
				$cn = $cn + $interval; 
			}
			if ($label=="Corrective-Others"){
				$co = $co + $interval; 
			}
			if ($label=="Support on Operation-Hardware"){
				$sh = $sh + $interval; 
			}
			if ($label=="Support on Operation-Software"){
				$ss = $ss + $interval; 
			}
			if ($label=="Support on Operation-Network"){
				$sn = $sn + $interval; 
			}
			if ($label=="Support on Operation-Admin"){
				$sa = $sa + $interval; 
			}
			if ($label=="Support on Operation-Others"){
				$so = $so + $interval; 
			}
			if ($label=="Production"){
				$pro = $pro + $interval; 
			}
			if ($label=="Information Dissemination"){
				$id = $id + $interval; 
			}
			if ($label=="Inventory"){
				$inv = $inv + $interval; 
			}
			if ($label=="Inspection"){
				$ins = $ins + $interval; 
			}
			if ($label=="Implementation of ICT Systems"){
				$ict = $ict + $interval; 
			}
			if ($label=="ISSP"){
				$issp = $issp + $interval; 
			}
			if ($label=="Recruitment"){
				$rec = $rec + $interval; 
			}
			if ($label=="Procurement"){
				$proc = $proc + $interval; 
			}
			if ($label=="Capability Building (Training Attended)"){
				$ca = $ca + $interval; 
			}
			if ($label=="Capability Building (Training Conducted)"){
				$cb = $cb + $interval; 
			}
			
			if (strpos($assignedto, 'Lowella Viray') !== false) {
				$tasklv = $tasklv + $stafftask; 
			}
			if (strpos($assignedto, 'Eric Emilio Azanes') !== false) {
				$taskea = $taskea + $stafftask; 
			}
			if (strpos($assignedto, 'Agustin Sopoco') !== false) {
				$taskas = $taskas + $stafftask; 
			}
			if (strpos($assignedto, 'John Henry Canas') !== false) {
				$taskjc = $taskjc + $stafftask; 
			}
			if (strpos($assignedto, 'Nathaniel Paul Bunag') !== false) {
				$tasknb = $tasknb + $stafftask; 
			}
			if (strpos($assignedto, 'Lawrence Miguel Segui') !== false) {
				$taskls = $taskls + $stafftask; 
			}
			$contents .= '
			<tr>
				<td>'.$no.'</td>
				<td>'.$row['TaskName'].'</td>
				<td>'.$label.'</td>
				<td>'.$assignedto.'</td>
				<td>'.$startdate.'</td>
				<td>'.$completeddate.'</td>
				<td>'.$interval.'</td>
				<td>'.$row['Progress'].'</td>
				<td>'.$row['Description'].'</td>
			</tr>
			';
		}
		
		$contents .= '
			<tr>
				<td  colspan="8" align="center"><b>SUMMARY OF TASKS</b></td>
				
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>Lowella Viray</b></td>
				<td  colspan="2" align="right"><b>'.number_format($tasklv, 0).'</b></td>
				<td  colspan="3" align="right"><b>Total number of task</b></td>
				<td  colspan="1" align="right"><b>'.number_format($no, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>Eric Emilio Azanes</b></td>
				<td  colspan="2" align="right"><b>'.number_format($taskea, 0).'</b></td>
				<td  colspan="3" align="right" style="color:red;"><b>Preventive Maintenance</b></td>
				<td  colspan="1" align="right"><b>'.number_format($pm, 0).'</b></td>
			</tr>
			
			<tr>
				<td  colspan="2" align="left"><b>Agustin Sopoco</b></td>
				<td  colspan="2" align="right"><b>'.number_format($taskas, 0).'</b></td>
				<td  colspan="3" align="right"><b>Corrective Hardware</b></td>
				<td  colspan="1" align="right"><b>'.number_format($ch, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>John Henry Canas</b></td>
				<td  colspan="2" align="right"><b>'.number_format($taskjc, 0).'</b></td>
				<td  colspan="3" align="right"><b>Corrective Software</b></td>
				<td  colspan="1" align="right"><b>'.number_format($cs, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>Nathaniel Paul Bunag</b></td>
				<td  colspan="2" align="right"><b>'.number_format($tasknb, 0).'</b></td>
				<td  colspan="3" align="right"><b>Corrective Network</b></td>
				<td  colspan="1" align="right"><b>'.number_format($cn, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>Lawrence Miguel Segui</b></td>
				<td  colspan="2" align="right"><b>'.number_format($taskls, 0).'</b></td>
				<td  colspan="3" align="right"><b>Corrective Others</b></td>
				<td  colspan="1" align="right"><b>'.number_format($co, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right" style="color:blue;"><b>Total Number of Corrective</b></td>
				<td  colspan="1" align="right"><b>'.number_format($ch+$cs+$cn+$co, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right" style="color:blue;"><b>Production of ID</b></td>
				<td  colspan="1" align="right"><b>'.number_format($pro, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right" style="color:blue;"><b>Information Dissemination</b></td>
				<td  colspan="1" align="right"><b>'.number_format($id, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right" style="color:blue;"><b>Support on Operation-Others (Reports)</b></td>
				<td  colspan="1" align="right"><b>'.number_format($so, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right" style="color:blue;"><b>Total Number of Support of Operation (Not Technical Assistance)</b></td>
				<td  colspan="1" align="right"><b>'.number_format($ch+$cs+$cn+$co+$pro+$id+$so, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right"><b>Support on Operation-Hardware</b></td>
				<td  colspan="1" align="right"><b>'.number_format($sh, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right"><b>Support on Operation-Software</b></td>
				<td  colspan="1" align="right"><b>'.number_format($ss, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right"><b>Support on Operation-Network</b></td>
				<td  colspan="1" align="right"><b>'.number_format($sn, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right"><b>Support on Operation-Admin</b></td>
				<td  colspan="1" align="right"><b>'.number_format($sa, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right" style="color:blue;"><b>Total Number of Technical Assistance</b></td>
				<td  colspan="1" align="right"><b>'.number_format($sh+$ss+$sn+$sa, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right" style="color:blue;"><b>Overall Total Number of Support on Operation</b></td>
				<td  colspan="1" align="right"><b>'.number_format($sh+$ss+$sn+$sa+$ch+$cs+$cn+$co+$pro+$id+$so, 0).'</b></td>
			</tr>
		
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right"><b>Inventory</b></td>
				<td  colspan="1" align="right"><b>'.number_format($inv, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right"><b>Inspection</b></td>
				<td  colspan="1" align="right"><b>'.number_format($ins, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right" style="color:orange;"><b>Total Number of Maintenance of ICT infrastructure </b></td>
				<td  colspan="1" align="right"><b>'.number_format($inv+$ins, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right" style="color:green;"><b>Implementation of ICT Systems</b></td>
				<td  colspan="1" align="right"><b>'.number_format($ict, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right" style="color:violet;"><b>Formulation of ISSP</b></td>
				<td  colspan="1" align="right"><b>'.number_format($issp, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right" style="color:aqua;"><b>Recruitment</b></td>
				<td  colspan="1" align="right"><b>'.number_format($rec, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right" style="color:brown;"><b>Procurement</b></td>
				<td  colspan="1" align="right"><b>'.number_format($proc, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right" style="color:red;"><b>Capability Building (Training Attended)</b></td>
				<td  colspan="1" align="right"><b>'.number_format($ca, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="2" align="left"><b>&nbsp;</b></td>
				<td  colspan="2" align="right"><b>&nbsp;</b></td>
				<td  colspan="3" align="right" style="color:red;"><b>Capability Building (Training Conducted)</b></td>
				<td  colspan="1" align="right"><b>'.number_format($cb, 0).'</b></td>
			</tr>
			<tr>
				<td  colspan="8" align="center">
				<table border="0" cellspacing="0" cellpadding="3">  
				<tr>
		   		<td align="left">&nbsp;</td>
				</tr>
           		<tr>
		   		<td align="left">Noted By:</td>
				</tr>
				<tr>
		   		<td align="left">&nbsp;</td>
				</tr>
				<tr>
		   		<td align="left"><b>Lowella C. Viray</b></td>
				</tr>
				<tr>
		   		<td align="left">Head, Information and Communications Technology Division</td>
				</tr>
				</table>
				</td>
				
			</tr>
		';
		return $contents;
	}

	//$search = $_POST['search'];
	//echo $search;
	$fullname = $_POST['fullname'];	
	if ($fullname=='Select ICT Staff') {
		$fullname_title = '';
	} else {
		$fullname_title = 'of '.$fullname;
	}
	$range = $_POST['date_range'];
	$ex = explode(' - ', $range);
    $from = date('m/d/Y', strtotime($ex[0]));
    $to = date('m/d/Y', strtotime($ex[1]));
	
	if (($fullname=='Select ICT Staff') && (($from==date('m/d/Y')) && ($to==date('m/d/Y')))){
	$sql = "SELECT * FROM task where DueDate<>'' ORDER BY DueDate ASC LIMIT 1";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();	
	$from_title = $row['DueDate'];
	
	$sql = "SELECT * FROM task where DueDate<>'' ORDER BY DueDate DESC LIMIT 1";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();	
		
	$from_to = $row['DueDate'];
		
	$to_title = $row['StartDate'];
	} else {
	$from_title = date('M d, Y', strtotime($ex[0]));
	$to_title = date('M d, Y', strtotime($ex[1]));	
	}

	require_once('../tcpdf/tcpdf.php');  
    $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('Accomplishment Report as of '.$from_title.' - '.$to_title);  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
		<table border="0" cellspacing="0" cellpadding="3">  
           <tr>
		   <td align="center"><img src="../images/logohsac.png" width="500px"></td>
		   </tr>
		   <tr>
		   <td><h3 align="center">Accomplishment Report '.$fullname_title.'</h2></td>
		   </tr>
      	   <tr>
		   <td><h4 align="center">Information and Communications Technology Division</h3></td>
		   </tr>
		   <tr>
		   <td><h4 align="center">As of '.$from_title." - ".$to_title.'</h4></td>
		   </tr>
      	</table>
      	<table border="1" cellspacing="0" cellpadding="1" style="font-size:9px;">  
           <tr>  
           		<th width="5%" align="center"><b>No.</b></th>
				<th width="15%" align="center"><b>Task Name</b></th>
				<th width="15%" align="center"><b>Type</b></th>
				<th width="10%" align="center"><b>Assigned To</b></th>
                <th width="10%" align="center"><b>Date Started</b></th>
				<th width="10%" align="center"><b>Date Completed</b></th> 
				<th width="5%" align="center"><b>Days</b></th> 
				<th width="10%" align="center"><b>Status</b></th> 
				<th width="20%" align="center"><b>Requestor/Division/Remarks</b></th>
				
				
				
           </tr>  
      ';  
    $content .= generateRow($from, $to, $fullname, $conn);  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('ICTDAccomplishmentReport.pdf', 'I');

?>
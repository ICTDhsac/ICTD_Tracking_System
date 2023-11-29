<?php
	include 'includes/session.php';
	
	$fullname = $_POST['fullname'];	
	if ($fullname=='Select ICT Staff') {
		$fullname_title = '';
	} else {
		$fullname_title = 'of '.$fullname;
	}
	$range = $_POST['date_range'];
	$ex = explode(' - ', $range);
    $from = date('Y-m-d', strtotime($ex[0]));
    $to = date('Y-m-d', strtotime($ex[1]));

	
	if (($fullname=='Select ICT Staff') && (($from==date('Y-m-d')) && ($to==date('Y-m-d')))){
	$sql = "SELECT * FROM task where DueDate<>'' ORDER BY DueDate ASC LIMIT 1";
		
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();	
	$from_title = $row['CompletedDate'];
	
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
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('Request Slip: '.$from_title.' - '.$to_title);  
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
    $contents = '';

	if (($fullname=='Select ICT Staff') && (($to==date('Y-m-d')) && ($from==date('Y-m-d')))){
		$sql = "SELECT * from task ORDER BY AssignedTo ASC, DueDate DESC";
	}elseif (($fullname=='Select ICT Staff') && ($from!=date('Y-m-d')))  {
		//$sql = "SELECT * from task WHERE ((DueDate BETWEEN '$from' AND '$to ') and (Labels <> 'Preventive Maintenance' and Labels <> 'Support on Operation-Others' and Labels<> 'Information Dissemination' and Labels <> 'Inventory' and Labels <> 'Inspection' and Labels <> 'Implementation of ICT Systems' and Labels <> 'Recruitment' and Labels <> 'Procurement' and Labels <> 'ISSP' and Labels <> 'Capability Building (Training Conducted)' and Labels <> 'Capability Building (Training Attended)')) ORDER BY AssignedTo ASC, DueDate DESC";	
		$sql = "SELECT * from task WHERE ((DueDate BETWEEN '$from' AND '$to ') and (TaskName like 'Ticket No.:%')) ORDER BY AssignedTo ASC, DueDate DESC";	
	}else{
		//$sql = "SELECT * from task WHERE ((DueDate BETWEEN '$from' AND '$to' AND AssignedTo like '%$fullname%') and (Labels <> 'Preventive Maintenance' and Labels <> 'Support on Operation-Others' and Labels<> 'Information Dissemination' and Labels <> 'Inventory' and Labels <> 'Inspection' and Labels <> 'Implementation of ICT Systems' and Labels <> 'Recruitment' and Labels <> 'Procurement' and Labels <> 'ISSP' and Labels <> 'Capability Building (Training Conducted)' and Labels <> 'Capability Building (Training Attended)')) ORDER BY CompletedDate DESC";
		$sql = "SELECT * from task WHERE ((DueDate BETWEEN '$from' AND '$to') AND (AssignedTo like '%$fullname%')  and (TaskName like 'Ticket No.:%')) ORDER BY CompletedDate DESC";
	}
	//echo $sql;
	//end();
	$query = $conn->query($sql);
		
	while($row = $query->fetch_assoc()){
		//To get Ticket No
		$ticketno = $row['TaskName'];
		//$ticketno="Ticket No.:202203231322OE - [Hardware]  CARTRIDGE PROBLEM";
		$getticket = substr($ticketno,0,6); 
		//echo $getticket;
		if ($getticket=="Ticket"){
		$ticketno = substr($ticketno,11,14);
		//echo $ticketno;
		} else{
		$ticketno = "Not Generated";
		}
		
		//To get Request or Problem
		
		$request = $row['TaskName'];
		$exrequest = explode(' - ', $request);
		if (!$exrequest){
    	$ticketnodetailed = $exrequest[0];
    	$request = $exrequest[1];
		} else {
		$request=$row['TaskName'];	
		}
		//To get RequestDetails
		
		
		$requestdetails = $row['Description'];
		$findcomma=strpos($requestdetails,",");
		
		if (empty($findcomma)){
		$requestunit = "Not generated";	
		$requestby = "Not generated";		
		$actiontaken = $row['Description'];	
		}else{
		
		$exrequestdetails = explode(',', $requestdetails);
		$exrequestdetailscount = count($exrequestdetails);
		//echo $exrequestdetailscount;
		
		if ($exrequestdetailscount==3){
    	$requestunit = $exrequestdetails[0];
    	$requestby = $exrequestdetails[1];
		$actiontaken = $exrequestdetails[2];	
		} 
		elseif ($exrequestdetailscount==2) {
		$requestunit = $exrequestdetails[0];
    	$requestby = $exrequestdetails[1];
		$actiontaken = "Not generated";	
		} 
		elseif ($exrequestdetailscount==1) {
		$requestunit = $exrequestdetails[0];
    	$requestby =  "Not generated";
		$actiontaken = "Not generated";	
		} 	
		else{
		$requestunit = "Not generated";
    	$requestby =  "Not generated";	
		$actiontaken = $row['Description'];		
		}
	}
		
	 	$contents .= '
		    
			<br>
			<br>
			<table cellspacing="0" cellpadding="5" border="0">
			<tr>
			<td style="height:780px" colspan="2">
			<table cellspacing="0" cellpadding="3" border="1" style="width:100%">  
    	       	<tr>  
            		<td width="70%" align="center"><img src="../images/logohsac.png"></td>
                 	<td width="30%" align="right">ICTD.IHDRS.001.01</td>
				 	
    	    	</tr>
    	    	<tr>  
            		<td width="60%" align="center"><h2 align="center">ICTD HELP DESK REQUEST SLIP</h2></td>
                 	<td width="40%" align="left">Date:'.$row['StartDate'].'<br>IHDRS No.:'.$ticketno.'</td>
				 	
    	    	</tr>
    	    	<tr>  
            		<td width="50%" align="left" style="height:165px"><b>Request/Problem:</b><br>'.$request.'<br><br></td>
                 	<td width="50%" align="left"><b>(To be filled up by ICTD)</b><br><b>Action Taken</b>:'.$actiontaken.'<br><br><b>Status/Remarks</b>:'.$row['Progress'].'<br><br></td>
				 	
    	    	</tr>
				<tr>  
            		<td width="50%" align="left"><b>Requesting Unit</b>:'.$requestunit.'<br><b>Requested by</b>:'.$requestby.'</td>
                 	<td width="50%" align="left"><b>Name</b>:'.$row['AssignedTo'].' &nbsp;&nbsp;&nbsp;<b>Date</b>:'.$row['DueDate'].'<br><br><br><br>Noted by:<br><br>Lowella C. Viray <br>ICTD Head</td>
				 	
    	    	</tr>
			</table>
			</td>
			</tr>
			</table>
    	    
		';
	}
    $pdf->writeHTML($contents);  
    $pdf->Output('ICTDRequestSlip.pdf', 'I');

?>
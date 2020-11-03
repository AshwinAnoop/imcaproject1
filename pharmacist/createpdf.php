<?php
include('session.php');
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
function Header()
{
	$total = $_SESSION['total'];
	unset($_SESSION['total']);
    // Select Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(60);
    // Framed title
    $this->Cell(70,10,'PHARMACY BILLING',0,0,'C');
    // Line break
    $this->Ln(3);
    // Select Arial bold 15
    $this->SetFont('Arial','I',10);
    // Move to the right
    $this->Cell(130);
    // Framed title
    $this->Cell(70,10,'Total Amount = '.$total.' Rs',0,0,'C');	
    $this->Ln(20);
}	
	
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "clinicmanage";
	
		$conn = new mysqli( $servername, $username, $password, $dbname );
	if ( !$conn ) {
		die( 'Connection Failed' . mysql_error() );
	}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$billno = $_SESSION['billid'];
unset($_SESSION['billid']);

$billid= $billno;
$result = mysqli_query($conn, "SELECT medicine,required_qty,amount FROM billingdata WHERE medbill_id='$billid'") or die("database error:". mysqli_error($conn));


$pdf->SetFont('Arial','B',12);	
    $pdf->Cell(100, 10, 'MEDICINE', 1);
    $pdf->Cell(20, 10, 'QTY', 1);
    $pdf->Cell(70, 10, 'PRICE', 1);
$line=1;
while($row = $result->fetch_row()) {

	for ($br = $line; $br >= 1; $br--) {
	$pdf->Ln();
	
	}
$pdf->SetFont('Arial','I',10);	

        $med = $row[2];
        $qty = $row[0];
        $price = $row[1];
	
		$cellWidth=70;//wrapped cell width
		$cellHeight=8;//normal one-line cell height
			//check whether the text is overflowing
	if($pdf->GetStringWidth($med) < $cellWidth){
		//if not, then do nothing
		$line=1;
	}else{
		//if it is, then calculate the height needed for wrapped cell
		//by splitting the text to fit the cell width
		//then count how many lines are needed for the text to fit the cell
		
		$textLength=strlen($med);	//total text length
		$errMargin=10;		//cell width error margin, just in case
		$startChar=0;		//character start position for each line
		$maxChar=0;			//maximum character in a line, to be incremented later
		$textArray=array();	//to hold the strings for each line
		$tmpString="";		//to hold the string for a line (temporary)
		
		while($startChar < $textLength){ //loop until end of text
			//loop until maximum character reached
			while( 
			$pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
			($startChar+$maxChar) < $textLength ) {
				$maxChar++;
				$tmpString=substr($med,$startChar,$maxChar);
			}
			//move startChar to next line
			$startChar=$startChar+$maxChar;
			//then add it into the array so we know how many line are needed
			array_push($textArray,$tmpString);
			//reset maxChar and tmpString
			$maxChar=0;
			$tmpString='';
			
		}
			//get number of line
		$line=count($textArray);
	}
	$height=($line*$cellHeight);
	//write the cells
	$pdf->Cell(100,$height,$qty,1,0); //adapt height to number of lines
	$pdf->Cell(20,$height,$price,1,0); //adapt height to number of lines
	
	//use MultiCell instead of Cell
	//but first, because MultiCell is always treated as line ending, we need to 
	//manually set the xy position for the next cell to be next to it.
	//remember the x and y position before writing the multicell
	$xPos=$pdf->GetX();
	$yPos=$pdf->GetY();
	$pdf->MultiCell($cellWidth,$cellHeight,$med,1);
	
	//return the position for next cell next to the multicell
	//and offset the x with multicell width
	$pdf->SetXY($xPos + $cellWidth , $yPos);
	
	//$pdf->Cell(70,($line * $cellHeight),$aintake,1,1); //adapt height to number of lines
	
	
	
		//$pdf->Cell(100,12,$aname,1);
		//$pdf->Cell(20,12,$aqty,1);
		//$pdf->Cell(70,12,$aintake,1);
	
	
}

$pdf->Output();
?>
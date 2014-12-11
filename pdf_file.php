<?php

		/*session_start();
		$rs=$_SESSION["res"];
		
		$tmp="aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb";
	
		$j=1;
		/*while($j<count($rs))
		{
			$k=0;
			$j=0;
			echo strlen($tmp);
			while($j < strlen($tmp))
			{
				if($k == 99)
				{
						$k=0;
						echo "<br>";
				}
				echo $tmp[$k];
				$k++;$j++;
			}*/
		/*	$j=$j+5;
			echo $rs[$j].'<br>';
			echo $rs[$j+1].'<br>';
			$j=$j+2;
		}*/
	
			require("fpdf.php");	
			
			$pdf = new FPDF();
			
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',17);
			
			$pdf->SetY(20);
			$pdf->SetX(75);
						
			$pdf->Cell(0,10,' QUIZ RESULT  ');
			$pdf->Ln(); 
				
			$pdf->SetY($pdf->GetY());
			$pdf->SetX(10);
				
			$pdf->Cell(0,10,'------------------------------------------------------------------------------------------------');
			$pdf->Ln();
			
			$pdf->SetFont('Arial','',15);
			$total=0;

			$pdf->SetY($pdf->GetY());
			$pdf->SetX(10);
				
			session_start();
			$rs=$_SESSION["res"];
			$pdf->Cell(0,10,$rs[0]);
			$pdf->Ln();
			$pdf->Ln();
			$pdf->SetFont('Arial','',12);
						
			for($i=1;$i<15;$i++)
			{
				$tmp=$rs[$i];
				$k=0;$j=0;$l=0;$out="";$outp=array();;
				while($j < strlen($tmp))
				{
					if($k == 90)
					{
						$k=0;
						$outp[$l]=$out;
						$out="";
						//echo $outp[$l].' 1 <br>';
						$l++;
					}
					$out.=$tmp[$j];
					//echo $out.' << '.$j.' <br>';
					$k++;$j++;
					if($j == (strlen($tmp))){
						$outp[$l]=$out;
						//echo $outp[$l].' 1 <br>';
					}
				}
				foreach($outp as $o)
					{
						$pdf->SetY($pdf->GetY());
						$pdf->SetX(10);
						$pdf->Cell(0,10,$o);
						$pdf->Ln();
					}
					
			}
			$pdf->AddPage();
			$pdf->SetFont('Arial','',12);
			
			
			for($i=15;$i<36;$i++)
			{
				$tmp=$rs[$i];
				$k=0;$j=0;$l=0;$out="";$outp=array();;
				while($j < strlen($tmp))
				{
					if($k == 90)
					{
						$k=0;
						$outp[$l]=$out;
						$out="";
						//echo $outp[$l].' 1 <br>';
						$l++;
					}
					$out.=$tmp[$j];
					//echo $out.' << '.$j.' <br>';
					$k++;$j++;
					if($j == (strlen($tmp))){
						$outp[$l]=$out;
						//echo $outp[$l].' 1 <br>';
					}
				}
				foreach($outp as $o)
					{
						$pdf->SetY($pdf->GetY());
						$pdf->SetX(10);
						$pdf->Cell(0,10,$o);
						$pdf->Ln();
					}
					
			}
			$pdf->AddPage();
			$pdf->SetFont('Arial','',12);
			
			for($i=36;$i<57;$i++)
			{
				$tmp=$rs[$i];
				$k=0;$j=0;$l=0;$out="";$outp=array();;
				while($j < strlen($tmp))
				{
					if($k == 90)
					{
						$k=0;
						$outp[$l]=$out;
						$out="";
						//echo $outp[$l].' 1 <br>';
						$l++;
					}
					$out.=$tmp[$j];
					//echo $out.' << '.$j.' <br>';
					$k++;$j++;
					if($j == (strlen($tmp))){
						$outp[$l]=$out;
						//echo $outp[$l].' 1 <br>';
					}
				}
				foreach($outp as $o)
					{
						$pdf->SetY($pdf->GetY());
						$pdf->SetX(10);
						$pdf->Cell(0,10,$o);
						$pdf->Ln();
					}
					
			}
			for($i=57;$i<71;$i++)
			{
				$tmp=$rs[$i];
				$k=0;$j=0;$l=0;$out="";$outp=array();;
				while($j < strlen($tmp))
				{
					if($k == 90)
					{
						$k=0;
						$outp[$l]=$out;
						$out="";
						//echo $outp[$l].' 1 <br>';
						$l++;
					}
					$out.=$tmp[$j];
					//echo $out.' << '.$j.' <br>';
					$k++;$j++;
					if($j == (strlen($tmp))){
						$outp[$l]=$out;
						//echo $outp[$l].' 1 <br>';
					}
				}
				foreach($outp as $o)
					{
						$pdf->SetY($pdf->GetY());
						$pdf->SetX(10);
						$pdf->Cell(0,10,$o);
						$pdf->Ln();
					}
					
			}
			$pdf->SetFont('Arial','B',16);
			$pdf->SetY($pdf->GetY());
			$pdf->SetX(80);
			$pdf->Cell(0,20,"  GOOD LUCK  ");
			$pdf->Ln();
			// 0 - 205
				
			//$pdf->Output();
			//$pdf->Output("reports/report.pdf");
			$pdf->Output("quiz_result.pdf","I");
?>
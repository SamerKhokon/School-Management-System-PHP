<?php  error_reporting(0);
			require_once 'reader.php';
			//$data = new Spreadsheet_Excel_Reader();
			//$excel_file = "Book3.xls";
			//$data->read($excel_file);			
			//$total_rows = $data->sheets[0]['numRows'] ; 
			//$data->sheets[0]['numRows']
			//$data->sheets[0]['numCols
			
			class Excel_Reader extends Spreadsheet_Excel_Reader
			{
			    //public   Excel_Reader() {}
                public function 	test($sp,$ep) {
				  echo $sp.' '.$ep;
				}
				public function  table($sp) {
				  	 
						for($i=2;$i<= $this->sheets[0]['numRows'] ; $i++ ) {
							for($j=$sp+1;$j<= ($sp+2);$j++ ) {		
                                    
                                     

							
									$st   = $this->sheets[0]['cells'][$i][$j];								      
									$ob = $this->sheets[0]['cells'][$i][$j+1];
									$ct   = $this->sheets[0]['cells'][$i][$j+2];
							        echo $st.'  '.$ob.' '.$ct.' ';										
                                    break;									
							}	
	                         
							echo '<br/>';
						}	 
					
				}
			}
			
			
			
			$er = new Excel_Reader();
			$excel_file = "Book3.xls";
			$er->read($excel_file);			
   			
			for($r = 1; $r<=$er->sheets[0]['numRows'];$r++ ) {	
			 if($r = 1) {
					for( $c=0;$c<$er->sheets[0]['numCols'];$c++ ) {
							$sub_code =  $er->sheets[0]['cells'][1][$c];
							if($c%3 == 0 ) {
							     $sp = $c;
                                 $er->table($sp);						
							 }
							// echo $sub_code;
					}
					break;
			   }
			}
					
			
			/*
										if($c%3== 0 ) {
								$sp = $c;
								$ep = $sp+2;
								$er->table($sub_code,$sp,$ep);
								echo $sub_code;
							}
			
										//echo $sub_code.'  ';
							if($c%3 == 0 && $c == 0) {
								   $sp = 0;
								   $ep = $sp+2;
						    } else if($c%3==0 && $c>0){
								   $sp = $c;
								   $ep = $sp+2;
						    }							

			
		for($r = 1; $r<$er->sheets[0]['numRows'];$r++ ) {	
			 if($r = 1) {
				for( $c=0;$c<=$er->sheets[0]['numCols'];$c++ ) {
						$sub_code =  $er->sheets[0]['cells'][1][$c];
						if($c%3 == 0 && $c == 0) {
						   $sp = 0;
						   $ep = $sp+2;
						} else if($c%3==0 && $c>0){
						   $sp = $c;
						   $ep = $sp+2;
						}
						  //echo $sp.'   '.$ep.'   ';
						}  
							// echo $sub_code.'   ' ;
						for($in = 2; $in <= $er->sheets[0]['numRows']; $in++ ) {
							for($cl = $sp ; $cl <= $ep ;$cl++) {
								   $st  = $er->sheets[0]['cells'][$in][$cl];								      
								   $ob = $er->sheets[0]['cells'][$in][$cl+1];
								   $ct   = $er->sheets[0]['cells'][$in][$cl+2];
								  // echo $sp.' '.$ep.'  ';
								 
						}
						echo "<br/>";							
				}				
				break;
		}*/
?>
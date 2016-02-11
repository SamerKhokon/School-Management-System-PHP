<?php  error_reporting(0);
			require_once 'reader.php';
			//$data = new Spreadsheet_Excel_Reader();
			//$excel_file = "Book3.xls";
			//$data->read($excel_file);			
			//$total_rows = $data->sheets[0]['numRows'] ; 
			//$data->sheets[0]['numRows']
			//$data->sheets[0]['numCols
			
			class Excel_Reader extends Spreadsheet_Excel_Reader{
			    //public   Excel_Reader() {}
				public function  table($sub_code,$sp) {
				  	   //echo $sub_code.'<br/>';
						for($i=4;$i<= $this->sheets[0]['numRows'] ; $i++ ) {
							for($j=$sp+3;$j<= ($sp+3);$j++ ) {					   
									$st   = $this->sheets[0]['cells'][$i][$j];								      
									$ob = $this->sheets[0]['cells'][$i][$j+1];
									$ct   = $this->sheets[0]['cells'][$i][$j+2];
							        echo $st.'  '.$ob.' '.$ct.' ';										
                                    break;									
							}	
							echo '<br/>';
						}						
                        echo '<br/>';
				}
			}
			
			$er = new Excel_Reader();
			$excel_file = "Book3.xls";
			$er->read($excel_file);			
   			
			for($r = 2; $r<=$er->sheets[0]['numRows'];$r++ ) {	
				if($r = 2) {
					for( $c=0;$c<$er->sheets[0]['numCols'];$c++ )  {
					       $sub_code =  $er->sheets[0]['cells'][3][$c];						  	
							//echo $sub_code.'  <br/> ';
							if($c%3 == 0 ) {
							     $sp = $c;
                                 $er->table($sub_code,$sp);						
							 }						
					}
					break;
			    }
			}					
?>
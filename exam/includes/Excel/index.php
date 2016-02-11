<?php  error_reporting(0);
			require_once 'reader.php';
			$data = new Spreadsheet_Excel_Reader();
			$excel_file = "Book3.xls";
			$data->read($excel_file);
			
			$total_rows = $data->sheets[0]['numRows'] ; 
			//echo $total_cols = $data->sheets[0]['numCols'] ;			
			
			for($i=0;$i<$data->sheets[0]['numCols'];$i++) {
			      if($i%3 == 0 ) {
				    $sp = $i;
					$ep = $i+2;					
					
					//echo $sp.' '.$ep.'<br/>';
					echo 'Subject code: '.$sub =  $data->sheets[0]['cells'][1][$i+1].' <br/>';
						for($y= $sp;$y<= $ep;$y++) {
								$one    =  $data->sheets[0]['cells'][$y+1][$y];
								$two    = $data->sheets[0]['cells'][$y+1][$y+1];
								$three = $data->sheets[0]['cells'][$y+1][$y+2];
								echo $one.' '.$two.' '.$three .'<br/>';
						}				
					echo '<br/>';					
                     } 				                 				  
			}
			
					//if( $j == $data->sheets[0]['numRows'] )  break;					
					/*$mobileno1 = $data->sheets[0]['cells'][$j+1][1];
					$mobileno2 = $data->sheets[0]['cells'][$j+1][2];
					$mobileno3 = $data->sheets[0]['cells'][$j+1][3];
					$mobileno4 = $data->sheets[0]['cells'][$j+1][4];
					$mobileno5 = $data->sheets[0]['cells'][$j+1][5];
					$mobileno6 = $data->sheets[0]['cells'][$j+1][6];
					echo "<tr><td>$mobileno1</td><td>$mobileno2</td><td>$mobileno3</td><td>$mobileno4</td><td>$mobileno5</td><td>$mobileno6</td></tr>";
					*/

?>
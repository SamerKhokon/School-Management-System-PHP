<?php	
    $con = mysql_connect('localhost','root','');
	mysql_select_db('mytest',$con);		
		
	class Sql {		
		private $returnTable;		
		
		public  function getReturnTable() {
			$str = "SELECT id AS 'Serial No',ek AS 'Name',
				(SELECT dui FROM two WHERE id=tid) AS 'Subject',
				(SELECT whead FROM west WHERE id=wid) AS 'West Head',
				(SELECT color FROM west WHERE id=wid) AS 'West Color'
				FROM ONE AS a";					
			$sql = mysql_query($str);				
			while($res = mysql_fetch_array($sql)) {
			   $rs[] = array(
			   'slno'    => $res[0],'name'    => $res[1],'subject' => $res[2],
			   'whead'   => $res[3],'color'   => $res[4]);
			}
			return json_encode($rs);
		}
		
		public function singleRow($id) {
		   $str = "select * from one where id=$id";
		   $sql = mysql_query($str);
		   while( $res = mysql_fetch_array($sql) ) {
			  $rs = array(
			   'slno'   => $res[0],'name' => $res[1],
			   'subject'=> $res[2],'whead'=> $res[3]);
		   }
		   return json_encode($rs);
		}
		
		public function insertTable($str) {
		   $add = "insert into two(`dui`) values('$str')";
		   $ret = mysql_query($add);
		   return mysql_affected_rows();
		}	
		
		public function deleteTable($pid) {
		  $del = "delete from two where id=$pid";
		  mysql_query($del);
		  return mysql_affected_rows();
		}
		
		public function updateTable($pid,$st) {
		  $modify = "update two set dui='$st' where id=$pid";
		  mysql_query($modify);
		  return mysql_affected_rows();
		}
		
		public function totalRows() {
		   $str = "select count(*) from two";
		   $rs  = mysql_query($str);	
		   $row = mysql_fetch_row($rs);	
		   return $row[0];
		}
		
	}

	$s = new Sql();	
	echo $s->singleRow(3);	
	
	/*echo $s->getReturnTable();
	echo $s->totalRows(); 
	echo $s->insertTable('chinese');
	echo $s->deleteTable(4);
	echo $s->updateTable(7,'bangladesh');*/
?>
<?php
//*****************************************************************//
// Pixie: The Small, Simple, Site Maker.                           //
// ----------------------------------------------------------------//
// Licence: GNU General Public License v3                   	   //
// Title: lib_db.                                                  //
//*****************************************************************//

// Author: Dean Allen is the original author upon which this script
//         has been based. 
// Web: 	 http://textpattern.com
// Desc: 	 Class to interface with MySQL DB

//------------------------------------------------------------------

if (!empty($pixieconfig['table_prefix'])) {
	define ("PFX",$pixieconfig['table_prefix']);
} else define ("PFX",'');

class DB {

    function DB() {
         global $pixieconfig;
         $this->host = $pixieconfig['host'];
         $this->db   = $pixieconfig['db'];
         $this->user = $pixieconfig['user'];
         $this->pass = $pixieconfig['pass'];
         $this->link = mysql_connect($this->host, $this->user, $this->pass);
         if (!$this->link) {
         	$GLOBALS['connected'] = false;
         } else $GLOBALS['connected'] = true;
         mysql_select_db($this->db) or die(db_down());
         $diff = $this->getTzdiff();
         if ($diff >= 0)
                $diff = '+'.$diff;
         mysql_query("set time_zone = '"."$diff:00'");
    }

    function getTzdiff() {
         extract(getdate());
         $serveroffset = gmmktime(0,0,0,$mon,$mday,$year) - mktime(0,0,0,$mon,$mday,$year);
         return $serveroffset/3600;
    }

} 

$DB = new DB;
//------------------------------------------------------------------
	function safe_query($q='',$debug='',$unbuf='')
	{
		global $DB,$pixieconfig,$message;
		$method = (!$unbuf) ? 'mysql_query' : 'mysql_unbuffered_query';
		if (!$q) return false;
		if ($debug) { 
			$message = "MySQL Query: ".$q."<br/>MySQL Error:".mysql_error()."";
		}
		
		$result = $method($q,$DB->link);

		if(!$result) return false;
		return $result;
	}
//------------------------------------------------------------------
	function safe_delete($table, $where, $debug='')
	{
		$q = "delete from ".PFX."$table where $where";
		if ($r = safe_query($q,$debug)) {
			return true;
		}
		return false;
	}

//------------------------------------------------------------------
	function safe_update($table, $set, $where, $debug='') 
	{
		$q = "update ".PFX."$table set $set where $where";
		if ($r = safe_query($q,$debug)) {
			return true;
		}
		return false;
	}

//------------------------------------------------------------------
	function safe_insert($table,$set,$debug='') 
	{
		global $DB;
		$q = "insert into ".PFX."$table set $set";
		if ($r = safe_query($q,$debug)) {
			$id = mysql_insert_id($DB->link);
			return ($id === 0 ? true : $id);
		}
		return false;
	}

//------------------------------------------------------------------
	function safe_alter($table, $alter, $debug='') 
	{
		$q = "alter table ".PFX."$table $alter";
		if ($r = safe_query($q,$debug)) {
			return true;
		}
		return false;
	}

//------------------------------------------------------------------
	function safe_optimize($table, $debug='') 
	{
		$q = "optimize table ".PFX."$table";
		if ($r = safe_query($q,$debug)) {
			return true;
		}
		return false;
	}

//------------------------------------------------------------------
	function safe_repair($table, $debug='') 
	{
		$q = "repair table ".PFX."$table";
		if ($r = safe_query($q,$debug)) {
			return true;
		}
		return false;
	}

//------------------------------------------------------------------
	function safe_field($thing, $table, $where, $debug='') 
	{
		$q = "select $thing from ".PFX."$table where $where";
		$r = safe_query($q,$debug);
		if (@mysql_num_rows($r) > 0) {
			return mysql_result($r,0);
		}
		return false;
	}

//------------------------------------------------------------------
	function safe_column($thing, $table, $where, $debug='') 
	{
		$q = "select $thing from ".PFX."$table where $where";
		$rs = getRows($q,$debug);
		if ($rs) {
			foreach($rs as $a) {
				$v = array_shift($a);
				$out[$v] = $v;
			}
			return $out;
		}
		return array();
	}

//------------------------------------------------------------------
	function safe_row($things, $table, $where, $debug='') 
	{
		$q = "select $things from ".PFX."$table where $where";
		$rs = getRow($q,$debug);
		if ($rs) {
			return $rs;
		}
		return array();
	}


//------------------------------------------------------------------
	function safe_rows($things, $table, $where, $debug='') 
	{
		$q = "select $things from ".PFX."$table where $where";
		$rs = getRows($q,$debug);
		if ($rs) {
			return $rs;
		}
		return array();
	}

//------------------------------------------------------------------
	function safe_rows_start($things, $table, $where, $debug='') 
	{
		$q = "select $things from ".PFX."$table where $where";
		return startRows($q,$debug);
	}

//------------------------------------------------------------------
	function safe_count($table, $where, $debug='') 
	{
		return getThing("select count(*) from ".PFX."$table where $where",$debug);
	}

//------------------------------------------------------------------
	function fetch($col,$table,$key,$val,$debug='') 
	{
		$q = "select $col from ".PFX."$table where `$key` = '$val' limit 1";
		if ($r = safe_query($q,$debug)) {
			return (mysql_num_rows($r) > 0) ? mysql_result($r,0) : '';
		}
		return false;
	}

//------------------------------------------------------------------
	function getRow($query,$debug='') 
	{
		if ($r = safe_query($query,$debug)) {
			return (mysql_num_rows($r) > 0) ? mysql_fetch_assoc($r) : false;
		}
		return false;
	}

//------------------------------------------------------------------
	function getRows($query,$debug='') 
	{
		if ($r = safe_query($query,$debug)) {
			if (mysql_num_rows($r) > 0) {
				while ($a = mysql_fetch_assoc($r)) $out[] = $a; 
				return $out;
			}
		}
		return false;
	}

//------------------------------------------------------------------
	function startRows($query,$debug='')
	{
		return safe_query($query,$debug);
	}

//------------------------------------------------------------------
	function nextRow($r)
	{
		return mysql_fetch_assoc($r);
	}

//------------------------------------------------------------------
	function getThing($query,$debug='') 
	{
		if ($r = safe_query($query,$debug)) {
			return (mysql_num_rows($r) != 0) ? mysql_result($r,0) : '';
		}
		return false;
	}

//------------------------------------------------------------------
	function getThings($query,$debug='') 
	// return values of one column from multiple rows in an num indexed array
	{
		$rs = getRows($query,$debug);
		if ($rs) {
			foreach($rs as $a) $out[] = array_shift($a);
			return $out;
		}
		return array();
	}
	
//------------------------------------------------------------------
	function getCount($table,$where,$debug='') 
	{
		return getThing("select count(*) from ".PFX."$table where $where",$debug);
	}
//------------------------------------------------------------------
	function get_prefs()
	{
		$r= safe_row("*", "pixie_settings", "settings_id = 1");
		if ($r) {
			return $r;
		}
		return false;
	}
//------------------------------------------------------------------
// Creates a drop down menu box from a db
	function db_dropdown($table,$current,$name,$condition)
	{ 
	 global $edit, $go;
	       
   $rs = safe_query("SELECT * FROM $table WHERE $condition");
	 $num = mysql_num_rows($rs);
	 $i = 0;
	 
	 echo "\t\t\t\t\t\t\t\t<select class=\"form_select\" name=\"$name\" id=\"$name\">\n";
	 if ((!$current) && ($go == "new")) {
	 	echo "\t\t\t\t\t\t\t\t\t<option selected=\"selected\" value=\"NULL\">-</option>\n";
	 } else if (($current == "NULL") && ($edit)) {
	 	echo "\t\t\t\t\t\t\t\t\t<option selected=\"selected\" value=\"NULL\">-</option>\n";
	 } else if ($edit) {
	 	echo "\t\t\t\t\t\t\t\t\t<option value=\"NULL\">-</option>\n";	 	
	 }

	 while ($i < $num){
	 	$F = mysql_fetch_array($rs);
	 	
	 	for ($j=0; $j < mysql_num_fields($rs); $j++) {
	 		if (last_word(mysql_field_name($rs,$j)) == "id") {
	 			$id = simplify($F[$j]);
	 		} else {
	 			$fieldname = $F[1];
	 		}
	 	}

    if ($current == $id) {
	 		print "\t\t\t\t\t\t\t\t\t<option selected=\"selected\" value=\"$id\">$fieldname</option>\n";
	 	} else {
	 		print "\t\t\t\t\t\t\t\t\t<option value=\"$id\">$fieldname</option>\n";
	 	} 	
	 $i++;
	 }
	 echo "\t\t\t\t\t\t\t\t</select>";
	}
//------------------------------------------------------------------
	function table_exists($table_name)
	{
		$rs = safe_query("SELECT * FROM $table_name");
		
		if ($rs) {
			return true;
		} else {
			return false;
		}
	}
//------------------------------------------------------------------
	function db_down() 
	{
		// 503 status might discourage search engines from indexing or caching the error message
		header('Status: 503 Service Unavailable');
		return <<<eod
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Pixie (www.getpixie.co.uk) - Unable to connect to database</title>
	<style type="text/css">
		body
			{
			font-family: Arial, 'Lucida Grande', Verdana, Sans-Serif;
			color: #333;
			}
		
		a, a:visited
			{
			text-decoration: none;
			color: #0497d3;
			}

		a:hover
			{
			color: #191919;
			text-decoration: none;
			}
			
		.helper
			{
			position: relative;
			top: 60px;
			border: 5px solid #e1e1e1;
			clear: left;
			padding: 15px 30px;
			margin: 0 auto;
			background-color: #F0F0F0;
			width: 500px;
			line-height: 15pt;
			}
	</style>
</head>
<body>
<div class="helper">
	<h3>Database Unavailable</h3><p><a href="http://www.getpixie.co.uk" alt="Get Pixie!">Pixie</a> has not been able to display the website your are visiting as a database connection could not be established. Try to visit the site again in a few moments.</p>
</div>
</body>
</html>
eod;
	}

?>

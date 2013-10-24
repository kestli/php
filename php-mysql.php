<?php 


define ("MYSQL_HOST","");
define ("MYSQL_USER","");
define ("MYSQL_PASS","");
define ("MYSQL_DB","");


class mysql
{
	public  $resultado;
	private $link;
	function conect()
	{
		$this->link=mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS);
		mysql_select_db(MYSQL_DB,$this->link) or die(mysql_error());
		mysql_query ("SET NAMES 'utf8'");
	}
	
	function conect_db($db)
	{
		$this->link=mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS);
		mysql_select_db($db,$this->link) or die(mysql_error());
		mysql_query ("SET NAMES 'utf8'");
	}
	
	function query($query)
	{$this->resultado = mysql_query($query,$this->link); 
	  return mysql_error();}
	
	
	function num_rows()
	{return mysql_num_rows($this->resultado);}
	
	function resultado($row)
	{
		if ($this->num_rows())
			return mysql_result($this->resultado,$row);
		else
			return false;	
	}
	
	function fetch_array()
	{return mysql_fetch_array($this->resultado);}
	
	function cerrar()
	{
		/*if (!is_bool($this->resultado))
			if (($this->resultado != NULL))
		    	mysql_free_result($this->resultado);*/
		mysql_close($this->link);
	}
	
	function array_pos($pos)
	{
		mysql_data_seek($this->resultado,$pos);
		return true;
	}
	
	function __destruct()
	{
		if (!is_bool($this->resultado))
			if (($this->resultado != NULL))
		    	mysql_free_result($this->resultado);
	}
}
?>

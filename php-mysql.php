/*

Copyright (c) 2013, Maximiliano Kestli <maxkaestli@hotmail.com>
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions
are met:

 * Redistributions of source code must retain the above copyright
   notice, this list of conditions and the following disclaimer.

 * Redistributions in binary form must reproduce the above copyright
   notice, this list of conditions and the following disclaimer in
   the documentation and/or other materials provided with the
   distribution.

 * Neither the name of Sebastian Bergmann nor the names of his
   contributors may be used to endorse or promote products derived
   from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
"AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
POSSIBILITY OF SUCH DAMAGE.

*/

<?php 

define ("MYSQL_HOST","");
define ("MYSQL_USER","");
define ("MYSQL_PASS","");
define ("MYSQL_DB","");


class mysql
{
	public  $resultado;
	private $link;
	function connect()
	{
		$this->link=mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS);
		mysql_select_db(MYSQL_DB,$this->link) or die(mysql_error());
		mysql_query ("SET NAMES 'utf8'");
	}
	
	function connect_db($db)
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
	
	function close()
	{
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

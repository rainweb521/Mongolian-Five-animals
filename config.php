<?php
	unset($CFG);
	global $CFG;
	$CFG = new stdClass();
	
	$CFG->dbtype    = 'MySql';
	$CFG->dbhost    = 'localhost';
	$CFG->dbname    = 'wuchu';
	$CFG->dbuser    = 'root';
	$CFG->dbpass    = 'root';
	$CFG->dbencoding= 'utf8';
	
	
	/*
	 * 数据库连接，返回连接对象$conn
	*/
	function startDB()
	{
		global $CFG;
		try
		{
			$conn=mysql_connect($CFG->dbhost,$CFG->dbuser,$CFG->dbpass) or die("数据库连接失败！");
			mysql_select_db($CFG->dbname,$conn);
			mysql_query("set names '".$CFG->dbencoding."'");
			return $conn;
		}
		catch(Exception $e)
		{
		}
	}
	/**
	 * 获取SQL返回的QUERY
	 */
	function execute_sql_select($sql)
	{
		try{
			$query = mysql_query($sql);
			mysql_close();
			return $query;
		}catch (Exception $e)
		{
		}
	}
?>
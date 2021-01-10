<?php
	function endsWith( $str, $sub ) {
		return ( substr( $str, strlen( $str ) - strlen( $sub ) ) == $sub );
	}
	
	function printAarray($title, $a)
	{
		title3($title);
		$first = true;
		foreach($a as $k => $v)
		{
			if(!$first)
				echo "<br /> ";
			
			if(is_array($v))
			{
				echo $k . "<br />";
				var_dump($v);
			}
			else
				echo $k . "=>" . $v;
			
			$first = false;
		}
		echo br();
	}
	
	function title3($msg)
	{
		echo "<h3>" . $msg . "</h3>";
	}
	
	function bo($msg)
	{
		return "<b>" . $msg . "</b>";
	}
	function br()
	{
		return "<br />";
	}		
?>
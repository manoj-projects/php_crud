<?php
	
	class MySQL{
		var $server = "localhost";
		var $username = "root";
		var $password = "";
		var $dbname = "test";
		
		var $conn = null;
		
		function connect()
		{
			if(!isset($this->conn))
				$this->conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);
				
			// Check connection
			if ($this->conn->connect_error) {
				die("Connection failed: " . $this->conn->connect_error);
			} 
		}
		
		function close()
		{
			if(isset($this->conn))
				$this->conn->close();
		}
		
		function GetDataTable($sql)
		{
			$this->connect();
			$res = $this->conn->query($sql);
			$this->conn->close();
			
			return $res;
		}
		
		function Execute($sql)
		{
			// echo $sql;
			
			$this->connect();
			try{
				$res = $this->conn->query($sql);
				if(!$res)
					die("Error occurred while executing MySQL Statement. " . $this->conn->error);
			}
			catch(Exception $e)
			{
				die("Error occurred while executing MySQL Statement. " . $e->getMessage());
			}
			finally{
				$this->conn->close();
			}
			return $res;
		}
	}	
?>
<?php


class createConnection //create a class for make connection
{
/*	var $host="localhost:3036";
	var $username="zionefcc_nemeji";    // specify the sever details for mysql
	var $password="KAddis3139";
	var $database="zionefcc_zionevangelical";
	var $myconn;*/
	
	var $host="localhost:3306";
    var $username="zionefcc";    // specify the sever details for mysql
    var $password="KS1459btf@Getabet";
    var $database="zionefcc_zionevangelical";
    var $myconn;

    function connectToDatabase() // create a function for connect database
    {

        $conn= mysql_connect($this->host,$this->username,$this->password);

        if(!$conn)// testing the connection
        {
          //  die ("Cannot connect to the database"); 
            
            $Message = urldecode("Cannot connect to the database");
            header("Location:RegisterChoir.php? Message= $Message");
            
            exit();
        }

        else
        {

            $this->myconn = $conn;

        }

        return $this->myconn;

    }

    function selectDatabase() // selecting the database.
    {	
    	mysql_query("SET NAMES utf8");
        mysql_select_db($this->database);  //use php inbuild functions for select database

        if(mysql_error()) // if error occured display the error message
        {

            //echo "Cannot find the database ".$this->database;
            
           $Message = urldecode("Cannot find the database ".$this->database);
            header("Location:RegisterChoir.php? Message= $Message");
            
            exit();

        }
       
    }

    function closeConnection() // close the connection
    {
        mysql_close($this->myconn);

    }

}

?>
<?php

session_start();
$username = $_POST['username'];

$password = $_POST['password'];

if($username&&$password)
   {
    $mysql_host = 'local';

    $mysql_user = 'root';

    $mysql_pass = '';

    $mydb = 'sign11';    
     
     $link = mysql_connect($mysql_host, $mysql_user,$mysql_pass,$mydb) or die("Couldn't connect to database!"); 

       @mysql_select_db ($mydb) or die("Couldn't find database");
       
       $query = mysql_query("SELECT * FROM users WHERE username='$username'");
       
       $numrows = mysql_num_rows($query);
       
       if($numrows!==0)
       {
           while($row = mysql_fetch_assoc($query))
           {
               $dbusername = $row['username'];
               $dbpassword = $row['password'];
           }
           
           if($username==$dbusername && $password==$dbpassword)
           {
               echo "You are logged in!!";
               @$_SESSION['username']= $username;
           }
           else
           {
               echo"Your passowrd is incorrect!";
           }
       }
       else{
       die("that user doesn't exists!");
   }
   }
   else{
       die("Please enter a username and password!");
   }

?>

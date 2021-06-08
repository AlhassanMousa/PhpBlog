<?php
// create connection
define('ROOT_URL','http://localhost/phpexamples/phpblog/');

$conn = mysqli_connect('localhost' , 'root' , 'Hassan' , 'phpblog');
 
//check connection
if(mysqli_connect_errno()){
    //Connection Failed
    echo 'Failed to connect to MySQL'. mysqli_connect_errno();

}

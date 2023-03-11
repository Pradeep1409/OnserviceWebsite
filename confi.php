<?php


$con=mysqli_connect('localhost','root','','logindetails');

 if(mysqli_connect_errno())
{
    echo "database bot connected";
}
else{
    echo "database is conntect";
}


?>
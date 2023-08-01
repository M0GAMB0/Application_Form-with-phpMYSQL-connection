<?php
$conn = mysqli_connect('localhost','root','','task_1');
if($conn){
    // echo "Connection Succsssfull!!!";
}
else{
    echo "Connection Failed".mysqli_connect_error();
}

?>
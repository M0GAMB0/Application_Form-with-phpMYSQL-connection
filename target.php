<?php
include('connect.php');

if($_POST['submit']){
     $fname=$_POST['fname'];
     $lname=$_POST['lname'];
     $dob=$_POST['date'];
     $gender=$_POST['gender'];
     $city=$_POST['city'];
     $country=$_POST['country'];
     $qualification=$_POST['qualification'];
     $workExp=$_POST['exp'];
     $mobile=$_POST['phone'];
     $email=$_POST['email'];
     $emi=$_POST['emi'];

//     $fnameerr=$lnameerr=$doberr=$gendererr=$cityerr=$countryerr=$qualificationerr=$workExperr=$mobileerr=$emailerr=$emierr="";
//     $fname=$lname=$dob=$gender=$city=$country=$qualification=$workExp=$mobile=$email=$emi="";

//     if(empty($_POST['fname'])){
//         $fnameerr="Please Enter valid First Name";
//     }
//     else{
//         $fname=test_input($POST['fname']);
//         if(!preg_match('/[a-z\s]/i',$fname)){
//             $fnameerr="Only letters no numbers, characters and whitespaces.";
//         }
//     }
//     if(empty($_POST['lname'])){
//         $lnameerr="Please Enter valid Last Name";
//     }
//     else{
//         $lname=test_input($POST['lname']);
//         if(!preg_match('/[a-z\s]/i',$lname)){
//             $lnameerr="Only letters no numbers, characters and whitespaces.";
//         }
//     }
//     if(empty($_POST['date'])){
//         $doberr="Please enter date of birth!!!!";
//     }
//     else{
//         $dob=test_input($_POST['date']);
//         if(!preg_match('~(0[1-9]|1[012])[-/](0[1-9]|[12][0-9]|3[01])[-/](19|20)\d\d~',$dob)){
//             $doberr="Only Enter DOB in mm/dd/yyyy format";
//         }
//     }
//     if(empty($_POST['gender'])){
//         $gendererr="Please enter your gender!!!";
//     }
//     else{
//         $gender=test_input($_POST['gender']);
//     }
//     if(empty($_POST['city'])){
//         $cityerr="Please Enter valid City Name";
//     }
//     else{
//         $city=test_input($POST['city']);
//         if(!preg_match("/^[a-zA-Z]*$/",$city)){
//             $cityerr="Only letters no numbers, characters and whitespaces.";
//         }
//     }
//     if(empty($_POST['country'])){
//         $countryerr="Please Choose your country!!!";
//     }
//     else{
//         $country=test_input($_POST['country']);
//     }
//     if(empty($_POST['qualification'])){
//         $qualificationerr="Please Choose your qualification!!!";
//     }
//     else{
//         $qualification=test_input($_POST['qualification']);
//     }
//     if(empty($_POST['exp'])){
//         $workExperr="Please enter valid work experience in years";
//     }
//     else{
//         $workExp=test_input($POST['exp']);
//         if(!preg_match("/^\\d+$/",$workExp)){
//             $workExperr="Only numbers no letters, characters and whitespaces.";
//         }
//     }
//     if(empty($_POST['phone'])){
//         $mobileerr="Please enter valid mobile number";
//     }
//     else{
//         $mobile=test_input($_POST['phone']);
//         if(!preg_match("/^\\+?[1-9][0-9]{9}$/",$mobile)){
//             $mobileerr="Please enter 10 digit valid number";
//         }
//     }
//     if(empty($_POST['email'])){
//         $emailerr="Please enter valid email id";
//     }
//     else{
//         $email=test_input($_POST['email']);
//         if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email)){
//             $emailerr="Please entervvalid email...";
//         }
//     }
//     if(empty($_POST['emi'])){
//         $emierr="Please Choose valid emi month!!!";
//     }
//     else{
//         $emi=test_input($_POST['emi']);
//     }
//     echo test_input($fname);
// }
// function test_input($data){
//     $data=trim($data);
//     $data=stripslashes($data);
//     $data=htmlspecialchars($data);
//     return $data;
// }
// if(!empty($fnameerr) ||  !empty($lnameerr) || !empty($doberr) || !empty($gendererr) || !empty($cityerr) || !empty($countryerr) || !empty($qualificationerr) || !empty($workExperr) || !empty($mobileerr) || !empty($emailerr) || !empty($emierr)){
// header("Location: index.php?fnameerr=$fnamerr&lnameerr=$lnamerr&doberr=$doberr&gendererr=$gendererr&cityerr=$cityerr&countryerr=$countryerr&qualificationerr=$qualificationerr&workExperr=$workExperr&mobileErr=$mobileErr&emailerr=$emailerr&emierr=$emierr");
}


if($_POST['user_id']==-1){
    saveInDB($fname,$lname,$dob,$gender,$city,$country,$qualification,$workExp,$mobile,$email,$emi);
    echo "Inserted to DB";
    header("Location: index.php");
}
else {
    $user_id = $_POST['user_id'];
    updateUser($fname,$lname,$dob,$gender,$city,$country,$qualification,$workExp,$mobile,$email,$emi,$user_id);
    header("Location: index.php");
}

function updateUser($fname,$lname,$dob,$gender,$city,$country,$qualification,$workExp,$mobile,$email,$emi,$id){
    global $conn;
    $query = "UPDATE users SET firstName='$fname', lastName='$lname', dob='$dob', gender='$gender', city='$city', country='$country', qualification='$qualification', workExp='$workExp', phNo='$mobile',emailID='$email', emi='$emi'  WHERE id=$id";
    return mysqli_query($conn, $query);
}
function saveInDB($fname,$lname,$dob,$gender,$city,$country,$qualification,$workExp,$mobile,$email,$emi){
    global $conn;
    $query="INSERT INTO users(firstName,lastName,dob,gender,city,country,qualification,workExp,phNo,emailID,emi) VALUES ('$fname','$lname','$dob','$gender','$city','$country','$qualification',$workExp,$mobile,'$email',$emi)";
    $res=mysqli_query($conn,$query);
    return $res;
}
?>

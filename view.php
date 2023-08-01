<?php 
include('connect.php');
$query="SELECT * FROM users";
$res=mysqli_query($conn,$query);
if($res){
  $users=mysqli_fetch_all($res, MYSQLI_ASSOC);
}
else{
  echo "Table fetch failed";
}

if(isset($_GET['delete'])){
  deleteQuery($_GET['delete']);
  header("Location: view.php");
}
function deleteQuery($id){
  global $conn;
  $query="DELETE FROM users WHERE id=$id";
  $res=mysqli_query($conn,$query);
  return $res;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
    <div class="table-responsive">
        <table class="table table-dark table-striped">
    <thead>
        <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col">Gender</th>
      <th scope="col">City</th>
      <th scope="col">Country</th>
      <th scope="col">Qualification</th>
      <th scope="col">Work Experience</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Email ID</th>
      <th scope="col">EMI (IN MONTHS)</th>
      <th scope="col">Operations</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($users as $key=>$user){?>
        <tr>
      <th scope="row"><?php echo $key+1?></th>
      <td><?php echo $user['firstName']?></td>
      <td><?php echo $user['lastName']?></td>
      <td><?php echo $user['dob']?></td>
      <td><?php echo $user['gender']?></td>
      <td><?php echo $user['city']?></td>
      <td><?php echo $user['country']?></td>
       <td><?php echo $user['qualification']?></td>
       <td><?php echo $user['workExp']?></td>
       <td><?php echo $user['phNo']?></td>
       <td><?php echo $user['emailID']?></td>
       <td><?php echo $user['emi']?></td>
       <td>
        <a href="index.php?edit=<?php echo $key; ?>"class="btn btn-success btn-sm">Edit</a>
          <a href="view.php?delete=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="deleteUser(event)">Delete</a>
        </td>
    </tr>
    <?php }?>
    </tbody>
</table>
    </div>
    <script>
      const deleteUser=(event)=>{
          event.preventDefault();
          if(confirm("Are you sure you want to delete?")){
            window.location.href = event.target.href;
          }
      }
    </script>
</body>
</html>
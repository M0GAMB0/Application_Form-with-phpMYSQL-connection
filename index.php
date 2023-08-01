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
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Task_1</title>
    <link href="style.css" rel="stylesheet" />
  </head>
  <body>
    <div class="header">Application Form</div>
    <div class="sub-header">
      Fill the form below and our Career Advisor will contact you
    </div>
    <form
      action="target.php"
      method="POST"
      id="form-elements"
      onsubmit="return onSubmit()"
    >
    <input type="hidden" name="user_id" id="userId" value="<?php echo isset($_GET['edit']) ? $users[$_GET['edit']]['id'] : '-1';?>">
      <div class="inputs">
        <label for="fname">First Name:*</label>
        <input
          type="text"
          name="fname"
          id="fname"
          onkeyup="nameValidation(fname)"
          value="<?php echo isset($_GET['edit'])?$users[$_GET['edit']]['firstName'] : '';?>"
        />
        <span  style="color:red"><?php if(isset($_GET['fnameerr'])){echo $_GET['fnameerr'];} ?></span>
      </div>
      <div class="inputs">
        <label for="lname">Last Name:*</label>
        <input
          type="text"
          name="lname"
          id="lname"
          onkeyup="nameValidation(lname)"
          value="<?php echo isset($_GET['edit'])?$users[$_GET['edit']]['lastName']:'';?>"
        />
         <span  style="color:red"><?php if(isset($_GET['lnameerr'])){echo $_GET['lnameerr'];} ?></span>
      </div>
      <div class="inputs">
        <label for="date">Date of Birth:*</label>
        <input type="date" name="date" id="date" max="2012-12-31" min="1980-01-01" value="<?php echo isset($_GET['edit'])?$users[$_GET['edit']]['dob']:'';?>"/>
         <span  style="color:red"><?php if(isset($_GET['doberr'])) {echo $_GET['doberr']; }?></span>
      </div>
      <div class="inputs">
        <label for="gender">Gender:*</label>
        <select id="gender" name="gender" value="<?php echo isset($_GET['edit'])?$users[$_GET['edit']]['gender']:'';?>">
          <option disabled selected value="">select</option>
          <option value="Male" <?php if(isset($_GET['edit']) && $users[$_GET['edit']]['gender']==='Male') echo 'selected'; ?>>Male</option>
          <option value="Female" <?php if(isset($_GET['edit']) && $users[$_GET['edit']]['gender']==='Female') echo 'selected'; ?>>Female</option>
        </select>
         <span  style="color:red"><?php if(isset($_GET['gendererr'])){echo $_GET['gendererr'];} ?></span>
      </div>
      <div class="inputs">
        <label for="city">City:*</label>

        <input type="text" id="city" name="city"  onkeyup="nameValidation(city)" value="<?php echo isset($_GET['edit'])?$users[$_GET['edit']]['city']:'';?>"/>
         <span  style="color:red"><?php if(isset($_GET['cityerr'])){echo $_GET['cityerr'];} ?></span>
      </div>
      <div class="inputs">
        <label for="country">Country:*</label>

        <select id="country"  name="country" value="<?php echo isset($_GET['edit'])?$users[$_GET['edit']]['country']:'';?>">
          <option disabled selected value="">select</option>
          <option value="India" <?php if(isset($_GET['edit']) && $users[$_GET['edit']]['country']==='India') echo 'selected'; ?>>India</option>
          <option value="China"  <?php if(isset($_GET['edit']) && $users[$_GET['edit']]['country']==='China') echo 'selected'; ?>>China</option>
          <option value="Taiwan"  <?php if(isset($_GET['edit']) && $users[$_GET['edit']]['country']==='Taiwan') echo 'selected'; ?>>Taiwan</option>
          <option value="Japan"  <?php if(isset($_GET['edit']) && $users[$_GET['edit']]['country']==='Japan') echo 'selected'; ?>>Japan</option>
          <option value="Nepal"  <?php if(isset($_GET['edit']) && $users[$_GET['edit']]['country']==='Nepal') echo 'selected'; ?>>Nepal</option>
        </select>
         <span  style="color:red"><?php if(isset($_GET['countryerr'])){echo $_GET['countryerr'];} ?></span>
      </div>
      <div class="inputs">
        <label for="qualification">Highest Qualification:*</label>
        <select id="qualification" name="qualification" value="<?php echo isset($_GET['edit'])?$users[$_GET['edit']]['qualification']:'';?>">
          <option disabled selected value="">select</option>
          <option value="Bachelor"  <?php if(isset($_GET['edit']) && $users[$_GET['edit']]['qualification']==='Bachelor') echo 'selected'; ?>>Bachelor's</option>
          <option value="Masters"  <?php if(isset($_GET['edit']) && $users[$_GET['edit']]['qualification']==='Masters') echo 'selected'; ?>>Master's</option>
          <option value="Diploma"  <?php if(isset($_GET['edit']) && $users[$_GET['edit']]['qualification']==='Diploma') echo 'selected'; ?>>Diploma</option>
          <option value="Other"  <?php if(isset($_GET['edit']) && $users[$_GET['edit']]['qualification']==='Other') echo 'selected'; ?>>Other</option>
        </select>
         <span  style="color:red"><?php if(isset($_GET['qualificationerr'])){echo $_GET['qualificationerr'];} ?></span>
      </div>
      <div class="inputs">
        <label for="exp">Work Experience (years)*:</label>
        <input
          class="abinput"
          id="exp"
          type="number"
          name="exp"
          onkeyup="expNumber()"
          value="<?php echo isset($_GET['edit'])?$users[$_GET['edit']]['workExp']:'';?>"
        />
         <span  style="color:red"><?php if(isset($_GET['workExperr'])){echo $_GET['workExperr'];} ?></span>
      </div>
      <div class="inputs">
        <label for="phone">Phone Number:*</label>
        <input
          name="phone"
          type="tel"
          id="phone"
          placeholder="e.g. 9XXXXXXXXX"
          onkeyup="phoneValidation()"
          value="<?php echo isset($_GET['edit'])?$users[$_GET['edit']]['phNo']:'';?>"
        />
         <span  style="color:red"><?php if(isset($_GET['mobileerr'])){echo $_GET['mobileerr'];} ?></span>
      </div>
      <div class="inputs">
        <label for="email">Email Id:*</label>
        <input id="email" type="email" name="email" onkeyup="validateEmail()" value="<?php echo isset($_GET['edit'])?$users[$_GET['edit']]['emailID']:'';?>"/>
        <span id="emailWarning" style="color:red"></span>
        <span  style="color:red"><?php if(isset($_GET['emailerr'])){echo $_GET['emailerr'];} ?></span>
      </div>
      <div class="inputs">
        <label for="emi">Want to pay in EMI:*</label>
        <select id="emi" name="emi" value="<?php echo isset($_GET['edit'])?$users[$_GET['edit']]['emi']:'';?>">
          <option disabled selected value="">select</option>
          <option value="3"  <?php if(isset($_GET['edit']) && $users[$_GET['edit']]['emi']==='3') echo 'selected'; ?>>3 months</option>
          <option value="6"  <?php if(isset($_GET['edit']) && $users[$_GET['edit']]['emi']==='6') echo 'selected'; ?>>6 months</option>
          <option value="12"  <?php if(isset($_GET['edit']) && $users[$_GET['edit']]['emi']==='12') echo 'selected'; ?>>12 months</option>
        </select>
        <span  style="color:red"><?php if(isset($_GET['emierr'])){echo $_GET['emierr'];} ?></span>
      </div>
      <div class="inputs terms">
        <input
          type="checkbox"
          id="tandc"
          class="checkmark"
          style="display: inline; width: 2%; padding: 2px"
        />
        <p style="font-size: smaller; display: inline">
          I authorize "Eduonix learning solutions pvt ltd" and its
          representatives to call, SMS, Email or Whatsapp me.
        </p>
      </div>
      <div class="inputs subButton">
        <input type="submit" value="<?php echo isset($_GET['edit']) ? 'Update' : 'Create'; ?> " name="submit" />
      </div>
    </form>
    <script src="script.js"></script>
  </body>
</html>

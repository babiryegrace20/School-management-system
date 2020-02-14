<div class="login">

        <div class="login-screen">
            <div class="app-title">
          <strong>STMS REGISTER</strong>
            </div>

        <form class="form" action="?page=register.php" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">

                <div class="login-form" style="padding-top: 50px;">

            <div class="control-group">
              <input name="fname" placeholder="Enter First name" type="text" class="form-control" required="required">
                    </div>

            <div class="control-group">
              <input name="lname" placeholder="Enter Last name" type="text" class="form-control" required="required">
            </div>

            <div class="control-group">
              <input  name="username" placeholder="Enter Username" type="text" class="form-control form-control-lg rounded-0" id="uname1" required="">
            </div>

            <div class="control-group">
                <input name="password" placeholder="Enter password" type="password" class="form-control form-control-lg rounded-0" id="pwd1" required="" autocomplete="new-password">
            </div>

            <div class="control-group">
                <input name="password2" placeholder="Confirm password" type="password" class="form-control form-control-lg rounded-0" id="pwd1" required="" autocomplete="new-password">
            </div>

            <div class="control-group">
              <input name="email" placeholder="Enter Email" type="text" class="form-control" id="uname1" required="required">
                    </div>


            <button type="submit" class="btn btn-primary btn-large btn-block">REGISTER</button>
            
            <br/><p class="alert alert-info">If you already have an account, please <a href="?page=login.php"><b>Log in</b></a> here.</p>>
              </div>
        </form>
        </div>
    </div>

<!-- Post to database here -->
<?php

if ($_POST) {

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$username=$_POST['username'];
	$pass=md5($_POST['password']);
	$secpass=md5($_POST['password2']);
	$email=$_POST['email'];
	$type="admin";



if($fname!=null&&
	$lname!=null&&
	$username!=null&&
	$pass!=null&&
	$secpass!=null&&
	$email!=null){


if($pass==$secpass){

				$r=mysqli_query($conn,"SELECT *FROM user");
				if(mysqli_num_rows($r)>0){

							while ($row=mysqli_fetch_assoc($r)) {
								
								$user=$row['username'];
								$password=$row['password'];
							}

									if($user==$username||$password==$pass){
										echo "<p class='alert alert-danger'>Error: Username or password already exists</p>";
									}
						} 


				$p="INSERT INTO user (Fname, Lname, username, usertype, email_address, password) VALUES ('$fname', '$lname', '$username', '$type', '$email', '$pass')";
				$q=mysqli_query($conn, $p);

						if(!$q){
							echo "<p class='alert alert-danger'>Failed to register</p><br> Error ".mysqli_error($q);
						}
						else{
							echo "<p class='alert alert-info' style='position: top;'>Thanks for registering, you can now log in!</p>";
							echo '<meta http-equiv="refresh" content="2;url=?page=login.php"/>'; 
						}

		}else{
			echo "<p class='alert alert-danger'>Please enter matching passwords!<p>";
		}

	}else{
		echo "<p class='alert alert-danger'>Please fill in all fields!<p>";
	}
}

?>
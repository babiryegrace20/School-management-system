<?php if(isset($_SESSION['username'])) {

	echo '<p class="alert alert-danger">You are already logged in, please log out first!<p>';
	echo '<meta http-equiv="refresh" content="2;url=?page=home.php" />'; 
}else {?>

 <div class="login">

  		<div class="login-screen">
  			<div class="app-title">
          <strong>LOGIN</strong>
  			</div>

        <form class="form" action="?page=login.php" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
    			<div class="login-form" style="padding-top: 50px;">
    				
    				<div class="control-group">
              <input  name="username" placeholder="Enter Username" type="text" class="form-control form-control-lg rounded-0" id="uname1" required="">
    				<label class="login-field-icon fui-user" for="uname1">Username</label>
    				</div>

            <div class="control-group">
	              <input name="password" placeholder="Enter password" type="password" class="form-control form-control-lg rounded-0" id="pwd1" required="" autocomplete="new-password">
	              <label class="login-field-icon fui-user">Password</label>
    		</div>

            <button type="submit" class="btn btn-primary btn-large btn-block">Login</button>
            
           <br/><p class="alert alert-info">If you have no account, <a href="?page=register.php"><b>register</b></a> here</p>
  			  </div>
        </form>
  		</div>
  	</div>

<?php 

	if($_POST){
	$usa=$_POST['username'];
	$passwad=md5($_POST['password']);

	if($usa!=null&&
	$passwad!=null){

		$m = "SELECT * FROM user WHERE username = '$usa' AND password = '$passwad' ";
	  	$n = mysqli_query($conn, $m);
	  	
		  	if(mysqli_num_rows($n) == 1) {
			  		    
			      $data = mysqli_fetch_assoc($n);	

					      if($data['usertype']=="admin"){

							echo '<meta http-equiv="refresh" content="0;url=?page=home.php" />'; 

					       	$_SESSION['username'] = $usa;
					        $_SESSION['usertype'] = $data['usertype'];   
					        exit;
					      	}

						}
					else {
						echo "<p class='alert alert-danger'>Error: Username or password does not exist!</p>";
					}

		}else{
			echo "<p class='alert alert-danger'>Please input both user name and password!</p>";
		}

	}
}

?>
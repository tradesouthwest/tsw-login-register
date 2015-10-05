<div class="clearfix"></div>
              
    <form action="register.php" method="post" id="fileForm" class="well" role="form">
        <fieldset>
            <legend>Valid information is required to register. <span class="req"><small> required *</small></span></legend>

	    <p><span class="req">* </span><label for="phonenumber">Phone Number: </label><br>
            <input required type="text" name="phonenumber" id="phone" class="form-control phone" maxlength="28" onkeyup="validatephone(this);" placeholder="not used for marketing"/> </p>
	 	 
            <p><span class="req">* </span><label>First name:</label><br>
            <input class="form-control" type="text" name="firstname" id = "txt" onkeyup = "Validate(this)" required /></p>
<div id="errFirst"></div>    

            <p><span class="req">* </span><label>Last name:</label><br>
            <input class="form-control" type="text" name="lastname" id = "txt" onkeyup = "Validate(this)" placeholder="hyphen or single quote OK" required /> </p>
<div id="errLast"></div>

            <p><span class="req">* </span><label for="email">Email Address: <small>This will be your login user name</small></label><br>
            <input class="form-control" required type="text" name="email" id = "email"  onchange="email_validate(this.value);" />  </p>
<div class="status" id="status"></div>

  <p><span class="req">* </span><label>User name:</label><br>
            <input class="form-control" type="text" name="username" id = "txt" onkeyup = "Validate(this)" placeholder="minimum 6 letters" required /> </p>
<div id="errLast"></div>

            <p><span class="req">* </span><label for="password">Password:</label><br>
            <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" /> </p>
            <p><span class="req">* </span><label for="password">Password:</label><br>
            <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Enter again to validate"  id="pass2" onkeyup="checkPass(); return false;" />
<span id="confirmMessage" class="confirmMessage"></span></p>
            
            <?php $date_entered = date('m/d/Y H:i:s'); ?>
            <input type="hidden" value="<?php echo $date_entered; ?>" name="dateregistered">
            <input type="hidden" value="0" name="activate" />
<hr>
<input type="checkbox" required name="terms" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms">
                      <label for="terms">I agree with the <a href="terms.php" title="You may read our terms and conditions by clicking on this link">terms and conditions</a> for Registration.</label><span class="req">* </span>

                      <p><input class="btn btn-success" type="submit" name="submit_reg" value="Register"></p>

                      <h5>You will receive an email to complete the registration and validation process. </h5>
                      <h5>Be sure to check your spam folders. Member validation process may take a few minutes.</h5>
 

          </fieldset>
      </form><!--ends-registercard-form-->
<script type="text/javascript">
  document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");
</script>

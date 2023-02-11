<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Main page</title>
    <style>
      * {
        margin: 0;
        padding: 0;
      }
      #testPassword {
        height: 50vh;
        background-color: green;
      }
      #GeneratePassword{
        height: 50vh;
        background-color: green;
      }
      .passwordCopy{
        background-color: green;
      }
      .passwordParam{
        background-color: green;
      }
      .center {
        display: flex;
        justify-content: center;
        align-items: center;
      }
      #pass {
        width: 30vw;
        height: 3em;
        border: 2px solid black;
        border-radius: 3rem 0 0 3rem;
      }
      #password {
        width: 30vw;
        height: 4em;
        border: 2px solid black;
      }
      .btn {
        height: 3.3em;
        border: 2px solid black;
        border-radius: 0 3rem 3rem 0;
        width: 5vw;
        margin: -0.5em;
      }
      .button {
        height: 4.4em;
        border: 2px solid black;
        border-radius: 0 3rem 3rem 0;
        width: 5vw;
        margin: -0.5em;
      }
      .Message {
        font-size: 5.15em;
        color: white;
      }
      .grid{
        display:grid;
        
      }
      .new{
        margin-top:1em;
        padding: 1em;
        border: 1px solid black;
        border-radius: 2rem;
      }
      input{
        padding: 0 10px;
      }
      #GeneratePassword>.container{
        width: 80%;
        height: 60%;
        background-color: #FFF;
      }
    </style>
  </head>
  <body>
    <div id="testPassword" class="center">
      <div class="container">
        <div class="Message center">
          <span>Check my Password?</span>
        </div>
        <div class="form center">
          <form action="Main.php" method="post">
            <input type="text" name="pass" id="pass"required/>
            <input type="submit" value="Submit" class="btn" />
          </form>
        </div>
        <div class="center">
          <h1>
            <?php require 'checkPassword.php'; 
            if (isset($_POST['pass'])) {
              echo ($_POST["pass"]) . " is " . checkPasswordSecurity($_POST["pass"]) . " as a password";
            }?>
          </h1>
        </div>
      </div>
    </div>
    <div class="passwordCopy">  
        <div class="center">
          <h4>
            Here is a secure password for you.
          </h4>
        </div>
        <div class= "center">
          <input type="text" name="password" id="password" value="<?php generateNewPassword();?>">
          <button class="button" onclick="copyFunction()">Copy</button>
        </div>
        <div class="center">
          <button class = "new" form="passwordProp">Generate new password</button>
        </div>
    </div>
    <div id="GeneratePassword" class="center">
        <div class="container">
          <div class="box">
              <div style="border-bottom: 1px solid gray; width:100%;">
                  <h3>Customize password</h3>
                  <hr>
              </div>
              <form id="passwordProp" name="form_A" action="Main.php" method="POST" class="grid">
                <div>
                  <span>Password Length</span>
                  <div>
                    <input type="range" name="PLength" id="number" max=50 value=12 onchange="changeSlide()">
                    <input type="number" name="choosen" id="chosen" value="12" style="width:3em;">
                  </div>
                </div>
                <div style="grid-column:2;">
                  <input type="checkbox" name="LowerCase" id="lcase" checked><label for="lowerCase">Lower Case</label>
                  <br>
                  <input type="checkbox" name="UpperCase" id="ucase" checked><label for="upperCase">Upper Case</label>
                  <br>
                  <input type="checkbox" name="Number" id="num" checked><label for="Number">Numbers</label>
                  <br>
                  <input type="checkbox" name="Special" id="spec" checked><label for="Special">Special Characters</label>
                </div>
                <div>

                </div>
              </form>
          </div>
        </div>
    </div>
    <div class="center passwordParam">
      <div class="container">
        <span>It checks for following parameter in password</span>
        <ul>
          <li>has 8 minimum characters</li>
          <li>contains at least one lowercase, uppercase, number and special characters</li>
        </ul>
      </div>
    </div>
  <script>
    function copyFunction() {
      var copyText = document.getElementById("password");
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      navigator.clipboard.writeText(copyText.value)
    }

    var slider = document.getElementById("number");
    var output = document.getElementById("chosen");
    function changeSlide() {
      output.value = slider.value;
    }
  </script>
  </body>
</html>

<?php
	$lowerCase = 'abcdefghijklmnopqrstuvwxyz';
	$upperCase = strtoupper($lowerCase);
	$number = '0123456789';
	$special = '!@#$%^&*()_+,.<>/?;:[]{}\|';
	function password_generate($chars) 
	{
		global $lowerCase,$upperCase,$number,$special;
		$data = $lowerCase . $upperCase . $number . $special;
		echo substr(str_shuffle($data), 0, $chars);
	}
	function generateNewPassword(){
		global $lowerCase,$upperCase,$number,$special;
    if(!isset($_POST["PLength"])){
      echo("A");
      password_generate(12);
    }else{
      $len = $_POST["PLength"];
      $data = null;
      if(isset($_POST["LowerCase"])){
        $data = $data . $lowerCase;
      }
      if(isset($_POST["UpperCase"])){
        $data = $data . $upperCase;
      }
      if(isset($_POST["Number"])){
        $data = $data . $number;
      }
      if(isset($_POST["Special"])){
        $data = $data . $special;
      }
      echo substr(str_shuffle($data), 0, $len);
    }
	}
	
?>
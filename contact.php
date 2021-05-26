<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$database="greenstar_db";
if(isset($_POST['send']))
{
  $name = $_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $msg=$_POST['msg'];

  //create connection; 
  $conn = mysqli_connect($serverName, $userName, $password,$database);

    // check connection
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO message_tb VALUES(null,'$name','$email.','$phone.','$msg')";

    if ($conn->query($sql) === TRUE) 
    {
      echo "<script>alert('Message Sent Successfull.');</script>";
    } 
    else 
    {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
$active = 'contact';
require_once 'header.php';
?>

  <br><br>

<div class="container-fluid bg-3 ">    
   <div class="row">
      
      <div class="col-sm-12">
        <div class="col-sm-1"></div>
        <div class="col-sm-4">
          <h2>Hours of Operation</h2>
          <br>
          <div class="col-sm-12 text-center">
            <div class="business-hours">
                <h2 class="title">Opening Hours</h2>
                <ul class="list-unstyled opening-hours text-center">
                    <li>Sunday <span class="pull-right">Closed</span></li>
                    <li>Monday <span class="pull-right">9:00-22:00</span></li>
                    <li>Tuesday <span class="pull-right">9:00-22:00</span></li>
                    <li>Wednesday <span class="pull-right">9:00-22:00</span></li>
                    <li>Thursday <span class="pull-right">9:00-22:00</span></li>
                    <li>Friday <span class="pull-right">9:00-23:30</span></li>
                    <li>Saturday <span class="pull-right">14:00-23:30</span></li>
                </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-5 ">

              <div class="container-fluid"> 
                  <div class="login-dark">
                      <form action="contact.php" onsubmit="return validateForm()"  name="form1" id="contact-form" method="post">
                            <h1 class="color-white text-center">Contact us</h1>
                            <div class="form-group">
                                <label for="usr">Name</label><br>
                                <input type="text" name="name" class="form-control" id="usr">
                            </div>
                              <div class="form-group">
                                <label for="Email">Email Address</label><br>
                                <input type="email" name="email" class="form-control" id="Email">
                              </div> 
                              <div class="form-group">
                                <label for="phone">Phone</label><br>
                                <input type="number" name="phone" class="form-control" id="phone">
                              </div> 
                               
                               <div class="form-group">
                                <label for="comment">Message</label><br>
                                <textarea class="form-control" name="msg" rows="3" id="comment"></textarea>
                              </div>
                                <div class="form-group">
                                <button class="btn btn-primary btn-block" name="send" type="submit">Send</button>
                            </div>
                      </form>                  
              </div>
          </div>
        </div>

      </div>

  </div>
  <br><br>

  

	    <div class="mapouter">
	    <div class="gmap_canvas">
	    <iframe width="100%" height="333" id="gmap_canvas" src="https://maps.google.com/maps?q=%203%20Mair%20Street%20East%20Ballarat%20Central%2C%20VIC%203350&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
	    </iframe>
	    <a href="https://2piratebay.org"></a>
	    </div>
	    </div>
	 

</div>
</div><br>

<footer>
  <div class="container-fluid text-center">
    <div class="row">
      <div class="col-sm-4">
        <a href="home.html"><img class="logo" src="images/logo.png"></img></a>
      </div>
      <div class="col-sm-4">
      <h2 class="footer-heading"><strong>Contact details</strong></h2> 
          <p> 
            3 Mair Street East<br>
            Ballarat Central, VIC 3350<br>
            03 5331 9118 |0426 937 007<br>
            info@greenstarvaletcarwash.com.au
          </p>
      </div>
      <div class="col-sm-4">
        <h2 class="footer-heading"><strong>Follow Us</strong></h2>
         <a href="https://www.facebook.com/greenstarvalet/" target="_blank">
          <i class="fa fa-facebook-square "></i> Facebook
        </a>

      </div>
    </div>
  </div>
</footer>
<script type="text/javascript">
  // highlight current day on opeining hours
$(document).ready(function() {
$('.opening-hours li').eq(new Date().getDay()).addClass('today');
});
  function validateForm() {
  var name = document.forms["form1"]["name"].value;
  var email= document.forms["form1"]["email"].value;
  var phone= document.forms["form1"]["phone"].value;
  var msg= document.forms["form1"]["msg"].value;
  if (name == "") 
  {
    alert("Name must be filled out");
    return false;
  }
  else if (email == "") 
  {
    alert("Email must be filled out");
    return false;
  }
  else if (phone == "") 
  {
    alert("Phone number must be filled out");
    return false;
  }
  else if (msg == "") 
  {
    alert("Message must be filled out");
    return false;
  }
} 
</script>
</body>
</html>

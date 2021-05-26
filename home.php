<?php
  $active = 'home';
  require_once 'header.php';
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
       <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      
      <div class="item active">
        <img  src="./images/platinum.jpg" id="banner" alt="Car Wash Picture.">  
      </div>

      <div class="item">
        <img  src="./images/car_wash_service.jpg" id="banner" alt="Car Wash Picture.">  
      </div>
      <div class="item">
        <img  src="./images/slider1.jpg" id="banner" alt="Car Wash Picture.">  
      </div>
      <div class="item">
        <img  src="./images/slider2.jpg" id="banner" alt="Car Wash Picture.">  
      </div>
      <div class="item">
        <img  src="./images/slider3.jpg" id="banner" alt="Car Wash Picture.">  
      </div>
      <div class="item">
        <img  src="./images/slider4.jpg" id="banner" alt="Car Wash Picture.">  
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
    
  
<div class="container-fluid bg-3 text-center"> 

  <div class="container text-center id="banner1">
  <h1>Greenstar Car Wash</h1> 
  <p>Greenstar Car Wash is a group of highly trained and professional automotive detailers with over a decade of experience in the industry. We specialize in prestige cars and have worked with brands like Mercedes, Porsche, Audi, BMW, Bentley etc. We are masters in pre sale detailing, scratch removal, paint protection including G-Technique, cut and high gloss polish, ceramic paint detailing etc </p> 
  <form>
    <div class="input-group">
      <input type="email" class="form-control" placeholder="Email Address" required>
      <div class="input-group-btn">
        <button type="button" class="btn btn-danger">Subscribe</button>
      </div>
    </div>
  </form>
</div>

  <br>

  
  <div class="container-fluid">
  <div class="row ">
    
    <div class="col-sm-4 ">
        <div class="set-border-brown ">
          <div class="panel-heading ">
              <h2>Wash Services</h2>
            </div>
            <div class="panel-body container-fluid" style="">
              <img src="./images/car_wash_service.jpg" class="img-responsive" style="width:100%" alt="Wash Services">
              <p>We’ll remove the dirt and grime from your paint, glass, plastic trims, wheels, chrome and exhaust tip. If you don’t often carry passengers and your interior doesn’t need to be cleaned, this may be all you need.</p>
            </div>            
        </div>
    </div>

    

    <div class="col-sm-4 ">
          <div class="set-border-brown ">
            <div class="panel-heading">
              <h2>Car Detailing</h2>
            </div>
            <div class="panel-body container-fluid" >
                    <img src="./images/car_detailing.jpg" class="img-responsive" style="width:100%" alt="Car Detailing">
                    <p>
                      Whether you’ve just purchased a used car, are selling your car, or just want to bring the life back into your car, our Full Detail will bring your vehicle to its best possible condition..
                    </p>
            </div>
              
          </div>
    </div> 
   

    <div class="col-sm-4 " >
        <div class="set-border-brown s">
          <div class="panel-heading">
              <h2>Paint Protection</h2>
            </div>
            <div class="panel-body container-fluid">
              <img src="./images/paint_protection.jpg" class="img-responsive" style="width:100%" alt="Paint Protection">
              <p>Whether you’ve just purchased a brand new car, or a pre-loved gem, you want to keep it looking as good as it did when you took the keys for the first time. We use high quality paint protection product to stay longer.</p>  
            </div>
        </div>
    </div> 

  </div>   
  </div>


</div>
  <hr>


<div class="container-fluid bg-3 text-center">    
   <div class="row">
    <div class="col-sm-6">
      <h1>Welcome to Greenstar Car Wash</h1>
      <p>
        Greenstar Car Wash is a group of highly trained and professional automotive detailers with over a decade of experience in the industry.

        We specialize in prestige cars and have worked with brands like Mercedes, Porsche, Audi, BMW, Bentley etc.

        We are masters in pre sale detailing, scratch removal, paint protection including G-Technique, cut and high gloss polish, ceramic paint detailing etc 
      </p>
      <!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
  <h2>SERVICES</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-off logo-small"></span>
      <h4>POWER</h4>
      
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-heart logo-small"></span>
      <h4>LOVE</h4>
      
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-lock logo-small"></span>
      <h4>JOB DONE</h4>
      
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-leaf logo-small"></span>
      <h4>GREEN</h4>
      
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-certificate logo-small"></span>
      <h4>CERTIFIED</h4>
      
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-wrench logo-small"></span>
      <h4 style="color:#303030;">HARD WORK</h4>
      
    </div>
  </div>
</div>
  <br>

      </div>
    <div class="col-sm-6">
    <h1>Offers on Greenstar car wash services</h1> 
      <img src="./images/offers.png" class="img-responsive" style="width:100%" alt="Offers">
    </div>
    
  </div>
</div>
</div><br>

<?php
  require_once 'footer.php'
?>

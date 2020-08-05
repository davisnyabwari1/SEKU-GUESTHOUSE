<?php include 'admin/includes/db.php'?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <meta http-equiv="X-UA compatible" content="i.e=edge">
        <title>SEKU GUEST HOUSE | CONTACTS</title>
        <link rel="stylesheet" href="css/contacts_style.css">
        <link rel="stylesheet" type="text/css" href="CSS\bootstrap.css"/>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
	    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	
    </head>
        <!-- header content -->
	<div class="container bg-white">
            <div class="text-center " mr-5>
                
        <img src="images\Sekulogo.png" height=100px/>
                <div class="text-success py-3">
         <h2 class="h1 heading-4">SEKU GUEST HOUSE</h2>
                    </div class="bg-primary">
                </div>


    
        <!-- navigation-standard menu -->
	
		
        <nav class="navbar navbar-expand-lg navbar-dark badge-success">
            <a class="navbar-brand" href="#">
                <i class="fab fa-facebook-square"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-linkedin"></i>
        <i class="fab fa-google-plus-g"></i>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" title="menu" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
              </span>
            </button>
            <div class="collapse navbar-collapse justify-content-end"  id="nav">
              <div class="navbar-nav pr-lg" >
                <a class="nav-item nav-link" href="index.php">HOME</a>
                <a class="nav-item nav-link" href="about.php"><span class="sr-only">(current)</span>ABOUT US</a>
                <a class="nav-item nav-link" href="meals.php">MEALS</a>
                <a class="nav-item nav-link" href="Rooms.php">ROOMS</a>
                <a class="nav-item nav-link active" href="contacts.php">CONTACTS</a>
                <a class="nav-item nav-link" href="admin/adminlog.php">ADMIN</a>
				<div class="dropdown show">
				<a class="dropdown-toggle nav-item nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					USERS
				</a>
				<div class="dropdown-menu dropdown-menu-right bg-success" aria-labelledby="dropdownMenuLink">
					<a class="dropdown-item" href="signup.php" >Sign up</a>
					<a class="dropdown-item" href="login.php">Login</a>
				</div>
				</div>
              </div>
            </div>
          </nav>
		  
		<script>
			function myFunction(){
				var x = document.getElementById("myTopnav");
				if(x.className === "topnav"){
					x.className += "responsive";
				}
				else{
					x.className = "topnav";
				}
			}
		</script>
		<section>
		<div class="contact">
			<div class="row">
				<div class="contact-form col-lg-4 col-md-4 col-sm-4">
					<h2>CONTACT FORM</h2>
					<p2>please fill out the form below to contact us</p2>
					<form  method="post" name="sentMessage" id="contactForm" >
							<div class="control-group form-group">
								<label>Full Name:</label>
								<div class="input-group input-group-lg">
								<span class="input-group-addon" id="addon"><i class="fas fa-user fa-1x cust"></i></span>
                        		<input type="text" class="form-control"aria-describedby="addon"name="name" id="name" required >
							</div>
						</div>	
                    		<div class="control-group form-group">
								<label>Phone Number:</label>
								
                        		<input type="tel" class="form-control" name="phone" id="phone" required >
                    		</div>
                    		<div class="control-group form-group">
								<label>Email Address:</label>
								
                        		<input type="email" class="form-control" name="email" id="email" required >
                    		</div>
                    		<div class="control-group form-group">
                        		<label>Message:</label>
                        		<textarea class="form-control" name="message" id="message" required ></textarea>
                    		</div>
                    
                    		<input type="submit" name="sub" value="Send Now" class="btn btn-primary">	
						</form>
							<?php
                            
							if(isset($_POST['sub']))
							{
							$name =$_POST['name'];
							$phone = $_POST['phone'];
							$email = $_POST['email'];
							$message = $_POST['message'];
							$confirm = "Not Read";
							$sql = "INSERT INTO `contact`(`fullname`, `phoneno`, `email`,`cdate`,`message`,`confirm`) VALUES ('$name','$phone','$email',now(),'$message','$confirm')" ;
							if(mysqli_query($connect,$sql))
							echo'<script>alert("Message sent successfully")</script>';
					
							}	
							?>
				</div>
				<div class="contact-us col-lg-4 col-md-4 col-sm-4">
					<h2>CONTACT US</h2>
					<p><strong>Address:</strong>P.O.BOX 170-90200<br>KITUI<br>KENYA</p>
					<p><strong>Email:</strong><a href="www.gmail.com">info@seku.ac.ke</a></p>
					<p><strong>Phone:</strong>+254748605996/7</p>
					<div class="social_icons icons_info">
						<ul class="logo">
                            
						</ul>
					</div>
                        
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.7710331056783!2d37.751083614834116!3d-1.312814836026166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1825bb3cf4b0c723%3A0xc39f8ccea8ffee!2sGuest%20House%20-%20SEKU!5e0!3m2!1sen!2sde!4v1580470610464!5m2!1sen!2sde">
                        </iframe>

				</div>
			</div>
		</div>
		</section>
		 <footer>
			
			<div class="content justify-content-center">
	<div class="footer">
	<div class="col-lg-6 col-md-6">
	
	<h5>CONTACTS</h5>
	<p><i class="fas fa-home"></i>Kwa Vonza,kitui,P.O. Box 170-90200</p>
	<p><i class="fas fa-phone-square-alt"></i>Tel:+254702598123</p>
	<p><i class="fas fa-envelope"></i>info@sekuguesthouse</p>
	</div>
<div class="col-lg-6 col-md-6">
	<h5>STAY IN TOUCH</h5>
	<i class="fab fa-facebook"></i>
	<i class="fab fa-twitter"></i>
	<i class="fab fa-snapchat"></i><br>
	<input type="email" placeholder="Subscribe for updates"><button class="btn btn-success">subscribe</button>
	</div>
	</div>
	<h3>SEKU GUEST HOUSE,COPYRIGHT &copy;2020</h3>
        </footer>
	<script src="https://kit.fontawesome.com/bf257a5746.js" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            
	</body>
</html>

<?php 
include_once 'admin/includes/db.php';
session_start();
if (isset($_POST['add_to_cart'])) {
  if(isset($_SESSION["shopping_cart"])){
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if(!in_array($_GET["id"], $item_array_id)){
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id' => $_GET["id"],
        'item_name' => $_POST["hidden_name"],
        'item_price' => $_POST["hidden_price"],
        'item_quantity' => $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
    }else{
        echo "<script>alert('Item Already Added To Cart')</script>";
      }
    }else{
      $item_array = array(
        'item_id' => $_GET["id"],
        'item_name' => $_POST["hidden_name"],
        'item_price' => $_POST["hidden_price"],
        'item_quantity' => $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][0] = $item_array;
    }
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <meta http-equiv="X-UA compatible" content="i.e=edge">
        <title>SEKU GUEST HOUSE | MEALS</title>
        <link rel="stylesheet" href="css/meals.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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


    
        <!-- - navigation-standard menu -- -->
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
                <a class="nav-item nav-link" href="about.php">ABOUT US</a>
                <a class="nav-item nav-link active" href="meals.php"><span class="sr-only">(current)</span>MEALS</a>
                <a class="nav-item nav-link" href="Rooms.php">ROOMS</a>
                <a class="nav-item nav-link" href="contacts.php">CONTACTS</a>
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

<section class="container bg-light py-2">
       <div>
           <!-- Search bar -->
      <form action="search.php" method="POST" class="form-inline">
        <input class="form-control mr-sm-2 ml-sm-3" type="text" name="search" placeholder="Search for food..." name="" aria-label="Search">
        <button class="btn btn-success my-sm-0" type="submit" name="submit">Search</button>
      </form>

    <a href="order-cart.php" style="text-decoration: none;color:#000;">
      <h5 align="right" class="mx-5"><i class="fas fa-shopping-cart text-success"></i>  Cart 
            <?php 
              if (isset($_SESSION["shopping_cart"])) {
                $count = count($_SESSION["shopping_cart"]);
                echo '<span class="rounded-circle bg-success px-2 text-white">'.$count.'</span>';
              }else{
                 echo '<span class="rounded-circle bg-success px-2 text-white">0</span>';
              }
              ?>
       </h5>
     </a>
    </div>
    <h2 class="text-center">HOT BEVERAGES</h2>
      <!-- Meals available -->
              <?php
                if (!$connect){
                die("Database connection failed!");
              }else{
                $query = 'SELECT * FROM menu where CAT_OF_FOOD="hot beverages"';
                $sql = mysqli_query($connect,$query);
                echo '<div class="row">';
                while($row=mysqli_fetch_assoc($sql)){
                  echo '<div class="col-lg-4 col-md-3 col-sm-12 my-1">';
                  echo '<form action="sub-meal1.php?action=add&id='.$row['FOOD_ID'].'" method="POST">'; 
                    echo '<div class="card shadow">';
                        echo '<img src="admin/images/'.$row["IMAGES"].'" class="card-img-top" alt="Hot Beverages" width="300px" height="200px">';
                  echo '<div class="card-body">';
                      echo '<h6 class="card-title"><strong>'.$row['NAME_OF_FOOD'].'</strong></h6>';
                      echo '<p class="card-text">'.$row['DESCRIPTION'].'</p><br>';
                      echo '<p><strong>ksh. '.$row['PRICE'].'</strong></p>';
                      echo '<span>Quantity: </span><input type="number" name="quantity" value="1" min="1">';
                      echo '<input type="hidden" name="hidden_name" value="'.$row['NAME_OF_FOOD'].'">';
                      echo '<input type="hidden" name="hidden_price" value="'.$row['PRICE'].'">';
                      echo '<button type="submit" class="btn btn-success text-center my-2" name="add_to_cart"><i class="fas fa-shopping-cart"></i> Add to cart</button>';
                      echo '</div>';
                  echo '</div>';
                  echo '</form>';
                    echo '</div>';
            }
            echo '</div>';
          }
        ?>
        <span><a href="meals.php" class="btn btn-success my-2">Back</a></span>
      </section>
    <!-- Footer -->
    <footer>
        <div class="content justify-content-center">
	<div class="row">
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
	<h2>SEKU GUEST HOUSE,COPYRIGHT &copy;2020</h2>
	</div>
	
      </div>
    </footer>
   <script src="https://kit.fontawesome.com/bf257a5746.js" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
</head>

<body>

  <header class="page-header">
    <!-- topline -->
    <div class="page-header__topline">
      <div class="container clearfix">

        <div class="currency">
          <a class="currency__change" href="user/my_account.php?my_orders">
          <?php
          if(isset($_SESSION['customer_email'])){
            echo "Welcome : " . $_SESSION['customer_email'] . "";
          
          }elseif(isset($_SESSION['receveur_email'])){
            echo "Welcome : " . $_SESSION['receveur_email'] . "";
          }
          else
          { 
            echo "Welcome :Guest"; 
            }
?>
          </a>
        </div>

        <div class="basket">
          <a href="cart.php" class="btn btn--basket" style="color:white;">
            <i class="icon-basket"></i>
            <?php items(); ?> items
          </a>
        </div>
        
        
        <ul class="login">

<li class="login__item">
<?php
if(isset($_SESSION['customer_email'])||isset($_SESSION['receveur_email'])){
  echo '<a href="user/my_account.php?my_orders" class="login__link">My Account</a>';
  
} 
  else
  { 
    echo '<a href="user_register.php" class="login__link">Register</a>';
  }   
?>  
</li>


<li class="login__item">
<?php
if(isset($_SESSION['customer_email'])||isset($_SESSION['receveur_email'])){
  echo '<a href="user/logout.php" class="login__link">Log out</a>';
  
} 
  else
  { 
    echo '<a href="checkout.php" class="login__link">Sign In</a>';
  }   
?>  
  
</li>
</ul>
      
      </div>
    </div>
    <!-- bottomline -->
    <div class="page-header__bottomline">
      <div class="container clearfix">

        <div class="logo">
          <a class="logo__link" href="index.php">
            <img class="logo__img" src="images/nlogo1.png" alt="Avenue fashion logotype" width="90" >
          </a>
        </div>

        <nav class="main-nav">
          <ul class="categories">

            <li class="categories__item">
              <a class="categories__link categories__link--active" href="shop.php">
                Shop
              </a>
            </li>

            <li class="categories__item">
              <a class="categories__link" href="about.php">
                About us
               
              </a>
              </li>
              <?php if(isset($_SESSION['receveur_email'])){
                          echo '<li class="categories__item">
                          <a class="categories__link" href="points.php">
                            Points
                           
                          </a>
                        </li>';
                          }?>
            

          <li class="categories__item">
              <a class="categories__link" href="user/my_account.php?my_orders">
                My Account
                <i class="icon-down-open-1"></i>
              </a>
              <div class="dropdown dropdown--lookbook">
                <div class="clearfix">
                  <div class="dropdown__half">
                    <div class="dropdown__heading">Account Settings</div>
                    <ul class="dropdown__items">
                      <li class="dropdown__item">
                        <a <?php if(isset($_SESSION['customer_email'])||isset($_SESSION['receveur_email'])){
                          echo "href='user/my_account.php?my_wishlist'";
                          }else{echo "href='#'";}?>
                           class="dropdown__link">My Wishlist</a>
                      </li>
                      <li class="dropdown__item">
                        <a href="#" class="dropdown__link">My Orders</a>
                      </li>
                      <li class="dropdown__item">
                        <a href="#" class="dropdown__link">View Shopping Cart</a>
                      </li>
                    </ul>
                  </div>
                  <div class="dropdown__half">
                    <div class="dropdown__heading"></div>
                    <ul class="dropdown__items">
                      <li class="dropdown__item">
                        <a href="#" class="dropdown__link">Edit Your Account</a>
                      </li>
                      <li class="dropdown__item">
                        <a href="#" class="dropdown__link">Change Password</a>
                      </li>
                      <li class="dropdown__item">
                        <a href="#" class="dropdown__link">Delete Account</a>
                      </li>
                    </ul>
                  </div>
                </div>
             

              </div>

            </li>

          </ul>
        </nav>
      </div>
    </div>
  </header>
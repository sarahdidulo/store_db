  <nav id= "navb" class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="./home.php">
      <i class="fas fa-cookie-bite"></i>   Store
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div id="navbar-nav" class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">

        <!-- 
        2 = user
        1 = admin 
        -->
        <?php if(isset($_SESSION['user'])){ ?>

        <li class="nav-item">
          <a class="nav-link" href=./home.php> Home </a>
        </li>


          <?php if($_SESSION['user']['roles_id'] == 2){ ?>

              <li class="nav-item">
                <a class="nav-link" href="./catalog.php"> Catalog </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="./cart.php"> Cart <span class = "badge bg-danger text-light" id = "cart-count"><?php if(isset($_SESSION['cart'])){  echo array_sum($_SESSION['cart']); } else { echo 0 ; } ?></span></a>
              </li>

            <?php } else if ($_SESSION['user']['roles_id'] == 1){ ?>

              <li class="nav-item">
                <a class="nav-link" href="./../views/items.php"> Items </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="./../views/new_item.php"> Add an Item </a>
              </li>

          <?php } ?>
        
        
        <li class="nav-item">
          <a class="nav-link" href="./../views/profile.php"> Welcome, <?php echo $_SESSION['user']['firstname'] . " ! " ?></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./../controllers/logout.php"> Logout </a>
        </li>

        <?php } else { ?>

        <li class="nav-item">
          <a class="nav-link" href="./login.php"> Login </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="./register.php"> Register </a>
        </li>

        <?php } ?>

      </ul>
    </div> <!-- end navbar nav -->
  </nav> <!-- end nav -->
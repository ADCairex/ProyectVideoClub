<header>
    <div class="headerRight">
    <a href="../user/user.php">
    <i class="far fa-user"></i>
            <!-- <p><?php echo $_SESSION['username']; ?></p> -->

            <!-- <p><?php print_r($_SESSION) ?></p> -->
        </a>
        <p><?php echo $_SESSION['name']; ?></p>
        <a href="../login/php/doLogout.php"><i class="fas fa-sign-out-alt"></i></a>
        <p><?php echo(date("F j, Y, g:i a",$_SESSION['LAST_ACTIVITY'])); ?></p>
        
        
    </div>
    <div><a href="../shopping/bill.php"><i class="fas fa-shopping-cart"></i></a>
</div>
</header>
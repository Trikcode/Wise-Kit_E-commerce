<header id="header" >
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
				<div class="username">

		<?php  if (isset($_SESSION['user'])) : ?>
		<strong><?php echo $_SESSION['user']['username']; ?></strong>
	</div>
	<div class="logout">

	<small>
		<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
		<br>
		<a href="index.php?logout='1'" style="color: red;">logout</a>
	</small>
	</div>

				<?php endif ?>
			</div>
</div>
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fas fa-store-alt" style="margin-right: 1rem; font-size:30px"></i> Welcome to Our Board
            </h3>
        </a>
         <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
               + 256 7043 53242
            </h3>
        </a>
        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
        </div>

    </nav>
</header>







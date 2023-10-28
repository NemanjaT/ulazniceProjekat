<nav class="navbar navbar-default"> <!-- pocetak navigacije -->
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"> </span> Početna Strana</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="onama.php">O nama</a></li>
				<li><a href="dogadjaji.php">Događaji</a></li>
				<li><a href="kategorije.php">Kategorije</a></li>

			</ul>


			<ul class="nav navbar-nav navbar-right">
				<li><?php if (isset($_SESSION['username'])) { ?>
					<label>Prijavljeni ste kao: </label>
					<input type="text" id="user"  name="user" readonly="true" value="<?php echo $_SESSION['username']; ?>"><p><a id="logout" href="logout.php" title="Logout">Logout</a></p>
					<?php } ?></li>
					<li><a href="log.php"><i class="fas fa-user-circle fa-2x"></i></a></li>
					<li><a href="korpa.php" title="Korpa" class="color-me"><i class="fas fa-shopping-cart fa-2x"></i></a></li>

				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>

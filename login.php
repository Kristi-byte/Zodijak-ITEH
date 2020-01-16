<?php
	include("konekcija.php");
	$poruka = '';
	if(isset($_POST['login'])) {
		include('korisnikOKlasa.php');
		$user = new Korisnik($db);
		$sacuvano = $user->login();
		if($sacuvano){
			$poruka= 'Uspesno ulogovan korisnik.';
		}else{
			$poruka= 'Neuspesno ulogovan korisnik.';
		}
	}
 ?>

<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>

<body id="page-top" class="index">

    <?php include("menu.php"); ?>

    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Dobrodošli!</div>
                <div class="intro-heading">Drago nam je što ste ovde...</div>
                <a href="login.php#zodiacDanas" class="page-scroll btn btn-xl">Pogledajte više</a>
            </div>
        </div>
    </header>

    <section id="zodiacDanas">
        <div class="container">
		<h1>Login forma:</h1>

		<form id="forma" method="post" action="" role="form">
			<?php if($poruka != ''){ ?>
				<div class="well"><?php echo $poruka ?></div>
			<?php } ?>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="opis">Username *</label>
						<input id="username" type="text" name="username" class="form-control" placeholder="Username *" >
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="password">Password *</label>
						<input id="password" type="password" name="password" class="form-control" placeholder="Password *" >
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<input id="login" name="login" type="submit" class="btn btn-success" value="Login">
			</div>

		</form>
        </div>
    </section>

    <?php include("footer.php"); ?>

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <script src="js/zodiac.js"></script>
</body>

</html>

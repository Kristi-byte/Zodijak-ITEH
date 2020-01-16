<?php
	include("konekcija.php");
	$poruka = '';
	if(isset($_POST['unesi'])) {
		include('prognozaOKlasa.php');
		$prognoza = new Prognoza($db);
		$sacuvano = $prognoza->novaPrognoza();
		if($sacuvano){
			$poruka= 'Uspesno sacuvano';
		}else{
			$poruka= 'Neuspesno sacuvano';
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
                <div class="intro-lead-in">Dobrodosli!</div>
                <div class="intro-heading">Drago nam je sto ste ovde</div>
                <a href="index.php" class="page-scroll btn btn-xl">Pogledajte vise</a>
            </div>
        </div>
    </header>

    <section id="zodiacDanas">
        <div class="container">
		<h1>Nova prognoza</h1>

		<form id="forma" method="post" action="" role="form">
			<?php if($poruka != ''){ ?>
				<div class="well"><?php echo $poruka ?></div>
			<?php } ?>
			<div class="form-group">
				<label for="znak">Izaberi znak:</label>
				<select class="form-control" id="znak" name="znak">
				<?php
				 //$znakovi= $db->get("znak");
				 $curl_zahtev = curl_init("http://localhost/seminarskizodijak/rest/znakovi.json");
				 curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
				 $curl_odgovor = curl_exec($curl_zahtev);
				 $json_objekat=json_decode($curl_odgovor, true);
				 curl_close($curl_zahtev);
				 $znakovi = $json_objekat;
					foreach($znakovi as $znak):
				?>
					<option value="<?php echo($znak['znakID']); ?>"><?php echo($znak['nazivZnaka']); ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="znak">Izaberi tip:</label>
				<select class="form-control" id="tip"  name="tip" >
				<?php
						$curl_zahtev = curl_init("http://localhost/seminarskizodijak/rest/tipovi.json");
						curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
						$curl_odgovor = curl_exec($curl_zahtev);
						$json_objekat=json_decode($curl_odgovor, true);
						curl_close($curl_zahtev);
						$tipovi = $json_objekat;

					//$tipovi= $db->get("tip");
					foreach($tipovi as $tip):
				?>
					<option value="<?php echo($tip['tipID']); ?>"><?php echo($tip['nazivTipa']); ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="opis">Opis *</label>
						<input id="opis" type="text" name="opis" class="form-control" placeholder="Opis *" >
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="datum">Datum *</label>
						<input id="datum" type="text" name="datum" class="form-control datepicker" placeholder="Datum *" >
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<input id="unesi" name="unesi" type="submit" class="btn btn-success" value="Unesi prognozu">
			</div>

		</form>
        </div>
    </section>

    <?php include("footer.php"); ?>

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <script src="js/zodiac.js"></script>
	<script src="js/picker.js"></script>
	<script src="js/picker.date.js"></script>

	<script>
		$('.datepicker').pickadate({
			format: 'yyyy-mm-dd',
			formatSubmit: 'yyyy-mm-dd',
			hiddenPrefix: 'prefix__',
			hiddenSuffix: '__suffix'
		});
	</script>
</body>

</html>

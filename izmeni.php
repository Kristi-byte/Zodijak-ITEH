<?php 
	include("konekcija.php");
	if(!isset($_GET["id"])){
		header("Location:admin.php");
	}
	$id = $_GET["id"];
	$prognoza = $db->rawQuery("select * from prognoza p join tip t on p.tipID=t.tipID join znak z on p.znakID=z.znakID where prognozaID=".$id);
	$poruka = '';
	if(isset($_POST['izmeni'])) {
		include('prognozaOKlasa.php');
		$prognoza = new Prognoza($db);
		$sacuvano = $prognoza->izmeni($id);
		if($sacuvano){
			$poruka= 'Uspesno izmenjeno';
		}else{
			$poruka= 'Neuspesno izmenjeno';
		}
		//header("Location: admin.php");
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
		<h1>Izmena prognoze</h1>
		
		<form id="forma" method="post" action="" role="form">
			<?php if($poruka != ''){ ?>
				<div class="well"><?php echo $poruka ?></div>
			<?php } ?>
			<div class="form-group">
				<label for="znak">Izaberi znak:</label>
				<select class="form-control" id="znak" name="znak">
				<?php 
				$znakovi= $db->get("znak");
				$db->where("znakID",$prognoza[0]["znakID"]);
				$z = $db->getOne("znak");
				?>
					<option value="<?php echo($z['znakID']); ?>"><?php echo($z['nazivZnaka']); ?></option>
				<?php
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
				$tipovi= $db->get("tip");
				$db->where("tipID",$prognoza[0]["tipID"]);
				$t = $db->getOne("tip");
				?>
					<option value="<?php echo($t['tipID']); ?>"><?php echo($t['nazivTipa']); ?></option>				
				<?php
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
						<input id="opis" type="text" name="opis" class="form-control" placeholder="Opis *" value="<?php echo($prognoza[0]['opis']); ?>" >
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="datum">Datum *</label>
						<input id="datum" type="text" name="datum" class="form-control datepicker" placeholder="Datum *" value="<?php echo($prognoza[0]['datum']); ?>" >
					</div>
				</div>
			</div>
							
			<div class="col-md-12">
				<input id="izmeni" name="izmeni" type="submit" class="btn btn-success" value="Izmeni prognozu">
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

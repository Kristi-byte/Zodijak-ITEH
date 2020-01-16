<?php
	include("konekcija.php");

	$sort='order by z.znakID asc';

	if(isset($_GET['sort'])){
		if($_GET['sort']=='rastuce'){
			$sort='order by z.znakID asc';
		}
		if($_GET['sort']=='opadajuce'){
			$sort='order by z.znakID desc';
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
                <div class="intro-lead-in"> Dobrodošli! </div>
                <div class="intro-heading">Drago nam je što ste ovde...</div>
                <a href="index.php#zodiacDanas" class="page-scroll btn btn-xl">Pogledajte više</a>
            </div>
        </div>
    </header>

    <section id="zodiacDanas">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Zodiac</h2>
                    <h3 class="section-subheading text-muted">Ovde mozete pronaći sve informacije o vašem horoskopu</h3>
					<h3> Sortiranje prognoze</h3>
					<a href='index.php?sort=rastuce'>Ovan - Riba</a>
					<a href='index.php?sort=opadajuce'>Riba - Ovan</a>+
				</div>
            </div>
            <div class="row text-center">

				<?php
					$prognoze = $db->rawQuery("select * from prognoza p join tip t on p.tipID=t.tipID join znak z on p.znakID=z.znakID ".$sort);
					//var_dump($prognoze);
					foreach($prognoze as $prognoza):
				?>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-<?php echo($prognoza['slikica']); ?> fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading"><?php echo($prognoza['nazivZnaka']); ?></h4>
					<p><?php echo($prognoza['nazivTipa']); ?></p>
					<p><?php echo($prognoza['datum']); ?></p>
                    <p class="text-muted"><?php echo($prognoza['opis']); ?></p>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <?php include("footer.php"); ?>

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <script src="js/zodiac.js"></script>

</body>

</html>

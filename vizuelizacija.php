<?php
	include("konekcija.php");
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
                <a href="vizuelizacija.php#zodiacDanas" class="page-scroll btn btn-xl">Pogledajte više</a>
            </div>
        </div>
    </header>

    <section id="zodiacDanas">
        <div class="container">
            <h1>-Vizuelni prikaz podataka o broju prognoza po tipu-</h1>
						<div id="podaci"></div>
	   </div>
    </section>

    <?php include("footer.php"); ?>

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <script src="js/zodiac.js"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>

		<script type="text/javascript">
		  google.load('visualization', '1', {'packages':['corechart']});
		  google.setOnLoadCallback(grafik);

		  function grafik() {
		    var jsonData = $.ajax({
		    url: "podaciVizuelizacija.php",
		    dataType:"json",
		    async: false
		  }).responseText;
		  var data = new google.visualization.DataTable(jsonData);
		  var options = {'title':'Broj prognoza po tipu',
		   backgroundColor: { fill:'transparent' },
		    titleTextStyle: {
		  textAlign: 'center',
		      color: 'black',
		      fontSize: 36},
		      'width':1200,
		      'height':800,
		      is3D:true,
		  legend: {
		      textStyle: {
		    color: 'black'
		      }
		  },
		  };

		  var chart = new google.visualization.PieChart(document.getElementById('podaci'));


		  chart.draw(data,  options);

		}
		</script>

</body>

</html>

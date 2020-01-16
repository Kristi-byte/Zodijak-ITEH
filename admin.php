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
                <a href="admin.php#zodiacDanas" class="page-scroll btn btn-xl">Pogledajte više</a>
            </div>
        </div>
    </header>

    <section id="zodiacDanas">
        <div class="container">
			<h3>Ubaci novu prognozu <a href="novaPrognoza.php"> <i class="fa fa-plus"></i></a></h3>

			<div class="form-group">
				<label for="znak">Izaberi znak:</label>
				<select class="form-control" id="znak" onchange="generisiTabeluAdmin()">
					<option value="0"> ----- Svi znakovi ----- </option>
				<?php $znakovi= $db->get("znak");
					foreach($znakovi as $znak):
				?>
					<option value="<?php echo($znak['znakID']); ?>"><?php echo($znak['nazivZnaka']); ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div id="output"></div>
			<hr>
			<h1>Unos astrologa</h1>
			<form id="forma" method="post" action="upload.php" role="form" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="ime">Ime i prezime *</label>
							<input id="ime" type="text" name="ime" class="form-control" placeholder="Ime i prezime *" >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="grad">Grad *</label>
							<input id="grad" type="text" name="grad" class="form-control" placeholder="Grad *" >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
			        <label for="file" class="cols-sm-2 control-label">Slika:</label>
			          <input type="file" class="form-control" name="file" placeholder="Slika"/>
			      </div>
					</div>
				</div>
	      <div class="form-group ">
	        <input type="submit" name="file" class="btn btn-danger btn-lg " value="Ubaci">
	      </div>
			</form>
    </div>
    </section>

    <?php include("footer.php"); ?>

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <script src="js/zodiac.js"></script>

	<script>

		function generisiTabeluAdmin(){

			var znak = $("#znak").val();
			$.ajax({
				url: "generisiTabelu.php",
				data: "znak="+znak,
				success: function(result){
				var output = '<table class="table table-hover"><thead><tr><th>Znak</th><th>Tip</th><th>Datum</th><th>Opis</th><th>Izmeni</th><th>Obrisi</th></tr></thead><tbody>';
				$.each($.parseJSON(result), function(i, val) {
					output += '<tr>';
					output += '<td>'+val.nazivZnaka+'</td>';
					output += '<td>'+val.nazivTipa+'</td>';
					output += '<td>'+val.datum+'</td>';
					output += '<td>'+val.opis+'</td>';
					output += '<td><a href="izmeni.php?id='+val.prognozaID+'"><i class="fa fa-pencil"></i></a></td>';
					output += '<td><a href="obrisi.php?id='+val.prognozaID+'"><i class="fa fa-remove"></i></a></td>';
					output += '</tr>';

					});

					output+='</tbody></table>';
					$('#output').html(output);
			}});
		}

</script>
<script>
		$( document ).ready(function() {
			generisiTabeluAdmin();
		});
</script>

</body>

</html>

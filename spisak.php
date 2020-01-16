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
                <a href="spisak.php#zodiacDanas" class="page-scroll btn btn-xl">Pogledajte više</a>
            </div
        </div>
    </header>

    <section id="zodiacDanas">
        <div class="container">
					<div class="col-md-12">
						<table id="tabela" class="table table-hover">
							<thead>
								<tr>
									<th>Ime i prezime</th>
									<th>Grad</th>
									<th>Slika</th>
								</tr>
							</thead>
							<tbody>
								<?php
											$astrolozi = $db->get('astrolozi');
											foreach ($astrolozi as $a) {

								 ?>
								 <tr>
									 <td><?php echo $a['imePrezimeAstrologa']; ?></td>
									 <td><?php echo $a['grad']; ?></td>
									 <td><img class="img img-square" src="astrolozi/<?php echo $a['slika']; ?>"  width="200px" height="120px"></td>
								 </tr>
								 <?php
							 				}
								  ?>
							</tbody>
						</table>
					</div>

	   </div>
    </section>

    <?php include("footer.php"); ?>

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <script src="js/zodiac.js"></script>
		<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script>
		$(document).ready(function(){
			$('#tabela').DataTable();
		});
		</script>
</body>

</html>

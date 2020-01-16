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
                <a href="onama.php#zodiacDanas" class="page-scroll btn btn-xl">Pogledajte više</a>
            </div>
        </div>
    </header>

    <section id="zodiacDanas">
        <div class="container">
            <h1> --- Ko smo mi zapravo --- </h1>
			<p>Zodiac.com je savremena destinacija za besplatni horoskop i sadržaj koji se bavi astrologijom uopšte. Kod nas možete pronaći čitav niz besplatnih dnevnih, nedeljnih, mesečnih i godišnjih horoskopa. Zodiac.com je vodeći internet medij u oblasti astrologije. Naš tim za vas svakodnevno popunjava sadržaj od najboljih svetskih astrologa i čini vam dostupnog na srpskom jeziku. Osim horoskopa, na raspolaganju su vam i razni kvizovi, testovi i ostale zanimacije.</p>
			<div id="images"></div>
	   </div>
    </section>
	
    <?php include("footer.php"); ?>
	
    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <script src="js/zodiac.js"></script>
	
	<script>
(function() {
  var flickerAPI = "http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?";
  $.getJSON( flickerAPI, {
    tags: "zodiacSign",
    tagmode: "any",
    format: "json"
  })
    .done(function( data ) {
      $.each( data.items, function( i, item ) {
        $( "<img>" ).attr( "src", item.media.m ).appendTo( "#images" );
        
      });
    });
})();
</script>

</body>

</html>

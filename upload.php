<?php
		include("konekcija.php");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name     = $_FILES['file']['name'];
            $tmpName  = $_FILES['file']['tmp_name'];
            $error    = $_FILES['file']['error'];
            $size     = $_FILES['file']['size'];
            $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));

            $targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR.'astrolozi' . DIRECTORY_SEPARATOR. $name;
            move_uploaded_file($tmpName,$targetPath);
						$ime = $db->escape(trim($_POST['ime']));
						$grad = $db->escape(trim($_POST['grad']));

						$data = Array (
								"imePrezimeAstrologa" => $ime,
								"grad" => $grad,
				        "slika" => $name
						);

						$sacuvano = $db->insert('astrolozi', $data);

            header( 'Location: spisak.php' ) ;
            exit;
          }

        ?>

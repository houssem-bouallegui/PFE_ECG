<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Title Page-->
    <title>Modification d'une personne</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
<?php
	include('connexion.php');
	
			
			$id=$_POST["person"];
			$sql = "SELECT * FROM person WHERE ID='$id'";
			$result = $db->query($sql);

			$result = $db->query($sql);
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$nom=$row['Nom'];
				$prenom=$row["Prenom"];
				$date=$row["DateN"];
				$sexe=$row["sexe"];
				$email=$row["email"];
				$num=$row["num"];
				$adr=$row["adr"];
				$dataset=$row["dataset"];
			}}
	?>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Register</h2>
                    <form method="POST" action="mod2.php">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Prenom</label>
                                    <input class="input--style-4" type="text" name="prenom" maxlength="60" value="<?php echo $prenom;?>" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nom</label>
                                    <input class="input--style-4" type="text" name="nom" maxlength="60" value="<?php echo $nom;?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Date de naissance</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday"  value="<?php echo $date;?>"required>
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Sex</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Homme
                                            <?php 
												if ($sexe == "homme"){
												echo"<input type='radio' checked='checked' name='gender' value='homme'>";} else {
												echo"<input type='radio' name='gender' value='homme'>";
												}
											?>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Femme
                                            <?php 
												if ($sexe == "femme"){
												echo"<input type='radio' checked='checked' name='gender' value='femme'>";} else {
												echo"<input type='radio' name='gender' value='femme'>";
												}
											?>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?"  value="<?php echo $email;?>" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Numero téléphone</label>
                                    <input class="input--style-4" type="tel" name="phone" pattern="[0-9]{8}" value="<?php echo $num;?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                               <label class="label">Address</label>
                                    <input class="input--style-4" type="text" name="address" maxlength="100" value="<?php echo $adr;?>" required>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
						<div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">ID</label>
                                    <input class="input--style-4" type="text" name="id" value="<?php echo $id;?>" readonly required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Dataset</label>
                                    <input class="input--style-4" type="text" name="dataset" value="<?php echo $dataset;?>">
                                </div>
                            </div>
                        </div>
						<div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="button" >Submit</button>
                        </div>
					</form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->

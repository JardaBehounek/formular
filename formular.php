<?php
    $firstNameErr = $lastNameErr = $streetErr  = $cityErr = $phoneErr ='';
    $emailErr = $zipCodeErr = $productNameErr = $priceErr = '';
    if ($_POST['send']){
        if(isset($_POST["firstname"]) && $_POST["firstname"]) {
            $firstName = test_input($_POST["firstname"]);
        } else {
            $firstName = "";
            $firstNameErr = "Jméno musí být vyplněno.";
        }
        if(isset($_POST["lastname"]) && $_POST["lastname"]) {
            $lastName = test_input($_POST["lastname"]);
        } else {
            $lastName = "";
            $lastNameErr = "Příjmení musí být vyplněno.";
        }
        if(isset($_POST["street"]) && $_POST["street"]) {
            $street = test_input($_POST["street"]);
        } else {
            $street = "";
            $streetErr = "Ulice musí být vyplněna.";
        } 
        if(isset($_POST["city"]) && $_POST["city"]) {
            $city = test_input($_POST["city"]);
        } else {
            $city = "";
            $cityErr = "Město musí být vyplněno.";
        }   
        if(isset($_POST["zip_code"]) && $_POST["zip_code"]){
            $zipCode = test_input($_POST["zip_code"]);
        } else {
            $zipCode = "";
            $zipCodeErr = "PSČ musí být vyplněno.";
        }
        if(isset($_POST["email"]) && $_POST["email"]){
            $email = test_input($_POST["email"]);
        } else {
            $email = "";
            $emailErr = "Email musí být vyplněn.";
        }  
        if(isset($_POST["phone"]) && $_POST["phone"]){
            $phone = test_input($_POST["phone"]);
        } else {
            $phone = "";
            $phoneErr ="Telefon musí být vyplněn.";
        }
        if(isset($_POST["product_name"]) && $_POST["product_name"]){
            $productName = test_input($_POST["product_name"]);
        } else {
            $productName = "";
            $productNameErr = "Název produktu musí být vypněn.";
        }
        if(isset($_POST["pcs"]) && $_POST["pcs"]){
            $pieces = $_POST["pcs"];
        } else {
            $pieces = "";            
        }
        if(isset($_POST["price"]) && $_POST["price"]){
            $price = $_POST["price"];
        } else {
            $price = "";
        }
        if(isset($_POST["tax"]) && $_POST["tax"]){
            $dph = $_POST["tax"];
        } else {
            $dph = "";
        }
     }         

        
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulář</title>
</head>
<body>
    <div class="container">
    <div class="contaner-formular">
    <h1>Rekapitulace objednávky</h1>
    <p style="color:red"><?php 
            echo $firstNameErr;
            echo '<br>';
            echo  $lastNameErr; 
            echo '<br>';
            echo $streetErr;  
            echo '<br>';
            echo $cityErr; 
            echo '<br>';
            echo $phoneErr;
            echo '<br>';
            echo $emailErr; 
            echo '<br>';
            echo $zipCodeErr; 
            echo '<br>';
            echo $productNameErr;
            echo '<br>';
            echo $priceErr; ?></p>
    <p>Jméno a příjmení: <?php echo $firstName." ".$lastName?></p>
    <p>Ulice: <?php echo $street?></p>
    <p>PSČ, město: <?php echo $zipCode.", ".$city ?></p> 
    <p>Telefon: <?php echo $phone?> Email: <?php $email ?></p>   
    <br>
    <p>Název produktu: <?php echo $productName?></p> 
    <p>Cena 1ks bez DPH: <?php echo $price ?>Kč</p>
    <p>Počet kusů: <?php echo $pieces?></p> 
    <p>Cena bez DPH: <?php echo ((int)$price * (int)$pieces) ?>Kč</p>
    <h3>Celková cena: <span id="celkova"><?php echo (((int)$dph * (int)$price * (int)$pieces) + ((int)$pieces * (int)$price))?></span>Kč</h3>
    <p><strong>Převod na jinou měnu:</strong></p>
    <select name="currencySelection" id="currencySelection">

        <?php
        $radky = file('http://www.cnb.cz/cs/financni_trhy/devizovy_trh/kurzy_devizoveho_trhu/denni_kurz.txt');
        $kurzy = array();

        for ($i = 2; $i < count($radky); $i++) {
        $radek = $radky[$i];
        list($zeme, $mena, $mnozstvi, $kod, $kurz) = explode('|', $radek);
        $kurz = strtr($kurz, ',', '.') / $mnozstvi;
        ?>
        <option value="<?php echo $kurz; ?>">
        <?php echo $kod . "  -  " . $zeme; ?></option>
        <?php 
        } ?>
    </select>
    <h3>Převedená částka je: <span id="foreignCurrency"> </span></h3>
    </div>

    <a href="index.html">zpět na formulář</a>

    </div>
    
    <script src="script_formular.js"></script>

</body>
</html>
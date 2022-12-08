<?php
$mt = 0;
if(isset($_POST['montant'])){
    $mt = $_POST['montant'] ;
    $params = new stdClass();
    $params->montant =  $mt;

    $clientSOAP = new SoapClient("http://localhost:9191/?wsdl");
    $res = $clientSOAP->__soapCall("Convert",array($params));

}
?>
<html>
<header>
    <title>Euro To MAD Converter</title>
</header>
    <body>
        <form action="BankService.php" method="post">
            Montant : <input type="text" name="montant" value="<?php echo $mt; ?>">
            <input type="submit" value="Convert">
        </form>

        <?php
            if(isset($res)){
            echo $mt; ?>€ = <?php echo $res->return ; ?> MAD
        <?php
        }
        ?>
    </body>
</html>

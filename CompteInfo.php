<?php
$compteId = 0;
if(isset($_POST['compteId'])){
    $compteId = $_POST['compteId'] ;
    $params = new stdClass();
    $params->code =  $compteId;

    $clientSOAP = new SoapClient("http://localhost:9191/?wsdl");
    $res = $clientSOAP->__soapCall("getCompte",array($params));

}
?>
<html>
<header>
    <title>Euro To MAD Converter</title>
</header>
<body>
<form action="CompteInfo.php" method="post">
    Compte ID : <input type="text" name="compteId" value="<?php echo $compteId; ?>">
    <input type="submit" value="show Account">
</form>

<?php
if(isset($res)){
    echo "Code: ".$res->return->code."\n" ;
    echo "Solde: ".$res->return->solde ;
}
?>
</body>
</html>

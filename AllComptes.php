<?php
if(isset($_POST['submit'])){
    $clientSOAP = new SoapClient("http://localhost:9191/?wsdl");
    $res = $clientSOAP->__soapCall("listCompte",array());
}
?>
<html>
<header>
    <title>All accounts</title>
</header>
<body>
<form action="AllComptes.php" method="post">
    Get All Accounts :
    <input type="submit" value="show Account" name="submit">
</form>

<?php
if(isset($res)){
?>
    <table border="1">
        <tr>
            <th>
                Code
            </th>
            <th>
                Solde
            </th>    
        </tr>
        <?php
        foreach ($res->return as $cmp){
        ?>
        <tr>
            <td><?php echo $cmp->code ?></td>
            <td><?php echo $cmp->solde ?></td>
        </tr>
            <?php
                }
            ?>
    </table>

    <?php
        }
    ?>
</body>
</html>

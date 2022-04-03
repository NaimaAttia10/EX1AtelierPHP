<?php 
$nom = htmlentities($_POST['nom']);
$prenom = htmlentities($_POST['prenom']);
$nb = htmlentities($_POST['nb']);
$adresse  = htmlentities($_POST['adresse']);
$type = $_POST['type'];
$ingredient = ['harissa' => $_POST['harissa'],'salade' => $_POST['salade'],'mayo' => $_POST['mayo']];

$doc = "uploads/";
$img = strtolower(pathinfo(basename($_FILES['cin']['name']),PATHINFO_EXTENSION));
$random = uniqid() . '';
$docname = $random . $img;
$verif = move_uploaded_file($_FILES['cin']['tmp_name'], $doc.$docname);
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande</title>
    <link href="/comm.css" rel="stylesheet">
</head>
<body>
    <?php if($verif){
        ?>
            <script>
                alert("Success");
            </script>
    <?php
        }else{
    ?>
            <script>
                alert("Fail");
            </script>
    <?php
        }
    ?>
    Client : <?= $nom," ",$prenom; ?>
    Adrese : <?= $adresse ?>
    <table>
        <tr>
            <th colspan="2">Nom</th>
            <th colspan="1">Qte</th>
            <th colspan="1">Prix</th>
        </tr>
        <tr>
            <td colspan="2">Sandwich</td>
            <td><?= $nb?></td>
            <td>4 DT</td>
        </tr>
        <tr>
            <td colspan="1">Composition</td>
            <td colspan="1"><?= $type ?><td>
            <td></td>
        </tr>
        <?php
            foreach($ingredient as $indice => $value){
                if($value == '1'){
                    ?>
                    <tr>
                        <td colspan="1"></td>
                        <td colspan="1"><?= $indice ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                }
            }
        ?>
        <tr>
            <th colspan="2">
                <?php
                    if($nb <10){
                        echo "Total : ";
                    }
                ?>
            </th>
            <td colspan="2">
                <?php 
                    echo $nb*4, " DT";
                ?>
            </td>
        </tr>
        <?php 
            if($nb >= 10){
        ?>
                <th colspan="2">Total après réduction:</th>
                <td colspan="2"><?= $nb*4*(9/10)," DT"?></td>
        <?php        
            }
        ?>
    </table>


</body>
</html>
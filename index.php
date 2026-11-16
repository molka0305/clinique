<?php
require_once 'config.php';
require_once 'fonctions.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Clinique</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$patients=[
    ["id"=>1,"nom"=>"Molka","age"=>24,"code_service"=>"DERMA","urgence"=>"VERT"],
    ["id"=>2,"nom"=>"Mayssa","age"=>29,"code_service"=>"CARDIO","urgence"=>"ROUGE"],
    ["id"=>3,"nom"=>"Saif","age"=>7,"code_service"=>"PEDIATRIE","urgence"=>"ROUGE"],
    ["id"=>4,"nom"=>"Olfa","age"=>52,"code_service"=>"CARDIO","urgence"=>"ORANGE"]
];

$facture=0;

foreach($patients as $patient)
{
    $prix=CalculerFacture($patient["age"],TARIF_BSE_CONSULTATION);
    $facture=$facture+$prix;

    $code_service=getBadgeService($patient["code_service"]);
    $urgence=filtrerUrgences($patient["urgence"]);}
?>
<h2>Liste des Patients</h2>
<div class="card">

        <h2>
            <?php echo $patient["nom"]; ?>
        </h2>

        <p>
            age : <?php echo $patient["age"]; ?>
        </p>

        <p>
            Prix : <?php echo $facture; ?> TND
        </p>

        <span class="<?php echo $code_service["class"]; ?>">
            <?php echo $code_service["urgence"]; ?>
        </span>

        <p class="<?php echo 'URGENCE' . $patient["urgence"]; ?>">
            Statut : <?php echo $urgence; ?>
        </p>

    </div>
    <?php
    $cas_urgent = filtrerUrgences(array $patients);
    ?>
<h2>Récapitulatif</h2>
<p>
    Nombre total des patients: <?php echo count($patients); ?> 
</p>
<p>
Urgences Absolues (ROUGE): <?php echo $cas_urgent ?>
</p>

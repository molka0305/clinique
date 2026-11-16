
<?php

function CalculerFacture(int $a, float $t): float
{
    $prix = $a * $t;

    if ($a > 65)
    {
        $prix = $a * 1.2;
    }

    return $prix;
}


function getBadgeService(string $code_service): array
{
    switch ($code_service)
    {
        case "CARDIO":
            return [
                "label" => "Cardiologie",
                "class" => "badge-card"
            ];

        case "DERMA":
            return [
                "label" => "Dermatologie",
                "class" => "badge-derma"
            ];

        case "PEDIATRIE":
            return [
                "label" => "Pédiatrie",
                "class" => "badge-ped"
            ];

        default:
            return [
                "label" => "Inconnue",
                "class" => "badge-inconnue"
            ];
    }
}


function filtrerUrgences(array $patients): array
{
    return array_filter(
        $patients,
        fn($patient) => $patient["urgence"] === "ROUGE"
    );
}


function getLibelleUrgence(string $urgence): string
{
    switch ($urgence)
    {
        case "ROUGE":
            return "Urgence absolue";

        case "ORANGE":
            return "Urgence relative";

        case "VERT":
            return "Consultation standard";

        default:
            return "Libellé non disponible";
    }
}

?>

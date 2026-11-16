<?php

function CalculerFacture(int $a, float $t): float

{
    $prix = $j * $t ;
    if( $a > 65)
        {
            $prix= $prix*1.2;
        }
    return $prix ;
}


function getBadgeService(string $code_service): array
{
    switch ($code_service)
    {
        case "CARDIO":
            return ["label"=>"Cardiologie",
                    "class"=>"badge-card"];
                   
        case "DERMA":
            return ["label"=>"Dermatologie",
                    "class"=>"badge-derma"];
                    
        case "PEDIATRIE":
            return ["label"=>"Pediatrie",
                    "class"=>"badge-ped"];
                   
        default:
            return ["label"=>"Inconnue",
                    "class"=>"badge-inconnue"];
           

}


function filtrerUrgences(array $patients): array
{
    
    return array_filter($patients, fn($patient)=>$patient["urgence"]==="ROUGE");


}

function getLibelleUrgence(string $urgence): string
{
    switch ($urgence)
    {
        case "ROUGE":
            echo "Urgence absolue";
            break;
            
        case "ORANGE":
            echo "Urgence relative";
            break;
            
        case "VERT":
            echo "Consultation standard";
            break;
            
        default:
        
             echo   "Libelle non disponible";
             break;
            
    }

}

?>
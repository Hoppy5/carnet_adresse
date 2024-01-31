<?php

// Définition des variables
$contacts = [];

// Fonction pour ajouter un contact au carnet d'adresses
function ajouterContact($nom, $adresse, $telephone, $email) {
    global $contacts;

    $contacts[] = [
        "nom" => $nom,
        "adresse" => $adresse,
        "telephone" => $telephone,
        "email" => $email,
    ];
}

// Fonction pour rechercher un contact dans le carnet d'adresses
function rechercherContact($nom) {
    global $contacts;

    foreach ($contacts as $contact) {
        if ($contact["nom"] == $nom) {
            return $contact;
        }
    }

    return null;
}

// Fonction pour modifier un contact dans le carnet d'adresses
function modifierContact($nom, $nouveauNom, $nouvelleAdresse, $nouveauTelephone, $nouveauEmail) {
    global $contacts;

    $contact = rechercherContact($nom);

    if ($contact !== null) {
        $contact["nom"] = $nouveauNom;
        $contact["adresse"] = $nouvelleAdresse;
        $contact["telephone"] = $nouveauTelephone;
        $contact["email"] = $nouveauEmail;
    }
}

// Fonction pour supprimer un contact du carnet d'adresses
function supprimerContact($nom) {
    global $contacts;

    $index = 0;
    foreach ($contacts as $contact) {
        if ($contact["nom"] == $nom) {
            break;
        }

        $index++;
    }

    if ($index < count($contacts)) {
        array_splice($contacts, $index, 1);
    }
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Définition des variables
    $nom = $_POST["nom"];
    $adresse = $_POST["adresse"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];

    // Action en fonction du bouton cliqué
    switch ($_POST["action"]) {
        case "ajouter":
            ajouterContact($nom, $adresse, $telephone, $email);
            break;
        case "modifier":
            modifierContact($nom, $_POST["nouveauNom"], $_POST["nouvelleAdresse"], $_POST["nouveauTelephone"], $_POST["nouveauEmail"]);
            break;
        case "supprimer":
            supprimerContact($nom);
            break;
    }
}

// Affichage des contacts
echo "<table border=\"1\">";
echo "<tr><th>Nom</th><th>Adresse</th><th>Téléphone</th><th>E-mail</th></tr>";
foreach ($contacts as $contact) {
    echo "<tr>";
    echo "<td>{$contact["nom"]}</td>";
    echo "<td>{$contact["adresse"]}</td>";
    echo "<td>{$contact["telephone"]}</td>";
    echo "<td>{$contact["email"]}</td>";
    echo "</tr>";
}
echo "</table>";

?>
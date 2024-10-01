<?php
// code.php

// Définir le type de contenu pour la réponse
header('Content-Type: application/json');

// Lire les données JSON envoyées par la requête
$data = json_decode(file_get_contents('php://input'), true);

// Vérifier si le code est présent
if (isset($data['code']) && !empty($data['code'])) {
    $authCode = $data['code'];

    // Chemin vers le fichier de commande
    $filePath = 'commande.txt';

    // Enregistrer le code dans le fichier
    if (file_put_contents($filePath, $authCode . PHP_EOL, FILE_APPEND | LOCK_EX) !== false) {
        // Réponse de succès
        echo json_encode(['success' => true]);
    } else {
        // Erreur lors de l'enregistrement dans le fichier
        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'enregistrement du code.']);
    }
} else {
    // Code non fourni
    echo json_encode(['success' => false, 'message' => 'Code d\'authentification manquant.']);
}

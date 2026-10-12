<?php

declare(strict_types=1);

namespace Eclairage\Base;

use PDO;

/**
 * Exemple fourni avec le squelette : interroge la base pour vérifier qu'elle répond.
 *
 * Il montre la forme attendue de tout accès à la base : une classe qui reçoit
 * la connexion, et une requête préparée.
 */
final class Diagnostic
{
    public function __construct(private readonly PDO $pdo) {}

    public function versionPostgis(): string
    {
        $requete = $this->pdo->prepare('SELECT PostGIS_Lib_Version()');
        $requete->execute();

        return (string) $requete->fetchColumn();
    }
}

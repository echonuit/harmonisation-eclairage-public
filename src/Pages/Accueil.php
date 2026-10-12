<?php

declare(strict_types=1);

namespace Eclairage\Pages;

use Eclairage\Base\Connexion;
use Eclairage\Base\Diagnostic;
use PDOException;

/**
 * Exemple fourni avec le squelette : la page d'accueil dit si l'environnement est prêt.
 *
 * À remplacer par votre première vraie page. Elle montre la forme d'une page :
 * elle appelle les autres couches, puis rend du HTML dont chaque valeur est échappée.
 */
final class Accueil
{
    public function afficher(): string
    {
        try {
            $base = 'PostGIS ' . (new Diagnostic(Connexion::ouvrir()))->versionPostgis();
        } catch (PDOException $erreur) {
            $base = 'injoignable (' . $erreur->getMessage() . ')';
        }

        $php = self::echapper(PHP_VERSION);
        $base = self::echapper($base);

        return <<<HTML
            <!doctype html>
            <html lang="fr">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Harmonisation de l'éclairage public</title>
            </head>
            <body>
                <h1>Harmonisation de l'éclairage public</h1>
                <p>État de l'environnement de développement :</p>
                <ul>
                    <li>PHP {$php}</li>
                    <li>Base de données : {$base}</li>
                </ul>
            </body>
            </html>
            HTML;
    }

    private static function echapper(string $texte): string
    {
        return htmlspecialchars($texte, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}

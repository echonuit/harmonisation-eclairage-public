<?php

declare(strict_types=1);

namespace Eclairage\Conversion;

use InvalidArgumentException;

/**
 * Exemple fourni avec le squelette : tire le SIREN d'un SIRET.
 *
 * Il montre la forme attendue du code de conversion : une fonction pure, qui ne
 * lit ni la requête HTTP ni la base, et qui se teste donc sans rien démarrer.
 */
final class Siren
{
    /**
     * Le SIREN est formé des 9 premiers chiffres du SIRET, qui en compte 14.
     */
    public static function depuisSiret(string $siret): string
    {
        $chiffres = str_replace(' ', '', $siret);

        if (preg_match('/^\d{14}$/', $chiffres) !== 1) {
            throw new InvalidArgumentException(sprintf('« %s » n\'est pas un SIRET : 14 chiffres attendus.', $siret));
        }

        return substr($chiffres, 0, 9);
    }
}

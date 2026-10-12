<?php

declare(strict_types=1);

namespace Eclairage\Tests\Base;

use Eclairage\Base\Connexion;
use Eclairage\Base\Diagnostic;
use PHPUnit\Framework\TestCase;

/**
 * Ce test a besoin de la base démarrée : `docker compose up -d`.
 */
final class DiagnosticTest extends TestCase
{
    public function testLaBaseRepondEtPostgisEstInstalle(): void
    {
        $diagnostic = new Diagnostic(Connexion::ouvrir());

        self::assertMatchesRegularExpression('/^\d+\.\d+/', $diagnostic->versionPostgis());
    }
}

<?php

declare(strict_types=1);

namespace Eclairage\Tests\Conversion;

use Eclairage\Conversion\Siren;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class SirenTest extends TestCase
{
    public function testLeSirenEstFormeDesNeufPremiersChiffresDuSiret(): void
    {
        // Le SIRET de la Ville de Marseille, tel qu'il figure dans son fichier ouvert
        self::assertSame('211300553', Siren::depuisSiret('21130055300016'));
    }

    public function testLesEspacesDuSiretSontIgnores(): void
    {
        self::assertSame('211300553', Siren::depuisSiret('211 300 553 00016'));
    }

    #[DataProvider('siretsInvalides')]
    public function testUnSiretInvalideEstRefuse(string $siret): void
    {
        $this->expectException(InvalidArgumentException::class);

        Siren::depuisSiret($siret);
    }

    /**
     * @return iterable<string, array{string}>
     */
    public static function siretsInvalides(): iterable
    {
        yield 'vide' => [''];
        yield 'trop court (un SIREN)' => ['211300553'];
        yield 'trop long' => ['211300553000160'];
        yield 'avec des lettres' => ['2113005530001A'];
    }
}

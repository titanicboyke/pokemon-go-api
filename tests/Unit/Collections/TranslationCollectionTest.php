<?php

namespace Tests\Unit\PokemonGoLingen\PogoAPI\Collections;

use PokemonGoLingen\PogoAPI\Collections\TranslationCollection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \PokemonGoLingen\PogoAPI\Collections\TranslationCollection
 */
class TranslationCollectionTest extends TestCase
{
    public function testCollection(): void
    {
        $collection = new TranslationCollection('Testlanguage');
        $collection->addMoveName(123, 'Movename in testlanguage');
        $collection->addTypeName('TYPENAME', 'Typename in testlanguage');
        $collection->addPokemonName(5, 'Pokemon 5 in testlanguage');
        $collection->addPokemonMegaName(5, 'Mega 1');
        $collection->addPokemonMegaName(5, 'Mega 2');
        $collection->addPokemonFormName('POKEMON_FORM', 'Pokemon Form in testlanguage');

        self::assertSame('Testlanguage', $collection->getLanguageName());

        self::assertSame('Movename in testlanguage', $collection->getMoveName(123));
        self::assertNull($collection->getMoveName(1230));

        self::assertSame('Typename in testlanguage', $collection->getTypeName('TYPENAME'));
        self::assertSame('Pokemon 5 in testlanguage', $collection->getPokemonName(5));
        self::assertSame(
            [
                'Mega 1',
                'Mega 2',
            ],
            $collection->getPokemonMegaNames(5)
        );
        self::assertSame('Pokemon Form in testlanguage', $collection->getPokemonFormName('POKEMON_FORM', 'FALLBACK'));
        self::assertSame('Pokemon Form in testlanguage', $collection->getPokemonFormName('FALLBACK', 'POKEMON_FORM'));
    }
}
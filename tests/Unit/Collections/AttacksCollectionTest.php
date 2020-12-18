<?php

namespace Tests\Unit\PokemonGoLingen\PogoAPI\Collections;

use PokemonGoLingen\PogoAPI\Collections\AttacksCollection;
use PHPUnit\Framework\TestCase;
use PokemonGoLingen\PogoAPI\Types\PokemonMove;
use PokemonGoLingen\PogoAPI\Types\PokemonType;

/**
 * @covers \PokemonGoLingen\PogoAPI\Collections\AttacksCollection
 */
class AttacksCollectionTest extends TestCase
{
    public function testCollection() : void
    {
        $pokemonMove = new PokemonMove(
            100,
            'TESTMOVE',
            new PokemonType('FIRE'),
            10.0,
            15.0,
            100.0,
            true
        );
        $sut = new AttacksCollection();
        $sut->add($pokemonMove);

        self::assertCount(1, $sut->toArray());
        self::assertSame($pokemonMove, $sut->getById(100));
        self::assertSame($pokemonMove, $sut->getByName('TESTMOVE'));
    }
}
<?php

declare(strict_types=1);

namespace PokemonGoApi\PogoAPI\Collections;

use PokemonGoApi\PogoAPI\Types\PokemonImage;
use Throwable;

final class PokemonAssetsCollection
{
    /** @var array<string, PokemonImage[]> */
    private array $imagesByDexNr = [];

    public function __construct(string ...$images)
    {
        foreach ($images as $imageName) {
            try {
                $image = PokemonImage::createFromFilePath($imageName);
            } catch (Throwable $err) {
                continue;
            }

            if ($image->isShiny()) {
                continue;
            }

            $this->imagesByDexNr['dex_' . $image->getDexNr()][] = $image;
        }
    }

    /**
     * @return array<int, PokemonImage>
     */
    public function getImages(int $dexNr): array
    {
        return $this->imagesByDexNr['dex_' . $dexNr] ?? [];
    }
}

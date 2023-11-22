<?php

namespace App\DataFixtures;

use App\Entity\ClotheSize;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class ClotheSizeFixtures extends Fixture
{
    public const CLOTHESIZE_REFERENCE = 'ClotheSize';

    public function load(ObjectManager $manager): void
    {
        $clotheSizes = [
            'XS',
            'S',
            'M',
            'L',
            'XL',
            'XXL'
        ];

        foreach ($clotheSizes as $key => $clotheSize) {
            $size = new ClotheSize();
            $size->setClotheSize($clotheSize);
            $manager->persist($size);
            $this->addReference(self::CLOTHESIZE_REFERENCE . '_' . $key, $size);
        }

        $manager->flush();
    }
}

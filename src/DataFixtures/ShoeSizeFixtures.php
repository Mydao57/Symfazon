<?php

namespace App\DataFixtures;

use App\Entity\ShoeSize;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class ShoeSizeFixtures extends Fixture
{
    public const SHOESIZE_REFERENCE = 'ShoeSize';

    public function load(ObjectManager $manager): void
    {
        $shoeSizes = [
            '30',
            '31',
            '32',
            '33',
            '34'
        ];

        foreach ($shoeSizes as $key => $shoeSize) {
            $size = new ShoeSize();
            $size->setShoeSize($shoeSize);
            $manager->persist($size);
            $this->addReference(self::SHOESIZE_REFERENCE . '_' . $key, $size);
        }

        $manager->flush();
    }
}

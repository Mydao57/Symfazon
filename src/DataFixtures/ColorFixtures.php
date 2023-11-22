<?php

namespace App\DataFixtures;

use App\Entity\Color;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class ColorFixtures extends Fixture
{
    public const COLOR_REFERENCE = 'Color';

    public function load(ObjectManager $manager): void
    {
        $colorNames = [
            'Red',
            'Blue',
            'White',
            'Black'
        ];

        foreach ($colorNames as $key => $colorName) {
            $color = new Color();
            $color->setColorName($colorName);
            $manager->persist($color);
            $this->addReference(self::COLOR_REFERENCE . '_' . $key, $color);
        }

        $manager->flush();
    }
}

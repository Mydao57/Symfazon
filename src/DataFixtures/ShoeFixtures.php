<?php

namespace App\DataFixtures;

use App\Entity\Shoe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
;

class ShoeFixtures extends Fixture implements DependentFixtureInterface
{
    public const SHOE_REFERENCE = "Shoe";

    public function load(ObjectManager $manager): void
    {

        $sizeReference = $this->getReference(ShoeSizeFixtures::SHOESIZE_REFERENCE . '_0');
        $brandReference = $this->getReference(BrandFixtures::BRAND_REFERENCE . '_0');
        $colorReference = $this->getReference(ColorFixtures::COLOR_REFERENCE . '_0');

        $shoe = new Shoe();
        $shoe->addShoeSize($sizeReference);
        $shoe->setShoeBrand($brandReference);
        $shoe->addShoeColor($colorReference);
        $shoe->setShoeName("Air Force 1");

        $manager->persist($shoe);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ColorFixtures::class,
            BrandFixtures::class,
            ShoeSizeFixtures::class
        ];
    }


}

<?php

namespace App\DataFixtures;

use App\Entity\Clothe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
;

class ClotheFixtures extends Fixture implements DependentFixtureInterface
{

    public const CLOTHE_REFERENCE = "Clothe";

    public function load(ObjectManager $manager): void
    {
        $sizeReference = $this->getReference(ClotheSizeFixtures::CLOTHESIZE_REFERENCE . '_0');
        $brandReference = $this->getReference(BrandFixtures::BRAND_REFERENCE . '_0');
        $colorReference = $this->getReference(ColorFixtures::COLOR_REFERENCE . '_0');

        $clothe = new Clothe();
        $clothe->addClotheSize($sizeReference);
        $clothe->setClotheBrand($brandReference);
        $clothe->addClotheColor($colorReference);
        $clothe->setClotheName("Survetement nike");

        $manager->persist($clothe);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ColorFixtures::class,
            BrandFixtures::class,
            ClotheSizeFixtures::class
        ];
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class BrandFixtures extends Fixture
{

    public const BRAND_REFERENCE = 'Brand';

    public function load(ObjectManager $manager): void
    {
        $brandNames = [
            'Nike',
            'Addidas',
            'Puma',
            'Gucci'
        ];

        foreach ($brandNames as $key => $brandName) {
            $brand = new Brand();
            $brand->setBrandName($brandName);
            $manager->persist($brand);
            $this->addReference(self::BRAND_REFERENCE . '_' . $key, $brand);
        }

        $manager->flush();
    }
}

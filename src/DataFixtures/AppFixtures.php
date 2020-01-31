<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $manyUserFixtures = new ManyUserFixtures();
        $manySubjectFixtures = new ManySubjectFixtures();
        $manyRoleFixtures = new ManyRoleFixtures();
        $manyUnityFixtures = new ManyUnityFixtures();
        $manyCategoryFixtures = new ManyCategoryFixtures();
        $articleFixtures = new ArticleFixtures();
        $brandFixtures = new BrandFixtures();
        $racquetStringerFixtures = new RacquetStringerFixtures();
        $timeSlotStringerFixtures = new TimeSlotStringerFixtures();
        $racquetStringersHasRopeReferenceFixtures = new TimeSlotStringerFixtures();

        $userFixtures->load($manager);
        $sportFixtures->load($manager);
        $tagFixtures->load($manager);
        $addressFixtures->load($manager);
        $shopFixtures->load($manager);
        $articleFixtures->load($manager);
        $brandFixtures->load($manager);
        $racquetStringerFixtures->load($manager);
        $timeSlotStringerFixtures->load($manager);
        $racquetStringersHasRopeReferenceFixtures->load($manager);
    }
}

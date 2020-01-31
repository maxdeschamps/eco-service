<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $manyUnityFixtures = new ManyUnityFixtures();
        $manySubjectFixtures = new ManySubjectFixtures();
        $manyFileFixtures = new ManyFileFixtures();
        $manyCategoryFixtures = new ManyCategoryFixtures();
        $manyAddressFixtures = new ManyAddressFixtures();
        $manyRoleFixtures = new ManyRoleFixtures();
        $manyUserFixtures = new ManyUserFixtures();
        $manyCompanyFixtures = new ManyCompanyFixtures();
        $manyProductFixtures = new ManyProductFixtures();
        $manyServiceFixtures = new ManyServiceFixtures();
        $manyMessageFixtures = new ManyMessageFixtures();
        $manyNewsletterFixtures = new ManyNewsletterFixtures();
        $manyProductFileFixtures = new ManyProductFileFixtures();
        $manyServiceFileFixtures = new ManyServiceFileFixtures();
        $manyArticleFileFixtures = new ManyArticleFileFixtures();
        $manyQuotationFixtures = new ManyQuotationFixtures();
        $manyResumeFixtures = new ManyResumeFixtures();
        $manyProductBillFixtures = new ManyProductBillFixtures();
        $manyServiceQuotationFixtures = new ManyServiceQuotationsFixtures();



        $manyUnityFixtures->load($manager);
        $manySubjectFixtures->load($manager);
        $manyCategoryFixtures->load($manager);
        $manyFileFixtures->load($manager);
        $manyAddressFixtures->load($manager);
        $manyRoleFixtures->load($manager);
        $manyUserFixtures->load($manager);
        $manyCompanyFixtures->load($manager);
        $manyProductFixtures->load($manager);
        $manyServiceFixtures->load($manager);
        $manyMessageFixtures->load($manager);
        $manyNewsletterFixtures->load($manager);
        $manyProductFileFixtures->load($manager);
        $manyServiceFileFixtures->load($manager);
        $manyArticleFileFixtures->load($manager);
        $manyQuotationFixtures->load($manager);
        $manyResumeFixtures->load($manager);
        $manyProductBillFixtures->load($manager);
        $manyServiceQuotationFixtures->load($manager);
    }
}

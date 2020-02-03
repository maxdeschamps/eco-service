<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\Bill;
use App\Entity\Category;
use App\Entity\Company;
use App\Entity\File;
use App\Entity\ProductBill;
use App\Entity\ProductFile;
use App\Entity\Quotation;
use App\Entity\Resume;
use App\Entity\Role;
use App\Entity\Service;
use App\Entity\ServiceFile;
use App\Entity\ServiceQuotation;
use App\Entity\Unity;
use App\Entity\User;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $category = new Category();
            $category->setName($faker->word(7));
            $category->setSlug($faker->word(10));

            $manager->persist($category);

            for ($i = 0; $i < 3; $i++) {
                $role = new Role();
                $role->setName($faker->word(7));
                $role->setSlug($faker->word(10));

                $manager->persist($role);
            }

            for ($i = 0; $i < 50; $i++) {
                $address = new Address();
                $address->setLine1($faker->address);
                $address->setLine2($faker->address);
                $address->setPostalCode($faker->postcode);
                $address->setCity($faker->city);
                $address->setCountry($faker->country);

                $manager->persist($address);
            }

            for ($i = 0; $i < 50; $i++) {
                $personne = new User();
                $personne->setRole($role);
                $personne->setFirstName($faker->firstName);
                $personne->setLastName($faker->lastName);
                $personne->setPhone($faker->phoneNumber);
                $personne->setPassword($faker->password);
                $personne->setEmail($faker->email);
                $personne->setNewsletterAcceptance(intval($faker->boolean));

                $manager->persist($personne);
            }

            for ($i = 0; $i < 50; $i++) {
                $resume = new Resume();
                $resume->setRequestDate($faker->dateTime());
                $resume->setAcceptanceDate($faker->dateTime());
                $resume->setApproved(intval($faker->boolean));
                $resume->setEmail($faker->email);
                $manager->persist($resume);
            }

            for ($i = 0; $i < 50; $i++) {
                $bill = new Bill();
                $bill->setCustomer($personne);
                $bill->setRequestDate($faker->dateTime());
                $bill->setAcceptanceDate($faker->dateTime());
                $bill->setEmail($faker->email);
                $bill->setApproved(intval($faker->boolean));

                $manager->persist($bill);
            }

            for ($i = 0; $i < 50; $i++) {
                $productBill = new ProductBill();
                $productBill->setBill($bill);
                $productBill->setQuantity($faker->numberBetween(0, 50));
                $manager->persist($productBill);
            }

            for ($i = 0; $i < 50; $i++) {
                $file = new File();
                $file->setName($faker->word(7));
                $file->setOrder($faker->numberBetween(0, 50));
                $file->setAlt($faker->text);
                $manager->persist($file);
            }


            for ($i = 0; $i < 50; $i++) {
                $produit = new Product();
                $produit->setCategory($category);
                $produit->setAuthor($personne);
                $produit->setName($faker->word(7));
                $produit->setSlug($faker->word(10));
                $produit->setContent($faker->text);
                $produit->setPriceHt($faker->numberBetween($min = 1000, $max = 30000));
                $produit->setPriceTtc($faker->numberBetween($min = 1000, $max = 30000));
                $produit->setQuantity($faker->numberBetween(0, 50));

                $manager->persist($produit);

            }
            for ($i = 0; $i < 50; $i++) {
                $unity = new Unity();
                $unity->setName($faker->word(7));
                $unity->setSlug($faker->word(10));
                $manager->persist($unity);
            }

            for ($i = 0; $i < 50; $i++) {
                $service = new Service();
                $service->setUnity($unity);
                $service->setAuthor($personne);
                $service->setSlug($faker->word(10));
                $service->setContent($faker->text);
                $service->setName($faker->word(7));
                $service->setQuantity($faker->numberBetween(0, 50));
                $service->setPriceHt($faker->numberBetween($min = 1000, $max = 30000));
                $service->setPriceTtc($faker->numberBetween($min = 1000, $max = 30000));
                $manager->persist($service);
            }

            for ($i = 0; $i < 50; $i++) {
                $serviceFile = new ServiceFile();
                $serviceFile->setFile($file);
                $serviceFile->setService($service);
                $manager->persist($serviceFile);
            }

            for ($i = 0; $i < 50; $i++) {
                $company = new Company();
                $company->setFirstName($faker->firstName);
                $company->setLastName($faker->lastName);
                $company->setName($faker->word(10));
                $company->setPhone($faker->phoneNumber);
                $company->setPassword($faker->password);
                $company->setEmail($faker->email);
                $company->setNewsletterAcceptance(intval($faker->boolean));
                $manager->persist($company);
            }

            for ($i = 0; $i < 50; $i++) {
                $quotation = new Quotation();
                $quotation->setCompany($company);
                $quotation->setRequestDate($faker->dateTime());
                $quotation->setAcceptanceDate($faker->dateTime());
                $quotation->setEmail($faker->email);
                $quotation->setApproved(intval($faker->boolean));
                $manager->persist($quotation);
            }

            for ($i = 0; $i < 50; $i++) {
                $serviceQuotation = new ServiceQuotation();
                $serviceQuotation->setQuotation($quotation);
                $serviceQuotation->setQuantity($faker->numberBetween(0, 50));
                $serviceQuotation->setExtra($faker->text);
                $manager->persist($serviceQuotation);
            }

            for ($i = 0; $i < 50; $i++) {
                $productFile = new ProductFile();
                $productFile->setFile($file);
                $productFile->setProduct($produit);
                $manager->persist($productFile);
            }
        }
        $manager->flush();
    }
}
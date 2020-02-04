<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\Article;
use App\Entity\Bill;
use App\Entity\Category;
use App\Entity\Company;
use App\Entity\File;
use App\Entity\Newsletter;
use App\Entity\ProductBill;
use App\Entity\Quotation;
use App\Entity\Resume;
use App\Entity\Service;
use App\Entity\ServiceQuotation;
use App\Entity\Subject;
use App\Entity\Message;
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
        }

        for ($i = 0; $i < 50; $i++) {
            $personne = new User();
            $personne->setFirstName($faker->firstName);
            $personne->setLastName($faker->lastName);
            $personne->setPhone($faker->phoneNumber);
            $personne->setPassword($faker->password);
            $personne->setEmail($faker->email);
            $personne->setNewsletterAcceptance(intval($faker->boolean));

            $delivery_address = new Address();
            $delivery_address->setLine1($faker->address);
            $delivery_address->setLine2($faker->address);
            $delivery_address->setPostalCode($faker->postcode);
            $delivery_address->setCity($faker->city);
            $delivery_address->setCountry($faker->country);

            $personne->setDeliveryAddress($delivery_address);

            if (random_int(1,100) <= 50) {
                $personne->setBillingAddress($delivery_address);
            } else {
                $billing_address = new Address();
                $billing_address->setLine1($faker->address);
                $billing_address->setLine2($faker->address);
                $billing_address->setPostalCode($faker->postcode);
                $billing_address->setCity($faker->city);
                $billing_address->setCountry($faker->country);

                $personne->setBillingAddress($billing_address);
            }

            $manager->persist($personne);
        }

        // for ($i = 0; $i < 50; $i++) {
        //     $bill = new Bill();
        //     $bill->setCustomer($personne);
        //     $bill->setRequestDate($faker->dateTime());
        //     $bill->setAcceptanceDate($faker->dateTime());
        //     $bill->setEmail($faker->email);
        //     $bill->setApproved(intval($faker->boolean));
        //
        //     $manager->persist($bill);
        // }

        for ($i = 0; $i < 50; $i++) {
            $resume = new Resume();
            $resume->setRequestDate($faker->dateTime());
            $resume->setAcceptanceDate($faker->dateTime());
            $resume->setApproved(intval($faker->boolean));
            $resume->setEmail($faker->email);
            $manager->persist($resume);
        }

        // for ($i = 0; $i < 50; $i++) {
        //     $productBill = new ProductBill();
        //     $productBill->setBill($bill);
        //     $productBill->setQuantity($faker->numberBetween(0, 50));
        //     $manager->persist($productBill);
        // }

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

        for ($i = 0; $i < 25; $i++) {
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
            $company = new Company($personne);
            $company->setFirstName($faker->firstName);
            $company->setLastName($faker->lastName);
            $company->setName($faker->word(10));
            $company->setPhone($faker->phoneNumber);
            $company->setPassword($faker->password);
            $company->setEmail($faker->email);
            $company->setNewsletterAcceptance(intval($faker->boolean));
            $manager->persist($company);
        }

        // for ($i = 0; $i < 50; $i++) {
        //     $quotation = new Quotation();
        //     $quotation->setCompany($company);
        //     $quotation->setRequestDate($faker->dateTime());
        //     $quotation->setAcceptanceDate($faker->dateTime());
        //     $quotation->setEmail($faker->email);
        //     $quotation->setApproved(intval($faker->boolean));
        //     $manager->persist($quotation);
        // }

        // for ($i = 0; $i < 50; $i++) {
        //     $serviceQuotation = new ServiceQuotation();
        //     $serviceQuotation->setQuotation($quotation);
        //     $serviceQuotation->setQuantity($faker->numberBetween(0, 50));
        //     $serviceQuotation->setExtra($faker->text);
        //     $manager->persist($serviceQuotation);
        // }

        for ($i = 0; $i < 50; $i++) {
            $subject = new Subject();
            $subject->setName($faker->word(7));
            $subject->setSlug($faker->word(10));
            $manager->persist($subject);
        }

        for ($i = 0; $i < 50; $i++) {
            $article = new Article();
            $article->setAuthor($personne);
            $article->setCategory($category);
            $article->setName($faker->word(10));
            $article->setSlug($faker->word(7));
            $article->setContent($faker->text);
            $manager->persist($article);
        }


        for ($i = 0; $i < 50; $i++) {
            $file = new File();
            $file->setName($faker->word(7));
            $file->setUri($faker->imageUrl());
            $file->setOrderFile($faker->numberBetween(0,50));
            $file->setAltFile($faker->text);
            $manager->persist($file);
        }

        for ($i = 0; $i < 50; $i++) {
            $message = new Message();
            $message->setAuthor($personne);
            $message->setSubject($subject);
            $message->setState($faker->word(100));
            $manager->persist($message);
        }

        for ($i = 0; $i < 50; $i++) {
            $newsletter = new Newsletter();
            $newsletter->setAuthor($personne);
            $newsletter->setFiles($file);
            $newsletter->setSubject($faker->word(25));
            $newsletter->setContent($faker->text);
            $manager->persist($newsletter);
        }

        $manager->flush();
    }
}

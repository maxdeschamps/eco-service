<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\Article;
use App\Entity\Bill;
use App\Entity\Category;
use App\Entity\Company;
use App\Entity\File;
use App\Entity\Message;
use App\Entity\Newsletter;
use App\Entity\Product;
use App\Entity\Resume;
use App\Entity\Service;
use App\Entity\Subject;
use App\Entity\Unity;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setName($faker->word(7));
            $category->setSlug($faker->unique()->slug());
            $manager->persist($category);
            $manager->flush();
        }

        for ($i = 0; $i < 10; $i++) {
         $address = new Address();
         $address->setLine1($faker->address);
         $address->setLine2($faker->address);
         $address->setPostalCode($faker->postcode);
         $address->setCity($faker->city);
         $address->setCountry($faker->country);
         $manager->persist($address);
         $manager->flush();
         }
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setDeliveryAddress($manager->find(Address::class, random_int(1, 10)));
            $user->setBillingAddress($manager->find(Address::class, random_int(1, 10)));
            $user->setLastName($faker->word(7));
            $user->setNewsletterAcceptance($faker->boolean);
            $user->setPhone($faker->phoneNumber);
            $user->setEmail($faker->email);
            $user->setFirstName($faker->word(7));
            $user->setPassword($faker->password);
            $manager->persist($user);
            $manager->flush();
        }

        for ($i = 0; $i < 15; $i++) {
            $produit = new Product();
            $produit->setCategory($manager->find(Category::class, random_int(1, 10)));
            $produit->setAuthor($manager->find(User::class, random_int(1, 10)));
            $produit->setName($faker->word(7));
            $produit->setSlug($faker->unique()->slug());
            $produit->setContent($faker->text);
            $produit->setPriceHt($faker->numberBetween($min = 1000, $max = 30000));
            $produit->setPriceTtc($faker->numberBetween($min = 1000, $max = 30000));
            $produit->setQuantity($faker->numberBetween(0, 50));
            $manager->persist($produit);
            $manager->flush();
        }

        for ($i = 0; $i < 10; $i++) {
            $unity = new Unity();
            $unity->setName($faker->word(7));
            $unity->setSlug($faker->unique()->slug());
            $manager->persist($unity);
            $manager->flush();
        }


        for ($i = 0; $i < 10; $i++) {
            $subject = new Subject();
            $subject->setName($faker->word(7));
            $subject->setSlug($faker->unique()->slug());
            $manager->persist($subject);
            $manager->flush();
        }

        for ($i = 0; $i < 15; $i++) {
            $article = new Article();
            $article->setAuthor($manager->find(User::class, random_int(1, 10)));
            $article->setCategory($manager->find(Category::class, random_int(1, 10)));
            $article->setName($faker->word(10));
            $article->setSlug($faker->unique()->slug());
            $article->setContent($faker->text);
            $manager->persist($article);
            $manager->flush();
        }


        for ($i = 0; $i < 15; $i++) {
            $file = new File();
            $file->setName($faker->word(7));
            $file->setUri($faker->imageUrl());
            $file->setOrderFile($faker->numberBetween(0,50));
            $file->setAltFile($faker->text);
            $manager->persist($file);
            $manager->flush();
        }

        for ($i = 0; $i < 15; $i++) {
            $message = new Message();
            $message->setAuthor($manager->find(User::class, random_int(1, 10)));
            $message->setSubject($manager->find(Subject::class, random_int(1, 10)));
            $message->setState($faker->word(100));
            $message->setContent($faker->word(100));
            $manager->persist($message);
            $manager->flush();
        }

        for ($i = 0; $i < 15; $i++) {
            $newsletter = new Newsletter();
            $newsletter->setAuthor($manager->find(User::class, random_int(1, 10)));
            $newsletter->setSubject($faker->word(25));
            $newsletter->setContent($faker->text);
            $manager->persist($newsletter);
            $manager->flush();
        }

        for ($i = 0; $i < 15; $i++) {
            $service = new Service();
            $service->setAuthor($manager->find(User::class, random_int(1, 10)));
            $service->setUnity($manager->find(Unity::class, random_int(1, 10)));
            $service->setSlug($faker->unique()->slug());
            $service->setContent($faker->text);
            $service->setName($faker->word(7));
            $service->setQuantity($faker->numberBetween(0, 50));
            $service->setPriceHt($faker->numberBetween($min = 1000, $max = 30000));
            $service->setPriceTtc($faker->numberBetween($min = 1000, $max = 30000));
            $manager->persist($service);
            $manager->flush();
        }

        /*
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
            $manager->flush();
        }



        for ($i = 0; $i < 10; $i++) {
            $resume = new Resume();
            $resume->setDeliveryAddress($manager->find(Address::class, random_int(1, 10)));
            $resume->setBillingAddress($manager->find(Address::class, random_int(1, 10)));
            $resume->setRequestDate($faker->dateTime());
            $resume->setAcceptanceDate($faker->dateTime());
            $resume->setApproved(intval($faker->boolean));
            $resume->setEmail($faker->email);
            $manager->persist($resume);
            $manager->flush();
        }


        for ($i = 0; $i < 10; $i++) {
            $bill = new Bill();
            $bill->setCustomer($manager->find(User::class, random_int(1, 10)));
            $bill->setDeliveryAddress($manager->find(Address::class, random_int(1, 10)));
            $bill->setBillingAddress($manager->find(Address::class, random_int(1, 10)));
            $bill->setRequestDate($faker->dateTime());
            $bill->setAcceptanceDate($faker->dateTime());
            $bill->setEmail($faker->email);
            $bill->setApproved(intval($faker->boolean));
            $manager->persist($bill);
            $manager->flush();

        }


        for ($i = 0; $i < 50; $i++) {
            $productBill = new ProductBill();
            $productBill->setBill($bill);
            $productBill->setQuantity($faker->numberBetween(0, 50));
            $manager->persist($productBill);
        }


/*



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


*/
    }
}

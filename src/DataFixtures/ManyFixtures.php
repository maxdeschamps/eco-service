<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\Article;
use App\Entity\Bill;
use App\Entity\Category;
use App\Entity\Image;
use App\Entity\Message;
use App\Entity\Newsletter;
use App\Entity\Product;
use App\Entity\ProductBill;
use App\Entity\Quotation;
use App\Entity\Service;
use App\Entity\ServiceQuotation;
use App\Entity\Subject;
use App\Entity\Unity;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ManyFixtures extends Fixture
{
    private static $images = [
        'img-homepage-1.jpg',
        'img-homepage-2.jpg',
        'img-homepage-3.jpg',
    ];

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setName($faker->word(7));
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
            $user->setUsername($faker->word(7));
            $user->setCompanyName($faker->word(7));
            $user->setNewsletterAcceptance($faker->boolean);
            $user->setPhone($faker->phoneNumber);
            $user->setEmail($faker->email);
            $user->setFirstName($faker->word(7));
            $user->setPassword($faker->password);
            $user->setIsCompany($faker->boolean);
            $manager->persist($user);
            $manager->flush();
        }

        for ($i = 0; $i < 10; $i++) {
            $bill = new Bill();
            $bill->setCustomer($manager->find(User::class, random_int(1, 10)));
            $bill->setDeliveryAddress($manager->find(Address::class, random_int(1, 10)));
            $bill->setBillingAddress($manager->find(Address::class, random_int(1, 10)));
            $bill->setRequestDate($faker->dateTime());
            $bill->setAcceptanceDate($faker->dateTime());
            $bill->setRef($faker->randomNumber($nbDigits = NULL, $strict = false));
            $bill->setNumTva($faker->randomNumber($nbDigits = NULL, $strict = false));
            $bill->setEmail($faker->email);
            $bill->setApproved(intval($faker->boolean));
            $manager->persist($bill);
            $manager->flush();
        }

        for ($i = 0; $i < 15; $i++) {
            $produit = new Product();
            $produit->setCategory($manager->find(Category::class, random_int(1, 10)));
            $produit->setAuthor($manager->find(User::class, random_int(1, 10)));
            $produit->setName($faker->word(7));
            $produit->setContent($faker->text);
            $produit->setPriceHt($faker->numberBetween($min = 50, $max = 500));
            $produit->setPriceTtc($faker->numberBetween($min = 50, $max = 500));
            $produit->setQuantity($faker->numberBetween(0, 50));
            $manager->persist($produit);
            $manager->flush();
        }

        for ($i = 0; $i < 10; $i++) {
            $unity = new Unity();
            $unity->setName($faker->word(7));
            $manager->persist($unity);
            $manager->flush();
        }


        for ($i = 0; $i < 10; $i++) {
            $subject = new Subject();
            $subject->setName($faker->word(7));
            $manager->persist($subject);
            $manager->flush();
        }

        for ($i = 0; $i < 15; $i++) {
            $article = new Article();
            $article->setAuthor($manager->find(User::class, random_int(1, 10)));
            $article->setCategory($manager->find(Category::class, random_int(1, 10)));
            $article->setName($faker->word(10));
            $article->setIngredients($faker->word(100));
            $article->setSteps($faker->word(100));
            $article->setDifficulty($faker->numberBetween(0,80));
            $article->setEstimatedTime($faker->numberBetween(0,100));
            $article->setContent($faker->text);
            $manager->persist($article);
            $manager->flush();
        }


        for ($i = 0; $i < 15; $i++) {
            $image = new Image();
            $image->setOrderFile($faker->numberBetween(0,50));
            $image->setImage($faker->randomElement(self::$images));
            $manager->persist($image);
            $manager->flush();
        }

        for ($i = 0; $i < 15; $i++) {
            $message = new Message();
            $message->setSubject($manager->find(Subject::class, random_int(1, 10)));
            $message->setContent($faker->word(100));
            $message->setEmail($faker->email);
            $message->setFirstName($faker->word(7));
            $message->setLastName($faker->word(7));
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
            $service->setContent($faker->text);
            $service->setName($faker->word(7));
            $service->setQuantity($faker->numberBetween(0, 50));
            $service->setPriceHt($faker->numberBetween($min = 1000, $max = 30000));
            $service->setPriceTtc($faker->numberBetween($min = 1000, $max = 30000));
            $service->setQuantity($faker->numberBetween(0, 50));
            $manager->persist($service);
            $manager->flush();
        }

        for ($i = 0; $i < 15; $i++) {
            $productBill = new ProductBill();
            $productBill->setBill($manager->find(Bill::class, random_int(1, 10)));
            $productBill->setProduct($manager->find(Product::class, random_int(1, 10)));
            $productBill->setQuantity($faker->numberBetween(0, 50));
            $manager->persist($productBill);
            $manager->flush();
        }

        for ($i = 0; $i < 15; $i++) {
            $quotation = new Quotation();
            $quotation->setDeliveryAddress($manager->find(Address::class, random_int(1, 10)));
            $quotation->setBillingAddress($manager->find(Address::class, random_int(1, 10)));
            $quotation->setCompany($manager->find(User::class, random_int(1, 10)));
            $quotation->setRequestDate($faker->dateTime());
            $quotation->setAcceptanceDate($faker->dateTime());
            $quotation->setEmail($faker->email);
            $quotation->setNumTva($faker->randomNumber($nbDigits = NULL, $strict = false));
            $quotation->setRef($faker->randomNumber($nbDigits = NULL, $strict = false));
            $quotation->setApproved(intval($faker->boolean));
            $manager->persist($quotation);
            $manager->flush();
        }

        for ($i = 0; $i < 15; $i++) {
            $serviceQuotation = new ServiceQuotation();
            $serviceQuotation->setQuotation($manager->find(Quotation::class, random_int(1, 10)));
            $serviceQuotation->setService($manager->find(Service::class, random_int(1, 10)));
            $serviceQuotation->setQuantity($faker->numberBetween(0, 50));
            $serviceQuotation->setExtra($faker->text);
            $manager->persist($serviceQuotation);
            $manager->flush();
        }
    }
}

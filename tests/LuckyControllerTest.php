<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 05/09/19
 * Time: 18:34
 */

 namespace App\Tests\Util;

 use App\Controller\LuckyController;
 use PHPUnit\Framework\TestCase;

 class LuckyControllerTest extends TestCase
 {
     public function testGeneratePositiveLucky()
     {
         $luckyController = new LuckyController();
         $number = $luckyController->generatePositive();

         $this->assertGreaterThan(0, $number);
     }
 }
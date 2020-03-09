<?php

namespace App\Data;

use App\Entity\Category;

class SearchData
{
  public $q = '';

  public $categories = [];

  public $max;

  public $min;
}

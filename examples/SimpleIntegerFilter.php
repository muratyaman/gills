<?php

use Gills\Filters\IntegerFilter;

$intFilter = new IntegerFilter();

//$ageMin = $intFilter->filter('08');//fails with PHP filter

$ageMin = $intFilter->filter('18');

$ageMax = $intFilter->filter(65);


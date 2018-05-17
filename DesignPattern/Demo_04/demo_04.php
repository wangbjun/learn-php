<?php

namespace DesignPattern\Demo_04;

include '../../include.php';
/**
 * 建造者模式
 */
$mealBuilder = new MealBuilder();
$vegMeal = $mealBuilder->prepareVegMeal();
echo "Veg Meal\n";
$vegMeal->showItems();
echo "Total Cost:" . $vegMeal->getCost() . "\n";


$nonVegMeal = $mealBuilder->prepareNonVegMeal();
echo "Non Veg Meal\n";
$nonVegMeal->showItems();
echo "Total Cost:" . $nonVegMeal->getCost() . "\n";

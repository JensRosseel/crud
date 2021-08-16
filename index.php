<?php

// Require the correct variable type to be used (no auto-converting)
declare (strict_types = 1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load you classes
require_once '.gitignore/config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/CardRepository.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

// This example is about a Pokémon card collection
// Update the naming if you'd like to work with another collection
$cardRepository = new CardRepository($databaseManager);
if(isset($_POST['add']))
{
    $cardRepository->create($_POST['name'], $_POST['cardtype'], $_POST['rarity']);
}
if(isset($_POST['edit']))
{
    $cardRepository->update($_POST['changeName'], $_POST['changeCardtype'], $_POST['changeRarity']);
}
$cards = $cardRepository->get();

// Load your view
// Tip: you can load this dynamically and based on a variable, if you want to load another view
require 'overview.php';
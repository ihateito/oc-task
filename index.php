<?php

use App\Cart;
use App\Item;
use App\ItemDefaults;

require __DIR__ . '/vendor/autoload.php';

$itemA = new Item(ItemDefaults::getItemData(ItemDefaults::A_NAME));
$itemB = new Item(ItemDefaults::getItemData(ItemDefaults::B_NAME));

$cart = new Cart();
$cart->addItem($itemA);
$cart->addItem($itemB);

$cart->calcItemsPrice();
var_dump($cart->getItems());
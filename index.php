<?php

use App\Cart;
use App\DiscountRuleProvider;
use App\Item;
use App\ItemDefaults;

require __DIR__ . '/vendor/autoload.php';

$rulesData = [
    [
        'type' => 'name',
        'names' => [ItemDefaults::A_NAME, ItemDefaults::B_NAME],
        'discount' => 0.9
    ],
    [
        'type' => 'name',
        'names' => [ItemDefaults::D_NAME, ItemDefaults::E_NAME],
        'discount' => 0.94
    ],
    [
        'type' => 'name',
        'names' => [ItemDefaults::E_NAME, ItemDefaults::F_NAME, ItemDefaults::G_NAME],
        'discount' => 0.97
    ],
    [
        'type' => 'count',
        'count' => 3,
        'discount' => 0.95,
        'excludeNames' => ['A', 'C'],
    ],
    [
        'type' => 'count',
        'count' => 4,
        'discount' => 0.90,
        'excludeNames' => ['A', 'C'],
    ],
    [
        'type' => 'count',
        'count' => 5,
        'discount' => 0.80,
        'excludeNames' => ['A', 'C'],
    ],
];

$discountRuleProvider = new DiscountRuleProvider($rulesData);

$cart = new Cart($discountRuleProvider);
$cart->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::A_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::B_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::B_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::F_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::E_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::G_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::E_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::A_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::B_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::D_NAME)));

var_dump($cart->calcItemsPrice());
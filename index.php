<?php
declare(strict_types=1);

use App\Cart;
use App\Defaults\RuleDefaults;
use App\DiscountRuleProvider;
use App\Item;
use App\Defaults\ItemDefaults;

require __DIR__ . '/vendor/autoload.php';

/**
 * Объявляем/Инициализируем список правил
 */
$discountRuleProvider = new DiscountRuleProvider(RuleDefaults::getData());

/**
 * Создаем корзину, передаем правила для расчета скидок
 */
$cart = new Cart($discountRuleProvider);

/**
 * Добавляем товар в корзину
 */
$cart->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::A_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::B_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::B_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::F_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::E_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::G_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::E_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::A_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::C_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::G_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::I_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::K_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::L_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::H_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::E_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::J_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::M_NAME)))
    ->addItem(new Item(ItemDefaults::getItemData(ItemDefaults::D_NAME)));

/**
 * Расчитываем суммарную стоимость
 */
echo $cart->calcItemsPrice();

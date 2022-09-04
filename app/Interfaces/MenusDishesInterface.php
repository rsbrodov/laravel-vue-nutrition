<?php

namespace App\Interfaces;

interface MenusDishesInterFace{
    public static function get_products_bju($products_id, $dishes_id, $field);// расчет белков, жиров, углеводов за один продукт
    public static function get_bju_dish($menus_dishes_id, $field);// расчет белков, жиров, углеводов за блюдо
    public static function get_kkal($products_id, $menus_dishes_id);// расчет калорий за продукт
    public static function get_kkal_dish($menus_dishes_id);// расчет калорий за блюдо
    public function CalculateMenuInfo($id);// расчет итогового отчета, компановка объекта
    public static function get_vitamin($menus_dishes_id, $yield, $field);//расчет всех витаминов за одно блюдо
}
?>
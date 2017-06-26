<?php
require_once dirname(dirname(__FILE__)) . '/Controller/CRUD.php';

class ShoppingCart extends CRUD
{
  public static $table = 'shopping_cart';
  public static $fields = ['`user_id`', '`product_id`'];
}

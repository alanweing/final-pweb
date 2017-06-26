<?php
require_once dirname(dirname(__FILE__)) . '/Controller/CRUD.php';

class Product extends CRUD
{
  public static $table = 'products';
  public static $fields = ['`name`', '`price`', '`description`'];
}

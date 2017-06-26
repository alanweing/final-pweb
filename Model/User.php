<?php
require_once dirname(dirname(__FILE__)) . '/Controller/CRUD.php';

class User extends CRUD
{
  public static $table = 'users';
  public static $fields = ['`username`', '`password`', '`phone`', '`user_type`'];
}

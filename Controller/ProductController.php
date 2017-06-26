<?php
require_once dirname(dirname(__FILE__)) . '/Model/Product.php';

class ProductController
{
  public static function create($name, $price, $description='')
  {
    return Product::insert("\"$name\", \"$price\", \"$description\"");
  }

  public static function delete($id)
  {
    return Product::delete("id=$id");
  }

  public static function update($name, $price, $description, $id)
  {
    return Product::Update("`name`=\"{$name}\",`price`=\"{$price}\", `description`=\"{$description}\"", "id={$id}");
  }
}

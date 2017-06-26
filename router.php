<?php
switch ($_POST['model'])
{
  case 'user':
    require_once 'Controller/UserController.php';
    switch ($_POST['action'])
    {
      case 'create':
        print_r(json_encode(UserController::create_user($_POST['username'], $_POST['password'], $_POST['phone'], $_POST['user_type'])));
        return;
      case 'validate':
        print_r(json_encode(UserController::validate($_POST['username'], $_POST['password'])));
        break;
    }
  case 'product':
    require_once 'Model/ShoppingCart.php';
    require_once 'Model/Product.php';
    require_once 'Controller/ProductController.php';
    switch ($_POST['action'])
    {
      case 'create':
        print_r(json_encode(ProductController::create($_POST['name'], $_POST['price'], $_POST['description'])));
        return;
      case 'remove':
        print_r(json_encode(ProductController::delete($_POST['id'])));
        return;
      case 'modify':
        print_r(json_encode(ProductController::update($_POST['name'], $_POST['price'], $_POST['description'], $_POST['id'])));
        return;
      case 'add-shopping-cart':
        print_r(json_encode(ShoppingCart::insert("\"{$_COOKIE['id']}\", \"{$_POST['product-id']}\"")));
        return;
      case 'remove-shopping-cart':
        print_r(json_encode(ShoppingCart::delete("id={$_POST['id']}")));
        return;
      case 'search':
        print_r(json_encode(Product::select('*', "name LIKE '%{$_POST['like']}%'")->fetchAll(PDO::FETCH_ASSOC)));
        return;
    }
    break;
}

<?php
require_once dirname(dirname(__FILE__)) . '/Model/User.php';

class UserController
{
  public static function create_user($username, $password, $phone, $user_type)
  {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    return User::insert("\"$username\", \"$hash\", \"$phone\", $user_type");
  }

  public static function validate($username, $password)
  {
    $r = User::select('*', "username='$username'", $limit=1);
    $user = $r->fetch(PDO::FETCH_OBJ);
    if (!$user)
    {
      return ["status" => false];
    }
    else
    {
      if (password_verify($password, $user->password))
      {
        return ["status" => true, "user" => $user];
      }
      return ["status" => false];
    }
  }

  public static function get_user_menu()
  {
    if (!isset($_COOKIE['username']))
    {
      return ['Nossos Produtos' => 'View/ourProducts.php', 'Cadastre-se!' => 'View/signUp.php', 'Logar' => 'View/signIn.php'];
    }

    else
    {
      $name = $_COOKIE['username'];
      switch ($_COOKIE['user_type'])
      {
        default:
        case 2:
          return ['Cadastrar Produto' => 'View/addProduct.php', 'Listar Produtos' => 'View/ourProducts.php', "Procurar" => "View/searchProduct.php", "Sair (". strtoupper($name) .")" => 'View/logout.php'];
        case 3:
          return ['Produtos' => 'View/ourProducts.php', 'Carrinho de Compras' => 'View/shoppingCart.php', "Sair (". strtoupper($name) .")" => ''];
      }
    }
  }
}

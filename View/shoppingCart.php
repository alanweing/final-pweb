<?php
require_once dirname(dirname(__FILE__)) . '/Model/ShoppingCart.php';
require_once dirname(dirname(__FILE__)) . '/Model/Product.php';

$sum = 0;
$shopping_cart = ShoppingCart::select('*', "user_id={$_COOKIE['id']}")->fetchAll();
foreach ($shopping_cart as $key => $value)
{
  $p = Product::select('*', "id={$shopping_cart[$key]['product_id']}", 1)->fetch(PDO::FETCH_OBJ);
  $shopping_cart[$key]['product'] = $p;
  $sum += $p->price;
}
?>
<h1>Carrinho de Compras</h1>
<table class="mdl-data-table mdl-js-data-table">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">Nome</th>
      <th class="mdl-data-table__cell--non-numeric">Descrição</th>
      <th>Preço</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php if (empty($shopping_cart)): ?>
      <h2>Parece que você ainda não adicionou nenhum produto<br><br>:(</h2>
    <?php endif; ?>
    <?php foreach ($shopping_cart as $data): ?>
      <tr>
        <input type="hidden" value="<?=$data['id']?>">
        <td class="mdl-data-table__cell--non-numeric"><?=$data['product']->name?></td>
        <td class="mdl-data-table__cell--non-numeric"><?=$data['product']->description?></td>
        <td><?=$data['product']->price?></td>
          <td><button style="background:#d50000;" class="btn-remove-product-shopping-cart mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">close</i></button></td>
      </tr>
    <?php endforeach; ?>
    <tr>
      <td></td>
      <td></td>
      <td>Total:</td>
      <td>R$<?=$sum?></td>
    </tr>
  </tbody>
</table>

<?php
require_once dirname(dirname(__FILE__)) . '/Model/Product.php';

$user_type = NULL;
if (isset($_COOKIE['user_type']))
{
  $user_type = $_COOKIE['user_type'];
}
$products = Product::select()->fetchAll();
?>

<?php if ($user_type == 2): ?>

<?php endif; ?>

<h1><?php
echo $user_type == 2 ? 'Produtos Cadastrados' : 'Encontre a peça que falta!';
?></h1>
<table class="mdl-data-table mdl-js-data-table">
  <thead>
    <tr>
      <?php if ($user_type==2): ?>
        <th>id</th>
      <?php endif; ?>
      <th class="mdl-data-table__cell--non-numeric">Nome</th>
      <th class="mdl-data-table__cell--non-numeric">Descrição</th>
      <th>Preço</th>
      <?php if ($user_type==2): ?>
        <th></th>
        <th></th>
      <?php endif; ?>
      <?php if ($user_type==3): ?>
        <th></th>
      <?php endif; ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $product): ?>
      <tr>
        <?php if ($user_type==3): ?>
          <input type="hidden" value="<?=$product['id']?>">
        <?php endif; ?>
        <?php if ($user_type==2): ?>
          <td><?=$product['id']?></td>
        <?php endif; ?>
        <td class="mdl-data-table__cell--non-numeric"><?=$product['name']?></td>
        <td class="mdl-data-table__cell--non-numeric"><?=$product['description']?></td>
        <td>R$<?=$product['price']?></td>
        <?php if ($user_type==2): ?>
          <td><button style="background:#4CAF50;" class="btn-edit-product mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">mode_edit</i></button></td>
          <td><button style="background:#d50000;" class="btn-remove-product mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">close</i></button></td>
        <?php endif; ?>
        <?php if ($user_type==3): ?>
          <td><button style="background:#2962FF;" class="btn-add-product-shopping-cart mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">add_shopping_cart</i></button></td>
        <?php endif; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<style>

.mdl-textfield--floating-label {
  background: #FFF !important;
  color: #212121 !important;
  border-radius: 10px;
  margin-left: 5px;
  margin-right: 5px;
}
</style>

<h1>Editar Produto</h1>

<input type="hidden" id="product-id" value="<?=$_POST['product-id']?>">

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="text" id="product-name" value="<?=$_POST['product-name']?>">
  <label class="mdl-textfield__label" for="product-name">Nome</label>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="text" id="product-description" value="<?=$_POST['product-description']?>">
  <label class="mdl-textfield__label" for="product-description">Descrição</label>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="product-price" value="<?=$_POST['product-price']?>">
  <label class="mdl-textfield__label" for="product-price">Preço</label>
  <span class="mdl-textfield__error">Apenas números!</span>
</div>

<br>
<br>
<br>
<br>

<button class="btn-apply-edit-product mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
  <input type="hidden" value="3">
  modificar
</button>

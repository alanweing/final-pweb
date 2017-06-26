<?php  ?>

<style>

.mdl-textfield--floating-label {
  background: #FFF !important;
  color: #212121 !important;
  border-radius: 10px;
  margin-left: 5px;
  margin-right: 5px;
}
</style>

<h1>Cadastrar Produto</h1>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="text" id="product-name">
  <label class="mdl-textfield__label" for="product-name">Nome</label>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="text" id="product-description">
  <label class="mdl-textfield__label" for="product-description">Descrição</label>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="product-price">
  <label class="mdl-textfield__label" for="product-price">Preço</label>
  <span class="mdl-textfield__error">Apenas números!</span>
</div>

<br>
<br>
<br>
<br>

<button class="btn-add-product mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
  <input type="hidden" value="3">
  cadastrar
</button>

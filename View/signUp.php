<?php

?>
<style>

.mdl-textfield--floating-label {
  background: #FFF !important;
  color: #212121 !important;
  border-radius: 10px;
  margin-left: 5px;
  margin-right: 5px;
}
</style>

<h1>Cadastre-se!</h1>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="text" id="username">
  <label class="mdl-textfield__label" for="username">Usuário</label>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="password" id="password">
  <label class="mdl-textfield__label" for="password">Senha</label>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="text" id="phone" maxlength="11">
  <label class="mdl-textfield__label" for="phone">Número do telefone</label>
</div>

<br>
<br>
<br>
<br>

<button class="btn-add-user mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
  <input type="hidden" value="3">
  Criar Usuário
</button>

<button class="btn-add-user mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
  <input type="hidden" value="2">
  Criar Funcionário
</button>

<script type="text/javascript">
  $('#phone').mask('(00)00000-0000');
</script>

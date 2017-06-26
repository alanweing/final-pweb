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

<h1>Busca de produtos</h1>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="text" id="product-name">
  <label class="mdl-textfield__label" for="product-name">Nome do produto</label>
</div>


<button class="search-product mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
  <input type="hidden" value="3">
  buscar
</button>

<br>
<br>

<table class="mdl-data-table mdl-js-data-table">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">Nome</th>
      <th class="mdl-data-table__cell--non-numeric">Descrição</th>
      <th>Preço</th>
    </tr>
  </thead>
  <tbody id="tbody-content">
  </tbody>
</table>

<div id="snackbar" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text"></div>
  <button class="mdl-snackbar__action" type="button"></button>
</div>

<script type="text/javascript">
  $(function() {
    $('.search-product').on('click', function() {
      $('#tbody-content').html('');
      $.ajax({
        method: 'POST',
        url: 'router.php',
        data: {
          model: 'product',
          action: 'search',
          like: $('#product-name').val()
        }
      }).done(function(response) {
        var r = JSON.parse(response);
        if (r.length == 0)
        {
          $('#snackbar')[0].MaterialSnackbar.showSnackbar({
            message: 'Nada encontrado!   :(',
            timeout: 3000
          });
          return;
        }
        for (k in r) {
          $('#tbody-content').append(
`
<tr>
  <td class="mdl-data-table__cell--non-numeric">${r[k].name}</td>
  <td class="mdl-data-table__cell--non-numeric">${r[k].description}</td>
  <td>${r[k].price}</td>
</tr>
`
          )
        }
      });
    });
  });
</script>

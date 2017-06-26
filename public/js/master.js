$(function() {
  var dialog = $('dialog')[0];

  function deleteCookie(name) {
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
  }

  $('#main-content').on('click', '.btn-remove-product-shopping-cart', function() {
    var row = $(this).parent().parent().find('input');
    var transactionid = row.val();
    $.ajax({
      method: 'POST',
      url: 'router.php',
      data: {
        model: 'product',
        action: 'remove-shopping-cart',
        id: transactionid
      }
    }).done(function (response) {
      buildDialog({
        title: 'Produto removido!'
      });
      setMainContent('View/shoppingCart.php');
    });
  });

  $('.m-menu-item').on('click', function() {
    if ($(this).html().includes('Sair'))
    {
      deleteCookie('username');
      deleteCookie('password');
      deleteCookie('phone');
      deleteCookie('user_type');
      location.reload();
      return;
    }
    // if ($(this).html())
    setMainContent($(this).data('menu-url'));
  });

  $('dialog').on('click', '.close', function() {
    dialog.close();
  });

  $('#main-content').on('click', '.btn-add-product-shopping-cart', function() {
    var row = $(this).parent().parent().find('input');
    var id = row.val();
    $.ajax({
      method: 'POST',
      url: 'router.php',
      data: {
        model: 'product',
        action: 'add-shopping-cart',
        'product-id': id
      }
    }).done(function(response) {
      buildDialog({
        title: 'Produto adicionado!',
        positiveMsg: 'Yay!'
      });
    });
  });

  $('#main-content').on('click', '.btn-remove-product', function() {
    var id = $(this).parent().parent().find('td').html();
    $.ajax({
      method: 'POST',
      url: 'router.php',
      data: {
        model: 'product',
        action: 'remove',
        id: id
      }
    })
    .done(function (response) {
      buildDialog({
        title: 'Wohoo!',
        content: 'Produto removido!',
        positiveMsg: 'Yay!'
      });
      setMainContent('View/ourProducts.php');
    })
    .fail(function (error) {
      buildDialog({
        title: 'Woops!',
        content: 'Parece que um cliente adicionou esse produnto em sua lista de compras. Esse ítem não pode ser excluído!'
      });
    });
  });

  $('#main-content').on('click', '.btn-signin', function() {
    $.ajax({
      method: 'POST',
      url: 'router.php',
      data: {
        model: 'user',
        action: 'validate',
        username: $('#username').val(),
        password: $('#password').val(),
      }
    }).done(function (response) {
      var r = JSON.parse(response);
      if (r.status == true)
      {
        for (key in r.user)
        {
          document.cookie = key + "=" + r.user[key];
        }
        $('#dialog-positive-button').on('click', function() {
          location.reload();
        });
        buildDialog({
          title: 'Sucesso!',
          positiveAction: 'index.php'
        });
      }
      else
      {
        buildDialog({
          title: 'Oops!',
          content: 'Por favor, verifique suas credenciais'
        });
      }
    });
  });

  $('#main-content').on('click', '.btn-apply-edit-product', function() {
    $.ajax({
      method: 'POST',
      url: 'router.php',
      data: {
        model: 'product',
        action: 'modify',
        id: $('#product-id').val(),
        name: $('#product-name').val(),
        description: $('#product-description').val(),
        price: $('#product-price').val()
      }
    }).done(function(response) {
      buildDialog({
        title: 'Wohoo!',
        content: 'Produto editado com sucesso!',
        positiveMsg: 'Yay!'
      });
      setMainContent('View/ourProducts.php');
    })
    .fail(function(error) {
      console.log(error);
    });
  });

  $('#main-content').on('click', '.btn-edit-product', function () {
    var row = $(this).parent().parent().find('td');
    var id = $(row[0]).html();
    var name = $(row[1]).html();
    var description = $(row[2]).html();
    var price = $(row[3]).html();
    setMainContent('View/editProduct.php', {
      'product-name': name,
      'product-description': description,
      'product-id': id,
      'product-price': price
    });
  });

  $('#main-content').on('click', '.btn-add-product', function () {
    console.log()
    $.ajax({
      method: 'POST',
      url: 'router.php',
      data: {
        model: 'product',
        action: 'create',
        name: $('#product-name').val(),
        description: $('#product-description').val(),
        price: $('#product-price').val()
      }
    })
    .done(function (response) {
      $('#product-name').val('');
      $('#product-description').val('');
      $('#product-price').val('');
      var r = response;
      try {
        r = JSON.parse(r);
        if ('errorInfo' in r && r['errorInfo']) {
          buildDialog({
            title: 'Oops!',
            content: 'Algo de errado não está certo!<br>' + '<strong>' + r['errorInfo'][2] + '</strong>'
          });
        }
        else if ('errorInfo' in r && !r['errorInfo']) {
          buildDialog({
            title: 'Wohoo!',
            content: 'Produto casastrado!',
            positiveMsg: 'Yay!'
          });
        }
      } catch(err) {}
    })
    .fail(function (error) {
      console.log(error);
    });
  });

  $('#main-content').on('click', '.btn-add-user', function() {
    $.ajax({
      method: 'POST',
      url: 'router.php',
      data: {
        username: $('#username').val(),
        password: $('#password').val(),
        phone: $('#phone').val(),
        user_type: $(this).find('input').val(),
        model: 'user',
        action: 'create'
      }
    })
    .done(function (response) {
      var r = response;
      try {
        r = JSON.parse(r);
        if ('errorInfo' in r && r['errorInfo']) {
          buildDialog({
            title: 'Oops!',
            content: 'Algo de errado não está certo!<br>' + '<strong>' + r['errorInfo'][2] + '</strong>'
          });
        }
        else if ('errorInfo' in r && !r['errorInfo']) {
          buildDialog({
            title: 'Wohoo!',
            content: 'Cadastro realizado!',
            positiveAction: 'index.php',
            positiveMsg: 'Yay!'
          });
        }
      } catch(err) {}
    })
    .fail(function (error) {
      console.log(error);
    });
  });

  function setMainContent(url, data)
  {
    var d = (data === undefined)? {} : data;
    $.ajax({
      method: 'POST',
      url: url,
      data : d
    })
    .done(function(response) {
      $('#main-content').html(response);
    })
    .fail()
    .always(function() {
      componentHandler.upgradeAllRegistered();
    });
  }

  function buildDialog(opt) {
    $('#dialog-title').html(opt.title);
    ('content' in opt) ? $('#dialog-content').html(opt.content) : $('#dialog-content').html('');
    var posBtn = $('#dialog-positive-button');
    var negBtn = $('#dialog-negative-button');

    if ('positiveAction' in opt)
      posBtn.attr('button-action', opt.positiveAction);
    if ('negativeAction' in opt)
      negBtn.attr('button-action', opt.negativeAction);

    ('positiveMsg' in opt) ? posBtn.html(opt.positiveMsg) : posBtn.html('Ok');
    ('negativeMsg' in opt) ? negBtn.html(opt.negativeMsg) : negBtn.html('');
    dialog.showModal();
  }

  setMainContent('View/ourProducts.php');
});

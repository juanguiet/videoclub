$(document).ready(function() {
    filmOrGenderGetData();
});

$(document).on('click', '.btnAction', function(e) {
    e.preventDefault();
    var btn = $(this);
    var opcion = btn.data('accion');
    var formulario;
    btn.attr('disabled', true);

    switch(opcion)
    {
        case 'abrir-modal':
            abrirModal(btn);
        break;

        case 'pelicula-tipo-genero':
            filmSendData(btn);
        break;
    }
});

$(document).on('click', '.btnCloseModal', function(e) {
    e.preventDefault();
    $( $(this).data('modal') ).modal('hide');
});

$(document).on('click', '.btnCloseModal', function(e) {
    e.preventDefault();
    $( $(this).data('modal') ).modal('hide');
});

function filmOrGenderGetData() {
    let routeLoadData = $('#getData');

    if(routeLoadData.length > 0) {
        $( $(routeLoadData).data('target') ).html( $('#viewLoading').val() );

        $.ajax({
            url: routeLoadData.val(),
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                if(data.status == 'ok') {
                    $($(routeLoadData).data('target') + ' div').remove();
                    $($(routeLoadData).data('target')).html(data.view);
                }
            },
            error: function(xhr, status, response) {
            }
        });
    }
}

function filmSendData(btn) {
    let modal = $( btn.data('modal') );
    let form = $( btn.data('formulario') );
    let route = form.attr('action');
    let method = form.attr('method');

    $.ajax({
        url: route,
        type: method,
        dataType: 'JSON',
        data: form.serialize(),
        success: function(data) {
            if(data.status == 'ok')
            {
                btn.attr('disabled', false);
                modal.modal('hide');
                filmOrGenderGetData();
            }
        },
        error: function(xhr, status, response) {
            btn.attr('disabled', false);

            $('.pelicula_tipo_nombreError').html('&nbsp;');
            $('.pelicula_tipo_dia_adicional_desdeError').html('&nbsp;');
            $('.pelicula_tipo_porcent_dia_adicionalError').html('&nbsp;');
            $('.pelicula_genero_nombreError').html('&nbsp;');

            var jsonData = xhr.responseJSON;

            if(jsonData !== undefined) {
                $.each(xhr.responseJSON.errors, function (key, value) {
                    if(key != '')
                    {
                        $('.' + key + 'Error').html(value);
                    }
                });
            }
        }
    });
}

function abrirModal(btn) {
    $.ajax({
        url: btn.data('route'),
        type: 'POST',
        dataType: 'JSON',
        data: {
            target: btn.data('target'),
            item_info: btn.data('item-info')
        },
        success: function(response) {
            if(response.status == 'ok')
            {
                btn.attr('disabled', false);
                $('#modalData').html(response.modal_web);
                $( response.modal_id ).modal('show');
            }
        },
        error: function(xhr, status, response) {
            btn.attr('disabled', false);
        }
    });
}
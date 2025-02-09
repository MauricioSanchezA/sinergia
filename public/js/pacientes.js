$(document).ready(function () {
    $('#departamento').change(function () {
        var depto_id = $(this).val();

        if (depto_id) {
            $.ajax({
                url: '/get-municipios/' + depto_id,  // Ruta del controlador
                type: 'GET',
                success: function (data) {
                    $('#municipio').empty();
                    $('#municipio').append('<option value="">Seleccione un municipio</option>');
                    $.each(data, function (key, value) {
                        $('#municipio').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        } else {
            $('#municipio').empty();
            $('#municipio').append('<option value="">Seleccione un municipio</option>');
        }
    });
});
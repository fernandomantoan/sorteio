<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Sorteio</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="css/sorteio.css" />
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            var sorteados = [];

            $(document).ready(function() {
                $('#button').on('click', function(e) {
                    e.preventDefault();
                    $('#employees').attr('readonly', 'readonly');
                    sortear();
                });
            });

            function sortear()
            {
                $.ajax({
                    url: 'prize',
                    type: 'POST',
                    dataType: 'json',
                    data: 'employees=' + $('#employees').val() + "&sorted=" + sorteados,
                    beforeSend: function() {
                        $('#loading').modal();
                    },
                    success: function(data) {

                        $('#loading').modal('hide');

                        if (data == null) {
                            window.alert('Todos os nomes foram sorteados');
                            $('#button').attr('disabled', 'disabled');
                            return;
                        }

                        $('#employee').html(data.name);
                        $('#myModal').modal();

                        $('#sorted tbody').append('<tr><td>' + data.name + '</td></tr>');

                        sorteados.push(data.name);
                    },
                    error: function() {

                    }
                });
            }
        </script>
    </head>
    <body>
        <div class="container">
            <h1>Sorteio</h1>
            <p>Informe abaixo os nomes que serão sorteados, um por linha.</p>
            <form action="prize" method="post" class="well">
                <label for="employees">Informe a lista de nomes:</label>
                <textarea name="employees" id="employees" rows="20" cols="55" style="width: 100%;"></textarea>
                <br />
                <input id="button" type="submit" value="Sortear" class="btn-primary btn-large" />
            </form>
            <h2>Sortudos</h2>
            <table id="sorted" class="table table-bordered table-striped">
                <thead>
                    <tr><th scope="col">Nome</th></tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <div class="modal hide" id="loading">
            <div class="modal-body">
                <p style="text-align: center;">
                    Aguarde enquanto o sorteio é efetuado...
                </p>
                <p style="text-align: center;">
                    <img src="img/loadingAnimation.gif" />
                </p>
            </div>
        </div>

        <div class="modal hide" id="myModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>E o sortudo foi</h3>
                <img src="img/fireworks.gif" style="float: right;" />
            </div>
            <div class="modal-body">
                <h1 id="employee"></h1>
            </div>
        </div>
    </body>
</html>
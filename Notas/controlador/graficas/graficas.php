<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Graficas</div>
                <div class="panel panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div id="cargaLineal"></div>
                        </div>
                        <div class="col-sm-6">
                            <div id="cargaBarras"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#cargaLineal').load('controlador/graficas/barras.php');
    $('#cargaBarras').load('controlador/graficas/lineal.php');
</script>

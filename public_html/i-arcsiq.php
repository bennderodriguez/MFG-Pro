<?php include './headers.php'; ?>
<p id="result"> </p>
<div id="header"></div>
<div class="loader"></div>
<div id="help"></div>
<div class="card panel-heading">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-end">
            <h4>Consultar cuenta cliente</h4>
        </div>
    </div>
    <div class="card-body">
        <form role="form" id="ccxc" data-toggle="validator" class="shake" autocomplete="off">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="Cobra">Cobra</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="Cobra" name="Cobr-A" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" title="Consultar Clientes" id="Clientes" data-toggle="modal" data-target="#modalClientes"><i class="pe-7s-look"></i></button>
                            </div>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="Ord">Ord</label>
                        <input type="text" class="form-control" id="Ord" name="Ord" placeholder="Enter Ord" required readonly="true">
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="Solo_Abiert">Solo_Abiert</label>
                        <input type="text" class="form-control" id="Solo_Abiert" name="Solo_Abiert" placeholder="Enter Solo_Abiert" required readonly="true">
                    </div>
                    <div class="help-block with-errors text-danger"></div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="Balance">Balance</label>
                        <input type="text" class="form-control" id="Balance" name="Balance" placeholder="Enter Balance" required readonly="true">
                        <div class="help-block with-errors text-danger"></div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="Moneda">Moneda</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" maxlength="3" id="Moneda" name="Moneda" placeholder="Enter Moneda" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" title="Consultar Monedas" id="Monedas" data-toggle="modal" data-target="#modalMoneda"><i class="pe-7s-look"></i></button>
                            </div>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                    </div>                                 
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="MonedaRep">MonedaRep</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" maxlength="3" id="MonedaRep" name="MonedaRep" placeholder="Enter MonedaRep" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" title="Consultar Monedas" id="MonedasRep" data-toggle="modal" data-target="#modalMonedaReporte"><i class="pe-7s-look"></i></button>
                            </div>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="Salida">Salida</label>
                        <select class="form-control" id="Salida" name="Salida" required>
                            <option value="Terminal">Terminal</option>
                            <option value="PDF">PDF</option>
                        </select>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label> </label>
                        <button type="submit" id="form-submit" class="btn btn-outline-success btn-block">Consultar</button>
                    </div>
                </div>
            </div>
            <div id="msgSubmit" class="h4 text-center hidden"></div>
            <div class="clearfix"></div>
        </form>
        <div class="card">
            <div class="card-header">Reporte</div>
            <div id="help2"></div>
            <div class="card-body" id="bodyReport"></div> 
            <div class="card-footer"><button onclick="printDiv()">print</button></div>
        </div>
    </div>
</div>

<!-- Table Clientes -->
<div class="modal fade" id="modalClientes">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Catalogo de Clientes</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div id="loadTableClient"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- Table Monedas -->
<div class="modal fade" id="modalMoneda">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Catalogo de Monedas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div id="loadTableMoneda"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- Table Monedas Reporte-->
<div class="modal fade" id="modalMonedaReporte">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Catalogo de Monedas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div id="loadTableMonedaReporte"></div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<?php include './footer.php'; ?>
<script type="text/javascript" src="asset/js/ccxc.js"></script>
<div id="footer">
    <script>
                // Check browser support
                if (typeof (Storage) !== "undefined") {
                    var jwt = localStorage.getItem("jwt");
                    if (jwt == "" || jwt == null)
                    {
                        location.href = "index.html";
                    } else {
                        //document.getElementById("result").innerHTML = jwt;
                        //console.log(jwt);
                    }
                } else {
                    helper("help", "info", "Sorry, your browser does not support Web Storage...", true)
                }

                function louout() {
                    localStorage.clear();
                    location.href = "index.html";
                }
    </script>
    <script>
        /*
         * Consulta catalogo de clientes
         * Despliega el resultado en una table
         * al seleccionar una fila de la tabla llena los inputs del form
         * con los datos del cliente seleccionado
         */
        $("#MonedasRep").click(function () {
            $("#MonedaRep").val("");
            document.getElementById("loadTableMonedaReporte").innerHTML = '<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... espere <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>';
            var obj, dbParam, xmlhttp, myObj, x, txt = "";
            obj = {table: "customers", limit: 20};
            dbParam = JSON.stringify(obj);
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    myObj = JSON.parse(this.responseText);
                    console.log(myObj);
                    var date = myObj.message;
                    console.log(date);
                    if (myObj.status.toString() == "Error") {
                        document.getElementById("help").innerHTML = '<div class="alert alert-warning"><strong>Mensaje!</strong> ' + myObj.message.auth + ' <button class="btn btn-outline-warning" onclick="louout()">Log in again</button></div>';
                        document.getElementById("loadTableMonedaReporte").innerHTML = '<div class="alert alert-warning"><strong>Mensaje!</strong> ' + myObj.message.auth + ' <button class="btn btn-outline-warning" onclick="louout()">Log in again</button></div>';
                        $("#modalMonedaReporte .close").click()
                    } else {
                        txt += ' <table id="example2" class="table table-striped table-bordered"  style="width:100%">';
                        txt += '<thead> <tr> <th>Codigo</th> <th>Descripcion</th> </tr> </thead>';
                        for (x in date) {
                            txt += "<tr><td>" + date[x].Codigo + "</td>";
                            txt += "<td>" + date[x].Descripcion + "</td></tr>";
                        }
                        txt += "</table>"
                        document.getElementById("loadTableMonedaReporte").innerHTML = txt;
                        var table = $('#example2').DataTable();

                        $('#example2 tbody').on('click', 'tr', function () {
                            var datos = table.row(this).data();
                            //alert(datos[0]);
                            $("#MonedaRep").val(datos[0]);
                            $("#modalMonedaReporte .close").click()
                        });
                    }
                }
            };

            xmlhttp.open("GET", host + "/MFG-RockJS/?action=getMoneda&jwt=" + jwt.toLocaleString(), true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("jwt=" + dbParam);
        });
    </script>

    <script>
        /*
         * Consulta catalogo de clientes
         * Despliega el resultado en una table
         * al seleccionar una fila de la tabla llena los inputs del form
         * con los datos del cliente seleccionado
         */
        $("#Monedas").click(function () {
            $("#Moneda").val("");
            document.getElementById("loadTableMoneda").innerHTML = '<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... espere <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>';
            var obj, dbParam, xmlhttp, myObj, x, txt = "";
            obj = {table: "customers", limit: 20};
            dbParam = JSON.stringify(obj);
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    myObj = JSON.parse(this.responseText);
                    console.log(myObj);
                    var date = myObj.message;
                    console.log(date);
                    if (myObj.status.toString() == "Error") {
                        document.getElementById("help").innerHTML = '<div class="alert alert-warning"><strong>Mensaje!</strong> ' + myObj.message.auth + ' <button class="btn btn-outline-warning" onclick="louout()">Log in again</button></div>';
                        document.getElementById("loadTableMoneda").innerHTML = '<div class="alert alert-warning"><strong>Mensaje!</strong> ' + myObj.message.auth + ' <button class="btn btn-outline-warning" onclick="louout()">Log in again</button></div>';
                        $("#modalMoneda .close").click()
                    } else {
                        txt += ' <table id="example3" class="table table-striped table-bordered"  style="width:100%">';
                        txt += '<thead> <tr> <th>Codigo</th> <th>Descripcion</th> </tr> </thead>';
                        for (x in date) {
                            txt += "<tr><td>" + date[x].Codigo + "</td>";
                            txt += "<td>" + date[x].Descripcion + "</td></tr>";
                        }
                        txt += "</table>"
                        document.getElementById("loadTableMoneda").innerHTML = txt;
                        var table = $('#example3').DataTable();

                        $('#example3 tbody').on('click', 'tr', function () {
                            var datos = table.row(this).data();
                            //alert(datos[0]);
                            $("#Moneda").val(datos[0]);
                            $("#modalMoneda .close").click()
                        });
                    }
                }
            };

            xmlhttp.open("GET", host + "/MFG-RockJS/?action=getMoneda&jwt=" + jwt.toLocaleString(), true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("jwt=" + dbParam);
        });
    </script>

    <script>
        /*
         * Consulta catalogo de Moneda
         * Despliega el resultado en una table
         * al seleccionar una fila de la tabla llena los inputs del form
         * con los datos del la moneda seleccionado
         */
        $("#Clientes").click(function () {
            $("#Cobra").val("");
            document.getElementById("loadTableClient").innerHTML = '<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... espere <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>';
            var obj, dbParam, xmlhttp, myObj, x, txt = "";
            obj = {table: "customers", limit: 20};
            dbParam = JSON.stringify(obj);
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    myObj = JSON.parse(this.responseText);
                    console.log(myObj);
                    var date = myObj.message;
                    console.log(date);
                    if (myObj.status.toString() == "Error") {
                        document.getElementById("help").innerHTML = '<div class="alert alert-warning"><strong>Mensaje!</strong> ' + myObj.message.auth + ' <button class="btn btn-outline-warning" onclick="louout()">Log in again</button></div>';
                        document.getElementById("loadTableClient").innerHTML = '<div class="alert alert-warning"><strong>Mensaje!</strong> ' + myObj.message.auth + ' <button class="btn btn-outline-warning" onclick="louout()">Log in again</button></div>';
                        $("#modalClientes .close").click()
                    } else {
                        txt += ' <table id="example" class="table table-striped table-bordered"  style="width:100%">';
                        txt += '<thead> <tr> <th>Cliente</th> <th>Nombre</th>  <th>Balance</th> <th>Abierto</th></tr> </thead>';
                        for (x in date) {
                            txt += "<tr><td>" + date[x].Codigo + "</td>";
                            txt += "<td>" + date[x].Descripcion + "</td>";
                            txt += "<td>" + date[x].Balance + "</td>";
                            txt += "<td>" + date[x].Abierto + "</td></tr>";
                        }
                        txt += "</table>"
                        document.getElementById("loadTableClient").innerHTML = txt;
                        var table = $('#example').DataTable();

                        $('#example tbody').on('click', 'tr', function () {
                            var datos = table.row(this).data();
                            //alert(datos[0]);
                            $("#Cobra").val(datos[0]);
                            $("#Ord").val(datos[1]);
                            $("#Balance").val(datos[2]);
                            $("#Solo_Abiert").val("No");
                            $("#modalClientes .close").click()
                        });
                    }
                }
            };

            xmlhttp.open("GET", "/MFG-RockJS/?action=getCliente&jwt=" + jwt.toLocaleString(), true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("jwt=" + dbParam);
        });


    </script>
</div>
</body>
</html>

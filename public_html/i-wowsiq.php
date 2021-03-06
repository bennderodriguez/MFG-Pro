<?php include './headers.php'; ?>
<p id="result"> </p>
<div id="header"></div>
<div class="loader"></div>
<div id="help"></div>
<div class="card panel-heading">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-end">
            <h4>Consultar Orden de Trabajo Móvil</h4>
        </div>
    </div>
    <div class="card-body">
        <form role="form" id="wowsiq" data-toggle="validator" class="shake" autocomplete="off">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="Articulos">Articulos</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="Articulos" name=Articulos" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" title="Consultar Articulos" id="Articulo" data-toggle="modal" data-target="#modalArticulo"><i class="pe-7s-look"></i></button>
                            </div>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="OT">O/T</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="OT" name="OT">
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" title="Consultar Ordenes de Trabajo" id="OTs" data-toggle="modal" data-target="#modalOT"><i class="pe-7s-look"></i></button>
                            </div>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="ID">ID</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="ID" name="ID">
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" title="Consultar ID" id="IdOt" data-toggle="modal" data-target="#modalID"><i class="pe-7s-look"></i></button>
                            </div>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="Vencido">Vencido</label>
                        <div class="input-group mb-3">
                            <input type="date" min="2000-01-02" class="form-control" id="Vencido" name="Vencido" placeholder="Fecha Vencido">
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                    </div>                                 
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="OV/Trb">OV/Trb</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="OVtrv" name="OVtrv" placeholder="OV/Trb">
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" title="Consultar OV/Trb" id="OVtrvs" data-toggle="modal" data-target="#modalOVtrv"><i class="pe-7s-look"></i></button>
                            </div>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="Almacén">Almacén</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="Almacen" name="Almacen">
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" title="Consultar Almacen" id="Almacenes" data-toggle="modal" data-target="#modalAlmacen"><i class="pe-7s-look"></i></button>
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
                        <button type="submit" id="btnSubmit" class="btn btn-outline-success btn-block">Consultar</button>
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

<!-- Table modalArticulo -->
<div class="modal fade" id="modalArticulo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Catalogo de Artículos</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="loadTableArticulos"></div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Table modalOT -->
<div class="modal fade" id="modalOT">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Consulta Ordenes de Trabajo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="loadTableOT"></div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Table modalID-->
<div class="modal fade" id="modalID">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">ID orden de trabajo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="loadTableIdOt"></div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Table modalOVTrb-->
<div class="modal fade" id="modalOVtrv">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Catalogo OV/Trb</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="loadTableOVTrb"></div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Table modalAlmacen-->
<div class="modal fade" id="modalAlmacen">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Almacenes</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="loadTableAlmacen"></div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
<script src="asset/js/i-wowsiq.js"></script>
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
         * Consulta catalogo de modalID
         * Despliega el resultado en una table
         * al seleccionar una fila de la tabla llena los inputs del form
         * con los datos del cliente seleccionado
         */
        $("#Almacenes").click(function () {
            $("#Almacen").val("");
            document.getElementById("loadTableAlmacen").innerHTML = '<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... espere <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>';
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
                        document.getElementById("loadTableAlmacen").innerHTML = '<div class="alert alert-warning"><strong>Mensaje!</strong> ' + myObj.message.auth + ' <button class="btn btn-outline-warning" onclick="louout()">Log in again</button></div>';
                        $("#modalAlmacen .close").click()
                    } else {
                        txt += ' <table id="Alm" class="table table-striped table-bordered"  style="width:100%">';
                        txt += '<thead> <tr><th>Almacén</th> <th>Descripcion</th> <th>Entidad</th><th>Edo Predeterminado</th><th>Ub Auto</th><th>BaseDato</th><th>Gpo Ctos Actuales</th>  </tr> </thead>';
                        for (x in date) {
                            txt += "<tr><td>" + date[x].Almacen + "</td>";
                            txt += "<td>" + date[x].Descripcion + "</td>";
                            txt += "<td>" + date[x].Entidad + "</td>";
                            txt += "<td>" + date[x].EdoPredeterminado + "</td>";
                            txt += "<td>" + date[x].UbAuto + "</td>";
                            txt += "<td>" + date[x].BaseDato + "</td>";
                            txt += "<td>" + date[x].GpoCtosActuales + "</td></tr>";
                        }
                        txt += "</table>"
                        document.getElementById("loadTableAlmacen").innerHTML = txt;
                        var table = $('#Alm').DataTable();

                        $('#Alm tbody').on('click', 'tr', function () {
                            var datos = table.row(this).data();
                            //alert(datos[0]);
                            $("#Almacen").val(datos[0]);
                            $("#modalAlmacen .close").click()
                        });
                    }
                }
            };

            xmlhttp.open("GET", host + "/MFG-RockJS/?action=getAlmacen&jwt=" + jwt.toLocaleString(), true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("jwt=" + dbParam);
        });
    </script>
    <script>
        /*
         * Consulta catalogo de modalID
         * Despliega el resultado en una table
         * al seleccionar una fila de la tabla llena los inputs del form
         * con los datos del cliente seleccionado
         */
        $("#OVtrvs").click(function () {
            $("#OVtrv").val("");
            document.getElementById("loadTableOVTrb").innerHTML = '<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... espere <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>';
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
                        document.getElementById("loadTableOVTrb").innerHTML = '<div class="alert alert-warning"><strong>Mensaje!</strong> ' + myObj.message.auth + ' <button class="btn btn-outline-warning" onclick="louout()">Log in again</button></div>';
                        $("#modalOVtrv .close").click()
                    } else {
                        txt += ' <table id="OV" class="table table-striped table-bordered"  style="width:100%">';
                        txt += '<thead> <tr><th>Orden de trabajo</th> <th>OV/Trb</th> <th>Número Artículo</th><th>Vencido</th></tr> </thead>';
                        for (x in date) {
                            txt += "<tr><td>" + date[x].OrdenTrabajo + "</td>";
                            txt += "<td>" + date[x].OVTrb + "</td>";
                            txt += "<td>" + date[x].NumeroArticulo + "</td>";
                            txt += "<td>" + date[x].Vencido + "</td></tr>";
                        }
                        txt += "</table>"
                        document.getElementById("loadTableOVTrb").innerHTML = txt;
                        var table = $('#OV').DataTable();

                        $('#OV tbody').on('click', 'tr', function () {
                            var datos = table.row(this).data();
                            //alert(datos[0]);
                            $("#OVtrv").val(datos[1]);
                            $("#modalOVtrv .close").click()
                        });
                    }
                }
            };

            xmlhttp.open("GET", host + "/MFG-RockJS/?action=getOVtrb&jwt=" + jwt.toLocaleString(), true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("jwt=" + dbParam);
        });
    </script>
    <script>
        /*
         * Consulta catalogo de modalID
         * Despliega el resultado en una table
         * al seleccionar una fila de la tabla llena los inputs del form
         * con los datos del cliente seleccionado
         */
        $("#IdOt").click(function () {
            $("#ID").val("");
            document.getElementById("loadTableIdOt").innerHTML = '<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... espere <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>';
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
                        document.getElementById("loadTableIdOt").innerHTML = '<div class="alert alert-warning"><strong>Mensaje!</strong> ' + myObj.message.auth + ' <button class="btn btn-outline-warning" onclick="louout()">Log in again</button></div>';
                        $("#modalID .close").click()
                    } else {
                        txt += ' <table id="example2" class="table table-striped table-bordered"  style="width:100%">';
                        txt += '<thead> <tr><th>ID</th><th>Orden de trabajo</th> <th>Vencido</th> <th>Cantidad Orden</th></tr> </thead>';
                        for (x in date) {
                            txt += "<tr><td>" + date[x].ID + "</td>";
                            txt += "<td>" + date[x].OrdenTrabajo + "</td>";
                            txt += "<td>" + date[x].Vencido + "</td>";
                            txt += "<td>" + date[x].CantOrd + "</td></tr>";
                        }
                        txt += "</table>"
                        document.getElementById("loadTableIdOt").innerHTML = txt;
                        var table = $('#example2').DataTable();

                        $('#example2 tbody').on('click', 'tr', function () {
                            var datos = table.row(this).data();
                            //alert(datos[0]);
                            $("#ID").val(datos[0]);
                            $("#modalID .close").click()
                        });
                    }
                }
            };

            xmlhttp.open("GET", host + "/MFG-RockJS/?action=getIdOT&jwt=" + jwt.toLocaleString(), true);
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
        $("#OTs").click(function () {
            $("#OT").val("");
            document.getElementById("loadTableOT").innerHTML = '<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... espere <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>';
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
                        document.getElementById("loadTableOT").innerHTML = '<div class="alert alert-warning"><strong>Mensaje!</strong> ' + myObj.message.auth + ' <button class="btn btn-outline-warning" onclick="louout()">Log in again</button></div>';
                        $("#modalOT .close").click()
                    } else {
                        txt += ' <table id="example3" class="table table-striped table-bordered"  style="width:100%">';
                        txt += '<thead> <tr> <th>Orden de Trabajo</th> <th>ID</th> <th>Vencido</th> <th>Cantidad Orden</th></tr> </thead>';
                        for (x in date) {
                            txt += "<tr><td>" + date[x].OrdenTrabajo + "</td>";
                            txt += "<td>" + date[x].ID + "</td>";
                            txt += "<td>" + date[x].Vencido + "</td>";
                            txt += "<td>" + date[x].CantOrd + "</td></tr>";
                        }
                        txt += "</table>"
                        document.getElementById("loadTableOT").innerHTML = txt;
                        var table = $('#example3').DataTable();

                        $('#example3 tbody').on('click', 'tr', function () {
                            var datos = table.row(this).data();
                            //alert(datos[0]);
                            $("#OT").val(datos[0]);
                            $("#modalOT .close").click()
                        });
                    }
                }
            };

            xmlhttp.open("GET", host + "/MFG-RockJS/?action=getOT&jwt=" + jwt.toLocaleString(), true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("jwt=" + dbParam);
        });
    </script>

    <script>
        /*
         * Consulta catalogo de Articulos
         * Despliega el resultado en una table
         * al seleccionar una fila de la tabla llena los inputs del form
         * con los datos del la moneda seleccionado
         */
        $("#Articulo").click(function () {
            $("#Articulos").val("");
            document.getElementById("loadTableArticulos").innerHTML = '<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... espere <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>';
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
                        document.getElementById("loadTableArticulos").innerHTML = '<div class="alert alert-warning"><strong>Mensaje!</strong> ' + myObj.message.auth + ' <button class="btn btn-outline-warning" onclick="louout()">Log in again</button></div>';
                        $("#modalArticulo .close").click()
                    } else {
                        txt += ' <table id="example" class="table table-striped table-bordered"  style="width:100%">';
                        txt += '<thead> <tr> <th>Numero de articulo</th> <th>Descripcion</th>  <th>Descripcion2</th> <th>Line</th><th>UM</th></tr> </thead>';
                        for (x in date) {
                            txt += "<tr><td>" + date[x].Articulo + "</td>";
                            txt += "<td>" + date[x].Descripcion + "</td>";
                            txt += "<td>" + date[x].Descripcion2 + "</td>";
                            txt += "<td>" + date[x].Line + "</td>";
                            txt += "<td>" + date[x].UM + "</td></tr>";
                        }
                        txt += "</table>"
                        document.getElementById("loadTableArticulos").innerHTML = txt;
                        var table = $('#example').DataTable();

                        $('#example tbody').on('click', 'tr', function () {
                            var datos = table.row(this).data();
                            //alert(datos[0]);
                            $("#Articulos").val(datos[0]);
                            /*$("#Ord").val(datos[1]);
                             $("#Balance").val(datos[2]);
                             $("#Solo_Abiert").val("No");*/
                            $("#modalArticulo .close").click()
                        });
                    }
                }
            };

            xmlhttp.open("GET", "/MFG-RockJS/?action=getArticulo&jwt=" + jwt.toLocaleString(), true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("jwt=" + dbParam);
        });
    </script>

</div>
</body>
</html>

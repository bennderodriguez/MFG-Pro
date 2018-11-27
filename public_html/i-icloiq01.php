<?php include './headers.php'; ?>
<p id="result"> </p>
<div id="header"></div>
<div class="loader"></div>
<div id="help"></div>
<div class="card panel-heading">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-end">
            <h4>Inventario de Artículos Móvil</h4>
        </div>
    </div>
    <div class="card-body">
        <form role="form" id="icloiq" data-toggle="validator" class="shake" autocomplete="off">
            <div class="row">
                <div class="col-sm-3">
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
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Almacén">Almacén</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="Almacen" name="Almacen" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" title="Consultar Almacen" id="Almacenes" data-toggle="modal" data-target="#modalAlmacen"><i class="pe-7s-look"></i></button>
                            </div>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Ubicacion">Ubicacion</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="Ubicacion" name="Ubicacion" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" title="Consultar catalogo de ubicaciones" id="btnUbicacion" data-toggle="modal" data-target="#modalUbicacion"><i class="pe-7s-look"></i></button>
                            </div>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Lote">Lote</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="Lote" name="Lote">
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" title="Consultar Lote" id="btnLote" data-toggle="modal" data-target="#modalLote"><i class="pe-7s-look"></i></button>
                            </div>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="Status">Status</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="Status" name="Status" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" title="Consultar Status" id="btnStatus" data-toggle="modal" data-target="#modalStatus"><i class="pe-7s-look"></i></button>
                            </div>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="Salida">Salida</label>
                        <select class="form-control" id="Salida" name="Salida" required>
                            <option value="Terminal">Terminal</option>
                            <option value="PDF">PDF</option>
                        </select>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-4">
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

<!-- Table modalStatus -->
<div class="modal fade" id="modalStatus">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Status</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="loadTableStatus"></div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Table modalLote -->
<div class="modal fade" id="modalLote">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Lote</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="loadTableLote"></div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Table modalUbicacion -->
<div class="modal fade" id="modalUbicacion">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Catalogo de Ubicaciones</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="loadTableUbicacion"></div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
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
<script src="asset/js/i-icloiq01.js"></script>
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
            $("#Almacen").val(""); //set empty input text field
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
         * Consulta catalogo de Articulos
         * Despliega el resultado en una table
         * al seleccionar una fila de la tabla llena los inputs del form
         * con los datos del la moneda seleccionado
         */
        $("#Articulo").click(function () {
            $("#Articulos").val(""); //set empty input text field
            $("#Almacen").val(""); //set empty input text field
            $("#Ubicacion").val(""); //set empty input text field
            $("#Lote").val(""); //set empty input text field
            $("#Status").val(""); //set empty input text field
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
                        txt += '<thead> <tr> <th>Numero de articulo</th> <th>Almacén</th>  <th>Ubicación</th> <th>Lote</th><th>Status</th></tr> </thead>';
                        for (x in date) {
                            txt += "<tr><td>" + date[x].Articulo + "</td>";
                            txt += "<td>" + date[x].Almacen + "</td>";
                            txt += "<td>" + date[x].Ubi + "</td>";
                            txt += "<td>" + date[x].LotSerie + "</td>";
                            txt += "<td>" + date[x].Status + "</td></tr>";
                        }
                        txt += "</table>"
                        document.getElementById("loadTableArticulos").innerHTML = txt;
                        var table = $('#example').DataTable();

                        $('#example tbody').on('click', 'tr', function () {
                            var datos = table.row(this).data();
                            //alert(datos[0]);
                            $("#Articulos").val(datos[0]);
                            $("#Almacen").val(datos[1]);
                            $("#Ubicacion").val(datos[2]);
                            $("#Lote").val(datos[3]);
                            $("#Status").val(datos[4]);
                            $("#modalArticulo .close").click()
                        });
                    }
                }
            };

            xmlhttp.open("GET", "/MFG-RockJS/?action=getAlmacenInv&jwt=" + jwt.toLocaleString(), true);
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
        $("#btnUbicacion").click(function () {
            $("#Ubicacion").val(""); //set empty input text field
            document.getElementById("loadTableUbicacion").innerHTML = '<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... espere <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>';
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
                        document.getElementById("loadTableUbicacion").innerHTML = '<div class="alert alert-warning"><strong>Mensaje!</strong> ' + myObj.message.auth + ' <button class="btn btn-outline-warning" onclick="louout()">Log in again</button></div>';
                        $("#modalUbicacion .close").click()
                    } else {
                        txt += ' <table id="ubic" class="table table-striped table-bordered"  style="width:100%">';
                        txt += '<thead> <tr> <th>Ubicación</th> <th>Almacén</th>  <th>Descripcion</th> <th>F Creación</th><th>Permanente</th></tr> </thead>';
                        for (x in date) {
                            txt += "<tr><td>" + date[x].Ubi + "</td>";
                            txt += "<td>" + date[x].Almcen + "</td>";
                            txt += "<td>" + date[x].Descripcion + "</td>";
                            txt += "<td>" + date[x].Creado + "</td>";
                            txt += "<td>" + date[x].Perm + "</td></tr>";
                        }
                        txt += "</table>"
                        document.getElementById("loadTableUbicacion").innerHTML = txt;
                        var table = $('#ubic').DataTable();

                        $('#ubic tbody').on('click', 'tr', function () {
                            var datos = table.row(this).data();
                            //alert(datos[0]);
                            $("#Ubicacion").val(datos[0]);
                            /*$("#Ord").val(datos[1]);
                             $("#Balance").val(datos[2]);
                             $("#Solo_Abiert").val("No");*/
                            $("#modalUbicacion .close").click()
                        });
                    }
                }
            };

            xmlhttp.open("GET", "/MFG-RockJS/?action=getUbicacion&jwt=" + jwt.toLocaleString(), true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("jwt=" + dbParam);
        });
    </script>

    <script>
        /*
         * Consulta catalogo de Lote
         * Despliega el resultado en una table
         * al seleccionar una fila de la tabla llena los inputs del form
         * con los datos del la moneda seleccionado
         */
        $("#btnLote").click(function () {
            $("#Lote").val(""); //set empty input text field
            document.getElementById("loadTableLote").innerHTML = '<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... espere <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>';
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
                        document.getElementById("loadTableLote").innerHTML = '<div class="alert alert-warning"><strong>Mensaje!</strong> ' + myObj.message.auth + ' <button class="btn btn-outline-warning" onclick="louout()">Log in again</button></div>';
                        $("#modalLote .close").click()
                    } else {
                        txt += ' <table id="lot" class="table table-striped table-bordered"  style="width:100%">';
                        txt += '<thead> <tr> <th>Lote</th> <th>Ubicación</th>  <th>Ref</th> <th>Cntenexist</th><th>Status</th></tr> </thead>';
                        for (x in date) {
                            txt += "<tr><td>" + date[x].LoteSerie + "</td>";
                            txt += "<td>" + date[x].Ubic + "</td>";
                            txt += "<td>" + date[x].Ref + "</td>";
                            txt += "<td>" + date[x].Cntenexist + "</td>";
                            txt += "<td>" + date[x].Status + "</td></tr>";
                        }
                        txt += "</table>"
                        document.getElementById("loadTableLote").innerHTML = txt;
                        var table = $('#lot').DataTable();

                        $('#lot tbody').on('click', 'tr', function () {
                            var datos = table.row(this).data();
                            //alert(datos[0]);
                            $("#Lote").val(datos[0]);
                            /*$("#Ord").val(datos[1]);
                             $("#Balance").val(datos[2]);
                             $("#Solo_Abiert").val("No");*/
                            $("#modalLote .close").click()
                        });
                    }
                }
            };

            xmlhttp.open("GET", "/MFG-RockJS/?action=getLote&jwt=" + jwt.toLocaleString(), true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("jwt=" + dbParam);
        });
    </script>

    <script>
        /*
         * Consulta catalogo de Lote
         * Despliega el resultado en una table
         * al seleccionar una fila de la tabla llena los inputs del form
         * con los datos del la moneda seleccionado
         */
        $("#btnStatus").click(function () {
            $("#Status").val(""); //set empty input text field
            document.getElementById("loadTableStatus").innerHTML = '<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... espere <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>';
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
                        document.getElementById("loadTableStatus").innerHTML = '<div class="alert alert-warning"><strong>Mensaje!</strong> ' + myObj.message.auth + ' <button class="btn btn-outline-warning" onclick="louout()">Log in again</button></div>';
                        $("#modalStatus .close").click()
                    } else {
                        txt += ' <table id="stat" class="table table-striped table-bordered"  style="width:100%">';
                        txt += '<thead> <tr> <th>Status</th> <th>Disponible</th>  <th>Neteable</th> <th>Sldex</th><th>Fecha Modificación</th><th>Congelado</th></tr> </thead>';
                        for (x in date) {
                            txt += "<tr><td>" + date[x].Codigoestatus + "</td>";
                            txt += "<td>" + date[x].Disponible + "</td>";
                            txt += "<td>" + date[x].neteable + "</td>";
                            txt += "<td>" + date[x].sldex + "</td>";
                            txt += "<td>" + date[x].fechamod + "</td>";
                            txt += "<td>" + date[x].Congelado + "</td></tr>";
                        }
                        txt += "</table>"
                        document.getElementById("loadTableStatus").innerHTML = txt;
                        var table = $('#stat').DataTable();

                        $('#stat tbody').on('click', 'tr', function () {
                            var datos = table.row(this).data();
                            //alert(datos[0]);
                            $("#Status").val(datos[0]);
                            /*$("#Ord").val(datos[1]);
                             $("#Balance").val(datos[2]);
                             $("#Solo_Abiert").val("No");*/
                            $("#modalStatus .close").click()
                        });
                    }
                }
            };

            xmlhttp.open("GET", "/MFG-RockJS/?action=getStatus&jwt=" + jwt.toLocaleString(), true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("jwt=" + dbParam);
        });
    </script>

</div>
</body>
</html>

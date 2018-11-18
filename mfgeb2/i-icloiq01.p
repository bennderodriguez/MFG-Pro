 <form method="post" >
     <fieldset><span class="graytitle">Cons Inventarios X Articulo</span>
     
     <span class="graytitle"></span>
     <ul class="pageitem">
     <li class="buton">
     <a href="i-icloiq02.php">
     <img alt="buscar" src="thumbs/start.png" />
     </a>Buscar Articulo
     </li>
     <li class="smallfield"><span class="name">Articulo:</span>
         <input name="CboArticulo" value="' CboArticulo '" placeholder="Articulo" type="text" />
     </li>'.

	  find pt_ where pt_part = cboArticulo no-lock no-error.
       
     {&out} 
         '
         <li class="smallfield"><span class="name">Planta:</span>
             <input name="fplanta" value="' fplanta '" placeholder="Planta" type="text" />
         </li>
         <li class="smallfield"><span class="name">Ubicación:</span>
             <input name="fubica" value="' fubica '" placeholder="Ubicacion" type="text" />
         </li>
		 
		  <li class="smallfield"><span class="name">Lote:</span>
             <input name="flote" value="' flote '" placeholder="Lote" type="text" />
         </li>
         <li class="smallfield"><span class="name">Status:</span>
             <input name="lstat" value="' lstat '" placeholder="Status" type="text" />
         </li> '.  	  
     {&Out} '
                <li class="select" <span class="header">Salida</span> <select name="CboReporte">'.
                IF reportes = "1" or reportes = "" THEN {&out}          
                   '<option value=1 SELECTED>Consulta</option>'
                   '<option value="2">Reporte</option>'
                   '<option value="3">PDF</option>' .
                IF reportes = "2" THEN {&out}          
                   '<option value="1">Consulta</option>'
                   '<option value=2 SELECTED>Reporte</option>'
                   '<option value="3">PDF</option>'.
                IF reportes = "3" THEN {&out}          
                   '<option value="1">Consulta</option>'
                   '<option value="2">Reporte</option>' 
                   '<option value=3 SELECTED>PDF</option>'.
        {&Out} '
                </select><span class="arrow"></span> 
                </li>'.
    {&Out} '
            <li class="button">
            <input name="Submit input" type="submit" value="Submit" /></li>
            </ul>
     </fieldset></form>
</div>
'.

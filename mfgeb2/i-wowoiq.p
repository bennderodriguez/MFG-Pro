   ' <form method="post" > 
     <fieldset><span class="graytitle"><b>Consulta de OTs</b></span>
     <ul class="pageitem">'.

     {&OUT} '
        <li class="buton">
         <a href="i-wowoiq2.php?vtipo=3&fot=' fot '&fid=' fid '&fpart=' fpart '&fsite=' fsite '&ffecha=' ffecha '">
        <img alt="buscar" src="thumbs/start.png" />
        </a>Buscar Componente
        </li>'.

    /*eporte */    
    {&out} ' <li class="smallfield"><span class="name">Componente:</span> '.
    {&out} '<input type="text" name="fpart" value="' fpart '" > </li> '.

    {&out} 
     '<li class="buton">
     <a href="i-wowoiq2.php?vtipo=1&fot=' fot '&fid=' fid '&fpart=' fpart '&fsite=' fsite '&ffecha=' ffecha '">
     <img alt="buscar" src="thumbs/start.png" />
     </a>Buscar OT
     </li>'.

     {&out} ' <li class="smallfield"><span class="name">Orden de trabajo:</span> '.
     {&out} '<input type="text" name="fot" value="' fot ' "  '.
     {&OUT} ' </li>  '.

     {&OUT} '
        <li class="buton">
         <a href="i-wowoiq2.php?vtipo=2&fot=' fot '&fid=' fid '&fpart=' fpart '&fsite=' fsite '&ffecha=' ffecha '">
        <img alt="buscar" src="thumbs/start.png" />
        </a>Buscar ID
        </li>'.
    /* Moneda Inicial */    
     {&out} ' <li class="smallfield">  <span class="name"> ID:   </span> '.
     {&out} ' <input type="text"  name="fid" value="' fid ' "  /> '.
     {&OUT} ' </li>  '.

      
      {&out} '<li class="smallfield"><span class="name"><b>Vencido:</b></span>  </a>'.
	  {&out} '<input type="text" name="ffecha" value="' ffecha '" '.
	  {&out} '      </li> '.
      
      {&out} 
      '<li class="buton">
      <a href="i-wowoiq2.php?vtipo=1&fot=' fot '&fid=' fid '&fpart=' fpart '&fsite=' fsite '&ffecha=' ffecha '">
      <img alt="buscar" src="thumbs/start.png" />
      </a>Buscar OT
      </li>'.

      {&out} ' <li class="smallfield"><span class="name">OV/Trab:</span> '.
      {&out} '<input type="text" name="fov" value="' fov ' "  '.
      {&OUT} ' </li>  '.

     /* Moneda Reporte */    
     {&OUT} '
       <li class="buton">
        <a href="i-wowoiq2.php?vtipo=4&fot=' fot '&fid=' fid '&fpart=' fpart '&fsite=' fsite '&ffecha=' ffecha '">
       <img alt="buscar" src="thumbs/start.png" />
       </a>Buscar almacen
       </li>'.

      {&out} '<li class="smallfield"><span class="name"><b>Almacen:</b></span>'.
      {&out} '<input type="text" name="fsite" value="' fsite '" > '.
      {&OUT} ' </li>  '.
      
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
     </div>'.

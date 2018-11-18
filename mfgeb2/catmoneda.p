&GLOBAL-DEFINE OUT PUT UNFORMATTED
       {&OUT} ' [ ' .
FOR EACH cu_mstr BREAK BY cu_curr:
 {&OUT} '  	
	 ~{
		      "Codigo": "' ( cu_curr ) '",
		      "Descripcion": "' ( cu_desc ) '",
              "Activo": "' ( cu_active ) '"
       ' .
  IF LAST(cu_curr) THEN DO:
     {&OUT} '
        ~} ' .
  END.
  ELSE DO:
     {&OUT} '  ~}, ' .

  END.
END.
{&OUT} ' ] ' .



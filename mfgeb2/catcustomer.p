&GLOBAL-DEFINE OUT PUT UNFORMATTED
DEFINE VARIABLE vciudad LIKE ad_mstr.ad_city.
DEFINE VARIABLE vestado LIKE ad_mstr.ad_state.
DEFINE VARIABLE vabierto LIKE ar_mstr.ar_open .
DEFINE VARIABLE vcaracter LIKE cm_sort .
       {&OUT} ' [ ' .
FOR EACH cm_mstr BREAK BY cm_addr:
  FIND FIRST ad_mstr WHERE ad_mstr.ad_addr = cm_mstr.cm_addr NO-LOCK NO-ERROR.
  IF AVAILABLE ad_mstr THEN DO:
           ASSIGN  vciudad   = ad_mstr.ad_city
                   vestado   = ad_mstr.ad_state.
  END.
  FIND FIRST ar_mstr WHERE ar_mstr.ar_bill = cm_mstr.cm_addr NO-LOCK NO-ERROR.
   IF AVAILABLE ar_mstr THEN DO:
       vabierto =  ar_open.
   END.
    ASSIGN vcaracter =  REPLACE(cm_mstr.cm_sort,"'","").
 
         {&OUT} '  	
        	 ~{
        		      "Codigo": "' ( cm_addr ) '",
        		      "Descripcion": "' ( vcaracter ) '",
                      "Balance": "' ( cm_balance ) '",
                      "Ciudad": "' ( vciudad ) '",
                      "Estado": "' ( vestado ) '",
                      "Abierto": "' ( vabierto ) '"
               ' .
          IF LAST(cm_addr) THEN DO:
             {&OUT} '
                ~} ' .
          END.
          ELSE DO:
             {&OUT} '  ~}, ' .
        
          END.
  
 
END.
{&OUT} ' ] ' .


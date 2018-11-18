&GLOBAL-DEFINE OUT PUT UNFORMATTED

DEFINE VARIABLE vipcte     LIKE cm_addr.
DEFINE VARIABLE vipmoneda  LIKE cu_curr.
DEFINE VARIABLE vipmoneda2 LIKE cu_curr.
define variable vipabierto as logical.
DEFINE VARIABLE vopen      AS CHAR.
DEFINE VARIABLE vconsulta  AS CHAR.
DEFINE VARIABLE vreporte   AS CHAR.
DEFINE VARIABLE login      AS CHAR.
DEFINE VARIABLE v-ruta     AS CHAR.

ASSIGN
vipcte        = OS-GETENV("vipcte":U)
vipmoneda     = OS-GETENV("vipmoneda":U)
vipmoneda2    = OS-GETENV("vipmoneda2":U)
vipabierto    = logical(OS-GETENV("vipabierto":U)).
/*
vipabierto=TRUE.
vipmoneda="MN".
vipmoneda2="MN".
vipcte="01000000".
*/
login = "mfg".
vopen = IF vipabierto THEN "Si" ELSE "No".

IF vipmoneda2 = ? THEN vipmoneda2 = vipmoneda.

    FIND FIRST procesos WHERE
     procesos.programa   = "arcsiq.p" AND
     procesos.dato1      = vipcte     AND
     procesos.dato2      = "mfg"      AND
     procesos.dato4      = today      AND
     procesos.dato6      = vopen      AND
     procesos.dato7      = vipmoneda  AND
     procesos.dato8      = vipmoneda2 and
     NOT procesos.procesado   NO-LOCK NO-ERROR.
    
    IF NOT AVAIL procesos THEN DO:
        create procesos.
        assign 
        procesos.programa   = "arcsiq.p"
        procesos.dato1      = vipcte
        procesos.dato2      = login     
        procesos.dato10     = "C:\AppServ\www\MFG-Pro\public_html\"     
        procesos.dato3      = string(time).
        procesos.dato4      = today       .
        procesos.dato6      = vopen.
        procesos.dato7      = vipmoneda .
        procesos.dato8      = vipmoneda2.
        procesos.dato9      = "1".
        vreporte  = procesos.dato3 + ".pdf".
        vconsulta = procesos.dato3 + ".prn".
    END.
    ELSE DO:
        vreporte  = procesos.dato3 + ".pdf".
        vconsulta = procesos.dato3 + ".prn".
    END.

    {&OUT} ' [  ' .
    {&OUT} ' ~{"Consulta": "' procesos.dato3 '" }' .
    {&OUT} ' ] ' .
                                            
     release procesos.
     /*
     v-ruta = procesos.dato10.
     DISP "PDF:" search(v-ruta +  login + "\" + vreporte ) FORMAT "X(70)".
     */    

	  
	  
	  

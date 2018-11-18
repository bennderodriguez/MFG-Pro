{mfdeclre.i }
{mf1.i }

current-window:width = 105.

def var v-archivo1 as char.
def var v-archivo2 as char.
DEF VAR v-lin AS CHAR.
DEF VAR v-ot AS CHAR.
DEF VAR v-id AS CHAR.
DEF VAR v-sal AS CHAR.
def buffer bprocesos for procesos.

main:
repeat:

   find first bprocesos where not bprocesos.procesado no-lock no-error.
   if not avail bprocesos THEN DO:
        disp "no hay registros".
        pause 2.
        NEXT.
   END.

   for each bprocesos where not bprocesos.procesado AND bprocesos.mensaje = "" no-lock.
 
        find first procesos where recid(procesos) = recid(bprocesos)  exclusive-lock no-error.
        IF procesos.programa = "" OR procesos.dato3 = "" THEN do: 
           DELETE procesos.
           NEXT.
        END.
        IF LOCKED(procesos) THEN DO:
           disp "registro ocupado".
           PAUSE 2. 
           NEXT.
        END.
   
        if avail procesos then do:
      
            DISPLAY procesos.programa procesos.dato3 .

            CASE procesos.programa:
                when "arcsiq.p" then do:
                  RUN p-arcsiq.
                end.
                when "icloiq01.p" then do:
                  RUN p-icloiq01.
                end.
                when "wowsiq.p" then do:
                  RUN p-wowsiq.
                end.
                when "wowoiq.p" then do:
                  RUN p-wowoiq.
                end.
                when "wowomt.p" then do:
                  RUN p-wowomt.
                end.
                when "ardriq.p" then do:
                  RUN p-ardriq.
                end.
                WHEN "arcsrp.p" then do:
                  RUN p-arcsrp.
                end.
                when "arcsrp01.p" then do:
                  RUN p-arcsrp01.
                end.
                when "arcsrp03.p" then do:
                  RUN p-arcsrp03.
                end.          
                OTHERWISE NEXT.
            END.
            v-archivo1 = procesos.dato3 + ".prn".
            v-archivo2 = procesos.dato10  + procesos.dato2 + "\" + procesos.dato3 + ".prn".

            disp v-archivo1 search(v-archivo1) FORMAT "x(70)"
                 v-archivo2 FORMAT "x(70)" .    
            PAUSE 0.
            RELEASE procesos.
            IF search(v-archivo1) <> ? THEN DO:
               dos silent value("copy " + v-archivo1 + " " + v-archivo2).
               disp search(v-archivo2) FORMAT "x(70)".    
               PAUSE 1.
            END.
      end. /* if avail procesos */  
   end. /* each */
END. /* main */

PROCEDURE p-arcsiq:
 output to value( procesos.dato1 + ".cim").
 put unform '"' procesos.dato1 '" "' IF procesos.dato6 = "Si" THEN "Yes" ELSE "No" '" "' procesos.dato7 format "x(3)" '" "' procesos.dato8 format "x(3)" '"' skip
 '"' procesos.dato3 '"' skip
 '.' skip
 '.' .
 output close.
 batchrun = yes.
 output to value(  procesos.dato1 + ".sal"). 
 input from  value( procesos.dato1 + ".cim").
 {gpRUN.i ""arcsiq.p""}
 input close.
 output close.
 batchrun = no.
 ASSIGN
 procesos.procesado = yes
 procesos.Mensaje  = "X".
 /*  */
 run c:\mfgchr\pro\xxadmpdfz.p (
               input procesos.dato10 + procesos.dato2, 
               input procesos.dato3 + ".prn", 
               input procesos.dato3 + ".pdf", 
               input "letter", 
               INPUT procesos.dato10 + "images\ncargo.jpg").
end.
PROCEDURE p-icloiq01:
 output to value( procesos.dato1 + ".cim").
 put unform '"' trim(procesos.dato1) '" "' procesos.dato6 '" "' procesos.dato7 '" "' dato8  '" "' dato9 '"' skip
 '"' procesos.dato3 '"' skip
 '.' skip
 '.' skip.
 output close.
 batchrun = yes.
 output to value( dato1 + ".sal"). 
 input from  value( dato1 + ".cim").
 {gprun.i ""icloiq01.p""}
 input close.
 output close.
 batchrun = no.
 ASSIGN
 procesos.procesado = yes
 procesos.Mensaje  = "X".
end.
PROCEDURE p-wowsiq:
 output to value(procesos.dato1 + procesos.dato1 + ".cim").
 put unform '"' dato1 '" "' dato6 '" "' dato7 '" "' dato8 format "x(8)" '" ' dato5 skip
 '"' dato3 '"' skip
 '.' skip
 '.' skip.
 output close.
 batchrun = yes.
 output to value(procesos.dato1 + dato1 + ".sal").
 input from  value(procesos.dato1 + dato1 + ".cim").
 {gpRUN.i ""wowsiq.p""}.
 input close.
 output close.
 batchrun = no.
 procesado = yes.
 procesos.Mensaje  = "X".
end.
PROCEDURE p-wowoiq:
v-sal = TRIM(procesos.dato1 + procesos.dato6 
           + procesos.dato7 + procesos.dato8
           + procesos.dato20[1]).
 output to value(v-sal + ".cim").
 put unform '"' trim(dato7) '" "' trim(dato1) '" "' 
     trim(dato6) '" "' dato5  '" "' trim(dato20[1]) '" "'  trim(dato8) '"' skip
 '"' dato3 '"' skip
 '.' skip
 '.' skip.
 output close.
 batchrun = yes.

 output to value(v-sal  + ".sal").
 input from  value(v-sal + ".cim").
 {gpRUN.i ""wowoiq.p""}.
 input close.
 output close.
 batchrun = no.
 procesado = yes.
 procesos.Mensaje  = "X".
end.

PROCEDURE p-woworp02:
 output to value(procesos.dato1 + procesos.dato1 + ".cim").

 put unform '"' dato1 '" "' dato1 '" '
          '"' dato8 '" "' dato8 '" '
          '"' dato7 '" "' dato7 '" '
          '- - '
          ' ' dato5 ' ' dato5 

          skip
 '"' dato3 '"' skip
 '.' skip
 '.' skip.
 output close.
 batchrun = yes.
 output to value(procesos.dato1 + dato1 + ".sal").
 input from  value(procesos.dato1 + dato1 + ".cim").
 {gpRUN.i ""woworp02.p""}.
 input close.
 output close.
 batchrun = no.
 procesado = yes.
 procesos.Mensaje  = "X".
end.

PROCEDURE p-wowomt:
  output to value(procesos.dato2 + procesos.dato1 + ".cim").
  FIND FIRST wo_mstr WHERE wo_lot = dato6 NO-LOCK NO-ERROR.
  IF AVAIL wo_mstr THEN DO:
      put unform '"' dato10  '" ' dato6  SKIP
        dato20[1] ' ' dato20[2] ' ' dato20[3] ' ' dato20[4] ' "' dato20[5] '" "' dato20[6] '" "' dato20[7] '" ' dato20[8] ' "' dato20[9] '" "' dato20[10] '" "' dato25[1] '" "' dato25[2] '" "' dato25[3] format "x(1)" '" "' dato25[4] format "x(1)" '"' skip
       '-' skip
       '.' skip.
  END.
  ELSE DO:
      put unform '- - ' SKIP
        '"' dato7 '" "' dato8 format "x(1)" '" ' dato9 skip
        dato20[1] ' ' dato20[2] ' ' dato20[3] ' ' dato20[4] ' "' dato20[5] '" "' dato20[6] '" "' dato20[7] '" ' dato20[8] ' "' dato20[9] '" "' dato20[10] '" "' dato25[1] '" "' dato25[2] '" "' dato25[3] format "x(1)" '" "' dato25[4] format "x(1)" '" ' skip
       '-' skip
       '.' skip.
  END.
  output close.
  batchrun = yes.
  output to value(procesos.dato2 + dato1 + ".sal").
  input from  value(procesos.dato2 + dato1 + ".cim").
  {gpRUN.i ""wowomt.p""}.
  input close.
  output close.
  IF SEARCH(procesos.dato2 + dato1 + ".sal") <> ? THEN DO:
      INPUT FROM value(procesos.dato2 + dato1 + ".sal").
      REPEAT :
        IMPORT UNFORM v-lin .

        IF v-lin MATCHES "*              Orden Trabaj*"  THEN 
            ASSIGN v-ot = SUBSTRING(v-lin,27,8) v-id = SUBSTRING(v-lin,45,8).
        IF v-lin BEGINS "ERROR:" THEN ASSIGN v-ot = "" v-id = "" procesos.Mensaje  = procesos.Mensaje + v-lin. 
      END.
      INPUT CLOSE.
  END.
  ASSIGN
  dato6    = v-id
  dato10   = v-ot
  batchrun = NO
  procesado = YES.
  IF procesos.Mensaje = "" THEN procesos.Mensaje  = "X".
end.
PROCEDURE p-ardriq:
    output to value(procesos.dato1 + procesos.dato1 + ".cim").
    put unform '"' dato9 '" "' dato1 '" "' dato6 '" "' dato7 format "x(3)" '" "' dato8 format "x(3)" '"' skip
    '"' dato3 '"' skip
    '.' skip
    '.' skip.
    output close.
    batchrun = yes.
    output to value(procesos.dato1 + dato1 + ".sal"). 
    input from  value(procesos.dato1 + dato1 + ".cim").
    {gpRUN.i ""ardriq.p""}.
    input close.
    output close.
    batchrun = no.
    procesado = yes.
    procesos.Mensaje  = "X".
end.
PROCEDURE p-arcsrp:
 output to value( procesos.dato1 + ".cim").
 put unform '"' procesos.dato1 '" "' procesos.dato1 '" - - - - - - - "' procesos.dato7 format "x(3)" '"' skip
 '"' procesos.dato3 '"' skip
 '.' skip
 '.' skip.
 output close.
 batchrun = yes.
 output  to  value( procesos.dato1 + ".sal").
 input from  value( procesos.dato1 + ".cim").
 {gpRUN.i ""arcsrp.p""}
 input close.
 output close.
 batchrun = no.
 ASSIGN
 procesos.procesado = yes
 procesos.Mensaje  = "X".
end.
PROCEDURE p-arcsrp01:
 output to value(procesos.dato1 + procesos.dato1 + ".cim").
 put unform '"' dato1 '" "' dato1 '" - - - - - - - - - - - - - - - - - ' dato5 skip
 '"' dato3 '"' skip
 '.' skip
 '.' skip.
 output close.
 batchrun = yes.
 output to value(procesos.dato1 + dato1 + ".sal").
 input from  value(procesos.dato1 + dato1 + ".cim").
 {gpRUN.i ""arcsrp01.p""}.
 input close.
 output close.
 batchrun = no.
 procesado = yes.
 procesos.Mensaje  = "X".
end.
PROCEDURE arcsrp03.p:
    output to value(procesos.dato1 + procesos.dato1 + ".cim").
    put unform '"' dato1 '" "' dato1 '" - no' skip
    '"' dato3 '"' skip
    '.' skip
    '.' skip.
    output close.
    batchrun = yes.
    output to value(procesos.dato1 + dato1 + ".sal").
    input from  value(procesos.dato1 + dato1 + ".cim").
    RUN arcsrp03.p.
    input close.
    output close.
    batchrun = no.
    procesado = yes.
    procesos.Mensaje  = "X".
end.          

clear all.
CURRENT-WINDOW:VISIBLE = FALSE.

return.

 


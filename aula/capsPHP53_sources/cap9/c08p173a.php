<?php
mysql_connect("localhost", "root", "") or die ("Problemas na ligação ao MySQL");
mysql_select_db ("testeDB") or die ("Problemas na ligação ao MySQL");
$sql = "select * from teste order by nome asc";
$num_reg = mysql_affected_rows();
$resultado = mysql_query($sql);
$num_reg = mysql_num_rows($resultado);
$num_campos = mysql_num_fields($resultado);
print ("Nº de campos $num_campos <p>");
print("Número total de registos seleccionados = $num_reg");
print(" e afectados pela query=$num_reg<p>");
 if ($num_reg == 0){
     print ("Não há registos na base de dados");
     }elseif ($num_reg > 0){
    print ("<table border=2 width=70% align=center bgcolor =\"#fff000\">");
    print ("<td> <p align=center> id</td><td> <p align=center> nome </td><td> <p align=center> telefone</td><tr>");
    for ($linha = 0;$linha < $num_reg;$linha++){
        for ($coluna = 0;$coluna < $num_campos;$coluna++){
            $field = mysql_field_name ($resultado, $coluna);
            $campo = mysql_result($resultado, $linha, "$field");
            print (" <td>$campo</td>");
            }
        print ("<tr>");
         }
     }
print ("</table>");
mysql_free_result($resultado);
mysql_close();
?>


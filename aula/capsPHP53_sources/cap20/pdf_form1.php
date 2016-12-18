<?php
//Abrir ou criar um ficheiro para colocar os dados de input
   $fdffp = fopen("pdf_form1.fdf", "w");
   $http_raw= $HTTP_RAW_POST_DATA;
 fwrite($fdffp,$http_raw, strlen($http_raw));
 fclose($fdffp);
//echo "$http_raw";

//reabrir o ficheiro com os resultados
$fdf = fdf_open("pdf_form1.fdf");
//$fdf=fdf_open_string($http_raw);
   $volume = fdf_get_value($fdf, "volume");
   //echo "The volume field has the value '<B>$volume</B>'<BR>";

   $date = fdf_get_value($fdf, "date");
//   echo "The date field has the value '<B>$date</B>'<BR>";

   $comment = fdf_get_value($fdf, "comment");
//   echo "The comment field has the value '<B>$comment</B>'<BR>";

  // if(fdf_get_value($fdf, "show_publisher") == "On") {
     $publisher = fdf_get_value($fdf, "publisher");
//     echo "The publisher field has the value '<B>$publisher</B>'<BR>";
   //} else
   //  echo "Publisher shall not be shown.<BR>";

  // if(fdf_get_value($fdf, "show_preparer") == "On") {
     $preparer = fdf_get_value($fdf, "preparer");
//     echo "The preparer field has the value '<B>$preparer</B>'<BR>";
    //} else
	// echo "Preparer shall not be shown.<BR>";
   fdf_close($fdf);

Header ("content-type: application/vnd.fdf");
$fp=fopen("pdf_form1.fdf","r");
fpassthru($fp);
unlink("pdf-form1.fdf");
?>


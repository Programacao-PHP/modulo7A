<form method="POST">
<input type="text" name="quest"  value="?" />
<input type="submit" />
</form>
<?php
/*** usar um filtro callback para chamar mysql_real_escape_string ***/
//não funciona em windows
$quest = filter_input(INPUT_POST, "quest", FILTER_CALLBACK, array("options"=>"mysql_real_escape_string"));
/*** create an sql query ***/
$sql = "INSERT INTO campoX VALUES (- {$quest} -)";
/*** echo the query ***/
echo $sql;
?>
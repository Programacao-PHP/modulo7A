<form method="post">
<input type="text" name="numero"  value="" />
<input type="submit" />
</form>
<?php
echo filter_input(INPUT_POST, "numero", FILTER_SANITIZE_NUMBER_INT);
?>
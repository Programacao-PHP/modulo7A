<?php
//http://devzone.zend.com/node/view/id/1113
if (!filter_has_var(INPUT_POST, 'submit')) {
    echo "variáveis tipo POST provenientes de formulário <p>";
    // include the form.
}
 
$filtro = array (
    'nome'       => array('filter'=>FILTER_SANITIZE_STRING,'flags' => FILTER_FLAG_ENCODE_HIGH|FILTER_FLAG_ENCODE_LOW),
    'email'      => FILTER_VALIDATE_EMAIL,
    'homepage'   => FILTER_VALIDATE_URL,
    'idade'        => array(  'filter' => FILTER_VALIDATE_INT,'options'=> array('min_range'=>16, 'max_range'=>95)),
    'vencimento'     => FILTER_VALIDATE_FLOAT,
    'favoritos' => array('filter' => FILTER_SANITIZE_STRING,'flags'  => FILTER_REQUIRE_ARRAY),
);
//aplicar o filtro às variáveis da array
$input = filter_input_array(INPUT_POST, $filtro);
//ver o conteudo das variáveis no  array
var_dump($input); 
echo ("<p>----- <p>");

if ($input['email']===FALSE) {
	exit ("formato email inválido");
}

if ($input['homepage']===FALSE) {
	exit ("formatoURL inválido");
}

if ($input['idade'] === FALSE) {
exit("You must be between 7 and 77 years old.");
}
 
if (is_null($input['favoritos'])) {
 exit("Deve escolher uma ou mais linguagens.");
}
 
if (!in_array('PHP', $input['favoritos'])) {
exit("Pois ... não gosta de PHP!");
} else {
echo ("Pois ... gosta de PHP");	
} 
?>


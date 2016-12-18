<?php

/* 
 *	Esta página cria uma interface para guardar os dados da sessão na base de dados
 *	Esta página também inicia a sessão.
 
 session_set_save_handler() Arguments
 	1 A session is started
	2 A session is closed
	3 Session data is read
	4 Session data is written
	5 Session data is destroyed
	6 Old session data should be deleted (aka garbage collection performed)
 */

// Global variable used for the database 
// connections in all session functions:
$sdbc = NULL;

// Define the open_session() function:
// This function takes no arguments.
// This function should open the database connection.
function open_session() {

	global $sdbc;
	
	// Connect to the database.
	$sdbc = mysqli_connect ('localhost', 'adelino', '12345', 'sessao') OR die ('A ligação da base de dados não foi efetuada.');
	
	return true;

} // End of open_session() function.
 

// Define the close_session() function:
// This function takes no arguments.
// This function closes the database connection.
function close_session() {

	global $sdbc;
	
	return mysqli_close($sdbc);
	
} // End of close_session() function.


// Define the read_session() function:
// This function takes one argument: the session ID.
// This function retrieves the session data.
function read_session($sid) {

	global $sdbc;

 	// Query the database:
	$s = mysqli_real_escape_string($sdbc, $sid);
 	$q = "SELECT data FROM sessao WHERE id='" . $s . "'";
	$r = mysqli_query($sdbc, $q);
	
	$num = mysqli_num_rows($r);
	echo $num;
	// Devolve os resultados
	if ($num == 1) {
	
		list($data) = mysqli_fetch_array($r, MYSQLI_NUM);
		
		// Return the data:
		return $data;

	} else { // Return an empty string.
		return '';
	}
	
} // End of read_session() function.

// Define the write_session() function:
// This function takes two arguments: 
// the session ID and the session data.
function write_session($sid, $data) {

	global $sdbc;

	// Store in the database:
 	$q = sprintf('REPLACE INTO sessao (id, data) VALUES ("%s", "%s")', mysqli_real_escape_string($sdbc, $sid), mysqli_real_escape_string($sdbc, $data)); 
	$r = mysqli_query($sdbc, $q);

	return mysqli_affected_rows($sdbc);

} // End of write_session() function.


// Define the destroy_session() function:
// This function takes one argument: the session ID.
function destroy_session($sid) {

	global $sdbc;

	// Delete from the database:
 	$q = sprintf('DELETE FROM sessao WHERE id="%s"', mysqli_real_escape_string($sdbc, $sid)); 
	$r = mysqli_query($sdbc, $q);
	
	// Clear the $_SESSION array:
	$_SESSION = array();

	return mysqli_affected_rows($sdbc);

} // End of destroy_session() function.

// Define the clean_session() function:
// This function takes one argument: a value in seconds.
function clean_session($expire) {

	global $sdbc;

	// Delete old sessions:
 	$q = sprintf('DELETE FROM sessao WHERE DATE_ADD(last_accessed, INTERVAL %d SECOND) < NOW()', (int) $expire); 
	$r = mysqli_query($sdbc, $q);

	return mysqli_affected_rows($sdbc);

} // End of clean_session() function.

# **************************** #
# ***** END OF FUNCTIONS ***** #
# **************************** #



// Declare the functions to use:
session_set_save_handler('open_session', 'close_session', 'read_session', 'write_session', 'destroy_session', 'clean_session');

// Make whatever other changes to the session settings.

// Start the session:
session_start();

?>

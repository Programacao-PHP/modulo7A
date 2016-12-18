<?php 

//////////////////////////////////////////////////////////// 
// EmailClass 0.5 
// class for sending mail 
// 
// Paul Schreiber 
// php@paulschreiber.com 
// http://paulschreiber.com/ 
// 
// parameters 
// ---------- 
// - subject, message, senderName, senderEmail and toList are required 
// - ccList, bccList and replyTo are optional 
// - toList, ccList and bccList can be strings or arrays of strings 
// (those strings should be valid email addresses 
// 
// example 
// ------- 
// $m = new email ( "hello there", // subject 
// "how are you?", // message body 
// "paul", // sender's name 
// "foo@foobar.com", // sender's email 
// array("paul@foobar.com", "foo@bar.com"), // To: recipients 
// "paul@whereever.com" // Cc: recipient 
// ); 
// 
// print "mail sent, result was" . $m->send(); 
// 
// 
// 

if ( ! defined( 'MAIL_CLASS_DEFINED' ) ) { 
define ('MAIL_CLASS_DEFINED', 1 ); 

class email { 

// the constructor! 
function email ( $subject, $message, $senderName, $senderEmail, $toList, $ccList=0, $bccList=0, $replyTo=0) { 
$this->sender = $senderName . " <$senderEmail>"; 
$this->replyTo = $replyTo; 
$this->subject = $subject; 
$this->message = $message; 

// set the To: recipient(s) 
if ( is_array($toList) ) { 
$this->to = join( $toList, "," ); 
} else { 
$this->to = $toList; 
} 

// set the Cc: recipient(s) 
if ( is_array($ccList) && sizeof($ccList) ) { 
$this->cc = join( $ccList, "," ); 
} elseif ( $ccList ) { 
$this->cc = $ccList; 
} 

// set the Bcc: recipient(s) 
if ( is_array($bccList) && sizeof($bccList) ) { 
$this->bcc = join( $bccList, "," ); 
} elseif ( $bccList ) { 
$this->bcc = $bccList; 
} 

} 

// send the message; this is actually just a wrapper for 
// PHP's mail() function; heck, it's PHP's mail function done right :-) 
// you could override this method to: 
// (a) use sendmail directly 
// (b) do SMTP with sockets 
function send () { 
// create the headers needed by PHP's mail() function 

// sender 
$this->headers = "From: " . $this->sender . "\n"; 

// reply-to address 
if ( $this->replyTo ) {    
$this->headers .= "Reply-To: " . $this->replyTo . "\n"; 
} 

// Cc: recipient(s) 
if ( $this->cc ) { 
$this->headers .= "Cc: " . $this->cc . "\n"; 
} 

// Bcc: recipient(s) 
if ( $this->bcc ) { 
$this->headers .= "Bcc: " . $this->bcc . "\n"; 
} 

print "destino: ".$this->to."<br>assunto: ".$this->subject."<br>mensagem: ".$this->message."<br>formatações: ".$this->headers;

return mail ( $this->to, $this->subject, $this->message, $this->headers ); 
} 
} 


} 
?> 

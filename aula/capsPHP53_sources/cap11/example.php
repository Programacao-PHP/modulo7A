<?php
/***************************************
** Title.........: HTML Mime Mail class
** Version.......: 1.2
** Author........: Richard Heyes <richard.heyes@heyes-computing.net>
** Filename......: example.php
** Last changed..: 24s/05/2000
** Notes.........: Based upon mime_mail.class
**                 by Tobias Ratschiller <tobias@dnet.it>
**                 and Sascha Schumann <sascha@schumann.cx>.
**                  - Thanks to Thomas Flemming for supplying a fix
**                    for Win32.
**                  - Made headers terminated by CRLF instead of LF, now
**                    compliant with RFC822. Thanks to Pao-Hsi Huang.
**                  - Fixed bug; certain mail systems (gmx.net in particular)
**                    were rejecting mail because of a space character either
**                    side of the equal sign on the boundary line. Thanks to
**                    Peter Holm for notifying me.
***************************************/

        error_reporting(63);
        include('class.html_mime_mail.inc');

/***************************************
** Example of usage.
***************************************/
        /***************************************
        ** Read the file background.gif into
        ** $backgrnd.
        ***************************************/
        $filename = 'background.gif';
        $backgrnd = fread($fp = fopen($filename, 'r'), filesize($filename));
        fclose($fp);

        /***************************************
        ** Read the file test.zip into $attachment.
        ***************************************/
        $filename = 'example.zip';
        $attachment = fread($fp = fopen($filename, 'r'), filesize($filename));
        fclose($fp);

        /***************************************
        ** Create the mail object. Optional headers
        ** argument. Do not put From: here, this
        ** will be added when $mail->send
        ***************************************/
        $mail = new html_mime_mail("X-Mailer: Html Mime Mail Class\r\n");

        /***************************************
        ** If sending an html email, then these
        ** two variables specify the text and
        ** html versions of the mail. Don't
        ** have to be named as these are. Just
        ** make sure the names tie in to the
        ** $mail->add_html() command further down.
        ***************************************/
        $text = 'This is a test.';
        $html = '<HTML><BODY BACKGROUND="background.gif"><FONT FACE="Verdana, Arial" COLOR="#FF0000">&nbsp;&nbsp;&nbsp;&nbsp;Success!</FONT><P></BODY></HTML>';

        /***************************************
        ** Add the text, html and embedded images.
        ** Each embedded image has to be added
        ** using $mail->add_html_image() BEFORE
        ** calling $mail->add_html(). The name
        ** of the image should match exactly
        ** (case-sensitive) to the name in the html.
        ***************************************/
        $mail->add_html_image($backgrnd, 'background.gif', 'image/gif');
        $mail->add_html($html, $text);

        /***************************************
        ** If not sending an html email, then
        ** this is used to set the plain text
        ** body of the email.
        ***************************************/
        // $mail->body = 'ftfuygfyugyguilgulghlgjhlgjhlkgjguilguilguil ghjli';

        /***************************************
        ** This is used to add an attachment to
        ** the email.
        ***************************************/
        $mail->add_attachment($attachment, 'example.zip', 'application/octet-stream');

        /***************************************
        ** Builds the message.
        ***************************************/
        $mail->build_message();

        /***************************************
        ** Sends the message. $mail->build_message()
        ** is seperate to $mail->send so that the
        ** same email can be sent many times to
        ** differing recipients simply by putting
        ** $mail->send() in a loop.
        ***************************************/
        $mail->send('Gonçalo Andre', 'goncaloandre@ipcb.pt', 'Joaquim Marques', 'marques@ipc.pt', 'Este é o assunto');

        /***************************************
        ** Debug stuff. Entirely unnecessary.
        ***************************************/
        echo '<PRE>';
        echo $mail->mime;
        echo '</PRE>';
?>

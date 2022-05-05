<?php

    class PHP_Email_Form {
        public $to;
        public $from_name;
        public $from_email;
        public $subject;
        public $ajax;
        public $add_message;

        function __construct(){

        }
    
    
        function send() {

            // a random hash will be necessary to send mixed content
            $separator = md5(time());

            // carriage return type (RFC)
            $eol = "\r\n";


            // main header (multipart mandatory)
            $headers = "From: ".$from_name." <".$from_name.">" . $eol;
            $headers .= "MIME-Version: 1.0" . $eol;
            $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
            $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
            $headers .= "This is a MIME encoded message." . $eol;

            // message
            $body = "--" . $separator . $eol;
            $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
            $body .= "Content-Transfer-Encoding: 8bit" . $eol;
            $body .= $add_message . $eol;

            if (mail($to, $subject, $body, $headers)) {
                echo "mail send ... OK"; // do what you want after sending the email
                
                
            } else {
                echo "mail send ... ERROR!";
                print_r( error_get_last() );
            }
        }
    }

?>

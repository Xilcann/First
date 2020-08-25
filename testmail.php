<?php

    ini_set( 'display_errors', 1 );

    error_reporting( E_ALL );

    $from = "contacto@canalventastotalplay.com";

    $to = "ing.pedro.tics@gmail.com";

    $subject = "Checking PHP mail";

    $message = "PHP mail works just fine";

    $headers = "From:" . $from;

    mail($from,$to,$subject,$message, $headers);

    echo "The email message was sent.";

?>
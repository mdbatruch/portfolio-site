<?php

    function root_url($string) {

        if ($string[0] != '/') {
            $string = "/" . $string;
        }

        return 'http://' . SITE_ROOT . $string;
    }

?>
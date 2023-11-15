<?php

    function get_data_from_api($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Erro: ' . curl_error($ch);
        }

        curl_close($ch);

        return json_decode($response, true);
    }
?>
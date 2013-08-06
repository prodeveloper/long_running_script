<?php

/*
     *
     *
     * uses curl to get html conten
     * @param {String} url The url to be fetched
     */
    function curl_get_contents($url,$post=false,$touch=false) {

        // Initiate the curl session
        $ch = curl_init();
        // Set the URL
        curl_setopt($ch, CURLOPT_URL, $url);
        // Removes the headers from the output
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/534.30 (KHTML, like Gecko) Chrome/12.0.742.112 Safari/534.30") );

        if($touch){
        //Limit time to connection to at most 200 secs
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        }
        else {      //Limit time to connection to at most 200 secs
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        }

        //curl_setopt($ch, CURLOPT_REFERER, 'http://nlp.stanford.edu:8080/');
        //Follow redirects
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        //If we have post data then include it here
        if ($post){
                        //Set HTTP POST Request.
            curl_setopt($ch, CURLOPT_POST, TRUE);
                        //Set data to POST in HTTP "POST" Operation.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        // Return the output instead of displaying it directly
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Execute the curl session
        $output = curl_exec($ch);
        // Close the curl session
        curl_close($ch);
        // Return the output as a variable
        return $output;
    }

       /**
     * Returns value to the user
     */
    function return_value($response, $status = 200) {
        http_response_code(200);
        print $response;
    }
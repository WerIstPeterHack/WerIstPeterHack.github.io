<?php

    $results = json_decode(file_get_contents("json_poll.json"));
    
    $mapping = [array("id","text")];

    foreach ($results as $key => $value) {

        if ($key == "info") {

            continue;

        };

        $mapping[] = array($value->id, $value->title);

        foreach ($value as $subKey => $subValue) {
            
            if (preg_match("/a\d+/", $subKey)) {

                $mapping[] = array($subValue->id, $subValue->title);

            }
        }

    }

    
    echo "<pre>";
    foreach($mapping as $key => $value) {

        echo $value[0] . ";" . $value[1] . '<br />';

    }

    echo "</pre>";

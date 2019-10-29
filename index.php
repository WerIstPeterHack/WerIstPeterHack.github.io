<?php

    if (!isset($_POST['jsonData'])) {

        ?>
            <form action="index.php?ts=1" method="post"> 
                <label for="text">pr0p0ll-Ergebniss-JSON hier einfügen:</label>
                <textarea id="jsonData" name="jsonData" cols="35" rows="4"></textarea> 	
                <input type="submit" value="Ids holen" />
            </form> 
        <?php
    
        die();

    }

    $results = json_decode(file_get_contents("p0ll.json"));
    
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

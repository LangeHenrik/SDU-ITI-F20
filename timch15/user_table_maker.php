<?php
    function show_results($result)
    {
        $result_table = "<tr><th>Username</th></tr>";

        if (isset($result)) {
            if (count($result) == 0) {
                $result_table .= "No Results!";
            } else {
                $usercount = sizeof($result);

                for ($i = 0; $i < $usercount; $i++) {
                    $result_table .= "<tr><td>" . $result[$i]['username'] . "</td></tr>";
                }
            }
        }
        echo $result_table;
    }

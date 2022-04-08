<?php
    function printTable(mysqli_result $result) {
        if (!$result) echo 'error';
        for ($j = 0; $j < mysqli_num_rows($result); $j++) {
            $row = mysqli_fetch_row($result);
            echo '<tr>';
            for ($i = 0; $i < sizeof($row); $i++) {
                $attribute = $row[$i];
                if ($attribute == "") $attribute = '-';
                echo "<td>$attribute</td>";
            }
            echo '</tr>';
        }
    }
?>
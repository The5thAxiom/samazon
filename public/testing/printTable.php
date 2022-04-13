<?php
    function printTable(int $image_index, string $path_to_public, mysqli_result $result) {
        if (!$result) echo 'error';
        for ($j = 0; $j < mysqli_num_rows($result); $j++) {
            $row = mysqli_fetch_row($result);
            echo '<tr>';
            for ($i = 0; $i < sizeof($row); $i++) {
                $attribute = $row[$i];
                if ($attribute == "") $attribute = '-';
                if ($i !== $image_index) echo "<td>$attribute</td>";
                else echo '<td><img width="100px" src="'.$path_to_public.$attribute.'" alt="'.$attribute.'"/></td>';
            }
            echo '</tr>';
        }
    }
?>
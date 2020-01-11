<?php

$registration = file('send.txt');

    echo ('<table>');
foreach ($registration as $key) {
    $item = explode('|', $key);
    echo ('<tr>');
        foreach ($item as $value) {
            echo "<td>$value</td>";
        }
    echo ('</tr>');
}
    echo ('</table>');
?>
<style>
    table, td {
        font-size: 0.85em;
        border: 1px solid #000;
        border-collapse: collapse;
        padding: 5px;
    }
</style>

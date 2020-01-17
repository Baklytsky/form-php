<?php

$registration = file('send.txt');

    echo ('<table>');
        echo ('<thead>');
        echo "<tr>
                <th>Date</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Sex</th>
                <th>Age</th>
                <th>B-day</th>
                <th>Status</th>
                <th>Social</th>
                <th>Address</th>
                <th>Hobby</th>
                <th>Book format</th>
                <th>Books readed</th>
                <th>Comment</th>
                <th>Position</th>
                <th>Entered before</th>
                <th>Email</th>
                <th>Spam category</th>
                <th>Task</th>
              </tr>";
        echo ('</thead>');
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
    table, th, td {
        font-size: 0.85em;
        border: 1px solid #000;
        border-collapse: collapse;
        padding: 5px;
    }
</style>

<?php
require_once('core/db_config.php');
require_once('core/functions.php');
$conn = connect();
fetchNameSelect($conn);
$data = fetchNameSelect($conn);

    if ($_POST['request']) {
        $out = '<table class="table table-bordered main-table">';

        $out .= "<tbody>
        <tr>
        <th>Дата</th>
        <th>Название</th>
        <th>Колличество</th>
        <th>Расстояние</th>
        </tr>
        </tbody>";
        for ($i = 0; $i < count($data); $i++) {
            $out .= "<tbody><tr>";
            $out .= "<td>{$data[$i]['date']}</td>";
            $out .= "<td>{$data[$i]['name']}</td>";
            $out .= "<td class='tr_quantity'>{$data[$i]['quantity']}</td>";
            $out .= "<td class='tr_distance'>{$data[$i]['distance']}</td>"; 

            $out .= "</tr></tbody>";
        }
        $out .= '</table>';
        echo "$out";
    };

    
?>
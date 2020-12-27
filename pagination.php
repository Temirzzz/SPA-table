<?php
require_once('core/db_config.php');
require_once('core/functions.php');
$conn = connect();

$record_per_page = 3;
$page = '';
$output = '';

if(isset($_POST['page'])) {
    $page = $_POST['page'];
}
else {
    $page = 1;
}

$start_from = ($page - 1) * $record_per_page;

$query = "SELECT * FROM datas ORDER BY id DESC LIMIT $start_from, $record_per_page ";
$result = mysqli_query($conn, $query);

$output .= "
    <div class='row'>
        <div class='container table_container'>
            <table class='table table-bordered main-table table_style'>
                <tr>
                    <th width='20%'>Дата</th>
                    <th width='20%'>Наименование</th>
                    <th width='20%'>Колличество</th>
                    <th width='20%'>Расстояние</th>
                </tr>";

                while($row = mysqli_fetch_array($result)) {
                    $output .='
                    <tr>
                        <td>' . $row["date"] . '</td>
                        <td>' . $row["name"] . '</td>
                        <td class="tr_quantity">' . $row["quantity"] . '</td>
                        <td class="tr_distance">' . $row["distance"] . '</td>
                    </tr>';
                }

$output .=  '</table>
        </div>
    </div>';

    $page_query = "SELECT * FROM datas ORDER BY id DESC";  
    $page_result = mysqli_query($conn, $page_query);  
    $total_records = mysqli_num_rows($page_result);  
    $total_pages = ceil($total_records/$record_per_page); 
     
    for($i=1; $i<=$total_pages; $i++) {  

    $output .= "<span class='pagination_link' id='" . $i . "'>" . $i ."</span>";
    }  

    echo $output;  

?>

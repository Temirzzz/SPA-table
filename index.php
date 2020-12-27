<?php
require_once('core/db_config.php');
require_once('core/functions.php');
require_once('components/header.php');
require_once('components/footer.php');
$conn = connect();
select($conn);
$data = select($conn);
$countPage = pagination_count($conn);
?>


<div class="row">
    <div class="container">
        <h1 class="text-center mt-3 mb-5">Тестовое задание</h1>
    </div>
</div>

<div class="row">
    <div class="container">
        <div class="wrapper">
            <div class="data  table-primary">
                <div class="form-group mr-3">
                    <label for="first_select">Выбор названия</label>
                    <select class="form-control select_name" id="first_select">
                    <option>Название</option> 
                        <?php
                            $out = '';
                            
                            for ($i=0; $i < count($data); $i++){                        
                                $out .="<option>{$data[$i]['name']}</option>";               
                            }
                            echo $out;
                        ?> 
                    </select>
                </div>
                <div class="form-group mr-3">
                    <label for="second_select">Выбор условия</label>
                    <select class="form-control select_conditions" id="second_select"></select>
                </div>
                <div>
                    <p class="heading_margin">Значение</p>
                    <input class="data_value form-control" type="text">
                </div>
                <div class="output_wrapper ml-4 mb-2">
                    <p>Значение: <span class="output"></span></p>
                </div>
            </div>
            
        </div>
        <div id="pagination_data"></div>
    </div>
</div>

    
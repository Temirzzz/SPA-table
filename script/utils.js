function loadData(page) {
    $.ajax({
        url: 'pagination.php',
        type: 'POST',
        data: {page: page},
        success: function(data) {
            $('#pagination_data').html(data)
            $('.pagination_link').click(function() {
                $('.output').html('')
                $('.data_value').val('')
                $('.select_conditions').val('Выбор условия')
            })
        }
    })
}

function createOption() {
    $('.select_conditions').html(
        "<option>Выбор условия</option><option>Колличество</option><option>Расстояние</option>"
    )  
}

function distance() {
    let inputNumber = parseFloat($('.data_value').val().trim())
    let output = $('.output')      

    $('.tr_distance').each(function(){
        let select = parseFloat($(this).text())

        if(inputNumber == select) {
            output.append('<span class="alert alert-success mr-1 span_style">содержит ' + select + ' </span>') 
        }
        if(inputNumber < select) {
            output.append('<span class="alert alert-success mr-1 span_style">меньше ' + select + ' </span>') 
        }   
        if(inputNumber > select) {
            output.append('<span class="alert alert-success mr-1 span_style">больше ' + select + ' </span>') 
        }   
    })
   
}

function quantity() {
    let inputNumber = parseFloat($('.data_value').val().trim())
    let output = $('.output')
    $('.tr_quantity').each(function(){
        let select = parseFloat($(this).text())
        
        if(inputNumber == select) {
            output.append('<span class="alert alert-success mr-1 span_style">содержит '+ select + ' </span>') 
        }
        if(inputNumber < select) {
            output.append('<span class="alert alert-success mr-1 span_style">меньше ' + select + ' </span>') 
        }   
        if(inputNumber > select) {
            output.append('<span class="alert alert-success mr-1 span_style">больше ' + select + ' </span>') 
        }   
    })
}


export{ distance, quantity, createOption, loadData }
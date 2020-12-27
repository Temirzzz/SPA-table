import { distance, quantity, createOption, loadData } from './utils.js'


$(document).ready(function() {

    $('.select_name').on('change', function() {
        let val = $(this).val()
        $.ajax({
            url: 'fetchName.php',
            type: 'POST',
            data: 'request=' + val,
            beforeSend: function() {
                $('.table_container').html("It's alive!")
            },
            success: function(data) {
                $('.table_container').html(data)
                $('.output').html('')
                $('.data_value').val('')
            }
        })
    })

    loadData()

    $(document).on('click', '.pagination_link', function() {
        let page = $(this).attr('id')
        loadData(page)
        $('.select_name').val('Название')
    })

    createOption()

    $('.data_value').on('input', function() {
        if(this.value.match(/[^0-9]/g)){
            this.value = this.value.replace(/[^0-9]/g, "");
        }
    })

    $('.data_value,.select_conditions').change(function() {
        let selectCondition = $('.select_conditions').find(":selected").index()

        if(selectCondition == 0) {
            $('.output').html('')
        }
        if(selectCondition == 1) {
            $('.output').html('')
            quantity()
            $('tbody').children().find('th:eq(2)').addClass('alert alert-primary')
        }
        if(selectCondition == 2) {
            $('.output').html('')
            distance()
            $('tbody').children().find('th:last').addClass('alert alert-primary')
            $('tbody').children().find('th:eq(2)').removeClass('alert alert-primary')
        }
        else {
            $('tbody').children().find('th:last').removeClass('alert alert-primary')
        }
    })

})



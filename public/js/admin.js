$('#btn_delete').click(function () { 
    var id = [];
    if (confirm('Are you sure you want to delete ?')) {

        $(':checkbox:checked').each(function (e) {
            id.push($(this).val());
        });
        
        if (id.length === 0) {
            alert("Please select at least one checkbox");
        } else {
            $.ajax({
                type: "GET",
                url: "del-many",
                data: { id:id },
                success: function (data) {
                    alert(data);
                    for (let i = 0; i < id.length; i++) {
                        $('tr#' + id[i] + '').css('background-color', '#ccc');
                        $('tr#' + id[i] + '').fadeOut('slow');
                    }
                   
                }
            });
        }
    }

});

$('#formGetDay').submit(function (e) { 
    e.preventDefault();
    from_day = $('#from_day').val();
    to_day = $('#to_day').val();

    if (from_day == '') {
        alert('Please enter enough value "From Day"');
    }
    else if (to_day == '') {
        alert('Please enter enough value "To Day"');
    }
    else if (from_day >= to_day) {
        alert('The to day must be a date after from day.');
    }
    else {
        $.ajax({
            type: "POST",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: "/borrow/get_day",
            data: {
                from_day:from_day,
                to_day:to_day,
            },
            success: function (data) {
                $('#table_get_day').html(data);
            },
            error: function (e) {
                // console.error();
            }
        });
    }
});
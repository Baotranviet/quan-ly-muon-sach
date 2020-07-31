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

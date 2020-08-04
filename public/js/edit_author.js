$(document).ready(function () {
    $(document).on('click', '#edit-author', function(){  
        $('#editAuthorModal').modal('show');

        tr = $(this).closest('tr');
        var data = tr.children("td").map( function () {
            return $(this).text();
        }).get();

        $('input#id').val(data[0]);
        $('input#name').val(data[2]);
    });
    
    $('#editAuthorForm').on('submit', function (e) {
        e.preventDefault();

        var id = $('#id').val();

        $.ajax({
            type: "PUT",
            url: "/author/" + id,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $('#editAuthorForm').serialize(),
            success: function (response) {
                $('#editAuthorModal').modal('hide');
                alert('Author Updated');
                window.location.reload();
            },
            error: function (error) {  
                console.log(error);
            }
        });
    });
});

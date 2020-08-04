$('#addNewRow').click(function (e) { 
    addNewRow();    
});

var i = 1;

function addNewRow()
{
    var tr = '<tr>' +
                '<td><input type="text" name="rows[' + i + '][book_code]" class="form-control" placeholder="Enter Book Code"></td>' +
                '<td><input type="text" name="rows[' + i + '][book_name]" class="form-control" placeholder="Enter Book Name"></td>' +
                '<td><input type="number" name="rows[' + i + '][page_number]" class="form-control" placeholder="Enter Page Number"></td>' +
                '<td><input type="number" name="rows[' + i + '][quantity]" class="form-control" placeholder="Enter Quantity"></td>' +
                '<td>' +
                    '<select class="custom-select" name="rows[0][author_id]">'+
                        '<option></option>'+
                        '<?php @foreach ($authors as $author)'+
                            '<option value="{{ $author->id }}">'+
                                '{{ $author->name }}'+
                            '</option>'+
                        '@endforeach ?>'+
                    '</select>'+
                '</td>' +
                '<td class="text-center"><a id="removeRow" title="Remove" class="btn btn-danger btn-sm">x</a></td>' +
            '</tr>';
    $('tbody').append(tr);

    i++;
}

$('#tableNewBook').on('click', '#removeRow', function(){
    var last = $('tbody tr').length;
    if (last == 1) {
        alert('Can not delete');
    } else {
        $(this).closest('tr').remove ();
    }
});
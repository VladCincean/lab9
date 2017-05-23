/**
 * Created by vlad on 23.05.2017.
 */

$(document).ready(function() {
    $('#saveButton').click(function() {
        console.log('#saveButton -- click event');

        var title = $('#sTitle').val();
        var category = $('#sCategory').val();
        var formatType = $('#sFormatType').val();
        var genre = $('#sGenre').val();
        var path = $('#sPath').val();

        var url = '../controller/save.php' +
                '?title=' + title +
                '&category=' + category +
                '&format_type=' + formatType +
                '&genre=' + genre +
                '&path=' + path;

        $.get(url, function(data, status) {
            console.log('#saveButton: GET response -- data = ' + data + ', status = ' + status);
            var response = JSON.parse(data);
            if (response == true) {
                alert('Save(title = ' + title + ', ...): success!');
            } else {
                alert('Save(title = ' + title + ', ...): failed!');
            }
        });
    });

    $('#filterByCategorySubmit').click(function() {
       console.log('#filterByCategorySubmit -- click event');

       var category = $('#filterByCategoryInput').val();
       var url = '../controller/filter_by_category.php?category=' + category;

       $.get(url, function(data, status) {
           console.log('#filterByCategorySubmit: GET response -- data = ' + data + ', status = ' + status);
           filterStateChanged(data);
       });

       // var xmlhttp = new XMLHttpRequest();
       // xmlhttp.onreadystatechange = function() {
       //     if (this.readyState == 4 && this.status == 200) {
       //         console.log('filter by category: response = ' + this.responseText);
       //         filterStateChanged(this.responseText);
       //     }
       // };
       // xmlhttp.open('GET', '../controller/filter_by_category.php?category=' + category, true);
       // xmlhttp.send();
    });

    function filterStateChanged(response) {
        var arr = JSON.parse(response);
        console.log('filterStateChanged: JSON.parse(response) -> arr = ' + arr);
        var result_table = $('#resultTable tbody');

        // empty the table
        result_table.empty();

        // fill the table
        for (var i = 0; i < arr.length; i++) {
            var row = $('<tr></tr>');
            var id = $('<td></td>').text(arr[i]['id']);
            var title = $('<td></td>').text(arr[i]['title']);
            var category = $('<td></td>').text(arr[i]['category']);
            var format_type = $('<td></td>').text(arr[i]['format_type']);
            var genre = $('<td></td>').text(arr[i]['genre']);
            var path = $('<td></td>').text(arr[i]['path']);
            var deleteButton = $('<button></button>')
                .text('Delete')
                .attr('id', arr[i]['id'])
                .click(function() {
                    console.log('delete(#' + $(this).attr('id') + ') clicked');
                    processDeleteRequest($(this).attr('id'));
                    $(this).parent().remove();
                });


            // fill the row
            row.append(id);
            row.append(title);
            row.append(category);
            row.append(format_type);
            row.append(genre);
            row.append(path);
            row.append(deleteButton);

            // add row to table
            result_table.append(row);
        }
    }

    function processDeleteRequest(id) {
        var url = '../controller/delete.php?id=' + id;

        $.get(url, function(data, status) {
            console.log('processDeleteRequest: GET response -- data = ' + data + ', status = ' + status);
            var response = JSON.parse(data);
            if (response == true) {
                alert('Delete(id = ' + id + '): success!');
            } else {
                alert('Delete(id = ' + id + '): failed!');
            }
        });
    }
});
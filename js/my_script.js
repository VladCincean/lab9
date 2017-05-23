/**
 * Created by vlad on 23.05.2017.
 */

$(document).ready(function() {
    var searchHistory = new Array();

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

    $('#updateButton').click(function() {
        console.log('#updateButton -- click event');

        var id = $('#sId').val();
        if (!id) {
            alert('Update: failed: no id selected');
            return;
        }
        var title = $('#sTitle').val();
        var category = $('#sCategory').val();
        var formatType = $('#sFormatType').val();
        var genre = $('#sGenre').val();
        var path = $('#sPath').val();

        var url = '../controller/update.php' +
            '?id=' + id +
            '&title=' + title +
            '&category=' + category +
            '&format_type=' + formatType +
            '&genre=' + genre +
            '&path=' + path;

        $.get(url, function(data, status) {
            console.log('#updateButton: GET response -- data = ' + data + ', status = ' + status);
            var response = JSON.parse(data);
            if (response == true) {
                alert('Update(id = ' + id + ', ...): success!');
            } else {
                alert('Update(id = ' + id + ', ...): failed!');
            }
        });
    });

    $('#filterByCategorySubmit').click(function() {
       console.log('#filterByCategorySubmit -- click event');

       var category = $('#filterByCategoryInput').val();
       var url = '../controller/filter_by_category.php?category=' + category;

       searchHistory.push(category);

       $.get(url, function(data, status) {
           console.log('#filterByCategorySubmit: GET response -- data = ' + data + ', status = ' + status);
           processFilterResponse(data);
           updateSearchHistroy();
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

    function processFilterResponse(response) {
        var arr = JSON.parse(response);
        console.log('processFilterResponse: JSON.parse(response) -> arr = ' + arr);
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
            var updateButton = $('<button></button>')
                .text('Update')
                .attr('id', arr[i]['id'])
                .click(function() {
                    console.log('update(#' + $(this).attr('id') + ')clicked');
                    processUpdateRequest($(this).attr('id'));
                });


            // fill the row
            row.append(id);
            row.append(title);
            row.append(category);
            row.append(format_type);
            row.append(genre);
            row.append(path);
            row.append(deleteButton);
            row.append(updateButton);

            // add row to table
            result_table.append(row);
        }
    }

    function updateSearchHistroy() {

        $('#searchHistory').prepend(
            $('<li></li>').text(searchHistory[searchHistory.length - 1])
        );
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

    function processUpdateRequest(id) {
        var url = '../controller/find.php?id=' + id;

        // var arr = null;
        $.get(url, function(data, status) {
            console.log('processDeleteRequest: GET response -- data = ' + data + ', status = ' + status);
            var arr = JSON.parse(data);

            $('#sId').val(id);
            $('#sTitle').val(arr['title']);
            $('#sCategory').val(arr['category']);
            $('#sFormatType').val(arr['format_type']);
            $('#sGenre').val(arr['genre']);
            $('#sPath').val(arr['path']);
        });
    }
});
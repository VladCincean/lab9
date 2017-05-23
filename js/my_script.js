/**
 * Created by vlad on 23.05.2017.
 */

$(document).ready(function() {
    $('#filterByCategorySubmit').click(function() {
       console.log('#filterByCategory -- click event');

       var category = $('#filterByCategoryInput').val();

       var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               console.log('filter by category: response = ' + this.responseText);
               filterStateChanged(this.responseText);
           }
       };
       xmlhttp.open('GET', '../controller/filter_by_category.php?category=' + category, true);
       xmlhttp.send();
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

            // fill the row
            row.append(id);
            row.append(title);
            row.append(category);
            row.append(format_type);
            row.append(genre);
            row.append(path);

            // add row to table
            result_table.append(row);
        }
    }
});
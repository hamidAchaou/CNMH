$(document).ready(function() {
    function fetchData(page, searchValue) {
        $.ajax({
            url: 'tasks/?page=' + page + '&searchValue=' + searchValue,
            success: function(data) {
                $('tbody').html('');
                $('tbody').html(data);
            }
        });
    }

    // filter By Projects
    function filterData(page, criteria) {
        $.ajax({
            url: 'tasks/?page=' + page + '&criteria=' + criteria,
            success: function(data) {
                $('tbody').html('');
                $('tbody').html(data);
            }
        });
    }

    $('body').on('click', '.pagination a', function(param) {

        param.preventDefault();

        var page = $(this).attr('href').split('page=')[1];
        var searchValue = $('#search-input').val();
        console.log($(this).attr('href').split('page=')[1]);
        console.log($(this).attr('href').split('page='));

        fetchData(page, searchValue);

    });

    $('body').on('keyup', '#search-input', function() {
        var page = 1;
        var searchValue = $('#search-input').val();
        fetchData(page, searchValue);
    });

    $('#projectsFilter').on('change', function () {
        var page = 1;
        var criteria = $(this).val();
        console.log(criteria);
        filterData(page, criteria);
      });

    // fetchData(1, '');
});
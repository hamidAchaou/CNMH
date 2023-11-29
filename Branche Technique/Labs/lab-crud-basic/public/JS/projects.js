$(document).ready(function() {
    function fetchData(page, searchValue) {
        $.ajax({
            url: 'projects/?page=' + page + '&searchValue=' + searchValue,
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

    fetchData(1, '');
});

$(document).ready(function() {
    function fetchData(page, searchValue) {
        $.ajax({
            url: 'projects/?page=' + page + '&searchValue=' + searchValue,
            success: function(data) {
                $('tbody').html(data);
            }
        });
    }

    function filterData(page, criteria) {
        $.ajax({
            url: 'projects/?page=' + page + '&criteria=' + criteria,
            success: function(data) {
                $('tbody').html(data);
                console.log(criteria);
            }
        });
    }

    $('body').on('click', '.pagination a', function(event) {
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];
        var searchValue = $('#search-input').val();

        fetchData(page, searchValue);
    });

    $('body').on('keyup', '#search-input', function() {
        var page = 1;
        var searchValue = $('#search-input').val();
        fetchData(page, searchValue);
    });

    $('#filterCriteria').on('change', function() {
        var page = $('#page').val(); // Assuming there's an element with ID 'page'
        var criteria = $(this).val();
        var baseUrl = window.location.href.split('/');
        baseUrl.pop();
        var newUrl = baseUrl.join('/') + '/' + criteria;
        console.log(newUrl);
        window.history.pushState({ path: newUrl }, '', newUrl);
        filterData(page, criteria);
    });
});


// function delete Projects
function deleteProject(Project_id) {
    document.getElementById('Project_id').value = Project_id;
    document.getElementById('deleteForm').action = "projects/" + Project_id;
}


$(document).ready(function() {
    function fetchData(page, searchValue) {
        $.ajax({
            url: 'projects/?page=' + page + '&searchValue=' + searchValue,
            success: function(data) {
                $('tbody').html(data);
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

});


// function to delete project
function deletProject(ProjectId) {
    // set the project_id input value
    document.getElementById("project_id").value = ProjectId;
    // set the form action dynamically
    document.getElementById("deleteForm").action = "/projects/" + ProjectId;
    // submit the form
    document.getElementById("deleteForm").submit();
}


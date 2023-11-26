    $(document).ready(function () {
        function fetchData(page, searchValue) {
            $.ajax({
                url:'/?page=' + page + '&searchValue=' + searchValue, 
                success:function(data){
                    $('tbody').html("");
                    $('tbody').html(data);
                }
            })
        }

        $('body').on('keyup', '#inputSearch', function () {
            let page = 1;
            let searchValue = $('#inputSearch').val();
            fetchData(page, searchValue);
        });

        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            let searchValue = $('#inputSearch').val(); // Added quotation marks around #inputSearch
            fetchData(page, searchValue);
        })

    });

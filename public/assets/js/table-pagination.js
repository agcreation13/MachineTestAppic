 $(document).ready(function() {
        var itemsPerPage = 10; // Number of items to show per page
        var currentPage = 1; // Current page

        var $table = $('table');
        var $tableRows = $table.find('tbody tr');

        var totalItems = $tableRows.length;
        var totalPages = Math.ceil(totalItems / itemsPerPage);
        //console.log('total-data' + totalItems);
        // Function to display items for the current page
        function showItems() {
            var startIndex = (currentPage - 1) * itemsPerPage;
            var endIndex = Math.min(startIndex + itemsPerPage, totalItems);

            $tableRows.hide(); // Hide all rows
            $tableRows.slice(startIndex, endIndex).show(); // Show items for the current page
        }

        // Function to generate pagination buttons
        function generatePagination() {
            var $paginationContainer = $('#pagination-container ul');
            $paginationContainer.empty(); // Clear the existing pagination buttons
            if (totalItems < 11)
            {

            } else {
for (var i = 1; i <= totalPages; i++) {
                $paginationContainer.append('<li class="page-item"><a class="page-link" href="#">' + i +
                    '</a></li>');
            }
                 }

        }

        // Initial pagination setup
        generatePagination();
        showItems();

        // Handle pagination button clicks
        $('#pagination-container').on('click', 'a.page-link', function(e) {
            e.preventDefault();
            var clickedPage = parseInt($(this).text());

            if (isNaN(clickedPage)) {
                if ($(this).parent().is('#prev-page')) {
                    currentPage--;
                } else if ($(this).parent().is('#next-page')) {
                    currentPage++;
                }
            } else {
                currentPage = clickedPage;
            }

            showItems();
        });
    });

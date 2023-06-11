$(document).ready(function() {
    $('#searchInput').on('input', function() {
      var searchTerm = $(this).val();
  
      $.ajax({
        url: '../search.php',
        method: 'POST',
        data: { search: searchTerm },
        success: function(response) {
          $('#searchResults').html(response);
        }
      });
    });
  });
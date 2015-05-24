$(document).ready(function() {
  $(document).on('click', 'a.remote', function(e) {
    e.preventDefault();
    var $mainContainer = $('#main-container');
    var url = $(this).attr('href');
    $mainContainer.empty();
    $.get(url, function(data) {
      $mainContainer.append(data);
    });
  });
});


$(document).ready(function() {
//				$('td', 'table').each(function (i) {
//					$(this).text(i + 1);
//				});


    $('table.paginated').each(function () {
        var currentPage = 0;
        var numPerPage = 5;
        var $table = $(this);
        $table.bind('repaginate', function () {
            $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
        });
        $table.trigger('repaginate');
        var numRows = $table.find('tbody tr').length;
        var numPages = Math.ceil(numRows / numPerPage);
        var $pager = $('<div class="pager"></div>');
        for (var page = 0; page < numPages; page++) {
            $('<span  class="page-number"></span>').text(page + 1).bind('click', {
                newPage: page
            }, function (event) {
                currentPage = event.data['newPage'];
                $table.trigger('repaginate');
                $(this).addClass('active').siblings().removeClass('active');
            }).appendTo($pager).addClass('clickable');
        }
        $pager.insertBefore($table).find('span.page-number:first').addClass('active');
    });
    $("#list_of_books tbody").on("click", "tr", function(e) {
       $tds=$(this).children('td');
        $.get("../assets/new_edit_book/session_edit_book.php",
            {book_id:$tds[0].innerText,
            title:$tds[1].innerText,
            isbn:$tds[2].innerText,
            writer:$tds[3].innerText,
            illustrator:$tds[4].innerText,
            publisher:$tds[5].innerText,
            pages:$tds[6].innerText,
                submit:'true'},
            function(data, textStatus, jqXHR)
            {
                window.open("../edit_book/");
            });
    });
})
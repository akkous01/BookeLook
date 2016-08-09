
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
        var book_id=$tds[0].innerText ;
        //var title=$tds[1].innerText;
        //var isbn=$tds[2].innerText;
        //var writer=$tds[3].innerText;
        //var illustrator=$tds[4].innerText;
        //var publisher=$tds[5].innerText;
        //var pages=$tds[6].innerText;
        var submit='true';
        window.open("../edit_book/index.php?book_id="+book_id);
    });

    $("#announcements tbody").on("click", "tr", function(e) {
        $tds=$(this).children('td');
        var announcement_id=$tds[0].innerText ;
        var content=$tds[1].innerText ;
        var date=$tds[2].innerText ;
        var submit='true';
        window.open("../edit_announcements/index.php?announcement_id="+announcement_id+"&content="+content+"&date="+date);
    });
    $("#blog tbody").on("click", "tr", function(e) {
        $tds=$(this).children('td');
        var blog_id=$tds[0].innerText ;
        var title=$tds[1].innerText ;
        var date=$tds[2].innerText ;
        var submit='true';
        window.open("../edit_blog/index.php?blog_id="+blog_id+"&title="+title+"&date="+date);
    });
})
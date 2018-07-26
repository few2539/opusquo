@has($pageItem)
    <?php
    $pageItem = isset_not_empty($pageItem);
    $paginator = \App\CMS\Helpers\CMSHelper::createControlListPaginatorFromItem($pageItem, 'item_option_that_uses_pagination_option');
    ?>

    <div class="pagination-wrapper">
        {{ $paginator->render() }}
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>
        (function(){
            $(document).ready(function() {
                $(document).on('click', '.pagination-wrapper .pagination a', function (e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    if (url) {
                        $.ajax({
                            url: url
                        }).done(function (data) {
                            $('.pagination-wrapper').html(data);
                        }).fail(function () {
                            alert('Data could not be loaded.');
                        });
                    }
                });
            });
        })();
    </script>
@endhas
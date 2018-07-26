@has($pageItem)
    <?php
        $pageItem = isset_not_empty($pageItem);
    ?>
    <section class="section text-template-container">
        <div class="conclude-container">
            <div class="heading-box">
                <h1 class="h2 text-uppercase">{{$pageItem->title}}</h1>
                <h2 class="h5 parent text-uppercase"> </h2>
                <?php  $start_date_format = date('dMY', strtotime($pageItem->start_date));  ?>
                <h2 class="display-date text-uppercase"> {{$start_date_format}}</h2>
            </div>
            <div class="text-block-container">
                <div class="content">{!!$pageItem->content!!}</div>
            </div>
        </div>
    </section>
@endhas
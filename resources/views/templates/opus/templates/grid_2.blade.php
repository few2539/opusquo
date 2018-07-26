
@has($pageItem)
    <?php
    $pageItem = isset_not_empty($pageItem);
    $large_image = CMSHelper::getItemOption($pageItem,"large_image");
    $title = CMSHelper::getItemOption($pageItem,"title");
    $sup_title = CMSHelper::getItemOption($pageItem,"sub_title");
    $label_button = CMSHelper::getItemOption($pageItem,"label_button");
    $link_type = CMSHelper::getItemOption($pageItem,"link_type");
    $link_url = CMSHelper :: getItemOption($pageItem,"link_url");
    $pdf_url = CMSHelper :: getItemOption($pageItem,"pdf_url");
    $target = CMSHelper::getItemOption($pageItem,"target");
    $position = CMSHelper::getItemOption($pageItem,"position");
    $small_image = CMSHelper :: getItemOption($pageItem,"small_image",[]);
    ?>
@endhas
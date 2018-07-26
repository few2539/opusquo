@has($pageItem)
<?php 
    $pageItem = isset_not_empty($pageItem);
    $pageItem->title;
    $pageItem->content;
    $form = \App\CMS\Helpers\CMSHelper::generateFormByVariableName($pageItem->form_type);
    $form_data=App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName($pageItem->form_type);    
    $form_data->form_title;
    foreach ($form_data->form_properties as $prop) {
    }

?>

<?php $route= $pageItem->form_type; ?>
@include(\App\CMS\Helpers\CMSHelper::getTemplatePath('includes.form_success'))

@endhas
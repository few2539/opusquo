@extends(\App\CMS\Helpers\CMSHelper::getTemplatePath('layouts.master'))
@section('content')
    <?php  
        $thankyou = \App\CMS\Helpers\CMSHelper::getGlobalItemOptionValue($getForm,'thank_you_message');
    ?>
    <h2 class="text-uppercase">{{isset_not_empty($thankyou)}}</h2>
@endsection
<?php

namespace App\CMS\Controllers;

use App\CMS\Constants\CMSConstants;
use App\CMS\Helpers\APIHelper;
use App\CMS\Helpers\CMSHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response as BaseResponse;

class SuccessController extends BaseController
{
    public function index($form ,Request $req)
    {        
        if ( ! CMSHelper::checkIfTemplateExists('success')) {
            return abort(BaseResponse::HTTP_NOT_FOUND);
        };

        if($req->input('getform')=='job_form' || $req->input('getform')=='reservation_form' || $req->input('getform')=='newsletter_form'){
            session([CMSConstants::GLOBAL_ITEMS => APIHelper::getGlobalItemData()]);

            return view(CMSHelper::getTemplatePath('success'), [
                'pageItem' => $_POST,
                'getForm' => $req->input('getform')
            ]);
        }else{
            return abort(BaseResponse::HTTP_NOT_FOUND);
        }
    }
}
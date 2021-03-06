<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Oapirestmod\Handler;

use Oapiconfig\BaseProvider\OhandlerBaseProvider;
use Oapiconfig\Sniffers\OexceptionSniffer;
use Oapiconfig\Sniffers\OvalidationSniffer;
use Oapirestmod\Model\OapirestmodModel;

/**
 * Description of OapirestmodHandler
 *
 * @author OviMughal
 */
class RestmodHandler extends OhandlerBaseProvider
{
    public function getHandle($id)
    {
        if(OvalidationSniffer::isNumeric($id)){
            $restmodModel = new OapirestmodModel();
            $resultRestmodDetails = $restmodModel->getRestmodDetails($id);
            $this->setData(OexceptionSniffer::exceptionScanner($resultRestmodDetails));
        }
        
        return $this->getResult();
    }
}

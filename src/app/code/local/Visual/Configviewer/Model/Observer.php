<?php

class Visual_Configviewer_Model_Observer {
    const FLAG_SHOW_CONFIG = 'showConfig';
    const FLAG_SHOW_CONFIG_FORMAT = 'showConfigFormat';
    private $request;
    public function checkForConfigRequest($observer) {
        $this->request = $observer->getEvent()->getData('front')->getRequest();
        if($this->request->{self::FLAG_SHOW_CONFIG} === 'true'){
            $this->setHeader();
            $this->outputConfig();
        }
    }

    private function setHeader() {
        $format = isset($this->request->{self::FLAG_SHOW_CONFIG_FORMAT}) ?
            $this->request->{self::FLAG_SHOW_CONFIG_FORMAT} : 'xml';
        switch($format){
            case 'text':
                header("Content-Type: text/plain");
                break;
            default:
                header("Content-Type: text/xml");
        }
    }
    private function outputConfig() {
        die(Mage::app()->getConfig()->getNode()->asXML());
    }

    public function logCompiledLayout($o)
    {
        $req  = Mage::app()->getRequest();
        $info = sprintf(
            "\nRequest: %s\nFull Action Name: %s_%s_%s\nHandles:\n\t%s\nUpdate XML:\n%s",
            $req->getRouteName(),
            $req->getRequestedRouteName(),      //full action name 1/3
            $req->getRequestedControllerName(), //full action name 2/3
            $req->getRequestedActionName(),     //full action name 3/3
            implode("\n\t",$o->getLayout()->getUpdate()->getHandles()),
            $o->getLayout()->getUpdate()->asString()
        );

        // Force logging to var/log/layout.log
        Mage::log($info, Zend_Log::INFO, 'layout.log', true);
        file_put_contents(Mage::getBaseDir('var').DS.'log'.DS.'layout.xml',$o->getLayout()->getUpdate()->asSimplexml()->asXml());
    }
}
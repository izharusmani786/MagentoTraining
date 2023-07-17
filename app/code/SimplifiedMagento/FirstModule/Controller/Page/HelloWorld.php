<?php

namespace SimplifiedMagento\FirstModule\Controller\Page;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\ResponseInterface;
use SimplifiedMagento\FirstModule\NotMagento\PencilInterface;
use Magento\Framework\App\Request\Http;
use SimplifiedMagento\FirstModule\Model\HeavyService;

class HelloWorld extends \Magento\Framework\App\Action\Action 
{
    protected $pencilInterface;
    protected $http;
    protected $heavyService;

    public function __construct(
        Http $http,
        HeavyService $heavyService,
        Context $context, 
        PencilInterface $pencilInterface
    )
    {
        $this->http = $http;
        $this->heavyService = $heavyService;
        $this->pencilInterface = $pencilInterface;
        parent::__construct($context);
    }

    public function execute()
    {
        //echo $this->pencilInterface->getPencilType();

        $id = $this->http->getParam(key: 'id', default: 0);
        if($id==1) {
            $this->heavyService->printHeavyServiceMessage();
        } else {
            echo "Heavy Service not used";
        }


    }
}   
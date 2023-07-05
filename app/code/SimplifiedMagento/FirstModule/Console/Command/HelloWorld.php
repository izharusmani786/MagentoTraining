<?php 

namespace SimplifiedMagento\FirstModule\Console\Command;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

use Magento\Catalog\Model\Product\Action as ProductAction;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\StoreManagerInterface;
 


class HelloWorld extends Command
{
    const NAME = 'name';
    const STATUS = 'status';

    protected $messageManager;
    private $productCollection;
    private $productAction;
    private $storeManager;


    public function __construct(
        Context $context,
        CollectionFactory $collection,
        ProductAction $action,
        StoreManagerInterface $storeManager
    ) {
        $this->productCollection = $collection;
        $this->productAction = $action;
        $this->storeManager = $storeManager;
        parent::__construct();
    }

    public function configure() {

        $options = [
			new InputOption(
				self::NAME,
				null,
				InputOption::VALUE_REQUIRED,
				'Name'
            ),
            new InputOption(
				self::STATUS,
				null,
				InputOption::VALUE_REQUIRED,
				'Status'
            )
		];

        $this->setName(name: 'training:hello_world')
            ->setDescription(description: 'This command prints the hello world message')
            ->setAliases(array('iz'))
            ->setDefinition($options);

        parent::configure();
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        
        $status = $input->getOption(self::STATUS);

        $collection = $this->productCollection->create()->addAttributeToSelect('status');
        $storeId = $this->storeManager->getStore()->getId();
        $ids = [];
        $i = 0;
        foreach ($collection as $item) {
            $ids[$i] = $item->getEntityId();
            $i++;
        }

        if ($status == 'enabled') {
			$output->writeln("Product Status " . $status);
            $product_status = 1;
            $this->productAction->updateAttributes($ids, array('status' => $product_status), $storeId);

        } elseif ($status == 'disbaled') {
			$output->writeln("Product Status " . $status);
            $product_status = 2;
            $this->productAction->updateAttributes($ids, array('status' => $product_status), $storeId);
		} else {
            $output->writeln("Hi! Magento2 Training Program is Ready");
            $product_status = 3;
        }

        return $product_status;
    }

}
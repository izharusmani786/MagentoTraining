<?php
namespace SimplifiedMagento\Database\Model;
use SimplifiedMagento\Database\Api\GetLikesDislikesInterface;
use SimplifiedMagento\Database\Model\InsertDataFactory;
use Magento\Framework\Webapi\Rest\Request;



class GetLikesDislikes implements GetLikesDislikesInterface
{

    protected $_insertData;
    protected $request;

     /**
     * {@inheritdoc}
     */

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Customer\Model\Session $customerSession
     * @param array $data
     */
    public function __construct(
        InsertDataFactory  $insertData,
        Request $request
    ) {
        $this->request = $request;
        $this->_insertData = $insertData;
    }

    public function getLikes()
    {
        $productId = $this->request->getParam('id');
        $model = $this->_insertData->create();
        $collection = $model->getCollection();

        $collection->addFieldToFilter('product_id', ['eq' => $productId])
            ->addFieldToFilter('likedislike', ['eq' => 1]);
        $likes = count($collection->getData()); 
        return $likes;
    }

    public function getDislikes()
    {
        $productId = $this->request->getParam('id');
        $model = $this->_insertData->create();
        $collection = $model->getCollection();

        $collection->addFieldToFilter('product_id', ['eq' => $productId])
            ->addFieldToFilter('likedislike', ['eq' => 0]);
        $dislikes = count($collection->getData()); 
        return $dislikes;
    }

    public function getLikesDislikes()
    { 
        $likes = $this->getLikes();
        $dislikes = $this->getDislikes();


        $response = array('Likes'=>$likes, 'Dislikes'=>$dislikes);
        $returnResponse = json_encode($response, JSON_PRETTY_PRINT);
        return $returnResponse; 
    }

}
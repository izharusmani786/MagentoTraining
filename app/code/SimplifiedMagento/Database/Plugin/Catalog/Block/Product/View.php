<?php 
namespace SimplifiedMagento\Database\Plugin\Catalog\Block\Product;
use Magento\Catalog\Block\Product\View as ProductView;
use Magento\Customer\Model\SessionFactory;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\Registry;
use SimplifiedMagento\Database\Model\InsertDataFactory;


class View
{
    protected $_insertData;
    protected $customerSession;
    protected $_registry;
    private $displayBlocks = ['product.info.addtocart'];

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Customer\Model\Session $customerSession
     * @param array $data
     */
    public function __construct(
        SessionFactory $customerSession,
        InsertDataFactory  $insertData,
        Registry $registry,
    ) {
        $this->_insertData = $insertData;
        $this->customerSession = $customerSession;
        $this->_registry = $registry;
    }

    public function getTotalLikes(){
        $product = $this->_registry->registry('current_product');
        $productId = $product->getId();

        $model = $this->_insertData->create();
        $collection = $model->getCollection();
        $collection->addFieldToFilter('product_id', ['eq' => $productId])
                ->addFieldToFilter('likedislike', ['eq' => 1]);
        $likes = count($collection->getData()); 
        return $likes;
    }

    public function getTotalDisLikes(){
        $product = $this->_registry->registry('current_product');
        $productId = $product->getId();

        $model = $this->_insertData->create();
        $collection = $model->getCollection();
        $collection->addFieldToFilter('product_id', ['eq' => $productId])
                ->addFieldToFilter('likedislike', ['eq' => 0]);
        $dislikes = count($collection->getData()); 
        return $dislikes;
    }


    // you can add layout references as per your need to display like: product.info.price, product.info.review, etc.
    public function afterToHtml(ProductView $subject, $html)
    {
        $customerSession = $this->customerSession->create();
        $customerId = $customerSession->getCustomer()->getId();
        $product = $this->_registry->registry('current_product');
        $productId = $product->getId();

        $model = $this->_insertData->create();
        $collection = $model->getCollection();
        $collection->addFieldToFilter('user_id', ['eq' => $customerId])
                   ->addFieldToFilter('product_id', ['eq' => $productId]);
          
        $data = $collection->getData(); 
        //var_dump($data);
        $likeClass = ''; 
        $dislikeClass = '';
        if(!empty($data)){
            $likedislike = $data[0]['likedislike'];
            if($likedislike == 1){
                $likeClass = 'active';
            }
            if($likedislike == 0){
                $dislikeClass = 'active';
            }
        }
        

        if (in_array($subject->getNameInLayout(), $this->displayBlocks)) {
            return $html . '<div class="like_dislike_wrapper">
                    <div class="like btn_action">
                        <a class="'.$likeClass.'" href="javascript:;" user_id="'.$customerId.'" product_id="'.$productId.'" attr-val="1">Like</a>
                        <p class="total_likes">'.$this->getTotalLikes().'</p>
                    </div>
                    <div class="dislike btn_action">
                        <a class="'.$dislikeClass.'" href="javascript:;" user_id="'.$customerId.'" product_id="'.$productId.'" attr-val="0">Dislike</a>
                        <p class="total_dislikes">'.$this->getTotalDisLikes().'</p>
                    </div>
                </div>
                <div class="popup_like_dislike">
                    <div class="msg">Only logged in user can like and dislike the product.</div>
                </div>';
        }
        return $html;
    }
}
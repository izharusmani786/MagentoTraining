<?php 
namespace SimplifiedMagento\AssignmentTen\App\Cache;
use Magento\Framework\Cache\Frontend\Decorator\TagScope;
use Magento\Framework\Config\CacheInterface;
use Magento\Framework\App\Cache\Type\FrontendPool;

class Kell extends TagScope implements CacheInterface 
{
    const TYPE_IDENTIFIER = 'kell';
    const CACHE_TAG = 'KELL';

    public function __construct(FrontendPool $frontendPool)
    {
        parent::__construct($frontendPool->get(self::TYPE_IDENTIFIER), self::CACHE_TAG);
    }
}

<?php 

namespace SimplifiedMagento\AssignmentNine\Model\Config;
use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class Options extends AbstractSource
{
    public function getAllOptions()
    {
        $this->_options = [
            ['label'=>__('Red'), 'value'=>'red'],
            ['label'=>__('Yellow'), 'value'=>'yellow'],
            ['label'=>__('Blue'), 'value'=>'blue'],
            ['label'=>__('Green'), 'value'=>'green'],
            ['label'=>__('Pink'), 'value'=>'pink'],
            ['label'=>__('Ornage'), 'value'=>'orange'],
            ['label'=>__('White'), 'value'=>'white'],
        ];
        return $this->_options;
    }
}
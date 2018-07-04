<?php

class Visual_News_Block_List extends Mage_Core_Block_Template
{
    protected function _prepareLayout()
    {
        $collection = Mage::getModel('news/news')->getCollection();
        $collection->addFieldToFilter('is_active', MagentoBoy_News_Model_News::STATUS_ENABLED);
        $collection->setOrder('created_at', 'DESC');
        $this->setCollection($collection);

        return $this;
    }

    public function bindPager($pagerName)
    {
        $pager = $this->getLayout()->getBlock($pagerName);
        if ($pager) {
            $pager->setLimit(5); // 设置每页显示新闻的数量
            $pager->setCollection($this->getCollection());
            $pager->setShowPerPage(false);
        }
    }
}
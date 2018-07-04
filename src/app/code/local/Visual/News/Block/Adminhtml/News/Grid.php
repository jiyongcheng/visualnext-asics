<?php
class Visual_News_Block_Adminhtml_News_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('newsGrid');
        $this->setDefaultSort('news_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('news/news')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('news_id', array(
            'header' => Mage::helper('news')->__('ID'),
            'align' =>'right',
            'width' => '50px',
            'index' => 'news_id',
        ));

        $this->addColumn('title', array(
            'header' => Mage::helper('news')->__('Title'),
            'align' =>'left',
            'index' => 'title',
        ));

        $this->addColumn('is_active', array(
            'header' => Mage::helper('news')->__('Status'),
            'align' => 'left',
            'width' => '80px',
            'index' => 'is_active',
            'type' => 'options',
            'options' => Mage::getSingleton('news/news')->getAvailableStatuses(),
        ));

        $this->addColumn('created_at', array(
            'header' => Mage::helper('news')->__('Created At'),
            'align' =>'left',
            'width' => '180px',
            'type' => 'datetime',
            'index' => 'created_at',
        ));

        $this->addColumn('updated_at', array(
            'header' => Mage::helper('news')->__('Updated At'),
            'align' =>'left',
            'width' => '180px',
            'type' => 'datetime',
            'index' => 'updated_at',
        ));

        $this->addColumn('action',
            array(
                'header' => Mage::helper('news')->__('Action'),
                'width' => '50px',
                'type' => 'action',
                'getter' => 'getId',
                'actions' => array(
                    array(
                        'caption' => Mage::helper('news')->__('Edit'),
                        'url' => array('base'=>'*/*/edit'),
                        'field' => 'id'
                    )
                ),
                'filter' => false,
                'sortable' => false,
                'index' => 'stores',
            ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('news_id');
        $this->getMassactionBlock()->setFormFieldName('news');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => Mage::helper('news')->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('news')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('news/news')->getStatusesOptionsArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));

        $this->getMassactionBlock()->addItem('status', array(
            'label' => Mage::helper('news')->__('Change status'),
            'url' => $this->getUrl('*/*/massStatus', array('_current'=>true)),
            'additional' => array(
                'visibility' => array(
                    'name' => 'status',
                    'type' => 'select',
                    'class' => 'required-entry',
                    'label' => Mage::helper('news')->__('Status'),
                    'values' => $statuses
                )
            )
        ));
        return $this;
    }
}
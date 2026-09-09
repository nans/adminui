<?php

declare(strict_types=1);

namespace Nans\Adminui\Observer\Grid;

use Magento\Catalog\Block\Adminhtml\Product\Attribute\Grid;
use Magento\Framework\Module\Manager;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

/**
 * Product attribute grid build observer
 */
class AddColumnsAttributeGridObserver implements ObserverInterface
{
    protected Manager $moduleManager;

    public function __construct(Manager $moduleManager)
    {
        $this->moduleManager = $moduleManager;
    }

    public function execute(Observer $observer): void
    {
        /** @var Grid $grid */
        $grid = $observer->getGrid();

        $grid->addColumnAfter(
            'attribute_id',
            [
                'header' => __('ID'),
                'sortable' => true,
                'index' => 'attribute_id',
                'type' => 'text',
                'align' => 'center',
            ],
            'attribute_code'
        );
        $grid->addColumnAfter(
            'position',
            [
                'header' => __('Position'),
                'sortable' => true,
                'index' => 'position',
                'type' => 'text',
                'align' => 'center',
            ],
            'attribute_id'
        );
    }
}

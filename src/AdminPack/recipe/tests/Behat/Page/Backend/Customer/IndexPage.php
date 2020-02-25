<?php



declare(strict_types=1);

namespace App\Tests\Behat\Page\Backend\Customer;

use App\Tests\Behat\Page\Backend\Crud\IndexPage as BaseIndexPage;
use App\Entity\Customer\CustomerInterface;

class IndexPage extends BaseIndexPage
{
    /**
     * {@inheritdoc}
     */
    public function getCustomerAccountStatus(CustomerInterface $customer): string
    {
        $tableAccessor = $this->getTableAccessor();
        $table = $this->getElement('table');

        $row = $tableAccessor->getRowWithFields($table, ['email' => $customer->getEmail()]);

        return $tableAccessor->getFieldFromRow($table, $row, 'enabled')->getText();
    }
}

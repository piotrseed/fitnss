<?php

namespace Modules\Testowy\Repositories\Cache;

use Modules\Testowy\Repositories\ProductsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheProductsDecorator extends BaseCacheDecorator implements ProductsRepository
{
    public function __construct(ProductsRepository $products)
    {
        parent::__construct();
        $this->entityName = 'testowy.products';
        $this->repository = $products;
    }
}

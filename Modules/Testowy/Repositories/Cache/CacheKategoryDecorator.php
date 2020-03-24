<?php

namespace Modules\Testowy\Repositories\Cache;

use Modules\Testowy\Repositories\KategoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheKategoryDecorator extends BaseCacheDecorator implements KategoryRepository
{
    public function __construct(KategoryRepository $kategory)
    {
        parent::__construct();
        $this->entityName = 'testowy.kategories';
        $this->repository = $kategory;
    }
}

<?php

namespace Src\Entities\Campaign\Interactors;

use Src\Infrastructure\Laravel\Controller\Response\ControllerResponse;

class InsertBulkViewInteractor
{
    public function __invoke()
    {
        return ControllerResponse::format('campaign.bulk_insert');
    }
}

<?php

namespace App\Http\Saloon\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

abstract class JsonPostRequest  extends Request implements HasBody
{
    use HasJsonBody;
    protected Method $method = Method::POST;
}

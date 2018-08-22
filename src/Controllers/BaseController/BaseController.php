<?php

namespace Milestone\Appframe\Controllers\BaseController;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Milestone\Appframe\Bag;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $bag;

    public function __construct()
    {
        $this->bag = resolve(Bag::class);
    }
}

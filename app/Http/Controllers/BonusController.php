<?php

namespace App\Http\Controllers;

use App\Services\BonusService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BonusController extends Controller
{
    public function get(int $userId)
    {
        $addBonusResult = BonusService::addBonus($userId);

        return ($addBonusResult !== null) ? $addBonusResult : throw new NotFoundHttpException();
    }
}

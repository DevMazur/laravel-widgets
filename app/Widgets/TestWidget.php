<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 17.02.2018
 * Time: 20:45
 */

namespace App\Widgets;


use DevMazur\Widgets\Contract\WidgetContract;

class TestWidget implements WidgetContract
{
    public function execute()
    {
        return view('Widgets::testWidget');
    }
}
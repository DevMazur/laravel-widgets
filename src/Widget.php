<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 17.02.2018
 * Time: 20:36
 */

namespace DevMazur\Widgets;


class Widget
{
    protected $widgets = [];

    public function __construct()
    {
        $this->widgets = config('widgets');
    }

    public function show($widgetName, $data = [])
    {
        if(array_key_exists($widgetName, $this->widgets))
        {
            $Widget = new $this->widgets[$widgetName]($data);

            return $Widget->execute();
        }else{
            return '<p style="color: red; font-size: 18px"><b>Widget "'.$widgetName.'" not found</b></p>';
        }
    }
}
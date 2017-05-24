<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/5/2017
 * Time: 3:54 AM
 */

namespace Me\Views;


use Smarty;

abstract class View
{
    /**
     * @var Smarty smarty var
     */
    protected static $engine;

    public function __construct()
    {
        static::$engine = new Smarty();
        static::$engine->setTemplateDir(__DOCROOT__ . "/templates")
            ->setCompileDir(__DOCROOT__ . "/templates_c");

    }

    abstract public function execute($args = null);
}
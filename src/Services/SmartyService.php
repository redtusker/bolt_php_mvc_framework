<?php

namespace Src\Services;

use Smarty\Smarty;

class SmartyService
{
    protected $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();

        // Set the template directories (views) and compile directories
        $this->smarty->setTemplateDir(__DIR__ . '/../Views/');
        $this->smarty->setConfigDir(__DIR__ . '/../../storage/Config/');
        $this->smarty->setCompileDir(__DIR__ . '/../../storage/Cache/Compile/');
        $this->smarty->setCacheDir(__DIR__ . '/../../storage/Cache/');

        // Set caching settings if necessary
        $this->smarty->setCaching(Smarty::CACHING_LIFETIME_CURRENT);
        $this->smarty->debugging = true;
        // $this->smarty->testInstall();
        // $this->smarty->setEscapeHtml(true);
    }

    // Assign variables to Smarty template
    public function assign($name, $value)
    {
        $this->smarty->assign($name, $value);
    }

    // Fetch the output from a template
    public function fetch($template)
    {
        return $this->smarty->fetch($template);
    }

    // Display the template directly
    public function display($template)
    {
        $this->smarty->display($template);
    }
}

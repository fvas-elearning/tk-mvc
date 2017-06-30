<?php
namespace Tk\Controller;

/**
 * @author Michael Mifsud <info@tropotek.com>
 * @link http://www.tropotek.com/
 * @license Copyright 2016 Michael Mifsud
 */
abstract class Iface extends \Dom\Renderer\Renderer
{
    
    /**
     * @var \App\Page\Iface
     */
    protected $page = null;

    
    // - Controller::__construct()      -- kernel.request
    // - Controller::doDefault()        -- after kernel.controller
    // - Page::init()                   -- 
    // - Controller::show()             -- 
    // - Page::show()                   -- 
    // - insert controller into page    -- kernel.view
    // - parse page template            -- kernel.view
    
    

    /**
     * Get a new instance of the page to display the content in.
     * 
     * NOTE: This is the default, override to load your own page objects
     *
     * @return \Tk\Controller\Page
     */
    public function getPage()
    {
        if (!$this->page) {
            $this->page = new \Tk\Controller\Page($this);
        }
        return $this->page;
    }
    
    /**
     * For compatibility
     * @return \Dom\Template
     */
    public function show()
    {
        $template = $this->getTemplate();
        return $template;
    }

    
    
    
    /**
     *
     * @return string
     * @todo Refactor
     * @deprecated
     */
    public function getTemplateUrl()
    {
        return $this->getConfig()->getTemplateUrl() . $this->getConfig()->get('template.public.path');
    }

    /**
     *
     * @return string
     * @todo Refactor
     * @deprecated
     */
    public function getTemplatePath()
    {
        return $this->getPage()->getTemplatePath();
    }

    /**
     *
     * @return string
     * @todo Refactor
     * @deprecated
     */
    public function getXtplPath()
    {
        return $this->getConfig()->getTemplatePath() . $this->getConfig()->get('template.xtpl.path');
    }

    /**
     * Get the global config object.
     *
     * @return \Tk\Config
     */
    public function getConfig()
    {
        return \Tk\Config::getInstance();
    }



    /**
     * DomTemplate magic method example
     *
     * @return \Dom\Template
     */
//    public function __makeTemplate()
//    {
//        $html = <<<HTML
//<div></div>
//HTML;
//        return \Dom\Loader::load($html);
//        // OR FOR A FILE
//        //return \Dom\Loader::loadFile($this->getTemplatePath().'/public.xtpl');
//    }
    
}
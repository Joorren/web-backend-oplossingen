<?php

class HTMLBuilder {

    protected $header, $body, $footer;

    public function __construct($header, $body, $footer)
    {
        $this->header = $header;
        $this->body = $body;
        $this->footer = $footer;

        $this->buildPage();
    }

    public function buildHeader() {
        $cssLinks = $this->buildCssLinks();
        include "html/" . $this->header;
    }
    public function buildBody() {
        include "html/" . $this->body;
    }
    public function buildFooter() {
        $jsScripts = $this->buildJsLinks();
        include "html/" . $this->footer;
    }

    public function buildPage() {
        $this->buildHeader();
        $this->buildBody();
        $this->buildFooter();
    }

    public function buildCssLinks() {
        $returnArray = array();
        $cssDir = dirname(dirname(__FILE__)) . "/css/";
        $array = $this->findFiles( $cssDir, 'css' );

        foreach ($array as $item) {
            $name = pathinfo($item)['basename'];
            $returnArray[] = "<link href='" . $name . "' />";
        }
        return implode('', $returnArray);
    }
    private function buildJsLinks() {
        $returnArray = array();
        $jsDir = dirname(dirname(__FILE__)) . "/js/";
        $array = $this->findFiles( $jsDir, 'js' );

        foreach ($array as $item) {
            $name = pathinfo($item)['basename'];
            $returnArray[] = "<script src='js/" . $name . "'></script>";
        }
        return implode('', $returnArray);
    }
    public function findFiles($dir, $file) {
        return glob($dir . '/*.' . $file);
    }
}
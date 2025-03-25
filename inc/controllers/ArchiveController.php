<?php

class ArchiveController extends HupunaTheme{
    public function __construct(){

        add_action('hupuna_archive',array($this,'render'));
    }
    public function render(){
        $this->views('archive');
    }
}
<?php
require_once('model/Nav.php');
require_once('model/LinkNav.php');

function home() {
    $nav = new Nav('presentation');
    
    $leftNav = $nav->getLeftNav();
    $rightNav = $nav->getRightNav();
    
    require('view/frontend/homeView.php');
}

function skills() {
    $nav = new Nav('skills');
    
    $leftNav = $nav->getLeftNav();
    $rightNav = $nav->getRightNav();
    
    require('view/frontend/skillsView.php');
}

function chinesePortrait() {
    $nav = new Nav('chinesePortrait');
    
    $leftNav = $nav->getLeftNav();
    $rightNav = $nav->getRightNav();
    
    require('view/frontend/chinesePortraitView.php');
}

function gallery() {
    $nav = new Nav('gallery');
    
    $leftNav = $nav->getLeftNav();
    $rightNav = $nav->getRightNav();
    
    require('view/frontend/galleryView.php');
}

function contact() {
    $nav = new Nav('contact');
    
    $leftNav = $nav->getLeftNav();
    $rightNav = $nav->getRightNav();
    
    require('view/frontend/contactView.php');
}
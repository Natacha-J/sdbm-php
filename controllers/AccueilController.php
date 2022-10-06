<?php

class Accueil extends Controller
{
    public function index()
    {
        $scriptJS = "$(document).ready( () =>{
            $('.btn').remove('btn-secondary');
            $('#btnAccueil').addClass('btn-secondary');
        })";

        $title = "Société de Distribution des Bières du Monde";
        $this->render('index', compact('scriptJS','title'));
    }
}

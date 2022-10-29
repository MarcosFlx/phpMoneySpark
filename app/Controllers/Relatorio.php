<?php
namespace App\Controllers;

class  Relatorio extends BaseController
{
    public function index(){
        echo view('relatorios/index');
    }
}

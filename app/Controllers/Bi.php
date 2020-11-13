<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

/**
 * Description of Bi
 *
 * @author evgenia
 */
class Bi extends BaseController {

    public function index() {
        $data['pageTitle'] = 'Index BI';
        echo view('bi/includes/header', $data);
        echo view('bi/bi_index_view', $data);
        echo view('bi/includes/footer');
    }

}

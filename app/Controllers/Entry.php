<?php

namespace App\Controllers;

class Entry extends BaseController
{
    public function id(){
        return view('explore');
	}

    public function pep_pro($id = null){
        $data = [];
        $data['db'] = 'examples/pep-pro';
        $data['id'] = $id;

        $data['info'] = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o'];

        return view('entry', $data);
    }

    public function pep_pep($id = null){
        return view('entry');
    }

    public function pep_multipro($id = null){
        return view('entry');
    }
    
}

<?php

namespace App\Controllers;

class Entry extends BaseController
{
    public function id(){
        return view('explore');
	}

    // ********************************************* PEP-PRO *********************************************
    public function pep_pro($id = null){
        $data = [];
        $data['db'] = 'examples/pep-pro';
        $data['id'] = $id;

        $data['pdb_id'] = explode("-",$id)[0];
        $data['peptide_chain'] = explode("-",$id)[1];
        $data['protein_chain'] = explode("-",$id)[2];



        
        $data['info'] = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o'];

        return view('entry', $data);
    }

    // ********************************************* PEP-PEP *********************************************
    public function pep_pep($id = null){
        return view('entry');
    }

    // ********************************************* PEP-MULTIPRO *********************************************
    public function pep_multipro($id = null){
        return view('entry');
    }
    
}

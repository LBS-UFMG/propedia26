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
        $sdb = 'pep-pro';

        $modo = 'db'; // db
        $arquivo = "data/$modo/csv/$sdb/".$id[0]."/".str_replace(":", "_", $id).".csv";

        // Verifique se o arquivo existe
        if (!file_exists($arquivo)) {
            $modo = 'examples'; // se o arquivo nao existir, carrega a base de exemplo
            $arquivo = "data/$modo/csv/$sdb/".$id[0]."/".str_replace(":", "_", $id).".csv";
        }
        if (!file_exists($arquivo)) {
            return view('404');
        }

        $data['db'] = "$modo/$sdb";
        $data['sdb'] = $sdb;
        $data['id'] = $id;

        $data['pdb_id'] = explode("-",$id)[0];
        $data['peptide_chain'] = explode("-",$id)[1];
        $data['protein_chain'] = explode("-",$id)[2];
        
        // Abra o arquivo para leitura
        if (($handle = fopen($arquivo, "r")) !== false) {
            while (($linha = fgetcsv($handle, 0, ";")) !== false) {
                // Verifica se a primeira coluna é igual ao ID
                if ($linha[0] === $id) {
                    // Exibe a linha encontrada
                    $data['info'] = $linha;
                    break; // Sai do loop após encontrar
                }
            }
            fclose($handle);
        } 
        $data['info'][13] = $this->br($data['info'][13]);
        $data['info'][14] = $this->br($data['info'][14]);
        # 0 ID; 1 PDB_ID; 2 TITLE; 3 RESOLUTION; 4 CLASSIFICATION; 5 DEPOSITION_DATE; 6 STRUCTURE_METHOD;7 PROTEIN_CHAIN;8 PEPTIDE_CHAIN; 9 PROTEIN_SIZE; 10 PEPTIDE_SIZE; 11 PROTEIN_DESC; 12 PEPTIDE_DESC; 13 PROTEIN_SEQ; 14 PEPTIDE_SEQ;15 leader_id; 16 is_leader; 17 db

        return view('entry', $data);
    }

    // ********************************************* PEP-PEP *********************************************
    public function pep_pep($id = null){
        $data = [];
        $sdb = 'pep-pep';

        $modo = 'db'; // db
        $arquivo = "data/$modo/csv/$sdb/".$id[0]."/".str_replace(":", "_", $id).".csv";

        // Verifique se o arquivo existe
        if (!file_exists($arquivo)) {
            $modo = 'examples'; // se o arquivo nao existir, carrega a base de exemplo
            $arquivo = "data/$modo/csv/$sdb/".$id[0]."/".str_replace(":", "_", $id).".csv";
        }
        if (!file_exists($arquivo)) {
            return view('404');
        }

        $data['db'] = "$modo/$sdb";
        //$data['id'] = $id;
        $data['sdb'] = $sdb;

        $data['pdb_id'] = explode("-",$id)[0];
        $data['peptide_chain'] = explode("-",$id)[1];
        $data['protein_chain'] = explode("-",$id)[2];
        $data['id'] = $data['pdb_id'].'-'.$data['protein_chain'].'-'.$data['peptide_chain'];

        // Abra o arquivo para leitura
        if (($handle = fopen($arquivo, "r")) !== false) {
            while (($linha = fgetcsv($handle, 0, ";")) !== false) {
                // Verifica se a primeira coluna é igual ao ID
                if ($linha[0] === $id) {
                    // Exibe a linha encontrada
                    $data['info'] = $linha;
                    break; // Sai do loop após encontrar
                }
            }
            fclose($handle);
        } 
        $data['info'][13] = $this->br($data['info'][13]);
        $data['info'][14] = $this->br($data['info'][14]);
        # 0 ID; 1 PDB_ID; 2 TITLE; 3 RESOLUTION; 4 CLASSIFICATION; 5 DEPOSITION_DATE; 6 STRUCTURE_METHOD;7 PROTEIN_CHAIN;8 PEPTIDE_CHAIN; 9 PROTEIN_SIZE; 10 PEPTIDE_SIZE; 11 PROTEIN_DESC; 12 PEPTIDE_DESC; 13 PROTEIN_SEQ; 14 PEPTIDE_SEQ;15 leader_id; 16 is_leader; 17 db

        return view('entry', $data);
    }

    // ********************************************* PEP-MULTIPRO *********************************************
    public function pep_multipro($id = null){
        dd('fail<br>');
        $data = [];
        $sdb = 'pep-multipro';

        $modo = 'db'; // db
        $arquivo = "data/$modo/csv/$sdb/".$id[0]."/".str_replace(":", "_", $id).".csv";
        

        // Verifique se o arquivo existe
        if (!file_exists($arquivo)) {
            $modo = 'examples'; // se o arquivo nao existir, carrega a base de exemplo
            $arquivo = "data/$modo/csv/$sdb/".$id[0]."/".str_replace(":", "_", $id).".csv";
                        dd('fail<br>', $arquivo);

        }
        if (!file_exists($arquivo)) {
            dd('fail<br>', $arquivo);
            return view('404');
        }

        $data['db'] = "$modo/$sdb";
        $data['id'] = $id;
        $data['sdb'] = $sdb;

        $data['pdb_id'] = explode("-",$id)[0];
        $data['peptide_chain'] = explode("-",$id)[1];
        $data['protein_chain'] = explode("-",$id)[2];
        
        // Abra o arquivo para leitura
        if (($handle = fopen($arquivo, "r")) !== false) {
            while (($linha = fgetcsv($handle, 0, ";")) !== false) {
                // Verifica se a primeira coluna é igual ao ID
                if ($linha[0] === $id) {
                    // Exibe a linha encontrada
                    $data['info'] = $linha;
                    break; // Sai do loop após encontrar
                }
            }
            fclose($handle);
        } 
        $data['info'][13] = $this->br($data['info'][13]);
        $data['info'][14] = $this->br($data['info'][14]);
        # 0 ID; 1 PDB_ID; 2 TITLE; 3 RESOLUTION; 4 CLASSIFICATION; 5 DEPOSITION_DATE; 6 STRUCTURE_METHOD;7 PROTEIN_CHAIN;8 PEPTIDE_CHAIN; 9 PROTEIN_SIZE; 10 PEPTIDE_SIZE; 11 PROTEIN_DESC; 12 PEPTIDE_DESC; 13 PROTEIN_SEQ; 14 PEPTIDE_SEQ;15 leader_id; 16 is_leader; 17 db

        return view('entry', $data);
    }
    
    private function br($texto, $tamanho = 40) {
        return wordwrap($texto, $tamanho, "<br>", true);
    }

}

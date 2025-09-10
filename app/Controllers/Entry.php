<?php

namespace App\Controllers;

class Entry extends BaseController
{
    public function id(){
        return view('explore');
	}

    // ********************************************* PEP-PRO *********************************************
    public function entry($id = null){


        $data = [];

        $modo = 'db'; // db
        $arquivo = "data/$modo/csv/".$id.".csv";

        // Verifique se o arquivo existe
        if (!file_exists($arquivo)) {
            $modo = 'examples'; // se o arquivo nao existir, carrega a base de exemplo
            $arquivo = "data/$modo/csv/".$id.".csv";
        }
        if (!file_exists($arquivo)) {
            return view('404');
        }

        $data['db'] = "$modo";
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
        $data['info'][13] = $this->br($data['info'][13]); # PROTEIN_SEQ
        $data['info'][14] = $this->br($data['info'][14]); # PEPTIDE_SEQ
        # [0] id;PDB_ID;TITLE;RESOLUTION;CLASSIFICATION;
        # [5] DEPOSITION_DATE;STRUCTURE_METHOD;PROTEIN_CHAIN;PEPTIDE_CHAIN;PROTEIN_SIZE;
        # [10] PEPTIDE_SIZE;PROTEIN_DESC;PEPTIDE_DESC;PROTEIN_SEQ;PEPTIDE_SEQ;
        # [15] leader_id;is_leader;peptide_Length;peptide_MW;peptide_pI;
        # [20] peptide_InstabilityIndex;peptide_AliphaticIndex;peptide_GRAVY;peptide_HydrophobicPercent;peptide_PositiveResidues;peptide_NegativeResidues;peptide_C;peptide_H;peptide_N;peptide_O;peptide_S;peptide_Formula;peptide_TotalAtoms;peptide_ExtCoeff_Disulfide;peptide_ExtCoeff_NoDisulfide;protein_Length;protein_MW;protein_pI;protein_InstabilityIndex;protein_AliphaticIndex;protein_GRAVY;protein_HydrophobicPercent;protein_PositiveResidues;protein_NegativeResidues;protein_C;protein_H;protein_N;protein_O;protein_S;protein_Formula;protein_TotalAtoms;protein_ExtCoeff_Disulfide;protein_ExtCoeff_NoDisulfide


        return view('entry', $data);
    }


    // ********************************************* PEP-MULTIPRO *********************************************
    public function multipro($id = null){

        $data = [];
        $sdb = 'pep-multipro';
        
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
        $data['id'] = $id;
        $data['sdb'] = $sdb;

        $data['pdb_id'] = explode("-",$id)[0];
        $data['peptide_chain'] = explode("-",$id)[1];
        $data['protein_chain'] = explode("-",$id)[2];
        
        // Abra o arquivo para leitura
        if (($handle = fopen($arquivo, "r")) !== false) {
            while (($linha = fgetcsv($handle, 0, ";")) !== false) {
                $data['info'] = $linha;
            }
            fclose($handle);
        } 

        $data['info'][13] = $this->br($data['info'][13]);
        $data['info'][14] = $this->br($data['info'][14]);
        # 0 ID; 1 PDB_ID; 2 TITLE; 3 RESOLUTION; 4 CLASSIFICATION; 5 DEPOSITION_DATE; 6 STRUCTURE_METHOD;7 PROTEIN_CHAIN;8 PEPTIDE_CHAIN; 9 PROTEIN_SIZE; 10 PEPTIDE_SIZE; 11 PROTEIN_DESC; 12 PEPTIDE_DESC; 13 PROTEIN_SEQ; 14 PEPTIDE_SEQ;15 leader_id; 16 is_leader; 17 db

        return view('entry', $data);
    }
    
    private function br($texto, $tamanho = 40) {
        # adiciona uma quebra de linha a cada 40 caracteres
        return wordwrap($texto, $tamanho, "<br>", true);
    }

}

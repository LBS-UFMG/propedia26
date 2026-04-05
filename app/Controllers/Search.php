<?php

namespace App\Controllers;

class Search extends BaseController
{
    public function probis(): string
    {
        if (!isset($_POST["search_binding_sites"]) || !isset($_POST["pdb"]) || !isset($_POST["chain"])|| !isset($_POST["residues"])) {
            redirect("/explore");
        }

        $data = array();

        # ********************* Receiving post data *********************
        $data['pdb'] = substr($this->request->getPost("pdb"), 0, 4);
        $data['chain'] = substr($this->request->getPost("chain"), 0, 1);
        $data['residues'] = $this->processa_residuos($this->request->getPost("residues"));

        # ********************* Create new ID *********************
		$id = $this->generateRandomString(6);
        $data['id'] = $id;
		
		# Read directory
		if (file_exists('../public/data/projects')) { chdir('../public/data/projects'); }
		else{ chdir('../data/projects'); }
		
		$arquivos = glob("{*}", GLOB_BRACE);

		# Is the id unique? If not, create a new!
		for($i = 0; $i < (count($arquivos)); $i++){
			if($arquivos[$i] == $id){
				$id = $this->generateRandomString(6);
				$i = 0;
			}
		}

		# Create project folder 
		mkdir("../../../public/data/projects/$id");
		chmod("../../../public/data/projects/$id", 0777);        

        // download pdb
        // URL da API REST do RCSB PDB
        $url = "https://files.rcsb.org/download/{$data['pdb']}.pdb";

        // Faz a requisição
        $response = file_get_contents($url);
        if ($response === FALSE) { dd("Erro ao acessar API do PDB."); }

        $save_dir = FCPATH . "data/projects/{$id}/";
        $save_path = $save_dir . "{$data['pdb']}.pdb";

        // grava no diretório
        file_put_contents($save_path, $response);

        // grava info no diretório
        // Caminho do arquivo CSV
        $info = $save_dir . "info.csv";

        // Abre o arquivo para escrita (sobrescreve se já existir)
        $fp = fopen($info, 'w');
        if ($fp === false) {
            throw new \RuntimeException("Não foi possível criar o arquivo: {$info}");
        }

        fputcsv($fp, [
            $data['pdb'],
            $data['chain'],
            $data['residues']
        ], ';');
        fclose($fp);

        // PROBIS
        // passo 1 - converte entrada num arquivo 'probis'
        $comando = "probis -extract -f1 {$save_dir}{$data['pdb']}.pdb -c1 {$data['chain']} -motif \[:{$data['chain']} and {$data['residues']}]\ -srffile {$save_dir}query.srf > {$save_dir}conversao.log";

        system($comando);

        // passo 2 - roda o probis para buscar proteínas com sítio de ligação similar
        $probis_db = "/home/liase/www/propedia26/public/data/db/probis/propedia26_srf.csv";
        $comando2 = "nohup probis -ncpu 8 -longnames -surfdb -local -sfile {$probis_db} -f1 {$save_dir}query.srf -c1 A -nosql {$save_dir}result.nosql > {$save_dir}busca.log &";

        system($comando2);

        // muda as permissões de segurança
        chmod("../../../public/data/projects/$id", 0755);

        // carrega view - aguardando processamento
        return view("running", $data);
    }

    public function project($id): string{
        $data = [];

        $save_dir = FCPATH . "data/projects/{$id}/";
        $fileinfo = $save_dir . "info.csv";

        chmod("./data/projects/{$id}/result.nosql", 0755);

        if (!file_exists($fileinfo)) {
            throw new \RuntimeException("Arquivo não encontrado: {$fileinfo}");
        }

        $dados = [];
        if (($fp = fopen($fileinfo, 'r')) !== false) {
            $dados = fgetcsv($fp, 0, ';');
            fclose($fp);
        }

        $ini_time = filemtime($save_dir . 'busca.log');
        $data['created'] = date('Y-m-d H:i', $ini_time);
        if ((time() - $ini_time) > 600) {
            $data['is_running'] = 'ready';
        }
        else{
            $data['is_running'] = '<i class="bi bi-gear-fill spin text-primary"></i><span class="ms-1 text-primary">running</span>';
        }

        $resultcsv = $save_dir . "result.csv";

        if($data['is_running'] != 'ready'){
            system("python ../app/ThirdParty/nosql_to_csv.py {$save_dir}result.nosql {$save_dir}"); # recria o arquivo a cada refresh
        }

        $result = [];
        if (($fp = fopen($resultcsv, 'r')) !== false) {
            // Lê o cabeçalho (primeira linha)
            $cabecalho = fgetcsv($fp, 0, ';');
            // Lê cada linha e monta array associativo
            while (($linha = fgetcsv($fp, 0, ';')) !== false) {
                $result[] = array_combine($cabecalho, $linha);
            }
            fclose($fp);
        }

        $data['id'] = $id;
        $data['pdb'] = $dados[0];
        $data['chain'] = $dados[1];
        $data['residues'] = $dados[2];
        $data['status'] = 1;
        $data['log'] = 'ok';
        $data['results'] = $result;

        $cont_results = count(file($save_dir . 'result.csv'));
        $data['cont_results'] = $cont_results;

        

        return view("probis",$data);
    }

    private function generateRandomString($size): string {
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$randomString = '';
		for($i = 0; $i < $size; $i = $i+1){
			$randomString .= $chars[mt_rand(0,35)];
		}
		return $randomString;
	}

    private function processa_residuos(string $input): string {
        $nums = [];
        foreach (preg_split('/\s*,\s*/', trim($input)) as $part) {
            if (strpos($part, '-') !== false) {
                [$a, $b] = array_map('intval', explode('-', $part, 2));
                $nums = array_merge($nums, range($a, $b));
            } elseif (is_numeric($part)) {
                $nums[] = (int)$part;
            }
        }
        return implode(',', $nums);
    }

}

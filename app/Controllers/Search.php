<?php

namespace App\Controllers;

class Search extends BaseController
{
    public function probis()
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

		$data_folder = getcwd();
		$raiz = str_replace("/public/data/projects", "",$data_folder);

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

        // PROBIS
        // passo 1 - converte entrada num arquivo 'probis'
        $comando = "probis -extract -f1 {$save_dir}{$data['pdb']}.pdb -c1 {$data['chain']} -motif \[:{$data['chain']} and {$data['residues']}]\ -srffile {$save_dir}query.srf";

        system($comando);

        // passo 2
        dd($id);

        // carrega view - aguardando processamento
        return view("probis", $data);


        $fp = fopen('../writable/blast/tmp.fasta', 'w');
        fwrite($fp, $data['sequence']);
        fclose($fp);


        $output = shell_exec('blastp -query ../writable/blast/tmp.fasta -subject data/' . $where . '.fasta -outfmt="6 qseqid sseqid pident score slen sstart send qlen qstart qend qframe positive sseq" -max_target_seqs 50' . $tamanho);

        // dd('blastp -query ../writable/blast/tmp.fasta -subject data/' . $where . '.fasta -outfmt="6 qseqid sseqid pident score slen sstart send qlen qstart qend qframe positive" -max_target_seqs 50' . $tamanho);

        $out = explode("\n", $output);
        $i = 0;
        $data['result'] = array();


        foreach ($out as $o) {
            $c = explode("\t", $o);

            if (isset($c[6]) and isset($c[5]) and isset($c[4]) and isset($c[2])) {
                if ((($c[6] - $c[5]) / $c[4] > 0.5) and ($c[2] > 25)) {
                    $complex_name = str_replace("-", "_", explode("|", $c[1])[0]);
                    array_push($data['result'], $c);
                }
            }
        }

        return view("blast", $data);
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

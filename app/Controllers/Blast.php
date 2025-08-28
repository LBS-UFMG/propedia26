<?php

namespace App\Controllers;

class Blast extends BaseController
{
    public function index()
    {
        if (!isset($_POST["sequence"]) || !isset($_POST["search"])) {
            redirect("/explore");
        }

        $data = array();

        $data['sequence'] = addslashes($_POST["sequence"]);

        $where = addslashes($_POST["search"]);

        if (($where != 'peptides') and ($where != 'receptors')) {
            $where = 'peptides';
        }

        $fp = fopen('public/db/tmp.fasta', 'w');
        fwrite($fp, $data['sequence']);
        fclose($fp);

        /*print_r('blastp -query public/db/tmp.fasta -subject public/db/'.$where.'.fasta -outfmt="6 qseqid sseqid pident score slen sstart send qlen qstart qend qframe positive"');*/

        $output = shell_exec('blastp -query public/db/tmp.fasta -subject public/db/' . $where . '.fasta -outfmt="6 qseqid sseqid pident score slen sstart send qlen qstart qend qframe positive"');

        $out = explode("\n", $output);
        $i = 0;
        $data['result'] = array();
        $this->load->model("cluster_model");

        //@PMARTINS
        //$bubble_data = array();

        $download_complex = array();

        foreach ($out as $o) {
            $c = explode("\t", $o);

            if (isset($c[6]) and isset($c[5]) and isset($c[4]) and isset($c[2])) {
                if ((($c[6] - $c[5]) / $c[4] > 0.5) and ($c[2] > 25)) {

                    //@PMARTINS
                    //GET CLUSTERS_INFO
                    $complex_name = str_replace("-", "_", explode("|", $c[1])[0]);

                    $download_complex[] = $complex_name;

                    $clusters_info = $this->cluster_model->get_clusters_info($complex_name);
                    $clusters = array();

                    if ($clusters_info->cluster_sequence_num != "") {
                        $cluster_num = $clusters_info->cluster_sequence_num;
                        $is_centroid = $clusters_info->cluster_sequence_centroid;

                        $cluster_url = base_url() . "cluster/sequence/$cluster_num";
                        $a = "<a title='Classified in the sequence cluster number $cluster_num' style='text-decoration:none' href='$cluster_url'>";
                        $span = "<span class='label label-success'>Cluster S" . $cluster_num;

                        if ($is_centroid == 1) {
                            $span .= "&nbsp;<i class='fa fa-star'></i>";
                        }


                        $span .= "</span></a>";
                        $clusters[] = $a . $span;
                        $span = "";
                    }

                    // CLUSTER INTERFACE
                    if ($clusters_info->cluster_interface_num != "") {
                        $cluster_num = $clusters_info->cluster_interface_num;
                        $is_centroid = $clusters_info->cluster_interface_centroid;

                        $cluster_url = base_url() . "cluster/interface/$cluster_num";
                        $a = "<a title='Classified in the interface cluster number $cluster_num' style='text-decoration:none' href='$cluster_url'>";
                        $span = "<span class='label label-danger'>Cluster I" . $cluster_num;

                        if ($is_centroid == 1) {
                            $span .= "&nbsp;<i class='fa fa-star'></i>";
                        }
                        $span .= "</span></a>";
                        $clusters[] = $a . $span;
                        $span = "";
                    }

                    // CLUSTER BINDING
                    if ($clusters_info->cluster_binding_num != "") {
                        $cluster_num = $clusters_info->cluster_binding_num;
                        $is_centroid = $clusters_info->cluster_binding_centroid;

                        $cluster_url = base_url() . "cluster/interface/$cluster_num";
                        $a = "<a title='Classified in the interface cluster number $cluster_num' style='text-decoration:none' href='$cluster_url'>";
                        $span = "<span class='label label-primary'>Cluster B" . $cluster_num;

                        if ($is_centroid == 1) {
                            $span .= "&nbsp;<i class='fa fa-star'></i>";
                        }
                        $span .= "</span></a>";
                        $clusters[] = $a . $span;
                        $span = "";
                    }

                    $c[] = join("<br>", $clusters);
                    array_push($data['result'], $c);
                }
            }
        }

        // Compara se $a é maior que $b
        function cmp($a, $b)
        {
            return $a[3] < $b[3];
        }

        // Ordena
        //usort($data['result'], 'cmp');

        //$data["scripts"] = array("blast.js");
        //$data["bubble_data"] = $bubble_data;

        $data["download_complex"] = $download_complex;

        # CARREGAMENTO DA PÁGINA
        $this->template->show("blast", $data);
    }
}

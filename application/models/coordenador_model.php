<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Coordenador_model
 *
 * @author felipe
 */
class Coordenador_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public static $belongs_to = array(
        array('endereco' => 'id_endereco')
    );

    function remover_movimento_id($id) {
        return $this->db->delete('movimento_faixa', array('id_movimento_faixa' => $id));
    }

    function salvarProntuario($dados) {


        $validar = count($dados['id_movimento_faixa']);
        $ver = 1;
        foreach ($dados['id_movimento_faixa'] as $i => $v) {
            $salvar['id_movimento_faixa'] = $i;
            $salvar['id_federado'] = $dados['id_federado'];
            $salvar['id_evento'] = $dados['id_evento'];
            $salvar['nota'] = $v;
            $this->db->insert('prontuario', $salvar);
        }
    }

    function get_faixa_aluno($id_federado) {

        return $this->db->select('id_graduacao')
                        ->from('graduacao_federado')
                        ->where('id_federado', $id_federado)
                        ->get()
                        ->result_array();
    }

    function atualiza_faixa($id_federado, $salto) {
        //salto referece a quantidade de faixas que o aluno irá pular
        $faixa = $this->get_faixa_aluno($id_federado);
        $faixa = $faixa['0']['id_graduacao'] + $salto;

        $update = array(
            'id_graduacao' => $faixa,
            'data_emissao' => date('Y-m-d')
        );
        $this->db->where('id_federado', $id_federado);
        $this->db->update('graduacao_federado', $update);
    }

    function result_pre_avaliacao($id_federado, $id_evento, $result) {
        $update = array(
            'id_status_avaliacao' => $result,
        );
        $conditions = array('id_federado' => $id_federado, 'id_evento' => $id_evento);
        $this->db->where($conditions);
        return $this->db->update('pre_avaliacao', $update);
    }

   

    function incluir_movimento_faixa($dados) {
        $inserir['id_graduacao'] = $dados['id_graduacao'];


        foreach ($dados['descricao'] as $v) {


            $inserir['nome_movimento'] = $v;
            $inserir['id_modalidade'] = 1;
            $v = explode(' ', $v);
            $inserir['sigla'] = substr($v['0'], 0, 2) . substr($v['1'], 0, 2);
            $this->db->insert('movimento_faixa', $inserir);
        }
    }

     function incluir_em_evento($dados) {
        $faixa_federado = $this->get_faixa_aluno($dados['id_federado']);
        //Pego a graduação atual do aluno adiciono mais uma e entao incluo no evento
        $insert['id_graduacao'] = $faixa_federado['0']['id_graduacao'];
        $insert['id_evento'] = $dados['id_evento'];
        $insert['id_federado'] = $dados['id_federado'];
        $this->db->insert('graduacao_participantes', $insert);
    }
    
    
    function get_faixas_avaliadas() {
       $ultimo_evento = $this->ultimo_evento();
        $sql = "SELECT 
                        count(pre_avaliacao.id_federado) as total,
                        graduacao.id_graduacao,
                        graduacao.faixa
                        
                        FROM pre_avaliacao
                        inner join graduacao_federado 
                        on graduacao_federado.id_federado = pre_avaliacao.id_federado
                        inner join graduacao
                        on graduacao_federado.id_graduacao+1 = graduacao.id_graduacao
                        where pre_avaliacao.id_evento = {$ultimo_evento['id_evento']}
                            and
                            pre_avaliacao.id_status_avaliacao = 3
                        group by graduacao_federado.id_graduacao";
        return $this->db->query($sql)->result_array();
    }

    function compromisso_agendados() {
        $sql = "SELECT 
                    count(pre_avaliacao.id_federado)as total,
                    date_format(pre_avaliacao.data_agendamento,'%d-%m-%Y') as data,
                    pre_avaliacao.horario,
                    filial.nome
                FROM pre_avaliacao
                join filial using (id_filial)
                join modalidade using (id_modalidade)
                inner join coordenador 
                    on modalidade.id_coordenador = coordenador.id_coordenador
               inner join federado
                    on coordenador.id_federado = federado.id_federado
               where pre_avaliacao.id_status_avaliacao = 3
               group by pre_avaliacao.data_agendamento, pre_avaliacao.horario
                   ";

        return $this->db->query($sql)->result_array();
    }

    function agendamento_pendentes() {
        $sql = "SELECT 
                                count(id_filial) as total
                            FROM
                                 pre_avaliacao
                            join filial using (id_filial) 
                            join modalidade using (id_modalidade)
                            join coordenador using (id_coordenador)
                            inner join federado on
                                coordenador.id_federado = federado.id_federado
                            where pre_avaliacao.id_status_avaliacao = 4";
        return $this->db->query($sql)->result_array();
    }

    function setAgendarAvaliacao($id_pre_avaliacao) {
        
    }

    
    
    function movimentos($faixa) {
        $sql = "select
                    movimento_faixa.nome_movimento,
                    movimento_faixa.id_movimento_faixa,
                    graduacao.faixa,
                    movimento_faixa.sigla
                from 
                movimento_faixa
                inner join graduacao on graduacao.id_graduacao = movimento_faixa.id_graduacao
                where movimento_faixa.id_graduacao = $faixa";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_aluno_faixa($id_federado) {
        $sql = "SELECT 
                federado.nome,
                federado.id_federado,
                federado.data_nasc,
                graduacao.faixa,
                graduacao.ordem,
                filial.nome as nome_filial,
                filial.id_filial
                FROM federado
                inner join matricula
                on matricula.id_federado = federado.id_federado
                inner join filial
                on matricula.id_filial = filial.id_filial
                inner join graduacao_federado
                on graduacao_federado.id_federado = federado.id_federado
                inner join graduacao
                on graduacao.id_graduacao = graduacao_federado.id_graduacao 
                where federado.id_federado = '$id_federado';";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function remarcar_pre_agendar($id) {

        $update = array('id_status_avaliacao' => '4');
        $this->db->where('id_pre_avaliacao', $id);
        $this->db->update('pre_avaliacao', $update);
    }

    function get_ultimo_evento($id_federado) {
        $sql = "SELECT 
                    pre_avaliacao.id_pre_avaliacao,
                    pre_avaliacao.id_evento,
                    date_format(pre_avaliacao.data_agendamento,'%d-%m-%Y')as data_agendamento,
                    evento_graduacao.numero_evento,
                    date_format(evento_graduacao.data_evento,'%d-%m-%Y') as data
                FROM pre_avaliacao
                    inner join evento_graduacao
                    on 
                    evento_graduacao.id_evento = pre_avaliacao.id_evento 
                where pre_avaliacao.id_federado = $id_federado
                    and   pre_avaliacao.id_status_avaliacao = 3;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_alunos_notas($id_filial) {
        $data_atual = date('Y-m-d');
        $sql = "SELECT
                    pre_avaliacao.id_pre_avaliacao,
                    federado.id_federado,
                    federado.nome,
                    pre_avaliacao.id_filial as filial_do_aluno,
                    federado.data_nasc,
                    status_avaliacao.descricao,
                    graduacao.faixa as faixa_atual,
                    graduacao.id_graduacao as id_faixa
               FROM pre_avaliacao
               join 
                    federado using (id_federado)
               join 
                    graduacao_federado using (id_federado)
               join 
                    status_avaliacao using (id_status_avaliacao)
               join 
                    graduacao using (id_graduacao)
               where 
                    pre_avaliacao.id_filial = '$id_filial'
               and 
                    pre_avaliacao.id_status_avaliacao = '3'
                    
               order by graduacao.id_graduacao asc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function set_cancelar_agendado($alunos) {



        $update = array(
            'data_agendamento' => '0000-00-00',
            'id_status_avaliacao' => '4'
        );
        $cont = count($alunos['id_pre_avaliacao']);
        $r = '0';
        foreach ($alunos['id_pre_avaliacao'] as $i => $v) {
            $this->db->where('id_pre_avaliacao', $v);
            $this->db->update('pre_avaliacao', $update);
            $r++;
        }
        if ($cont == $r) {
            return true;
        } else {
            return false;
        }
    }

    function getCompromissos($id_filial) {
        $sql = "SELECT 
                    pre_avaliacao.id_pre_avaliacao,
                    date_format(pre_avaliacao.data_agendamento,'%d-%m-%Y') as data,
                    federado.nome,
                    filial.nome as nome_filial
                FROM 
                    pre_avaliacao
                join 
                    federado using (id_federado)
                join 
                    filial using (id_filial)
                where 
                    id_status_avaliacao = 3 and id_filial = $id_filial";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function agendar_avaliacao($dados) {
        $this->load->library('funcoes');
        $data = $dados['pre_avaliacao']['data_agendamento'];
        $alunos = $dados['pre_avaliacao']['id_pre_avaliacao'];

//3 para aguardando aprovação
        $update = array(
            'horario' => $dados['pre_avaliacao']['horario'],
            'data_agendamento' => $this->funcoes->data($data),
            'id_status_avaliacao' => '3'
        );

        $cont = count($alunos);
        $r = '0';
        foreach ($alunos as $i => $v) {
            $this->db->where('id_pre_avaliacao', $v);
            $this->db->update('pre_avaliacao', $update);
            $r++;
        }

        if ($cont == $r) {
            return true;
        } else {
            return false;
        }
    }

    function getPreAvaliar($id_filial = null) {
        $sql = "SELECT
                    pre_avaliacao.id_pre_avaliacao,
                    federado.nome,
                    pre_avaliacao.id_filial as filial_do_aluno,
                    federado.data_nasc,
                    status_avaliacao.descricao,
                    graduacao.faixa as faixa_atual,
                    graduacao.id_graduacao as id_faixa
               FROM pre_avaliacao
               join 
                    federado using (id_federado)
               join 
                    graduacao_federado using (id_federado)
               join 
                    status_avaliacao using (id_status_avaliacao)
               join 
                    graduacao using (id_graduacao)
               where 
                    pre_avaliacao.id_filial = '$id_filial'
               and 
                    pre_avaliacao.id_status_avaliacao = '4'
               order by graduacao.id_graduacao asc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getFaixas($id_modalidade) {
        return $this->db->select('id_graduacao,faixa')
                        ->from('graduacao')
                        ->where('id_modalidade', $id_modalidade)
                        ->get()
                        ->result_array();
    }

    
    
    
    function faixas_por_evento($id_evento) {
        $sql = "SELECT 
                    graduacao.id_graduacao,
                    graduacao.faixa,
                    count(graduacao.id_graduacao) as total_participantes
                FROM 
                    graduacao_participantes
                inner join 
                    graduacao_federado on
                    graduacao_federado.id_federado = graduacao_participantes.id_federado
                join 
                    graduacao on
                graduacao.id_graduacao = graduacao_federado.id_graduacao
                
                where
                     graduacao_participantes.id_evento = '$id_evento'
                         and
                     graduacao_participantes.status_participacao = '1'
                group by 
                     graduacao.id_graduacao";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function totalizar_faixas_por_evento($id_evento) {
        $sql = "SELECT 
                    count(graduacao_participantes.id_federado)as total,
                    federado.tamanho_faixa,
                    graduacao.faixa as nome_faixa,
                    graduacao.id_graduacao
                    FROM
                     federado
                    left join graduacao_participantes
                    on graduacao_participantes.id_federado = federado.id_federado
                    inner join graduacao
                    on graduacao.id_graduacao = graduacao_participantes.id_graduacao
                    where
                    graduacao_participantes.id_evento = $id_evento and graduacao_participantes.status_participacao = 1
                    group by federado.tamanho_faixa,graduacao_participantes.id_graduacao
                    order by ordem;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function ultimo_evento() {
        $sql = "select * from evento_graduacao order by data_evento DESC";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        
       if(empty($result)){
           return $result['0']=array('data_evento'=>'0000-00-00');
       }else{
        return $result['0'];
       }
    }

    function participantes_evento($id_evento, $id_faixa) {

        if ($id_faixa != null) {
            $complemento = " and graduacao_federado.id_graduacao = '$id_faixa';";
        } else {
            $complemento = ";";
        }
        $sql = "SELECT 
federado.id_federado,
federado.nome,
federado.email,
federado.telefone,
graduacao_federado.id_graduacao,
graduacao_participantes.id_evento,
graduacao.faixa
FROM graduacao_participantes
inner join graduacao_federado 
on graduacao_federado.id_federado= graduacao_participantes.id_federado
inner join federado
on federado.id_federado = graduacao_participantes.id_federado
inner join graduacao
on graduacao.id_graduacao = graduacao_federado.id_graduacao
where graduacao_participantes.id_evento = $id_evento
and
graduacao_participantes.status_participacao = 1" . $complemento;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function pedidos($id_evento, $id_graduacao, $quantidade, $tamanho) {
        $insert = array(
            'id_evento' => $id_evento,
            'id_graduacao' => $id_graduacao,
            'quantidade' => $quantidade,
            'tamanho' => $tamanho
        );
        return $this->db->insert('pedido_faixa', $insert);
    }

    function pedidos_para_evento() {
        $sql = "
                SELECT 
                    id_evento as evento,
                    numero_evento,
                    data_evento ,
                (select sum(quantidade) from pedido_faixa where id_evento = evento) as Total_pedido,
                    if(
                    (select count(id_evento) from pedido_faixa where id_evento = evento group by id_evento) > '0',
                    true,false
                    ) as validar
                FROM
                     evento_graduacao
                order by data_evento DESC;            
                    ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function participantes($id_faixa, $id_evento) {
        
        $sql = "SELECT 
                    federado.nome,
                    graduacao_federado.id_graduacao
                    
                FROM pre_avaliacao
                    inner join federado
               on 
                    pre_avaliacao.id_federado = federado.id_federado 
               inner join graduacao_federado
                    on graduacao_federado.id_federado = pre_avaliacao.id_federado
               where 
                    pre_avaliacao.id_evento = $id_evento
                    and
                    graduacao_federado.id_graduacao = $id_faixa"
        ;
        $query = $this->db->query($sql);
        ;

        return $query->result_array();
    }

    function getUltimoEvento() {
        $sql = "SELECT MAX(id_evento) as id_evento FROM evento_graduacao";
        $query = $this->db->query($sql);
        $dados = $query->result_array();

        if (!empty($dados['0']['id_evento'])) {
            return $dados['0']['id_evento'];
        } else {
            return 0;
        };
    }

    function getProntuario($dados) {

        $dados['nome'] = "Aluna Um";
        $dados['rg'] = "69.523.920-5";
        extract($dados);
        print_r($rg);

        $sql = "SELECT 
                    federado.nome,
                    federado.rg,
                    movimentos_por_faixa.descricao,
                    prontuario.nota,
                    faixas.descricao,
                    evento_graduacao.numero_evento
                    FROM federado
                    join 
                    prontuario using (id_federado)
                    join 
                    faixas using (id_faixa)
                    join
                    movimentos_por_faixa using(id_movimentos_por_faixa)
                    join 
                    evento_graduacao using (id_evento)
                    where 
                    federado.nome like '$nome'
                    or
                    federado.rg like '$rg'";

        $query = $this->db->query($sql);
        ;

        return $query->result_array();
    }

    function getEstados() {

        return $this->db
                        ->select('*')
                        ->from('estados')
                        ->get()
                        ->result_array();
    }

    function getEventoUnico($id_evento) {

        return $this->db
                        ->select('*')
                        ->from('evento_graduacao')
                        ->where('id_evento', $id_evento)
                        ->join('endereco', 'evento_graduacao.id_endereco = endereco.id_endereco')
                        ->join('estados', 'endereco.uf = estados.id_estados')
                        ->get()
                        ->result_array();
    }

    function getFiliais() {
        return $this->db
                        ->select('*')
                        ->from('filial')
                        ->join('pre_avaliacao', 'pre_avaliacao.id_filial = filial.id_filial')
                        ->where('pre_avaliacao.id_status_avaliacao', '3')
                        ->group_by('pre_avaliacao.id_filial')
                        ->get()
                        ->result_array();
    }

    function FiliaisAgen() {

        $sql = "SELECT 
                    pre_avaliacao.id_evento,
                    pre_avaliacao.id_filial as filial,
                    filial.nome,
                    pre_avaliacao.id_filial
                FROM 
                    pre_avaliacao
                inner join
                    filial
                on 
                    pre_avaliacao.id_filial = filial.id_filial
                where
                    pre_avaliacao.id_status_avaliacao = 4
                group by 
                    pre_avaliacao.id_filial;";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    function deletarEvento($id_evento) {
        try {
            $result = $this->db->delete('evento_graduacao', array('id_evento' => $id_evento));

            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

    
    public function get_modalidade(){
        
         $query =  $this->db->select('*')
                           ->from('modalidade')
                           ->get();
        
         return $query->result_array();
       
    }
    
    function getEventos() {
        $query = $this->db
                ->select("evento_graduacao.id_evento,
                                    endereco.id_endereco,
                                    evento_graduacao.numero_evento,
                                    date_format(evento_graduacao.data_evento,'%d-%m-%Y') as data_evento,
                                    endereco.logradouro,
                                    endereco.cidade,
                                    estados.sigla,
                                    endereco.numero,
                                    modalidade.nome")
                ->from('evento_graduacao')
                ->join('endereco', 'evento_graduacao.id_endereco = endereco.id_endereco')
                ->join('estados', 'endereco.uf = estados.id_estados')
                ->join('modalidade', 'evento_graduacao.id_modalidade = modalidade.id_modalidade')
                ->order_by('data_evento', 'DESC')
                ->get()
                ->result_array();


        return $query;
    }

    public function insertEvento($dados) {




        $dados['data']['endereco']['tipo_endereco'] = '3';
        $this->db->insert('endereco', $dados['data']['endereco']);
        $ultimo = $this->db->from("endereco")->insert_id();

        $data = explode('-', $dados['data']['evento_graduacao']['data_evento']);
        $dados['data']['evento_graduacao']['data_evento'] = $this->funcoes->data($dados['data']['evento_graduacao']['data_evento']);
        $dados['data']['evento_graduacao']['id_endereco'] = $ultimo;
        $dados['data']['evento_graduacao']['numero_evento'] = $data['1'] . '-' . $data['2'];
        $dados['data']['evento_graduacao']['id_modalidade'] = '1';
        $this->funcoes->imprimir($dados['data']['evento_graduacao']);


        if ($this->db->insert('evento_graduacao', $dados['data']['evento_graduacao'])) {

            return true;
        } else {

            return false;
        };
    }

    function editEvento($dados) {



        $dados['evento_graduacao']['data_evento'] = $this->funcoes->data($dados['evento_graduacao']['data_evento']);
        $modalidade = 1;

        $this->db->where('id_evento', $dados['evento_graduacao']['id_evento']);
        $this->db->update('evento_graduacao', $dados['evento_graduacao']);


        $this->db->where('id_endereco', $dados['endereco']['id_endereco']);
        $this->db->update('endereco', $dados['endereco']);
    }

    public function MntFilialDados($id) {
        return $this->db
                        ->select
                                (
                                "
                            filial.id_filial AS id,
                            filial.nome AS nome,
                            filial.telefone AS telefone,
                            filial.fax AS fax,
                            filial.email AS email,
                            filial.representante AS representante,
                            filial.id_modalidade AS modalidade,
                            filial.cnpj as cnpj,
                            federado.nome AS instrutor,
                            endereco.logradouro AS logradouro,
                            endereco.numero AS numero,
                            endereco.complemento AS complemento,
                            endereco.bairro AS bairro,
                            endereco.cidade AS cidade,
                            estados.sigla as uf
                            "
                        )
                        ->from("filial")
                        ->join("instrutor", "filial.id_instrutor = instrutor.id_instrutor", "inner")
                        ->join("federado", "instrutor.id_federado = federado.id_federado", "inner")
                        ->join("endereco", "filial.id_endereco = endereco.id_endereco", "inner")
                        ->join('estados', 'endereco.uf = estados.id_estados', 'join')
                        ->where("filial.id_filial", $id)
                        ->get()
                        ->result_array();
    }

    public function get_filiais() {

        $query = $this->db->get('federado');
        return $query->result();
    }

    public function get_professores($id) {

        $query = $this->db->select(
                        'federado.nome,federado.sexo,federado.telefone,                                  
                                    federado.email,federado.data_nasc , filial.nome as nome_filial'
                )
                ->from('instrutor_por_modalidade')
                ->join('modalidade', 'modalidade.id_modalidade = instrutor_por_modalidade.id_modalidade')
                ->join('instrutor', 'instrutor.id_instrutor = instrutor_por_modalidade.id_instrutor')
                ->join('federado', 'federado.id_federado = instrutor.id_federado')
                ->join('filial', 'filial.id_instrutor = instrutor.id_instrutor')
                ->where("filial.id_filial", $id)
                ->get();

        return $query->result_array();
    }

}

?>

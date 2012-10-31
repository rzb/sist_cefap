<?php $this->load->view('header'); ?>
<?php //$this->load->view('grupos_producoes'); ?>
<?php echo ($this->input->get('msg') && $this->input->get('msg_type'))? msg(urldecode(html_entity_decode($this->input->get('msg', TRUE))), urldecode(html_entity_decode($this->input->get('msg_type', TRUE)))) : ''; ?>
<h2><?php echo $title; ?></h2>
<h3>Referente a: <strong><?php echo $ref; ?></strong></h3>

<script type="text/javascript">
$(document).ready(function(){
	$('#seletor_producoes').change(function(){
		window.location.href = "<?php echo base_url('controlador/show'); ?>/" + $(this).val();
	});
});
</script>


<div id="container_seletor_producoes">
<select name='seletor_producoes' id='seletor_producoes'>
<option value=''>Meses anteriores...</option>
<?php
for($i = 1; $i < 11; $i++)
{
	$mes = date("Y-m", strtotime("-" . $i . " month")) . '-01'; // YYYY-MM-DD (dd sempre 01)';
	$opcao = traduz_mes($mes) . '/' . obter_ano($mes);	
		
	echo "<option value='$i'>$opcao</value>";
}
?>
</select>
</div>
<?php
if($p)
{
	echo "<table id='view_users' class='tabela1 tabela_estilo1'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>Médico</th>";
	echo "<th>Produção pendente?</th>";
	echo "<th>Avaliação(ões) pendente(s)?</th>";
	echo "<th>Aprovação(ões) pendente(s)?</th>";
	echo "<th>Resultado já processado?</th>";
	echo "<th>Opções</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	
	foreach($p as $i => $u)
	{
		echo "<tr id='" . $u->id . "' class=''>";
		echo "<td>" . $u->id . "</td>";
		echo "<td>" . $u->nome . " (" . $u->username . ")</td>";
		echo "<td>" . $u->producao_pendente . "</td>";
		echo "<td>" . $u->resposta_pendente . "</td>";
		echo "<td>" . $u->aprovacao_pendente . "</td>";
		echo "<td>" . $u->resultado_processado . "</td>";
		echo "<td><ul class='view_opcoes'>";
		echo "<li class='op_editarresultado'><a title='Editar resultado' href='" . base_url('controlador/edit/' . $u->id) . "'>Editar</a></li>";
		echo "<li class='op_verresultado'><a title='Ver resultado' href='" . base_url('controlador/view/' . $u->id) . "'>Ver</a></li>";
		echo "</ul></td>";
		echo "</tr>";

	}
	echo "</table>";
}
else
{
	echo "<p>Nenhum resultado encontrado.</p>";
}

?>
<?php $this->load->view('footer'); ?>
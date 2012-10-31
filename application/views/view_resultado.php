<?php $this->load->view('header'); ?>
<?php $this->load->view('respostas_opcoes'); ?>
<?php echo ($this->input->get('msg') && $this->input->get('msg_type'))? msg(urldecode(html_entity_decode($this->input->get('msg', TRUE))), urldecode(html_entity_decode($this->input->get('msg_type', TRUE)))) : ''; ?>
<h2><?php echo $title; ?></h2>
<h3>Referente a: <strong><?php echo $c->user->nome; ?></strong></h3>
<table id="viewRes">
<tr>
	<td class="leftRes">Mês de referência:</td>
	<td><?php echo traduz_mes($c->ref_mes) . '/' . obter_ano($c->ref_mes); ?></td>
</tr>
<tr>
	<td colspan="2" class="titRes">PRODUÇÃO</td>
</tr>
<tr>
	<td class="leftRes">Carga horária prevista:</td>
	<td><?php echo $c->producao->ch_prevista; ?> horas</td>
</tr>
<tr>
	<td class="leftRes">Carga horária cumprida:</td>
	<td><?php echo $c->producao->ch_cumprida; ?> horas</td>
</tr>
<tr>
	<td class="leftRes">Saldo de horas:</td>
	<td><?php echo $c->producao->sh_mes; ?> horas (<?php echo ($c->producao->sh_mes > 0) ? 'credora' : 'devedora'; ?>)</td>
</tr>
<tr>
	<td class="leftRes">Nível do assistente:</td>
	<td><?php echo $c->producao->nivel; ?><br/>
	
	<?php 
			switch($c->producao->nivel)
			{
				case '1':
					echo "";
					break;
				case '2':
					echo "(mestrado com produção científica ativa*, TSA instrutor ou co-responsável no CET, coordenador de equipe)<br/>";
					echo "* produção científica ativa: mínimo de uma publicação com indexação MEDLINA no último biênio.";
					break;
				case '3':
					echo "(doutorado com produção científica ativa*, supervisor de equipe)<br/>";
					echo "* produção científica ativa: mínimo de uma publicação com indexação MEDLINA no último biênio.";
					break;
			}
			?>
	
	</td>
</tr>
<tr>
	<td class="leftRes">Quantidade de plantões realizados:</td>
	<td><?php echo $c->producao->qtde_plantoes; ?> plantões</td>
</tr>
<tr>
	<td class="leftRes">Complemento dos plantões:</td>
	<td><?php if($total_0 > 0) : ?>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $c->producao->compl_plantoes_qtde_0; ?> plantões a R$ <?php echo number_format($c->producao->compl_plantoes_valor_0, 2, ",", ""); ?> = <strong>R$ <?php echo number_format($total_0, 2, ",", ""); ?></strong></p>
		<?php endif; ?>
		
		<?php if($total_1 > 0) : ?>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $c->producao->compl_plantoes_qtde_1; ?> plantões a R$ <?php echo number_format($c->producao->compl_plantoes_valor_1, 2, ",", ""); ?> = <strong>R$ <?php echo number_format($total_1, 2, ",", ""); ?></strong></p>
		<?php endif; ?>
		
		<?php if($total_2 > 0) : ?>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $c->producao->compl_plantoes_qtde_2; ?> plantões a R$ <?php echo number_format($c->producao->compl_plantoes_valor_2, 2, ",", ""); ?> = <strong>R$ <?php echo number_format($total_2, 2, ",", ""); ?></strong></p>
		<?php endif; ?>
		
		<?php if($total_3 > 0) : ?>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $c->producao->compl_plantoes_qtde_3; ?> plantões a R$ <?php echo number_format($c->producao->compl_plantoes_valor_3, 2, ",", ""); ?> = R$ <strong><?php echo number_format($total_3, 2, ",", ""); ?></strong></p>
		<?php endif; ?></td>
</tr>
<tr>
	<td colspan="2" class="titRes">AVALIAÇÃO DE METAS ASSISTENCIAIS</td>
</tr>
<tr>
	<td colspan="2">
		<table class="tab_det_pont">
		<tr>
			<td><strong>Tipo</strong></td>
			<td><strong>Autor</strong></td>
			<td><strong>Pontuação</strong></td>
			<td><strong>Opções</strong></td>
		</tr>
		<?php
		foreach($c->resposta as $r)
		{
			$r->author->get();
			?>
		<tr>
			<td><?php echo traduz_open_as($r->open_as); ?></td>
			<td><?php echo $r->author->nome; ?></td>
			<td><?php echo $r->score; ?></td>
			<td><a id='linkVer' target='_blank' href='<?php echo base_url('respostas/answer') . '/' . $r->id ?>' title='Ver avaliação'>ver</a>
			<a id='linkMsg' target='_blank' href='<?php echo base_url('mensagens/write') . '/to' . $r->author->id ?>' title='Enviar mensagem'>mensagem</a></td>
		</tr>
			<?php
		}
		?>

		</table>
		<p>Pontuação total: <strong><?php echo $c->pontuacao; ?> pontos</strong></p>
	</td>
</tr>
<tr>
	<td colspan="2" class="titRes">VALORES</td>
</tr>
<tr>
	<td class="leftRes">Valor da hora:</td>
	<td>R$ <?php echo number_format($c->valor_hora, 2, ",", ""); ?></td>
</tr>
<tr>
	<td class="leftRes">(A) Valor da jornada:</td>
	<td>R$ <?php echo number_format($c->valor_jornada, 2, ",", ""); ?></td>
</tr>
<tr>
	<td class="leftRes">(B) Valor dos plantões:</td>
	<td>R$ <?php echo number_format($c->valor_plantoes, 2, ",", ""); ?></td>
</tr>
<tr>
	<td class="leftRes">(C) Descontos:</td>
	<td>R$ <?php echo number_format($c->producao->desconto, 2, ",", ""); ?></td>
</tr>
<tr>
	<td class="leftRes">VALOR TOTAL (A+B-C):</td>
	<td>R$ <?php echo number_format($c->valor_total, 2, ",", ""); ?></td>
</tr>

<tr>
	<td colspan="2" class="titRes">OBSERVAÇÕES</td>
</tr>
<tr>
	<td colspan="2"><?php echo $c->producao->obs; ?></td>
</tr>

</table>



<?php $this->load->view('footer'); ?>
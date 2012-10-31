<?php $this->load->view('header'); ?>
<?php $this->load->view('respostas_opcoes'); ?>
<?php echo ($this->input->get('msg') && $this->input->get('msg_type'))? msg(urldecode(html_entity_decode($this->input->get('msg', TRUE))), urldecode(html_entity_decode($this->input->get('msg_type', TRUE)))) : ''; ?>
<h2><?php echo $title; ?></h2>
<h3>Clique sobre o mês de referência para abrir o respectivo relatório</h3>

<ul id="listaRelat">
<?php
foreach($c as $m)
{
	echo "<li>";
	if($m['id']) echo "<a target='_blank' href='" . base_url('controlador/view') . "/" . $m['id'] . "'>";
	echo $m['ref'];
	if($m['id']) echo "</a>";
	if(! $m['id']) echo " <span class='indisp'>(indisponível)</span>";
	echo "</li>";
}

?>
</ul>

<?php $this->load->view('footer'); ?>
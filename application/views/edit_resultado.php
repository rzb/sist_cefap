<?php $this->load->view('header'); ?>
<?php //$this->load->view('grupos_producoes'); ?>
<?php echo (isset($msg) && isset($msg_type) )? msg($msg, $msg_type) : ''; ?>
<h2><?php echo $title; ?></h2>
<script type="text/javascript">
$(document).ready(function() {

});

</script>
<?php
$attributes = array('class' => 'traj_form', 'id' => 'frmEditResultado', 'name' => 'frmEditResultado');

echo validation_errors();

if(true)
{
	echo form_open('controlador/edit', $attributes);
	echo "<div class='fields_holder'>";

	echo "<div class='field_holder'>";
	echo form_label('Pontuação: ', 'pontuacao');
	echo '<input type="text" size="5" name="pontuacao" id="pontuacao" class="" value="' . $c->pontuacao . '"  />';
	echo "</div>";

	echo "<div class='field_holder'>";
	echo form_label('Valor da hora: R$ ', 'valor_hora');
	echo '<input type="text" size="5" name="valor_hora" id="valor_hora" class="" value="' . number_format($c->valor_hora, 2, ",", "") . '"  />';
	echo "</div>";
	
	echo "<div class='field_holder'>";
	echo form_label('Valor da jornada: R$ ', 'valor_jornada');
	echo '<input type="text" size="5" name="valor_jornada" id="valor_jornada" class="" value="' . number_format($c->valor_jornada, 2, ",", "") . '"  />';
	echo "</div>";
	
	echo "<div class='field_holder'>";
	echo form_label('Valor dos plantões: R$ ', 'valor_plantoes');
	echo '<input type="text" size="5" name="valor_plantoes" id="valor_plantoes" class="" value="' . number_format($c->valor_plantoes, 2, ",", "") . '"  />';
	echo "</div>";
	
	echo "<div class='field_holder'>";
	echo form_label('Valor total: R$ ', 'valor_total');
	echo '<input type="text" size="5" name="valor_total" id="valor_total" class="" value="' . number_format($c->valor_total, 2, ",", "") . '"  />';
	echo "</div>";
	
	echo "<div class='bt_holder'>";
	echo div_clear();
	echo form_hidden('hidden_resultado_id', $id);
	echo form_submit('submit', 'Salvar alterações');
	echo "</div>"; // bt_holder
	echo "</div>"; // fields_holder
	echo "</form>";

} // end if users
?>
<?php $this->load->view('footer'); ?>
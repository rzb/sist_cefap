<?php 
    $this->load->view('header');
    
?>
<div id="main_content">
    <?php echo (isset($msg) && isset($msg_type) )? msg($msg, $msg_type) : ''; ?> 
    Olá superadmin!
    
    
    
    
    
</div>
<?php
    
    $this->load->view('footer'); 
?>  
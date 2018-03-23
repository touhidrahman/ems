<?php $this->load->helper('text'); // to use word_wrap function?>
<?php $this->load->helper('date_format');?>
<section>
<div class="ink-grid double-space">
    <div class="column-group gutters">
        <div class="all-70 small-100">
<?php 
echo heading(strtoupper('User Feedbacks'), 1);
?>



<?php foreach ($results->result() as $row) {
    echo heading('['. $row->id . '] '. $row->subject, 5, 'class="no-margin"');
    echo '<p>'.$row->description . '</p>';
    echo '<p class="condensed-300">
        Sent by: '. mailto($row->email, $row->name) . 
        ' Sent at: '. _nice_dt_full($row->sent_at) .'</p>';
    echo br(3);
}
?>
<br>
<!-- Pagination Buttons -->
<div><?php echo $links; ?></div>

        </div>
        
        
        <!-- QUICK REPLY SIDEBAR -->
        <div class="all-30 small-100">
            <?php 
               // echo $this->load->module('blogs/related');
            ?>
        
        </div>
    </div>
</div>
</section>
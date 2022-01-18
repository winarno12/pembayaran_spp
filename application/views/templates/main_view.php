<?php
//header
$this->load->view('templates/header');
?>
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->

        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <?php
        $this->load->view($content);
        ?>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- BEGIN FOOTER -->
<?php
$this->load->view('templates/footer');

?>
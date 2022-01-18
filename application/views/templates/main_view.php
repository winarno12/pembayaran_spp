<?php
if ($this->session->userdata('id_petugas') == true) :
    //header
    $this->load->view('templates/header');
?>



    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- view -->
            <?php
            $this->load->view($content);
            ?>
        </div>
        <!-- endview -->
    </div>
    <!--  FOOTER -->
<?php
    $this->load->view('templates/footer');
else :
    redirect('petugas');
endif;
?>
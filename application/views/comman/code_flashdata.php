<div class="col-md-12">
      <!-- ********** ALERT MESSAGE START******* -->
          <?php if(demo_app()){ ?>
            <div class="alert alert-success  text-left">
                 <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>
                  Ultimate Rabit POS new Version <?= app_version(); ?> released , Liên hệ tác giả để cài đặt bản thương mại <a target='_blank' href='https://www.facebook.com/phamduybk92/'>here</a>. [Một vài tính năng bản Demo sẽ bị loại bỏ]
                </strong>
              </div>
          <?php } ?>
          <?php
            if($this->session->flashdata('success')!=''):
              ?>
                <div class="alert alert-success alert-dismissable text-center">
                 <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?= $this->session->flashdata('success') ?></strong>
              </div> 
               <?php 
            endif;
            if($this->session->flashdata('error')!=''):
              ?>
                <div class="alert alert-danger alert-dismissable text-center">
                 <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?= $this->session->flashdata('error') ?></strong>
              </div> 
               <?php
            endif;
            if($this->session->flashdata('warning')!=''):
              ?>
                <div class="alert alert-warning alert-dismissable text-center">
                 <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?= $this->session->flashdata('warning') ?></strong>
              </div> 
               <?php
            endif;
            if($this->session->flashdata('info')!=''):
              ?>
                <div class="alert alert-info alert-dismissable text-center">
                 <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?= $this->session->flashdata('info') ?></strong>
              </div> 
               <?php
            endif;
            ?>
            <!-- ********** ALERT MESSAGE END******* -->
     </div>
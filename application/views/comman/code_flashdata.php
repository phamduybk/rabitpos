<div class="col-md-12">
      <!-- ********** ALERT MESSAGE START******* -->
          <?php if(demo_app()){ ?>
            <div class="alert alert-success  text-left">
                 <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>
                 Rabit POS Version <?= app_version(); ?> , Like và share Fanpage <a target='_blank' href='https://www.facebook.com/rabitweb/'>here</a>. [Một vài tính năng bản Demo sẽ bị loại bỏ] Tắt demo vào sửa file application\config\config.php => $config['demo'] = FALSE;

                </strong>
              </div>
          <?php } ?>


          <?php if(!checkLastestVersion()){ ?>
            <div class="alert alert-success  text-left">
                 <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>
                 Phiên bản hiện tại là <?= app_version(); ?> ,Đã có phiên bản mới  <?= nameLastestVersion(); ?>, vui lòng update tại <a target='_blank' href='https://github.com/phamduybk/rabitpos'>here</a>
                </strong>
              </div>
          <?php } ?>

          <?php if(showFlashCard()){ ?>
            <div class="alert alert-success  text-left">
                 <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>
                <?= getTextShow(); ?> <a target='_blank' href='https://www.facebook.com/rabitweb/'>đây</a>
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
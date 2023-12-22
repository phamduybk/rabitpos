<?php
 goto bc1Uy; ZORAZ: if (!checkLastestVersion()) { ?>
<div class="alert alert-success text-left"><a href="javascript:void()"aria-label="close"class="close"data-dismiss="alert">×</a> <strong>Phiên bản hiện tại là<?php  echo app_version(); ?>
,Đã có phiên bản mới<?php  echo nameLastestVersion(); ?>
, vui lòng update tại <a href="https://github.com/phamduybk/rabitpos"target="_blank">here</a></strong></div><?php  } goto JMfse; JMfse: if (showFlashCard()) { ?>
<div class="alert alert-success text-left"><a href="javascript:void()"aria-label="close"class="close"data-dismiss="alert">×</a> <strong>Phiên bản sử dụng là miễn phí ( Giới hạn bán hàng 20 hóa đơn 1 ngày) , Nâng cấp premium ngay tại <a href="https://www.facebook.com/rabitweb/"target="_blank">đây</a></strong></div><?php  } goto G6dIJ; UGNH7: if ($this->session->flashdata("\x69\156\146\157") != '') { ?>
<div class="alert alert-dismissable text-center alert-info"><a href="javascript:void()"aria-label="close"class="close"data-dismiss="alert">×</a> <strong><?php  echo $this->session->flashdata("\151\156\146\x6f"); ?>
</strong></div><?php  } goto ISRE_; D1l5M: if ($this->session->flashdata("\167\141\x72\156\x69\156\x67") != '') { ?>
<div class="alert alert-dismissable text-center alert-warning"><a href="javascript:void()"aria-label="close"class="close"data-dismiss="alert">×</a> <strong><?php  echo $this->session->flashdata("\167\x61\162\x6e\x69\x6e\x67"); ?>
</strong></div><?php  } goto UGNH7; LhpdL: if (demo_app()) { ?>
<div class="alert alert-success text-left"><a href="javascript:void()"aria-label="close"class="close"data-dismiss="alert">×</a> <strong>Rabit POS Version<?php  echo app_version(); ?>
, Like và share Fanpage <a href="https://www.facebook.com/rabitweb/"target="_blank">here</a>. [Một vài tính năng bản Demo sẽ bị loại bỏ] Tắt demo vào sửa file application\config\config.php => $config['demo'] = FALSE;</strong></div><?php  } goto ZORAZ; G6dIJ: if ($this->session->flashdata("\163\165\x63\143\x65\x73\163") != '') { ?>
<div class="alert alert-dismissable text-center alert-success"><a href="javascript:void()"aria-label="close"class="close"data-dismiss="alert">×</a> <strong><?php  echo $this->session->flashdata("\163\165\143\143\145\163\163"); ?>
</strong></div><?php  } goto Mgj83; Mgj83: if ($this->session->flashdata("\x65\x72\x72\157\162") != '') { ?>
<div class="alert alert-dismissable text-center alert-danger"><a href="javascript:void()"aria-label="close"class="close"data-dismiss="alert">×</a> <strong><?php  echo $this->session->flashdata("\x65\x72\x72\157\162"); ?>
</strong></div><?php  } goto D1l5M; bc1Uy: ?>
<div class="col-md-12"><?php  goto LhpdL; ISRE_: ?>
</div>
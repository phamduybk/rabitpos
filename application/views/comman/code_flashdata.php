<?php
 goto aReeP; G7FCY: if (!checkLastestVersion()) { ?>
<div class="alert alert-success text-left"><a href="javascript:void()"aria-label="close"class="close"data-dismiss="alert">×</a> <strong>Phiên bản hiện tại là<?php  echo app_version(); ?>
,Đã có phiên bản mới<?php  echo nameLastestVersion(); ?>
, vui lòng update tại <a href="https://github.com/phamduybk/rabitpos"target="_blank">here</a></strong></div><?php  } goto WYwcN; WYwcN: if (showFlashCard()) { ?>
<div class="alert alert-success text-left"><a href="javascript:void()"aria-label="close"class="close"data-dismiss="alert">×</a> <strong><?php  echo getTextShow(); ?>
<a href="https://www.facebook.com/rabitweb/"target="_blank">đây</a></strong></div><?php  } goto OIS9G; aReeP: ?>
<div class="col-md-12"><?php  goto eea12; OIS9G: if ($this->session->flashdata("\x73\x75\x63\143\145\x73\x73") != '') { ?>
<div class="alert alert-dismissable text-center alert-success"><a href="javascript:void()"aria-label="close"class="close"data-dismiss="alert">×</a> <strong><?php  echo $this->session->flashdata("\x73\165\143\x63\145\163\163"); ?>
</strong></div><?php  } goto YuyoL; eea12: if (demo_app()) { ?>
<div class="alert alert-success text-left"><a href="javascript:void()"aria-label="close"class="close"data-dismiss="alert">×</a> <strong>Rabit POS Version<?php  echo app_version(); ?>
, Like và share Fanpage <a href="https://www.facebook.com/rabitweb/"target="_blank">here</a>. [Một vài tính năng bản Demo sẽ bị loại bỏ] Tắt demo vào sửa file application\config\config.php => $config['demo'] = FALSE;</strong></div><?php  } goto G7FCY; rzm14: if ($this->session->flashdata("\x77\x61\x72\x6e\151\x6e\147") != '') { ?>
<div class="alert alert-dismissable text-center alert-warning"><a href="javascript:void()"aria-label="close"class="close"data-dismiss="alert">×</a> <strong><?php  echo $this->session->flashdata("\x77\x61\162\156\151\x6e\147"); ?>
</strong></div><?php  } goto BMVSv; YuyoL: if ($this->session->flashdata("\145\x72\162\x6f\162") != '') { ?>
<div class="alert alert-dismissable text-center alert-danger"><a href="javascript:void()"aria-label="close"class="close"data-dismiss="alert">×</a> <strong><?php  echo $this->session->flashdata("\145\162\162\157\162"); ?>
</strong></div><?php  } goto rzm14; BMVSv: if ($this->session->flashdata("\151\x6e\146\157") != '') { ?>
<div class="alert alert-dismissable text-center alert-info"><a href="javascript:void()"aria-label="close"class="close"data-dismiss="alert">×</a> <strong><?php  echo $this->session->flashdata("\x69\x6e\146\157"); ?>
</strong></div><?php  } goto K3Otb; K3Otb: ?>
</div>
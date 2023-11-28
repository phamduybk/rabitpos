<?php
 goto aB5G0; n_U_w: echo $base_url; goto G41zf; Vzdj1: if ($CI->permissions("\x65\x78\160\x65\x6e\163\145\x5f\141\144\x64")) { ?>
<li class="border_bottom"><a href="<?php  echo $base_url; ?>
expense/add"><h4><i class="fa fa-plus text-green"></i><?php  echo $this->lang->line("\x65\x78\x70\145\156\163\145"); ?>
</h4></a></li><?php  } goto A4wMo; K4ZCZ: foreach ($lang_query->result() as $res) { $selected = ''; if ($this->session->userdata("\x6c\x61\x6e\147\x75\x61\147\x65") == $res->language) { $selected = "\x74\x65\x78\x74\55\x62\154\x75\145"; } ?>
<li><a href="<?php  echo $base_url; ?>
site/langauge/<?php  echo $res->id; ?>
"><h3 class="<?php  echo $selected; ?>
"><?php  echo $res->language; ?>
</h3></a></li><?php  } goto TgJxR; mUqYb: ?>
<li class="hidden-xs text-center"id=""><a href="<?php  goto Z0yzM; WJ0vh: ?>
<i class="fa text-aqua fa-check-circle fa-fw"></i></p><a href="#"><i class="fa fa-circle text-success"></i> Online</a></div></div><ul class="sidebar-menu"><li class="dashboard-active-li"><a href="<?php  goto n_U_w; IIBMV: if ($CI->permissions("\x69\x74\145\155\x5f\x70\165\162\x63\150\141\163\x65\137\162\x65\160\157\162\164") || $CI->permissions("\163\141\x6c\145\x73\137\162\x65\160\x6f\162\x74") || $CI->permissions("\x69\x74\x65\x6d\137\163\141\154\145\x73\x5f\162\x65\160\x6f\162\164") || $CI->permissions("\160\165\162\143\x68\x61\163\145\137\162\145\160\157\162\164") || $CI->permissions("\x70\x75\162\x63\x68\141\163\145\x5f\162\x65\x74\165\162\156\x5f\x72\145\x70\x6f\x72\164") || $CI->permissions("\145\170\x70\x65\156\163\x65\x5f\x72\145\160\x6f\x72\164") || $CI->permissions("\x70\x72\157\146\x69\x74\x5f\162\x65\160\157\162\x74") || $CI->permissions("\x73\164\x6f\x63\153\137\162\x65\x70\157\162\x74") || $CI->permissions("\160\x75\x72\x63\150\141\x73\x65\x5f\x70\141\x79\x6d\x65\x6e\164\x73\137\x72\145\x70\157\x72\x74") || $CI->permissions("\163\x61\154\145\x73\x5f\x70\x61\x79\155\x65\156\x74\x73\137\162\145\160\157\x72\x74") || $CI->permissions("\x65\170\160\151\x72\x65\x64\137\151\164\145\x6d\163\137\162\x65\160\x6f\x72\x74")) { ?>
<li class="treeview report-expense-active-li report-expired-items-active-li report-profit-loss-active-li report-purchase-active-li report-purchase-item-active-li report-purchase-payments-active-li report-purchase-return-active-li report-sales-active-li report-sales-item-active-li report-sales-payments-active-li report-sales-return-active-li report-stock-active-li"><a href="#"><i class="fa text-aqua fa-bar-chart"></i> <span><?php  echo $this->lang->line("\x72\x65\x70\x6f\162\164\x73"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\160\162\x6f\x66\x69\x74\137\162\145\x70\x6f\x72\x74")) { ?>
<li class="report-profit-loss-active-li"><a href="<?php  echo $base_url; ?>
reports/profit_loss"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\x70\162\157\x66\151\x74\137\141\x6e\x64\x5f\x6c\x6f\x73\163\137\162\x65\160\x6f\162\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\x70\165\x72\143\x68\x61\163\145\137\162\x65\x70\157\162\164")) { ?>
<li class="report-purchase-active-li"><a href="<?php  echo $base_url; ?>
reports/purchase"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\x70\x75\x72\x63\x68\x61\163\x65\137\162\145\x70\157\162\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\160\x75\x72\143\150\141\163\x65\x5f\x72\145\x74\165\x72\156\x5f\x72\x65\x70\x6f\162\164")) { ?>
<li class="report-purchase-return-active-li"><a href="<?php  echo $base_url; ?>
reports/purchase_return"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\160\165\x72\x63\x68\x61\x73\x65\x5f\x72\x65\x74\x75\x72\156\x5f\162\145\x70\157\x72\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\x70\x75\162\143\150\x61\163\145\x5f\160\141\x79\x6d\x65\x6e\164\163\x5f\x72\145\160\157\x72\x74")) { ?>
<li class="report-purchase-payments-active-li"><a href="<?php  echo $base_url; ?>
reports/purchase_payments"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\x70\x75\162\143\x68\x61\x73\145\x5f\160\x61\171\x6d\145\x6e\x74\163\x5f\x72\145\160\157\x72\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\x69\x74\145\x6d\137\163\141\x6c\x65\x73\137\162\145\160\157\162\x74")) { ?>
<li class="report-sales-item-active-li"><a href="<?php  echo $base_url; ?>
reports/item_sales"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\x69\x74\x65\x6d\x5f\163\141\154\x65\x73\x5f\162\x65\160\157\x72\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\x69\x74\145\x6d\137\x70\x75\162\143\x68\x61\x73\x65\137\x72\x65\x70\157\162\x74")) { ?>
<li class="report-purchase-item-active-li"><a href="<?php  echo $base_url; ?>
reports/item_purchase"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\x69\x74\x65\155\x5f\x70\x75\x72\x63\x68\x61\x73\x65\137\162\145\160\157\162\164"); ?>
</span><span class="pull-right-container"><span class="pull-right label label-success">New</span></span></a></li><?php  } if ($CI->permissions("\163\141\x6c\x65\163\x5f\162\x65\160\x6f\162\164")) { ?>
<li class="report-sales-active-li"><a href="<?php  echo $base_url; ?>
reports/sales"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\x73\141\154\145\x73\137\162\145\160\157\x72\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\x73\x61\x6c\x65\163\137\x72\145\164\165\x72\x6e\x5f\162\145\160\x6f\x72\164")) { ?>
<li class="report-sales-return-active-li"><a href="<?php  echo $base_url; ?>
reports/sales_return"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\x73\x61\x6c\145\163\137\162\x65\x74\x75\x72\x6e\137\x72\145\x70\x6f\x72\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\x73\141\x6c\x65\x73\137\160\141\x79\x6d\x65\x6e\164\163\x5f\162\145\x70\157\x72\x74")) { ?>
<li class="report-sales-payments-active-li"><a href="<?php  echo $base_url; ?>
reports/sales_payments"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\163\141\154\x65\163\137\x70\x61\171\x6d\145\x6e\x74\x73\x5f\x72\x65\160\x6f\x72\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\x73\x74\157\x63\x6b\137\162\x65\x70\157\162\164")) { ?>
<li class="report-stock-active-li"><a href="<?php  echo $base_url; ?>
reports/stock"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\x73\164\157\143\153\137\x72\145\160\x6f\162\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\145\x78\160\x65\x6e\163\x65\137\x72\x65\160\x6f\x72\164")) { ?>
<li class="report-expense-active-li"><a href="<?php  echo $base_url; ?>
reports/expense"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\x65\170\160\145\x6e\x73\x65\137\x72\145\160\157\x72\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\x65\x78\160\151\162\x65\x64\x5f\151\164\145\155\x73\x5f\x72\145\x70\157\162\x74")) { ?>
<li class="report-expired-items-active-li"><a href="<?php  echo $base_url; ?>
reports/expired_items"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\145\x78\x70\x69\162\x65\x64\x5f\x69\164\x65\155\x73\137\162\x65\160\157\x72\x74"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto OflFM; KM3ZH: echo date("\x59"); goto b4pWl; qJxW0: print ucfirst($this->session->userdata("\151\156\x76\137\x75\163\x65\162\x6e\141\155\x65")); goto WJ0vh; nKh6L: echo $SITE_TITLE; goto xWj3g; rZbRW: print ucfirst($this->session->userdata("\151\156\166\137\x75\163\145\x72\x6e\141\155\145")); goto z1db3; RyO3B: echo get_profile_picture(); goto rDSiu; AvcJi: ?>
"> <span class="hidden-xs"><?php  goto rZbRW; QLGw1: if ($CI->permissions("\x73\141\154\x65\163\x5f\x61\144\x64")) { ?>
<li class="border_bottom"><a href="<?php  echo $base_url; ?>
sales/add"><h4><i class="fa fa-plus text-green"></i><?php  echo $this->lang->line("\163\141\x6c\x65\163"); ?>
</h4></a></li><?php  } goto esBtM; b4pWl: ?>
</small></p></li><li class="user-footer"><div class="pull-left"><a href="<?php  goto Xgxoq; nD2kA: if ($CI->permissions("\x73\x75\160\x70\154\x69\x65\x72\x73\137\141\144\x64")) { ?>
<li class="border_bottom"><a href="<?php  echo $base_url; ?>
suppliers/add"><h4><i class="fa fa-plus text-green"></i><?php  echo $this->lang->line("\x73\x75\x70\x70\x6c\x69\145\x72"); ?>
</h4></a></li><?php  } goto I14xd; mszfj: ?>
</a></li><li class="dropdown user user-menu"><a href="#"class="dropdown-toggle"data-toggle="dropdown"><img alt="User Image"class="user-image"src="<?php  goto Yc__G; I14xd: if ($CI->permissions("\151\x74\145\155\x73\x5f\x61\x64\144")) { ?>
<li class="border_bottom"><a href="<?php  echo $base_url; ?>
items/add"><h4><i class="fa fa-plus text-green"></i><?php  echo $this->lang->line("\151\x74\x65\155"); ?>
</h4></a></li><?php  } goto Vzdj1; W2QTP: ?>
dashboard"class="logo"><span class="logo-mini"><b>POS</b></span> <span class="logo-lg"><b><?php  goto nKh6L; l9b79: ?>
"><p><?php  goto Kw7Q2; Rjg35: if (!check_label() || true) { ?>
<li class="company-profile-active-li"><a href="https://www.facebook.com/groups/832581721729815"><i class="fa fa-suitcase"></i> <span>Tham gia nhóm facebook</span></a></li><?php  } goto bWhH1; Z0yzM: echo $base_url; goto XQSHb; xFsdc: ?>
logout"class="btn btn-default btn-flat">Sign out</a></div></li></ul></li><li class="hidden-xs"><a href="#"data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li></ul></div></nav></header><aside class="main-sidebar"><section class="sidebar"><div class="user-panel"><div class="pull-left image"><img alt="User Image"class="img-circle"src="<?php  goto RyO3B; TL2Hc: if ($CI->permissions("\143\165\x73\x74\157\155\145\162\163\137\x61\144\144")) { ?>
<li class="border_bottom"><a href="<?php  echo $base_url; ?>
customers/add"><h4><i class="fa fa-plus text-green"></i><?php  echo $this->lang->line("\x63\x75\x73\164\x6f\x6d\145\x72"); ?>
</h4></a></li><?php  } goto nD2kA; XH7tj: if ($CI->permissions("\151\x74\145\155\163\137\x61\x64\x64") || $CI->permissions("\x69\x74\x65\155\x73\137\x76\x69\x65\x77") || $CI->permissions("\151\164\145\155\163\137\x63\141\x74\x65\x67\x6f\x72\171\x5f\141\144\144") || $CI->permissions("\151\x74\145\x6d\x73\x5f\143\141\164\x65\147\157\x72\x79\137\x76\x69\x65\x77") || $CI->permissions("\142\162\141\156\x64\137\x61\x64\144") || $CI->permissions("\142\162\x61\x6e\x64\137\166\151\145\167") || $CI->permissions("\x70\162\x69\156\164\x5f\x6c\141\142\x65\154\163")) { ?>
<li class="treeview brand-active-li brand-view-active-li category-active-li category-view-active-li import_items-active-li items-active-li items-list-active-li labels-active-li"><a href="#"><i class="fa text-aqua fa-cubes"></i> <span><?php  echo $this->lang->line("\151\x74\145\x6d\163"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\x69\x74\145\x6d\163\137\x61\144\144")) { ?>
<li class="items-active-li"><a href="<?php  echo $base_url; ?>
items/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\156\145\167\137\151\164\x65\x6d"); ?>
</span></a></li><?php  } if ($CI->permissions("\x69\164\145\155\163\x5f\166\151\145\167")) { ?>
<li class="items-list-active-li"><a href="<?php  echo $base_url; ?>
items"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x69\164\x65\x6d\163\137\154\x69\x73\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\151\164\x65\155\163\x5f\x63\141\164\x65\147\x6f\x72\171\x5f\141\144\144")) { ?>
<li class="category-active-li"><a href="<?php  echo $base_url; ?>
category/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\156\145\x77\x5f\x63\x61\x74\x65\x67\x6f\x72\x79"); ?>
</span></a></li><?php  } if ($CI->permissions("\x69\164\x65\155\x73\137\x63\x61\x74\145\147\x6f\x72\171\137\166\151\145\167")) { ?>
<li class="category-view-active-li"><a href="<?php  echo $base_url; ?>
category/view"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x63\141\164\145\147\157\162\x69\x65\163\137\x6c\x69\163\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\142\162\x61\x6e\144\137\141\x64\x64")) { ?>
<li class="brand-active-li"><a href="<?php  echo $base_url; ?>
brands/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\x6e\x65\x77\x5f\142\x72\141\156\144"); ?>
</span></a></li><?php  } if ($CI->permissions("\x62\x72\x61\156\x64\137\x76\151\145\167")) { ?>
<li class="brand-view-active-li"><a href="<?php  echo $base_url; ?>
brands/view"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\142\162\x61\156\144\163\137\154\151\x73\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\x70\x72\151\156\164\137\154\x61\x62\x65\x6c\x73")) { ?>
<li class="labels-active-li"><a href="<?php  echo $base_url; ?>
items/labels"><i class="fa fa-barcode"></i> <span><?php  echo $this->lang->line("\160\162\x69\x6e\x74\x5f\x6c\141\142\x65\154\163"); ?>
</span></a></li><?php  } if ($CI->permissions("\151\x6d\x70\x6f\162\164\137\151\x74\145\x6d\163")) { ?>
<li class="import_items-active-li"><a href="<?php  echo $base_url; ?>
import/items"><i class="fa fa-arrow-circle-o-left"></i> <span><?php  echo $this->lang->line("\x69\x6d\160\157\x72\164\x5f\151\x74\145\155\x73"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto CeRql; vaVqv: ?>
users/edit/<?php  goto RTLHP; Ud_zv: ?>
<header class="main-header"><a href="<?php  goto rDqXY; ajSKR: echo $this->session->userdata("\154\141\x6e\147\165\x61\147\x65"); goto NVci6; HpID8: if ($CI->permissions("\x73\x75\x70\x70\x6c\151\x65\162\163\137\141\144\144") || $CI->permissions("\x73\x75\160\160\154\x69\145\x72\x73\x5f\166\151\145\x77") || $CI->permissions("\x69\x6d\x70\x6f\162\164\x5f\x73\x75\160\160\154\151\145\x72\163")) { ?>
<li class="treeview import_suppliers-active-li suppliers-active-li suppliers-list-active-li"><a href="#"><i class="fa text-aqua fa-user-plus"></i> <span><?php  echo $this->lang->line("\163\x75\160\160\x6c\151\x65\162\163"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\163\165\160\160\154\151\145\x72\x73\x5f\x61\x64\144")) { ?>
<li class="suppliers-active-li"><a href="<?php  echo $base_url; ?>
suppliers/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\156\145\x77\x5f\x73\165\x70\x70\x6c\151\x65\162"); ?>
</span></a></li><?php  } if ($CI->permissions("\x73\x75\x70\160\x6c\x69\x65\162\x73\x5f\166\151\x65\167")) { ?>
<li class="suppliers-list-active-li"><a href="<?php  echo $base_url; ?>
suppliers"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x73\x75\160\x70\x6c\x69\x65\x72\163\x5f\154\x69\x73\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\x69\x6d\160\x6f\x72\164\x5f\163\x75\160\x70\x6c\x69\145\162\163")) { ?>
<li class="import_suppliers-active-li"><a href="<?php  echo $base_url; ?>
import/suppliers"><i class="fa fa-arrow-circle-o-left"></i> <span><?php  echo $this->lang->line("\x69\155\160\x6f\x72\164\x5f\163\x75\160\160\154\151\x65\x72\163"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto XH7tj; nSC0F: if ($CI->permissions("\160\x75\162\x63\x68\141\163\x65\x5f\141\144\x64") || $CI->permissions("\x70\x75\x72\x63\150\141\163\x65\137\x76\151\145\x77") || $CI->permissions("\x70\165\x72\143\150\141\x73\145\137\x72\x65\x74\x75\162\x6e\x5f\x76\x69\145\167") || $CI->permissions("\156\145\x77\x5f\x70\165\x72\x63\x68\x61\x73\x65\x5f\162\145\164\x75\162\156")) { ?>
<li class="treeview purchase-active-li purchase-list-active-li purchase-returns-active-li purchase-returns-list-active-li"><a href="#"><i class="fa text-aqua fa-th-large"></i> <span><?php  echo $this->lang->line("\160\165\x72\x63\150\x61\163\145"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\160\x75\162\143\x68\141\163\x65\x5f\141\x64\x64")) { ?>
<li class="purchase-active-li"><a href="<?php  echo $base_url; ?>
purchase/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\x6e\x65\167\137\x70\x75\x72\x63\150\141\x73\x65"); ?>
</span></a></li><?php  } if ($CI->permissions("\x70\x75\162\143\150\x61\x73\145\137\166\151\x65\x77")) { ?>
<li class="purchase-list-active-li"><a href="<?php  echo $base_url; ?>
purchase"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x70\165\x72\143\150\x61\x73\x65\137\154\151\x73\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\160\x75\162\143\x68\141\163\x65\x5f\162\x65\164\165\162\156\x5f\166\151\x65\x77")) { ?>
<li class="purchase-returns-active-li"><a href="<?php  echo $base_url; ?>
purchase_return/create"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\x6e\145\x77\137\160\x75\162\143\150\x61\x73\145\137\162\145\164\165\x72\156"); ?>
</span></a></li><?php  } if ($CI->permissions("\160\165\x72\143\x68\141\163\x65\x5f\162\x65\x74\x75\x72\156\x5f\x76\x69\145\167")) { ?>
<li class="purchase-returns-list-active-li"><a href="<?php  echo $base_url; ?>
purchase_return"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x70\x75\162\x63\x68\141\163\x65\x5f\162\x65\164\x75\x72\x6e\163\137\x6c\x69\x73\x74"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto HpID8; syCnb: ?>
<small>Year<?php  goto KM3ZH; hnXr1: if ($CI->permissions("\x63\165\163\164\x6f\x6d\145\x72\163\x5f\x61\144\x64") || $CI->permissions("\x63\x75\163\x74\157\155\x65\x72\163\x5f\x76\x69\x65\x77") || $CI->permissions("\x69\155\x70\x6f\x72\164\x5f\143\x75\163\164\x6f\x6d\x65\x72\x73")) { ?>
<li class="treeview customers-active-li customers-view-active-li import_customers-active-li"><a href="#"><i class="fa text-aqua fa-group"></i> <span><?php  echo $this->lang->line("\x63\165\x73\164\x6f\x6d\x65\x72\163"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\x63\165\163\x74\157\x6d\145\x72\x73\x5f\x61\x64\144")) { ?>
<li class="customers-active-li"><a href="<?php  echo $base_url; ?>
customers/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\156\x65\167\137\143\x75\x73\x74\x6f\x6d\x65\x72"); ?>
</span></a></li><?php  } if ($CI->permissions("\x63\x75\x73\164\x6f\x6d\x65\162\x73\x5f\166\x69\145\167")) { ?>
<li class="customers-view-active-li"><a href="<?php  echo $base_url; ?>
customers"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x63\165\163\164\157\x6d\x65\162\163\x5f\154\151\163\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\151\155\x70\157\162\164\137\143\x75\163\x74\157\x6d\145\162\163")) { ?>
<li class="import_customers-active-li"><a href="<?php  echo $base_url; ?>
import/customers"><i class="fa fa-arrow-circle-o-left"></i> <span><?php  echo $this->lang->line("\x69\155\x70\x6f\x72\164\137\x63\165\163\164\157\x6d\145\x72\163"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto nSC0F; rDqXY: echo $base_url; goto W2QTP; Xgxoq: echo $base_url; goto vaVqv; UkJ0Y: if (!check_label()) { ?>
<li class="company-profile-active-li"><a href="<?php  echo $base_url; ?>
company"><i class="fa fa-suitcase"></i> <span>Phần mềm bị block</span></a></li><?php  } goto Rjg35; NVci6: ?>
</a><ul class="dropdown-menu"style="width:auto;height:auto"><li><ul class="menu"><?php  goto s7oJ7; A4wMo: ?>
</ul></div><div class="navbar-custom-menu"><ul class="nav navbar-nav"><li class="dropdown tasks-menu"><a href="#"class="dropdown-toggle text-right"data-toggle="dropdown"data-toggle="tooltip"title="App Language"><i class="fa fa-language"></i><?php  goto ajSKR; OflFM: if ($CI->permissions("\x75\x73\145\x72\163\137\x61\x64\144") || $CI->permissions("\x75\163\x65\162\163\x5f\x76\151\145\167") || $CI->permissions("\x72\157\x6c\x65\x73\x5f\x76\x69\x65\167")) { ?>
<li class="treeview role-active-li roles-list-active-li users-active-li users-view-active-li"><a href="#"><i class="fa text-aqua fa-users"></i> <span><?php  echo $this->lang->line("\165\163\145\162\163"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\165\x73\x65\x72\x73\137\x61\x64\144")) { ?>
<li class="users-active-li"><a href="<?php  echo $base_url; ?>
users/"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\156\x65\167\137\x75\x73\145\x72"); ?>
</span></a></li><?php  } if ($CI->permissions("\x75\163\145\x72\163\137\x76\x69\x65\167")) { ?>
<li class="users-view-active-li"><a href="<?php  echo $base_url; ?>
users/view"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x75\163\x65\162\x73\137\154\x69\x73\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\x72\157\x6c\x65\163\137\x76\x69\x65\167")) { ?>
<li class="role-active-li roles-list-active-li"><a href="<?php  echo $base_url; ?>
roles/view"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\162\x6f\154\x65\163\137\x6c\x69\163\164"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto tuNKS; IBlDF: if ($CI->permissions("\150\145\x6c\160")) { } goto ASKJs; Yc__G: echo get_profile_picture(); goto AvcJi; KPI5x: ?>
"class="btn btn-default btn-flat">Profile</a></div><div class="pull-right"><a href="<?php  goto X5gJV; hji4B: ?>
</span></a></li><?php  goto kZif6; ASKJs: if (time_reference_show()) { ?>
<li class="company-profile-active-li"><a href="<?php  echo $base_url; ?>
company"><i class="fa fa-suitcase"></i> <span><?php  echo $this->lang->line("\160\162\x65\146\x69\170\145\163\137\x74\x69\x6d\145") . show_date_now(); ?>
</span></a></li><?php  } goto UkJ0Y; CeRql: if ($CI->permissions("\145\x78\x70\145\x6e\163\x65\137\141\144\x64") || $CI->permissions("\145\x78\x70\x65\x6e\x73\x65\137\166\151\x65\167") || $CI->permissions("\145\x78\x70\145\x6e\x73\x65\x5f\143\141\x74\145\x67\x6f\162\171\137\141\x64\144") || $CI->permissions("\145\x78\160\x65\x6e\163\x65\x5f\143\141\164\145\x67\157\162\171\137\x76\151\145\x77")) { ?>
<li class="treeview expense-active-li expense-category-active-li expense-category-list-active-li expense-list-active-li"><a href="#"><i class="fa text-aqua fa-minus-circle"></i> <span><?php  echo $this->lang->line("\145\x78\x70\x65\x6e\163\145\x73"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\x65\x78\160\145\x6e\x73\x65\x5f\x61\x64\x64")) { ?>
<li class="expense-active-li"><a href="<?php  echo $base_url; ?>
expense/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\156\x65\167\137\145\x78\x70\x65\x6e\163\145"); ?>
</span></a></li><?php  } if ($CI->permissions("\145\x78\x70\x65\156\163\x65\137\166\151\145\167")) { ?>
<li class="expense-list-active-li"><a href="<?php  echo $base_url; ?>
expense"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\145\170\x70\145\x6e\x73\x65\x73\x5f\x6c\x69\x73\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\x65\170\160\x65\x6e\x73\x65\137\x63\141\164\145\147\157\x72\171\137\141\144\x64")) { ?>
<li class="expense-category-active-li"><a href="<?php  echo $base_url; ?>
expense/category_add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\156\145\x77\x5f\143\141\x74\145\147\x6f\x72\x79"); ?>
</span></a></li><?php  } if ($CI->permissions("\x65\x78\160\145\156\x73\x65\137\143\141\x74\x65\x67\x6f\162\x79\137\x76\x69\x65\x77")) { ?>
<li class="expense-category-list-active-li"><a href="<?php  echo $base_url; ?>
expense/category"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\143\x61\x74\x65\x67\x6f\x72\151\x65\163\x5f\x6c\x69\x73\164"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto fOZvO; X5gJV: echo $base_url; goto xFsdc; XDPFI: echo get_profile_picture(); goto l9b79; rDSiu: ?>
"></div><div class="pull-left info"><p><?php  goto qJxW0; A29NN: if ($CI->permissions("\x70\157\x73")) { ?>
<li class="text-center"id=""><a href="<?php  echo $base_url; ?>
pos"title="POS [Shift+P]"><i class="fa fa-plus-square"></i> POS</a></li><?php  } goto mUqYb; TgJxR: ?>
</ul></li></ul></li><?php  goto A29NN; vcjOc: $CI =& get_instance(); goto Ud_zv; aB5G0: ?>
<script type="text/javascript">"skin-blue"!=theme_skin&&($("body").addClass(theme_skin),$("body").removeClass("skin-blue")),"true"==sidebar_collapse&&$("body").addClass("sidebar-collapse")</script><?php  goto vcjOc; p4aOa: echo $this->lang->line("\x64\141\x73\150\x62\x6f\141\x72\144"); goto hji4B; fOZvO: if ($CI->permissions("\x70\x6c\141\x63\145\163\x5f\141\144\x64") || $CI->permissions("\160\x6c\141\143\x65\163\137\x76\x69\145\x77")) { ?>
<li class="treeview city-active-li city-list-active-li country-active-li country-list-active-li state-active-li state-list-active-li"><a href="#"><i class="fa text-aqua fa-paper-plane-o"></i> <span><?php  echo $this->lang->line("\160\154\x61\143\145\163"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\x70\154\x61\x63\x65\x73\137\141\144\x64")) { ?>
<li class="country-active-li"><a href="<?php  echo $base_url; ?>
country/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\156\x65\167\137\x63\x6f\165\x6e\164\x72\171"); ?>
</span></a></li><?php  } if ($CI->permissions("\160\x6c\141\143\145\x73\x5f\166\151\145\167")) { ?>
<li class="country-list-active-li"><a href="<?php  echo $base_url; ?>
country"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x63\157\x75\x6e\164\x72\x69\145\x73\137\x6c\x69\x73\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\160\x6c\141\x63\x65\x73\137\x61\x64\x64")) { ?>
<li class="state-active-li"><a href="<?php  echo $base_url; ?>
state/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\x6e\x65\167\x5f\x73\x74\141\x74\x65"); ?>
</span></a></li><?php  } if ($CI->permissions("\x70\x6c\141\x63\x65\163\137\x76\151\145\167")) { ?>
<li class="state-list-active-li"><a href="<?php  echo $base_url; ?>
state"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\163\x74\141\x74\x65\x73\x5f\154\151\163\164"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto IIBMV; Kw7Q2: print ucfirst($this->session->userdata("\x69\x6e\x76\137\165\163\x65\162\156\x61\155\145")); goto syCnb; esBtM: if ($CI->permissions("\160\x75\x72\x63\x68\141\163\x65\x5f\x61\144\144")) { ?>
<li class="border_bottom"><a href="<?php  echo $base_url; ?>
purchase/add"><h4><i class="fa fa-plus text-green"></i><?php  echo $this->lang->line("\x70\x75\162\143\150\141\163\145"); ?>
</h4></a></li><?php  } goto TL2Hc; RTLHP: echo $this->session->userdata("\151\156\x76\137\165\x73\x65\162\151\144"); goto KPI5x; kZif6: if ($CI->permissions("\x73\141\x6c\145\163\137\x61\x64\x64") || $CI->permissions("\160\x6f\x73") || $CI->permissions("\163\x61\x6c\145\x73\137\x76\151\x65\167") || $CI->permissions("\163\141\154\x65\163\137\x72\x65\x74\165\162\156\x5f\166\151\x65\x77") || $CI->permissions("\x73\141\154\145\x73\137\x72\x65\164\165\162\x6e\x5f\x61\144\x64")) { ?>
<li class="treeview pos-active-li sales-active-li sales-list-active-li sales-return-active-li sales-return-list-active-li"><a href="#"><i class="fa text-aqua fa-shopping-cart"></i> <span><?php  echo $this->lang->line("\x73\141\154\145\x73"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\x70\157\163")) { ?>
<li class="pos-active-li"><a href="<?php  echo $base_url; ?>
pos"><i class="fa fa-calculator"></i> <span>POS</span></a></li><?php  } if ($CI->permissions("\x73\x61\x6c\x65\x73\137\x61\144\144")) { ?>
<li class="sales-active-li"><a href="<?php  echo $base_url; ?>
sales/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\156\145\x77\x5f\x73\141\x6c\x65\x73"); ?>
</span></a></li><?php  } if ($CI->permissions("\163\x61\154\x65\163\137\166\151\x65\x77")) { ?>
<li class="sales-list-active-li"><a href="<?php  echo $base_url; ?>
sales"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x73\x61\x6c\x65\163\137\154\151\163\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\163\141\154\145\x73\x5f\x72\145\164\x75\162\x6e\137\x61\x64\144")) { ?>
<li class="sales-return-active-li"><a href="<?php  echo $base_url; ?>
sales_return/create"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\x6e\x65\167\x5f\163\x61\154\x65\163\x5f\162\145\164\165\162\156"); ?>
</span></a></li><?php  } if ($CI->permissions("\x73\x61\154\145\163\137\162\x65\x74\x75\162\156\x5f\166\151\145\x77")) { ?>
<li class="sales-return-list-active-li"><a href="<?php  echo $base_url; ?>
sales_return"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x73\x61\x6c\x65\x73\x5f\162\x65\164\165\x72\x6e\163\x5f\154\x69\163\164"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto hnXr1; tuNKS: if ($change_password = true) { ?>
<li class="treeview change-pass-active-li company-profile-active-li currency-active-li currency-view-active-li database_updater-active-li dbbackup-active-li payment_types-active-li payment_types_list-active-li site-settings-active-li tax-active-li tax-list-active-li unit-active-li units-list-active-li warehouse-active-li warehouse-list-active-li"><a href="#"><i class="fa text-aqua fa-gears"></i> <span><?php  echo $this->lang->line("\x73\x65\x74\164\151\156\147\x73"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\x63\x6f\155\160\x61\x6e\x79\x5f\x65\144\x69\x74")) { ?>
<li class="company-profile-active-li"><a href="<?php  echo $base_url; ?>
company"><i class="fa fa-suitcase"></i> <span><?php  echo $this->lang->line("\x63\157\x6d\x70\141\156\x79\137\x70\162\x6f\146\x69\x6c\145"); ?>
</span></a></li><?php  } if ($CI->permissions("\163\x69\164\145\137\x65\144\x69\x74")) { ?>
<li class="site-settings-active-li"><a href="<?php  echo $base_url; ?>
site"><i class="fa fa-shield"></i> <span><?php  echo $this->lang->line("\163\151\164\145\x5f\x73\x65\x74\x74\x69\x6e\x67\163"); ?>
</span></a></li><?php  } if ($CI->permissions("\164\141\x78\x5f\x76\151\145\x77")) { ?>
<li class="tax-active-li tax-list-active-li"><a href="<?php  echo $base_url; ?>
tax"><i class="fa fa-percent"></i> <span><?php  echo $this->lang->line("\164\x61\170\x5f\x6c\151\x73\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\165\156\x69\x74\163\137\x76\x69\145\x77")) { ?>
<li class="units-list-active-li unit-active-li"><a href="<?php  echo $base_url; ?>
units/"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x75\156\x69\164\x73\137\x6c\151\x73\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\160\x61\171\x6d\145\x6e\164\137\164\171\160\x65\163\137\166\x69\145\167")) { ?>
<li class="payment_types_list-active-li payment_types-active-li"><a href="<?php  echo $base_url; ?>
payment_types/"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x70\141\171\155\145\x6e\x74\137\x74\x79\x70\x65\x73\x5f\x6c\151\x73\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\x63\x75\162\162\145\156\x63\x79\x5f\x76\151\145\x77")) { ?>
<li class="currency-view-active-li currency-active-li"><a href="<?php  echo $base_url; ?>
currency/view"><i class="fa fa-gg"></i> <span><?php  echo $this->lang->line("\x63\165\x72\x72\x65\x6e\x63\x79\x5f\154\151\163\164"); ?>
</span></a></li><?php  } ?>
<li class="change-pass-active-li"><a href="<?php  echo $base_url; ?>
users/password_reset"><i class="fa fa-lock"></i> <span><?php  echo $this->lang->line("\143\x68\141\x6e\147\145\137\160\141\x73\163\x77\157\x72\144"); ?>
</span></a></li><?php  if ($CI->permissions("\163\151\164\145\x5f\x65\144\151\164")) { ?>
<li class="dbbackup-active-li"><a href="<?php  echo $base_url; ?>
users/dbbackup"><i class="fa fa-database"></i> <span><?php  echo $this->lang->line("\144\x61\164\141\x62\141\163\x65\x5f\142\141\143\x6b\x75\160"); ?>
</span></a></li><?php  } if ($CI->permissions("\163\x69\164\145\x5f\145\x64\151\x74")) { ?>
<li class="dbbackup-active-li"><a href="<?php  echo $base_url; ?>
users/imagesbackup"><i class="fa fa-database"></i> <span><?php  echo "\x53\x61\157\40\x6c\306\xb0\x75\40\146\x69\154\x65\163"; ?>
</span></a></li><?php  } if ($CI->permissions("\x73\155\163\137\x61\x70\x69\137\x76\151\x65\167")) { ?>
<li class="sms-api-active-li"><a href="<?php  echo $base_url; ?>
sms/api"><i class="fa fa-cube"></i> <span><?php  echo $this->lang->line("\163\155\x73\x5f\141\x70\151"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto IBlDF; xWj3g: ?>
</b></span></a><nav class="navbar navbar-static-top"><a href="#"class="sidebar-toggle"data-toggle="offcanvas"role="button"><span class="sr-only">Toggle navigation</span></a><div class="hidden-xs btn-group"><a href="#"class="btn btn-success dropdown-toggle navbar-btn"data-toggle="dropdown"aria-expanded="false"><i class="fa fa-plus"></i></a><ul class="dropdown-menu"><?php  goto QLGw1; s7oJ7: $lang_query = $this->db->query("\x73\x65\154\145\x63\164\x20\52\40\x66\x72\157\155\40\144\142\x5f\154\x61\x6e\147\165\x61\x67\x65\x73\x20\x77\x68\x65\x72\145\x20\163\x74\141\x74\x75\x73\75\x31\x20\x6f\x72\144\145\162\40\142\x79\40\154\141\x6e\x67\165\141\x67\145\40\x61\163\143"); goto K4ZCZ; z1db3: ?>
</span></a><ul class="dropdown-menu"><li class="user-header"><img alt="User Image"class="img-circle"src="<?php  goto XDPFI; XQSHb: ?>
dashboard"title="Dashboard"><i class="fa fa-dashboard"></i><?php  goto wgkp7; wgkp7: echo $this->lang->line("\x64\141\163\150\142\x6f\x61\x72\144"); goto mszfj; G41zf: ?>
dashboard"><i class="fa text-aqua fa-dashboard"></i> <span><?php  goto p4aOa; bWhH1: ?>
</ul></section></aside>
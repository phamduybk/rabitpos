<?php
 goto uXI2e; l963w: foreach ($lang_query->result() as $res) { $selected = ''; if ($this->session->userdata("\x6c\141\x6e\147\165\x61\x67\x65") == $res->language) { $selected = "\x74\x65\x78\164\x2d\x62\x6c\165\x65"; } ?>
<li><a href="<?php  echo $base_url; ?>
site/langauge/<?php  echo $res->id; ?>
"><h3 class="<?php  echo $selected; ?>
"><?php  echo $res->language; ?>
</h3></a></li><?php  } goto Dk3wt; OG52d: ?>
</small></p></li><li class="user-footer"><div class="pull-left"><a href="<?php  goto DGbV4; W9tA9: if ($CI->permissions("\163\141\x6c\145\163\137\x61\144\144") || $CI->permissions("\x70\x6f\x73") || $CI->permissions("\163\141\154\x65\163\x5f\166\x69\145\167") || $CI->permissions("\x73\x61\x6c\x65\163\x5f\x72\x65\164\165\162\x6e\x5f\x76\x69\x65\x77") || $CI->permissions("\x73\141\154\145\x73\137\x72\x65\x74\165\162\156\x5f\141\x64\144")) { ?>
<li class="treeview pos-active-li sales-active-li sales-list-active-li sales-return-active-li sales-return-list-active-li"><a href="#"><i class="fa text-aqua fa-shopping-cart"></i> <span><?php  echo $this->lang->line("\163\x61\x6c\x65\163"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\160\x6f\x73")) { ?>
<li class="pos-active-li"><a href="<?php  echo $base_url; ?>
pos"><i class="fa fa-calculator"></i> <span>POS</span></a></li><?php  } if ($CI->permissions("\x73\141\154\145\x73\x5f\x61\x64\144")) { ?>
<li class="sales-active-li"><a href="<?php  echo $base_url; ?>
sales/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\156\145\167\x5f\x73\x61\x6c\145\163"); ?>
</span></a></li><?php  } if ($CI->permissions("\163\141\154\145\163\x5f\166\x69\145\x77")) { ?>
<li class="sales-list-active-li"><a href="<?php  echo $base_url; ?>
sales"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\163\x61\x6c\x65\163\x5f\154\x69\x73\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\x73\141\x6c\145\x73\137\x72\x65\164\x75\162\156\137\x61\x64\x64")) { ?>
<li class="sales-return-active-li"><a href="<?php  echo $base_url; ?>
sales_return/create"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\x6e\x65\x77\137\163\141\154\x65\x73\137\162\x65\164\x75\162\x6e"); ?>
</span></a></li><?php  } if ($CI->permissions("\163\141\154\145\163\x5f\162\145\164\x75\162\x6e\x5f\166\x69\145\x77")) { ?>
<li class="sales-return-list-active-li"><a href="<?php  echo $base_url; ?>
sales_return"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\163\x61\x6c\x65\163\137\x72\145\x74\x75\x72\156\x73\137\154\151\x73\164"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto b0Xt8; n4Zsn: ?>
"class="btn btn-default btn-flat">Profile</a></div><div class="pull-right"><a href="<?php  goto dq9og; Jp1oN: ?>
logout"class="btn btn-default btn-flat">Sign out</a></div></li></ul></li><li class="hidden-xs"><a href="#"data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li></ul></div></nav></header><aside class="main-sidebar"><section class="sidebar"><div class="user-panel"><div class="pull-left image"><img alt="User Image"class="img-circle"src="<?php  goto UZZqV; W14mo: if ($CI->permissions("\151\164\x65\x6d\163\137\141\x64\x64")) { ?>
<li class="border_bottom"><a href="<?php  echo $base_url; ?>
items/add"><h4><i class="fa fa-plus text-green"></i><?php  echo $this->lang->line("\x69\x74\145\155"); ?>
</h4></a></li><?php  } goto i1QG2; Dk3wt: ?>
</ul></li></ul></li><?php  goto Ngjfr; b0Xt8: if ($CI->permissions("\143\x75\163\x74\x6f\x6d\145\162\163\137\141\144\144") || $CI->permissions("\143\x75\163\x74\157\x6d\145\162\163\x5f\166\151\145\167") || $CI->permissions("\x69\155\160\157\162\164\137\143\x75\163\164\157\155\x65\162\163")) { ?>
<li class="treeview customers-active-li customers-view-active-li import_customers-active-li"><a href="#"><i class="fa text-aqua fa-group"></i> <span><?php  echo $this->lang->line("\x63\165\163\x74\x6f\155\x65\162\x73"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\143\x75\163\x74\x6f\155\x65\162\x73\137\141\144\x64")) { ?>
<li class="customers-active-li"><a href="<?php  echo $base_url; ?>
customers/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\x6e\x65\167\137\143\165\163\x74\157\155\x65\162"); ?>
</span></a></li><?php  } if ($CI->permissions("\x63\165\x73\164\157\155\145\x72\163\137\x76\x69\145\167")) { ?>
<li class="customers-view-active-li"><a href="<?php  echo $base_url; ?>
customers"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x63\x75\x73\x74\x6f\155\x65\x72\x73\x5f\x6c\x69\163\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\x69\x6d\x70\157\x72\164\x5f\143\x75\163\x74\x6f\155\145\x72\163")) { ?>
<li class="import_customers-active-li"><a href="<?php  echo $base_url; ?>
import/customers"><i class="fa fa-arrow-circle-o-left"></i> <span><?php  echo $this->lang->line("\151\x6d\160\157\162\x74\x5f\143\165\x73\164\157\x6d\145\x72\x73"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto sKd3A; rGBnL: if ($CI->permissions("\163\165\x70\160\x6c\151\145\x72\163\137\141\144\144") || $CI->permissions("\163\x75\x70\x70\x6c\151\145\x72\x73\137\x76\x69\145\167") || $CI->permissions("\x69\155\160\x6f\x72\164\x5f\x73\165\160\160\154\151\145\x72\x73")) { ?>
<li class="treeview import_suppliers-active-li suppliers-active-li suppliers-list-active-li"><a href="#"><i class="fa text-aqua fa-user-plus"></i> <span><?php  echo $this->lang->line("\x73\x75\x70\160\154\151\145\162\x73"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\x73\x75\x70\160\154\151\145\162\163\x5f\141\x64\x64")) { ?>
<li class="suppliers-active-li"><a href="<?php  echo $base_url; ?>
suppliers/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\x6e\x65\x77\137\x73\165\160\160\x6c\x69\x65\x72"); ?>
</span></a></li><?php  } if ($CI->permissions("\163\x75\x70\x70\154\x69\145\162\x73\137\166\x69\x65\x77")) { ?>
<li class="suppliers-list-active-li"><a href="<?php  echo $base_url; ?>
suppliers"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\163\165\x70\x70\154\x69\x65\x72\163\x5f\154\x69\x73\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\x69\155\x70\x6f\x72\x74\x5f\x73\x75\x70\x70\154\x69\145\162\x73")) { ?>
<li class="import_suppliers-active-li"><a href="<?php  echo $base_url; ?>
import/suppliers"><i class="fa fa-arrow-circle-o-left"></i> <span><?php  echo $this->lang->line("\x69\155\x70\x6f\x72\x74\137\x73\165\x70\160\154\x69\x65\x72\x73"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto JhcGj; sKd3A: if ($CI->permissions("\x70\x75\x72\143\x68\x61\163\145\137\141\144\144") || $CI->permissions("\x70\165\162\x63\150\141\163\145\137\x76\151\x65\x77") || $CI->permissions("\160\165\x72\143\x68\x61\163\x65\x5f\x72\x65\164\165\162\x6e\x5f\x76\151\145\167") || $CI->permissions("\x6e\x65\167\x5f\160\x75\x72\x63\150\141\x73\x65\137\162\145\164\165\x72\x6e")) { ?>
<li class="treeview purchase-active-li purchase-list-active-li purchase-returns-active-li purchase-returns-list-active-li"><a href="#"><i class="fa text-aqua fa-th-large"></i> <span><?php  echo $this->lang->line("\x70\165\x72\x63\x68\x61\x73\145"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\160\x75\x72\143\150\x61\x73\x65\x5f\x61\x64\x64")) { ?>
<li class="purchase-active-li"><a href="<?php  echo $base_url; ?>
purchase/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\156\145\x77\x5f\x70\x75\x72\x63\150\141\163\x65"); ?>
</span></a></li><?php  } if ($CI->permissions("\160\165\x72\143\150\141\163\x65\137\166\151\x65\167")) { ?>
<li class="purchase-list-active-li"><a href="<?php  echo $base_url; ?>
purchase"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x70\x75\162\143\150\x61\163\x65\x5f\x6c\x69\x73\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\160\165\162\143\x68\x61\x73\x65\137\x72\x65\164\x75\162\x6e\x5f\x76\151\145\167")) { ?>
<li class="purchase-returns-active-li"><a href="<?php  echo $base_url; ?>
purchase_return/create"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\x6e\145\x77\x5f\x70\165\162\x63\150\141\x73\x65\x5f\x72\145\164\165\x72\x6e"); ?>
</span></a></li><?php  } if ($CI->permissions("\160\x75\162\x63\150\x61\x73\145\x5f\x72\x65\x74\165\x72\156\137\x76\151\x65\x77")) { ?>
<li class="purchase-returns-list-active-li"><a href="<?php  echo $base_url; ?>
purchase_return"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x70\x75\x72\x63\x68\x61\163\145\x5f\x72\145\x74\x75\162\x6e\163\x5f\x6c\151\x73\x74"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto rGBnL; nLRaH: if (!check_label()) { ?>
<li class="company-profile-active-li"><a href="<?php  echo $base_url; ?>
company"><i class="fa fa-suitcase"></i> <span>Phần mềm bị block</span></a></li><?php  } goto exvv8; Q8BuN: ?>
<small>Year<?php  goto Qt8mL; KCj1B: echo $this->session->userdata("\151\x6e\x76\x5f\x75\163\145\162\x69\x64"); goto n4Zsn; JhcGj: if ($CI->permissions("\151\x74\x65\155\x73\x5f\141\x64\x64") || $CI->permissions("\x69\x74\145\x6d\x73\137\166\151\x65\167") || $CI->permissions("\151\164\145\155\163\x5f\x63\141\164\x65\x67\x6f\162\171\137\141\144\144") || $CI->permissions("\x69\x74\x65\155\x73\137\x63\x61\x74\145\x67\x6f\162\171\137\x76\x69\x65\167") || $CI->permissions("\142\x72\x61\156\x64\137\x61\x64\144") || $CI->permissions("\142\162\x61\156\144\x5f\x76\x69\145\167") || $CI->permissions("\160\162\151\156\x74\137\154\141\142\x65\154\163")) { ?>
<li class="treeview brand-active-li brand-view-active-li category-active-li category-view-active-li import_items-active-li items-active-li items-list-active-li labels-active-li"><a href="#"><i class="fa text-aqua fa-cubes"></i> <span><?php  echo $this->lang->line("\x69\164\x65\155\x73"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\x69\164\x65\155\x73\137\x61\x64\144")) { ?>
<li class="items-active-li"><a href="<?php  echo $base_url; ?>
items/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\x6e\145\x77\x5f\x69\x74\145\155"); ?>
</span></a></li><?php  } if ($CI->permissions("\x69\x74\145\x6d\163\137\x76\x69\145\x77")) { ?>
<li class="items-list-active-li"><a href="<?php  echo $base_url; ?>
items"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\151\x74\x65\x6d\163\137\154\x69\x73\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\x69\164\145\155\x73\137\x63\141\x74\145\147\x6f\x72\171\137\166\151\145\167")) { ?>
<li class="category-view-active-li"><a href="<?php  echo $base_url; ?>
category/view"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x63\141\164\145\x67\x6f\162\x69\145\163\x5f\154\x69\163\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\x62\162\141\x6e\x64\x5f\x76\x69\x65\167")) { ?>
<li class="brand-view-active-li"><a href="<?php  echo $base_url; ?>
brands/view"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\142\x72\x61\x6e\x64\x73\137\x6c\x69\x73\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\151\164\x65\x6d\x73\137\x63\x61\164\145\x67\x6f\x72\171\x5f\x76\x69\145\x77")) { ?>
<li class="units-list-active-li unit-active-li"><a href="<?php  echo $base_url; ?>
kinds/"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\153\151\156\144\x73\137\x6c\151\x73\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\x70\x72\x69\156\164\137\x6c\141\142\x65\x6c\x73")) { ?>
<li class="labels-active-li"><a href="<?php  echo $base_url; ?>
items/labels"><i class="fa fa-barcode"></i> <span><?php  echo $this->lang->line("\x70\162\151\156\164\137\x6c\x61\142\145\x6c\163"); ?>
</span></a></li><?php  } if ($CI->permissions("\151\x6d\160\x6f\162\164\x5f\x69\x74\145\155\163")) { ?>
<li class="import_items-active-li"><a href="<?php  echo $base_url; ?>
import/items"><i class="fa fa-arrow-circle-o-left"></i> <span><?php  echo $this->lang->line("\151\x6d\x70\157\162\164\137\151\x74\x65\155\163"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto nbgU0; x5E3a: echo $SITE_TITLE; goto o9P0Q; z0dWz: ?>
users/edit/<?php  goto KCj1B; DGbV4: echo $base_url; goto z0dWz; bVsBY: if (true) { ?>
<li class="company-profile-active-li"><a href="https://github.com/phamduybk/rabitpos"target="_blank"><i class="fa fa-suitcase"></i> <span>Github</span></a></li><?php  } goto sFGn6; BE0e1: if ($change_password = true) { ?>
<li class="treeview change-pass-active-li company-profile-active-li currency-active-li currency-view-active-li database_updater-active-li dbbackup-active-li payment_types-active-li payment_types_list-active-li site-settings-active-li tax-active-li tax-list-active-li unit-active-li units-list-active-li warehouse-active-li warehouse-list-active-li"><a href="#"><i class="fa text-aqua fa-gears"></i> <span><?php  echo $this->lang->line("\163\145\x74\x74\x69\156\147\163"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\143\157\155\x70\x61\x6e\x79\x5f\x65\144\x69\x74")) { ?>
<li class="company-profile-active-li"><a href="<?php  echo $base_url; ?>
company"><i class="fa fa-suitcase"></i> <span><?php  echo $this->lang->line("\143\x6f\x6d\160\x61\156\171\137\x70\162\157\x66\151\154\145"); ?>
</span></a></li><?php  } if ($CI->permissions("\163\x69\164\145\137\145\144\151\164")) { ?>
<li class="site-settings-active-li"><a href="<?php  echo $base_url; ?>
site"><i class="fa fa-shield"></i> <span><?php  echo $this->lang->line("\163\151\164\x65\137\163\145\164\x74\151\x6e\147\163"); ?>
</span></a></li><?php  } if ($CI->permissions("\164\x61\x78\137\x76\x69\x65\x77")) { ?>
<li class="tax-active-li tax-list-active-li"><a href="<?php  echo $base_url; ?>
tax"><i class="fa fa-percent"></i> <span><?php  echo $this->lang->line("\x74\x61\170\x5f\154\x69\x73\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\x75\x6e\151\x74\x73\137\166\x69\145\x77")) { ?>
<li class="units-list-active-li unit-active-li"><a href="<?php  echo $base_url; ?>
units/"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\165\x6e\151\x74\163\x5f\154\x69\x73\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\x70\x61\x79\155\145\156\x74\137\x74\171\160\145\163\x5f\166\151\x65\167")) { ?>
<li class="payment_types_list-active-li payment_types-active-li"><a href="<?php  echo $base_url; ?>
payment_types/"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\160\141\x79\x6d\145\156\164\137\164\x79\160\145\x73\x5f\154\x69\x73\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\x63\165\x72\x72\145\156\x63\171\137\166\x69\x65\x77")) { ?>
<li class="currency-view-active-li currency-active-li"><a href="<?php  echo $base_url; ?>
currency/view"><i class="fa fa-gg"></i> <span><?php  echo $this->lang->line("\143\x75\x72\162\x65\x6e\143\171\x5f\x6c\151\163\164"); ?>
</span></a></li><?php  } ?>
<li class="change-pass-active-li"><a href="<?php  echo $base_url; ?>
users/password_reset"><i class="fa fa-lock"></i> <span><?php  echo $this->lang->line("\x63\150\x61\x6e\x67\x65\x5f\160\141\163\163\x77\x6f\x72\x64"); ?>
</span></a></li><?php  if ($CI->permissions("\x73\151\x74\x65\137\x65\x64\x69\164")) { ?>
<li class="dbbackup-active-li"><a href="<?php  echo $base_url; ?>
users/dbbackup"><i class="fa fa-database"></i> <span><?php  echo $this->lang->line("\144\x61\164\x61\142\141\x73\x65\137\x62\141\143\153\165\x70"); ?>
</span></a></li><?php  } if ($CI->permissions("\163\151\164\x65\137\145\x64\x69\x74")) { ?>
<li class="dbbackup-active-li"><a href="<?php  echo $base_url; ?>
users/imagesbackup"><i class="fa fa-database"></i> <span><?php  echo "\x53\x61\157\x20\154\306\260\x75\x20\x66\x69\154\145\x73"; ?>
</span></a></li><?php  } if ($CI->permissions("\163\155\163\x5f\141\x70\151\137\166\x69\145\167")) { ?>
<li class="sms-api-active-li"><a href="<?php  echo $base_url; ?>
sms/api"><i class="fa fa-cube"></i> <span><?php  echo $this->lang->line("\163\155\x73\x5f\141\x70\x69"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto bIoUE; jUE1T: echo $base_url; goto Et05v; jCosH: ?>
</span></a></li><?php  goto W9tA9; xwb6n: ?>
"></div><div class="pull-left info"><p><?php  goto UZ7OP; Qt8mL: echo date("\131"); goto OG52d; gDB2m: ?>
"><p><?php  goto flCG5; Xy85Q: if (time_reference_show()) { ?>
<li class="company-profile-active-li"><a href="<?php  echo $base_url; ?>
company"><i class="fa fa-suitcase"></i> <span><?php  echo $this->lang->line("\x70\162\x65\146\151\x78\145\x73\x5f\164\x69\x6d\x65") . show_date_now(); ?>
</span></a></li><?php  } goto nLRaH; dq9og: echo $base_url; goto Jp1oN; XP3k0: echo $this->lang->line("\144\x61\x73\150\x62\x6f\x61\162\x64"); goto jCosH; HMa8D: echo get_profile_picture(); goto gDB2m; FX7MA: ?>
dashboard"class="logo"><span class="logo-mini"><b>POS</b></span> <span class="logo-lg"><b><?php  goto x5E3a; OFcS7: ?>
<header class="main-header"><a href="<?php  goto yIhSA; W6mCc: ?>
</span></a><ul class="dropdown-menu"><li class="user-header"><img alt="User Image"class="img-circle"src="<?php  goto HMa8D; X1vlj: if ($CI->permissions("\x73\x61\154\x65\x73\x5f\141\144\x64")) { ?>
<li class="border_bottom"><a href="<?php  echo $base_url; ?>
sales/add"><h4><i class="fa fa-plus text-green"></i><?php  echo $this->lang->line("\163\141\154\145\x73"); ?>
</h4></a></li><?php  } goto A_0kt; bZST1: ?>
dashboard"><i class="fa text-aqua fa-dashboard"></i> <span><?php  goto XP3k0; erRNz: ?>
<li class="hidden-xs text-center"id=""><a href="<?php  goto jUE1T; nbgU0: if ($CI->permissions("\145\x78\160\145\x6e\x73\x65\137\141\x64\144") || $CI->permissions("\145\x78\160\145\x6e\163\x65\x5f\166\151\x65\x77") || $CI->permissions("\145\x78\x70\145\156\163\145\137\143\141\x74\145\x67\x6f\162\x79\x5f\141\144\144") || $CI->permissions("\145\170\160\x65\156\x73\145\x5f\x63\x61\164\145\147\157\162\171\x5f\166\x69\x65\167")) { ?>
<li class="treeview expense-active-li expense-category-active-li expense-category-list-active-li expense-list-active-li"><a href="#"><i class="fa text-aqua fa-minus-circle"></i> <span><?php  echo $this->lang->line("\145\x78\x70\x65\156\x73\145\163"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\x65\170\x70\145\156\x73\x65\137\141\x64\144")) { ?>
<li class="expense-active-li"><a href="<?php  echo $base_url; ?>
expense/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\x6e\145\x77\x5f\x65\170\160\145\156\163\x65"); ?>
</span></a></li><?php  } if ($CI->permissions("\x65\170\x70\x65\156\x73\145\x5f\x76\x69\x65\x77")) { ?>
<li class="expense-list-active-li"><a href="<?php  echo $base_url; ?>
expense"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x65\x78\x70\x65\156\163\145\163\x5f\x6c\151\163\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\x65\x78\160\x65\156\163\x65\x5f\143\141\164\x65\147\157\162\171\137\x61\x64\x64")) { ?>
<li class="expense-category-active-li"><a href="<?php  echo $base_url; ?>
expense/category_add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\x6e\145\x77\x5f\x63\x61\x74\145\x67\157\162\171"); ?>
</span></a></li><?php  } if ($CI->permissions("\145\x78\160\145\x6e\x73\145\x5f\143\141\164\x65\x67\x6f\162\x79\137\166\151\x65\167")) { ?>
<li class="expense-category-list-active-li"><a href="<?php  echo $base_url; ?>
expense/category"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\143\141\164\x65\x67\x6f\162\151\x65\x73\x5f\x6c\x69\163\164"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto PH8gy; QNrD3: ?>
</ul></div><div class="navbar-custom-menu"><ul class="nav navbar-nav"><li class="dropdown tasks-menu"><a href="#"class="dropdown-toggle text-right"data-toggle="dropdown"data-toggle="tooltip"title="App Language"><i class="fa fa-language"></i><?php  goto weOqI; UZZqV: echo get_profile_picture(); goto xwb6n; x4C62: echo get_profile_picture(); goto mK3X1; ojEds: if (true) { ?>
<li class="company-profile-active-li"><a href="https://www.facebook.com/rabitweb/"target="_blank"><i class="fa fa-suitcase"></i> <span>Like và theo dõi Fanpage</span></a></li><?php  } goto bVsBY; few4c: if ($CI->permissions("\x73\x75\160\160\154\151\145\x72\163\x5f\x61\144\144")) { ?>
<li class="border_bottom"><a href="<?php  echo $base_url; ?>
suppliers/add"><h4><i class="fa fa-plus text-green"></i><?php  echo $this->lang->line("\x73\165\x70\x70\154\151\145\x72"); ?>
</h4></a></li><?php  } goto W14mo; tULs9: if ($CI->permissions("\151\164\x65\x6d\137\x70\x75\162\x63\150\141\163\145\137\162\x65\160\157\x72\164") || $CI->permissions("\x73\x61\x6c\x65\163\137\162\x65\160\157\162\x74") || $CI->permissions("\151\x74\x65\155\137\163\141\154\x65\163\x5f\x72\145\x70\157\162\x74") || $CI->permissions("\x70\x75\162\143\x68\141\x73\145\137\162\145\160\x6f\x72\164") || $CI->permissions("\x70\165\x72\x63\x68\141\163\x65\137\162\145\164\165\x72\156\x5f\x72\145\160\157\x72\164") || $CI->permissions("\145\170\x70\x65\156\163\x65\137\162\145\x70\157\x72\164") || $CI->permissions("\160\x72\157\x66\x69\164\x5f\x72\145\x70\x6f\162\164") || $CI->permissions("\x73\x74\157\x63\153\137\x72\x65\160\x6f\162\164") || $CI->permissions("\x70\x75\162\x63\150\141\163\x65\137\160\141\x79\155\x65\x6e\x74\163\x5f\x72\145\x70\x6f\162\164") || $CI->permissions("\163\141\154\x65\x73\137\x70\x61\x79\x6d\145\156\x74\163\x5f\x72\145\x70\157\x72\164") || $CI->permissions("\x65\170\160\151\x72\145\144\137\x69\x74\145\x6d\x73\137\162\145\x70\157\x72\x74")) { ?>
<li class="treeview report-expense-active-li report-expired-items-active-li report-profit-loss-active-li report-purchase-active-li report-purchase-item-active-li report-purchase-payments-active-li report-purchase-return-active-li report-sales-active-li report-sales-item-active-li report-sales-payments-active-li report-sales-return-active-li report-stock-active-li"><a href="#"><i class="fa text-aqua fa-bar-chart"></i> <span><?php  echo $this->lang->line("\162\145\x70\157\162\x74\x73"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\160\x72\x6f\146\151\164\137\162\145\x70\157\x72\164")) { ?>
<li class="report-profit-loss-active-li"><a href="<?php  echo $base_url; ?>
reports/profit_loss"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\x70\162\157\146\x69\164\x5f\x61\156\x64\x5f\x6c\x6f\x73\163\137\162\x65\160\x6f\x72\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\160\165\162\143\x68\141\x73\x65\x5f\x72\x65\x70\x6f\162\x74")) { ?>
<li class="report-purchase-active-li"><a href="<?php  echo $base_url; ?>
reports/purchase"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\160\165\x72\x63\150\141\x73\145\137\x72\145\x70\157\162\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\160\165\x72\143\150\x61\163\x65\137\x72\x65\x74\165\x72\x6e\137\x72\x65\x70\157\162\x74")) { ?>
<li class="report-purchase-return-active-li"><a href="<?php  echo $base_url; ?>
reports/purchase_return"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\160\165\x72\x63\150\141\x73\145\137\162\145\x74\x75\162\156\x5f\162\145\160\157\162\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\160\165\x72\x63\x68\141\x73\145\x5f\160\x61\x79\x6d\x65\x6e\x74\x73\137\x72\x65\160\157\162\164")) { ?>
<li class="report-purchase-payments-active-li"><a href="<?php  echo $base_url; ?>
reports/purchase_payments"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\160\x75\162\x63\x68\x61\163\145\137\160\141\x79\x6d\145\156\164\163\x5f\162\145\x70\157\x72\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\151\164\145\155\137\163\x61\154\145\x73\x5f\x72\145\160\x6f\x72\x74")) { ?>
<li class="report-sales-item-active-li"><a href="<?php  echo $base_url; ?>
reports/item_sales"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\151\164\x65\155\x5f\163\141\x6c\145\x73\137\x72\145\x70\x6f\162\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\151\x74\145\155\x5f\160\x75\162\x63\150\x61\163\145\137\x72\145\x70\157\162\x74")) { ?>
<li class="report-purchase-item-active-li"><a href="<?php  echo $base_url; ?>
reports/item_purchase"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\151\x74\x65\x6d\x5f\x70\x75\162\x63\150\x61\163\x65\x5f\162\x65\x70\x6f\x72\x74"); ?>
</span><span class="pull-right-container"><span class="pull-right label label-success">New</span></span></a></li><?php  } if ($CI->permissions("\x73\141\x6c\145\x73\x5f\162\x65\160\x6f\x72\x74")) { ?>
<li class="report-sales-active-li"><a href="<?php  echo $base_url; ?>
reports/sales"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\x73\141\x6c\x65\163\137\x72\145\x70\x6f\162\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\163\x61\154\145\163\137\162\x65\164\165\162\156\x5f\162\145\160\x6f\x72\x74")) { ?>
<li class="report-sales-return-active-li"><a href="<?php  echo $base_url; ?>
reports/sales_return"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\x73\141\x6c\x65\163\x5f\162\x65\164\165\x72\x6e\x5f\162\145\x70\157\162\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\x73\141\x6c\x65\163\x5f\x70\x61\x79\155\x65\156\x74\x73\137\x72\x65\x70\157\162\x74")) { ?>
<li class="report-sales-payments-active-li"><a href="<?php  echo $base_url; ?>
reports/sales_payments"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\163\141\154\145\x73\x5f\x70\x61\171\155\x65\156\x74\163\137\x72\x65\x70\x6f\x72\x74"); ?>
</span></a></li><?php  } if ($CI->permissions("\163\164\x6f\x63\153\x5f\x72\145\160\157\162\x74")) { ?>
<li class="report-stock-active-li"><a href="<?php  echo $base_url; ?>
reports/stock"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\163\x74\157\143\x6b\137\162\x65\160\x6f\162\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\145\x78\x70\x65\156\x73\x65\137\x72\x65\x70\157\x72\x74")) { ?>
<li class="report-expense-active-li"><a href="<?php  echo $base_url; ?>
reports/expense"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\145\x78\160\x65\x6e\163\145\x5f\x72\145\x70\157\x72\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\x65\x78\160\151\162\x65\144\137\x69\164\145\155\x73\x5f\x72\145\160\x6f\x72\x74")) { ?>
<li class="report-expired-items-active-li"><a href="<?php  echo $base_url; ?>
reports/expired_items"><i class="fa fa-files-o"></i> <span><?php  echo $this->lang->line("\145\170\160\x69\162\145\x64\137\151\164\145\155\x73\x5f\162\x65\160\x6f\x72\x74"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto qt5Z2; mK3X1: ?>
"> <span class="hidden-xs"><?php  goto lmLyH; uXI2e: ?>
<script type="text/javascript">"skin-blue"!=theme_skin&&($("body").addClass(theme_skin),$("body").removeClass("skin-blue")),"true"==sidebar_collapse&&$("body").addClass("sidebar-collapse")</script><?php  goto UCpaS; CukEr: $lang_query = $this->db->query("\163\145\154\145\143\x74\x20\x2a\40\146\x72\x6f\x6d\40\144\142\137\154\141\156\x67\165\x61\x67\x65\163\40\x77\150\x65\x72\145\x20\x73\x74\141\164\x75\x73\75\61\40\157\x72\144\x65\x72\x20\x62\171\x20\x6c\x61\x6e\147\165\141\147\x65\x20\141\x73\x63"); goto l963w; weOqI: echo $this->session->userdata("\x6c\x61\x6e\x67\x75\141\147\x65"); goto oUy0G; PH8gy: if ($CI->permissions("\160\x6c\x61\x63\x65\163\x5f\141\144\144") || $CI->permissions("\160\x6c\x61\x63\145\x73\x5f\x76\151\145\167")) { ?>
<li class="treeview city-active-li city-list-active-li country-active-li country-list-active-li state-active-li state-list-active-li"><a href="#"><i class="fa text-aqua fa-paper-plane-o"></i> <span><?php  echo $this->lang->line("\160\154\x61\x63\145\x73"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\160\154\141\143\145\x73\137\141\144\144")) { ?>
<li class="country-active-li"><a href="<?php  echo $base_url; ?>
country/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\x6e\x65\x77\137\143\157\x75\x6e\164\162\171"); ?>
</span></a></li><?php  } if ($CI->permissions("\160\x6c\x61\x63\x65\x73\x5f\166\x69\145\167")) { ?>
<li class="country-list-active-li"><a href="<?php  echo $base_url; ?>
country"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x63\x6f\165\x6e\164\162\x69\145\163\137\154\x69\163\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\160\154\141\x63\145\x73\x5f\x61\144\144")) { ?>
<li class="state-active-li"><a href="<?php  echo $base_url; ?>
state/add"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\156\x65\x77\x5f\x73\164\141\x74\145"); ?>
</span></a></li><?php  } if ($CI->permissions("\x70\154\141\143\145\163\x5f\x76\151\x65\x77")) { ?>
<li class="state-list-active-li"><a href="<?php  echo $base_url; ?>
state"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\163\164\141\164\x65\163\137\x6c\x69\163\164"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto tULs9; A_0kt: if ($CI->permissions("\160\165\x72\143\x68\x61\x73\145\x5f\x61\x64\x64")) { ?>
<li class="border_bottom"><a href="<?php  echo $base_url; ?>
purchase/add"><h4><i class="fa fa-plus text-green"></i><?php  echo $this->lang->line("\160\x75\x72\143\x68\x61\x73\145"); ?>
</h4></a></li><?php  } goto M4UQI; lmLyH: print ucfirst($this->session->userdata("\151\x6e\x76\x5f\165\163\x65\162\156\x61\155\145")); goto W6mCc; qItD6: echo $base_url; goto bZST1; qt5Z2: if ($CI->permissions("\165\163\x65\162\x73\137\x61\144\144") || $CI->permissions("\x75\x73\145\x72\163\x5f\166\x69\x65\x77") || $CI->permissions("\x72\157\154\145\x73\137\x76\151\x65\167")) { ?>
<li class="treeview role-active-li roles-list-active-li users-active-li users-view-active-li"><a href="#"><i class="fa text-aqua fa-users"></i> <span><?php  echo $this->lang->line("\x75\163\x65\162\x73"); ?>
</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a><ul class="treeview-menu"><?php  if ($CI->permissions("\x75\x73\145\162\x73\137\141\144\144")) { ?>
<li class="users-active-li"><a href="<?php  echo $base_url; ?>
users/"><i class="fa fa-plus-square-o"></i> <span><?php  echo $this->lang->line("\156\145\x77\x5f\x75\x73\145\162"); ?>
</span></a></li><?php  } if ($CI->permissions("\x75\163\145\x72\163\x5f\166\151\x65\167")) { ?>
<li class="users-view-active-li"><a href="<?php  echo $base_url; ?>
users/view"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\x75\x73\x65\162\x73\x5f\154\x69\163\164"); ?>
</span></a></li><?php  } if ($CI->permissions("\162\x6f\154\145\163\137\166\151\x65\x77")) { ?>
<li class="role-active-li roles-list-active-li"><a href="<?php  echo $base_url; ?>
roles/view"><i class="fa fa-list"></i> <span><?php  echo $this->lang->line("\162\157\154\x65\x73\x5f\154\x69\163\x74"); ?>
</span></a></li><?php  } ?>
</ul></li><?php  } goto BE0e1; Et05v: ?>
dashboard"title="Dashboard"><i class="fa fa-dashboard"></i><?php  goto OoiUS; UCpaS: $CI =& get_instance(); goto OFcS7; yIhSA: echo $base_url; goto FX7MA; Ngjfr: if ($CI->permissions("\x70\x6f\163")) { ?>
<li class="text-center"id=""><a href="<?php  echo $base_url; ?>
pos"title="POS [Shift+P]"><i class="fa fa-plus-square"></i> POS</a></li><?php  } goto erRNz; uk1wV: ?>
</a></li><li class="dropdown user user-menu"><a href="#"class="dropdown-toggle"data-toggle="dropdown"><img alt="User Image"class="user-image"src="<?php  goto x4C62; bIoUE: if ($CI->permissions("\x68\x65\x6c\x70")) { } goto Xy85Q; xPQnT: ?>
<i class="fa text-aqua fa-check-circle fa-fw"></i></p><a href="#"><i class="fa fa-circle text-success"></i> Online</a></div></div><ul class="sidebar-menu"><li class="dashboard-active-li"><a href="<?php  goto qItD6; o9P0Q: ?>
</b></span></a><nav class="navbar navbar-static-top"><a href="#"class="sidebar-toggle"data-toggle="offcanvas"role="button"><span class="sr-only">Toggle navigation</span></a><div class="hidden-xs btn-group"><a href="#"class="btn btn-success dropdown-toggle navbar-btn"data-toggle="dropdown"aria-expanded="false"><i class="fa fa-plus"></i></a><ul class="dropdown-menu"><?php  goto X1vlj; UZ7OP: print ucfirst($this->session->userdata("\151\x6e\166\137\165\x73\145\162\x6e\x61\155\145")); goto xPQnT; flCG5: print ucfirst($this->session->userdata("\151\156\166\137\x75\x73\145\162\156\x61\155\145")); goto Q8BuN; M4UQI: if ($CI->permissions("\x63\165\163\x74\x6f\x6d\x65\162\x73\137\141\144\x64")) { ?>
<li class="border_bottom"><a href="<?php  echo $base_url; ?>
customers/add"><h4><i class="fa fa-plus text-green"></i><?php  echo $this->lang->line("\143\x75\x73\164\157\155\145\162"); ?>
</h4></a></li><?php  } goto few4c; oUy0G: ?>
</a><ul class="dropdown-menu"style="width:auto;height:auto"><li><ul class="menu"><?php  goto CukEr; exvv8: if (true) { ?>
<li class="company-profile-active-li"><a href="https://www.facebook.com/groups/832581721729815"target="_blank"><i class="fa fa-suitcase"></i> <span>Tham gia nhóm Facebook</span></a></li><?php  } goto ojEds; i1QG2: if ($CI->permissions("\x65\170\160\x65\x6e\163\145\x5f\141\144\x64")) { ?>
<li class="border_bottom"><a href="<?php  echo $base_url; ?>
expense/add"><h4><i class="fa fa-plus text-green"></i><?php  echo $this->lang->line("\145\x78\x70\145\x6e\x73\x65"); ?>
</h4></a></li><?php  } goto QNrD3; OoiUS: echo $this->lang->line("\144\x61\163\x68\142\157\141\162\x64"); goto uk1wV; sFGn6: ?>
</ul></section></aside>
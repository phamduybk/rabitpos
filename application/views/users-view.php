<?php
 goto Xr1fO; GFhrv: echo $this->lang->line("\155\x6f\x62\151\154\145"); goto P1CYM; iqm_B: ?>
<script src="<?php  goto UPRl8; ZP8iH: ?>
</th></tr></thead><tbody><?php  goto sa2xi; skUDL: include "\x66\x6f\157\x74\x65\162\56\x70\x68\x70"; goto rJpoe; Ho2Yj: ?>
<small>Add/Update Users</small></h1><ol class="breadcrumb"><li><a href="<?php  goto gy8a2; koPwZ: ?>
</th><th><?php  goto MxjR6; MxjR6: echo $this->lang->line("\143\x72\145\141\164\x65\144\137\x6f\156"); goto jfc0e; pZnaU: ?>
</div><div class="box-body"><table class="table table-bordered table-striped"id="example2"width="100%"><thead class="bg-primary"><tr><th>#</th><th><?php  goto IL8eJ; IO7f2: if ($CI->permissions("\x75\x73\x65\x72\163\137\141\x64\144")) { ?>
<div class="box-tools"><a href="<?php  echo $base_url; ?>
users/"class="btn btn-block btn-info"><i class="fa fa-plus"></i><?php  echo $this->lang->line("\x6e\145\x77\x5f\x75\163\145\162"); ?>
</a></div><?php  } goto pZnaU; rJpoe: ?>
<div class="control-sidebar-bg"></div></div><?php  goto le6cP; le6cP: include "\x63\157\155\x6d\141\156\57\143\x6f\x64\x65\137\152\x73\x5f\x73\157\165\x6e\x64\56\160\x68\160"; goto kXgw9; CsH5S: include "\143\157\155\155\x61\x6e\57\143\x6f\x64\x65\x5f\x66\x6c\141\163\x68\144\x61\x74\x61\56\x70\150\x70"; goto lmnL9; c6qBr: ?>
</li></ol></section><section class="content"><div class="row"><?php  goto CsH5S; kXgw9: include "\143\157\155\x6d\141\156\x2f\143\157\x64\145\137\x6a\163\137\x64\x61\164\141\x74\x61\142\x6c\145\x2e\160\x68\160"; goto iqm_B; IL8eJ: echo $this->lang->line("\165\163\145\162\x5f\x6e\141\155\x65"); goto VmDVH; ly7MG: echo $this->lang->line("\163\164\x61\164\165\x73"); goto uwvra; P1CYM: ?>
</th><th><?php  goto zSt42; OjZrK: ?>
</h3><?php  goto IO7f2; VmDVH: ?>
</th><th><?php  goto GFhrv; BPT6A: ?>
</tbody></table></div></div></div></div></section></div><?php  goto skUDL; DQ0Hx: ?>
dashboard"><i class="fa fa-dashboard"></i> Home</a></li><li class="active"><?php  goto UyjZC; OdWDA: include "\x73\x69\x64\x65\x62\x61\x72\x2e\160\x68\160"; goto C2FEJ; yOz3N: $q1 = $this->db->query($qs1); goto VhYMs; wp7SA: echo $this->lang->line("\x75\x73\145\162\163\x5f\154\151\x73\164"); goto OjZrK; m39b4: ?>
</head><body class="hold-transition sidebar-mini skin-blue"><div class="wrapper"><?php  goto OdWDA; TpcB_: include "\x63\157\x6d\x6d\x61\x6e\x2f\x63\157\144\x65\137\x63\x73\x73\x5f\144\x61\164\x61\x74\141\x62\x6c\x65\x2e\160\150\x70"; goto m39b4; VhYMs: if ($q1->num_rows() > 0) { foreach ($q1->result() as $res1) { ?>
<tr><td><?php  echo $i++; ?>
</td><td><?php  echo $res1->username; ?>
</td><td><?php  echo $res1->mobile; ?>
</td><td><?php  echo $res1->email; ?>
</td><td><?php  echo $res1->role_name; ?>
</td><td><?php  echo show_date($res1->created_date); ?>
</td><td><?php  if ($res1->id == 3 || demo_app()) { echo "\x20\40\x3c\x73\x70\141\x6e\40\40\x63\154\141\163\163\x3d\47\154\141\142\145\x6c\40\x6c\x61\x62\145\x6c\x2d\144\145\x66\x61\165\x6c\164\x27\40\x64\151\163\141\142\154\x65\144\x3d\47\x64\151\163\x61\142\x6c\145\x64\47\x20\163\x74\x79\x6c\x65\75\x27\143\x75\x72\x73\157\162\72\144\151\x73\141\x62\x6c\x65\x64\47\x3e\x52\145\163\x74\x72\151\143\164\x65\144\x3c\57\163\x70\x61\x6e\x3e"; } else { if ($res1->status == 1) { echo "\40\40\74\163\x70\x61\x6e\40\157\156\143\154\151\x63\153\x3d\x27\x75\x70\x64\141\x74\145\x5f\163\x74\141\x74\x75\x73\x28" . $res1->id . "\54\x30\51\x27\40\151\x64\x3d\x27\x73\160\141\x6e\x5f" . $res1->id . "\47\40\x20\143\154\x61\x73\163\75\47\x6c\141\142\145\154\40\154\141\x62\145\154\x2d\x73\165\x63\x63\145\x73\x73\x27\40\x73\x74\171\154\x65\75\47\x63\165\x72\x73\157\162\x3a\160\x6f\151\x6e\164\145\162\47\76\101\143\164\151\166\x65\40\x3c\x2f\x73\160\x61\x6e\x3e"; } else { echo "\x3c\x73\x70\x61\x6e\x20\157\x6e\x63\154\x69\x63\153\75\x27\165\160\144\141\x74\x65\137\163\164\x61\x74\x75\163\50" . $res1->id . "\x2c\61\51\47\x20\x69\x64\75\x27\x73\x70\x61\x6e\x5f" . $res1->id . "\47\x20\x20\143\154\141\163\163\x3d\x27\154\x61\x62\x65\154\x20\x6c\141\x62\x65\x6c\55\144\141\156\147\x65\x72\x27\40\163\164\x79\x6c\x65\x3d\47\143\x75\162\163\157\162\x3a\x70\x6f\151\156\x74\145\x72\47\76\x20\x49\156\x61\143\164\151\x76\x65\40\74\57\163\x70\x61\156\76"; } } ?>
</td><td><?php  if (!demo_app()) { ?>
<div class="btn-group"title="View Account"><a href="#"class="btn btn-o btn-primary dropdown-toggle"data-toggle="dropdown">Action <span class="caret"></span></a><ul class="dropdown-light dropdown-menu pull-right"role="menu"><?php  if ($CI->permissions("\165\163\145\x72\163\x5f\x65\x64\151\x74")) { ?>
<li><a href="<?php  echo $base_url; ?>
users/edit/<?php  echo $res1->id; ?>
"title="Update Record ?"><i class="fa fa-fw fa-edit text-blue"></i>Edit</a></li><?php  } if ($CI->permissions("\x75\x73\x65\x72\x73\x5f\144\x65\x6c\x65\164\x65") && $res1->id != 3) { ?>
<li><a title="Delete Record ?"onclick="delete_user(<?php  echo $res1->id; ?>
)"style="cursor:pointer"><i class="fa fa-fw fa-trash text-red"></i>Delete</a></li><?php  } ?>
</ul></div><?php  } ?>
</td></tr><?php  } } goto BPT6A; Xr1fO: ?>
<!doctypehtml><html><head><?php  goto TpcB_; GTM7x: echo $this->lang->line("\165\x73\x65\x72\x73\x5f\154\151\x73\164"); goto Ho2Yj; Nh98e: ?>
</th><th><?php  goto msp9W; gy8a2: echo $base_url; goto DQ0Hx; nA2jV: echo basename(__FILE__, "\x2e\160\x68\x70"); goto t0ts2; uwvra: ?>
</th><th><?php  goto dQH6h; ffzNr: $qs1 = "\163\x65\154\x65\143\164\40\141\56\52\x2c\x62\x2e\162\x6f\154\x65\x5f\x6e\141\x6d\x65\40\146\x72\x6f\155\x20\x64\x62\137\165\163\x65\162\163\40\x61\54\144\x62\137\x72\157\154\145\163\40\142\x20\167\150\145\162\145\x20\x62\56\151\x64\75\141\56\x72\157\x6c\145\x5f\151\144\x20\x61\156\x64\40\141\56\163\171\163\x74\x65\x6d\137\x6e\x61\155\145\x20\x6e\x6f\x74\40\154\151\153\x65\40\x27\x73\x75\x70\x65\x72\x61\x64\155\151\x6e\x27"; goto yOz3N; lmnL9: ?>
<div class="col-xs-12"><div class="box"><div class="box-header with-border"><h3 class="box-title"><?php  goto wp7SA; msp9W: echo $this->lang->line("\162\157\154\x65"); goto koPwZ; KYYA2: ?>
js/users.js"></script><script type="text/javascript">$(document).ready(function(){var e=$("#example2").DataTable({dom:'<"row margin-bottom-12"<"col-sm-12"<"pull-left"l><"pull-right"fr><"pull-right margin-left-10 "B>>>tip',buttons:{buttons:[{className:"btn bg-red color-palette btn-flat hidden delete_btn pull-left",text:"Delete",action:function(e,t,l,a){multi_delete()}},{extend:"copy",className:"btn bg-teal color-palette btn-flat",exportOptions:{columns:[0,1,2,3,4,5,6]}},{extend:"excel",className:"btn bg-teal color-palette btn-flat",exportOptions:{columns:[0,1,2,3,4,5,6]}},{extend:"pdf",className:"btn bg-teal color-palette btn-flat",exportOptions:{columns:[0,1,2,3,4,5,6]}},{extend:"print",className:"btn bg-teal color-palette btn-flat",exportOptions:{columns:[1,2,3,4,5,6]}},{extend:"csv",className:"btn bg-teal color-palette btn-flat",exportOptions:{columns:[0,1,2,3,4,5,6]}},{extend:"colvis",className:"btn bg-teal color-palette btn-flat",text:"Columns"}]},processing:!0,serverSide:!1,order:[],responsive:!0,language:{processing:'<div class="text-primary bg-primary" style="position: relative;z-index:100;overflow: visible;">Processing...</div>'},columnDefs:[{targets:[7],orderable:!1},{targets:[0],className:"text-center"}]});new $.fn.dataTable.FixedHeader(e)})</script><script>$(".<?php  goto nA2jV; zSt42: echo $this->lang->line("\145\155\x61\151\x6c"); goto Nh98e; C2FEJ: ?>
<div class="content-wrapper"><section class="content-header"><h1><?php  goto GTM7x; sa2xi: $i = 1; goto ffzNr; dQH6h: echo $this->lang->line("\141\x63\164\x69\157\x6e"); goto ZP8iH; UPRl8: echo $theme_link; goto KYYA2; UyjZC: echo $this->lang->line("\165\x73\x65\162\x73\137\154\x69\163\164"); goto c6qBr; jfc0e: ?>
</th><th><?php  goto ly7MG; t0ts2: ?>
-active-li").addClass("active")</script></body></html>
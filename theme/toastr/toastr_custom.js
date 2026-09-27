toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": 100,
  "hideDuration": 1000,
  "timeOut": 1500,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};

/* ── Toast KHONG DUOC CHE O QUET MA (Docs/spec-pos-toc-do.md muc 3.3 / viec 1.2) ──────────
   Do that tren ban thu demo.8923: ban 5 loi "Hang da het ton kho!" lien tiep trong <1s
   -> 5 toast xep chong o goc phai tren, 1 trong so do DE THANG LEN o #item_search cua POS.
   Thu ngan dang quet ma lien tuc bi "mu" o nhap, phai bam tay don tung toast.

   Hai chot chan, dat ngay tai file cau hinh DUNG CHUNG (moi man deu nap qua
   comman/code_js_form.php + code_js_datatable.php) nen khong man nao con xep chong:
     1. preventDuplicates = true  -> cung MOT thong bao ban lien tuc chi hien 1 lan.
     2. Tran cung 2 toast         -> loi KHAC NHAU don dap cung khong bao gio cao qua 2 o.
   Go THANG bang .remove() (khong qua toastr.clear) vi clear() con chay fadeOut
   hideDuration=1000ms: trong 1 giay do toast VAN nam trong DOM va van che o nhap. */
(function () {
  if (typeof window === 'undefined' || !window.toastr || !window.jQuery) { return; }
  var MAX_TOAST = 2;
  jQuery.each(['error', 'warning', 'success', 'info'], function (i, kind) {
    var original = toastr[kind];
    if (typeof original !== 'function') { return; }
    toastr[kind] = function () {
      var result = original.apply(toastr, arguments);
      var $toasts = jQuery('#toast-container').children('.toast');
      if ($toasts.length > MAX_TOAST) {
        $toasts.slice(0, $toasts.length - MAX_TOAST).remove();   // bo cai CU nhat
      }
      return result;
    };
  });
})();

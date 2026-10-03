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
  "hideMethod": "fadeOut",
  // L-1-F2: toast hien VAN BAN, khong ve HTML. Thong bao may chu co the chua TEN HANG,
  // ten loai thanh toan... (luu tho) -> "<b>Ten</b>" khong duoc in dam. Thong bao CO Y
  // dung HTML: phia may chu dung rb_toast_html() (khoa lang *_html, tham so da escape),
  // phia JS dung rbToastHtml(). Xem ham boc ben duoi.
  "escapeHtml": true
};

/* L-1-F2: dau hieu "thong bao HTML co chu dich". Ky tu U+2063 (INVISIBLE SEPARATOR) o
   DAU chuoi, do rb_toast_html() (helpers/custom_helper.php) gan vao. Chi duoc gan cho
   chuoi dung tu khoa lang *_html voi tham so DA html_escape o may chu. */
var RB_TOAST_HTML_MARK = '\u2063';
function rbToastHtml(kind, html, title, opts) {
  return toastr[kind](RB_TOAST_HTML_MARK + String(html), title, opts);
}

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
      var args = Array.prototype.slice.call(arguments);
      if (typeof args[0] === 'string' && args[0].charAt(0) === RB_TOAST_HTML_MARK) {
        args[0] = args[0].slice(1);
        args[2] = jQuery.extend({}, args[2] || {}, { escapeHtml: false });
      }
      var result = original.apply(toastr, args);
      var $toasts = jQuery('#toast-container').children('.toast');
      if ($toasts.length > MAX_TOAST) {
        $toasts.slice(0, $toasts.length - MAX_TOAST).remove();   // bo cai CU nhat
      }
      return result;
    };
  });
})();

<div class="modal fade " id="table_modal" tabindex='-1'>
  <?= form_open('#', array('class' => '', 'id' => 'category_form')); ?>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header header-custom">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Quản lý bàn</h4>
      </div>
      <div class="modal-table-body" style="padding: 25px;">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Đóng</button>
        <button id='update_category_item' type="button" class="btn btn-primary add_category_item">Lưu</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  <?= form_close(); ?>
</div>
<!-- /.modal -->
<div class="modal fade " id="category_item_modal" tabindex='-1'>
                <?= form_open('#', array('class' => '', 'id' => 'category_form')); ?>
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header header-custom">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title text-center">Đổi tên danh mục con</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="category"><?= $this->lang->line('category_child'); ?>*</label>
                                <span id="add_category_item_msg" class="text-danger text-right pull-right"></span>
                                <input type="text" class="form-control" id="input_category_item" name="input_category_item" placeholder="" >
                              </div>
                            </div>
                          </div>
                        </div>
                       
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                      <button id = 'update_category_item' type="button" class="btn btn-primary add_category_item">Save</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
               <?= form_close();?>
              </div>
              <!-- /.modal -->
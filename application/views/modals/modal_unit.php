<div class="modal fade " id="unit_modal" tabindex='-1'>
                <?= form_open('#', array('class' => '', 'id' => 'unit_form')); ?>
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header header-custom">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title text-center"><?= $this->lang->line('add_unit'); ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="unit_name"><?= $this->lang->line('unit_name'); ?>*</label>
                                <span id="unit_name_msg" class="text-danger text-right pull-right"></span>
                                <input type="text" class="form-control" id="unit_name" name="unit_name" placeholder="" >
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="description"><?= $this->lang->line('description'); ?></label>
                                <span id="description_msg" class="text-danger text-right pull-right"></span>
                                <textarea type="text" class="form-control" id="description" name="description" placeholder="" ></textarea>
                              </div>
                            </div>
                          </div>

                        </div>
                       
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary add_unit">Save</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
               <?= form_close();?>
              </div>
              <!-- /.modal -->
<div class="modal fade " id="tax_modal" tabindex='-1'>
                <?= form_open('#', array('class' => '', 'id' => 'tax_form')); ?>
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header header-custom">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title text-center"><?= $this->lang->line('add_tax'); ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="tax_name"><?= $this->lang->line('tax_name'); ?>*</label>
                                <span id="tax_name_msg" class="text-danger text-right pull-right"></span>
                                <input type="text" class="form-control" id="tax_name" name="tax_name" placeholder="" >
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="tax"><?= $this->lang->line('tax_percentage'); ?>*</label>
                                <span id="tax_msg" class="text-danger text-right pull-right"></span>
                                <input type="text" class="form-control only_currency" id="tax" name="tax" placeholder="0" >
                              </div>
                            </div>
                          </div>

                        </div>
                       
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary add_tax">Save</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
               <?= form_close();?>
              </div>
              <!-- /.modal -->
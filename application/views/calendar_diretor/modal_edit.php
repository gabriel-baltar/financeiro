						<!--Modal Editar Evento -->
						<div class="modal fade" id="editModal" tabindex="-1" role="dialog"
							aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Editar Evento</h4>
									</div>
									<fieldset disabled>
									<div class="modal-body">
										<?php echo form_open(site_url("calendar/edit_event"), array("class" => "form-horizontal")) ?>
										<div class="form-group col-md-6">
											<label for="id_beneficiario">Beneficiário</label>
											<select id="id_beneficiario" name="id_beneficiario" class="form-control"
												required>
												<?php foreach($beneficiario as $b){; ?>
												<option value="<?=$b->id;?>"><?=$b->beneficiario;?></option>
												<?php }; ?>
											</select>
										</div>
										<div class="form-group">
										<div class="col-md-6">
										<label for="status">Status</label>
											<select id="id_status" name="id_status" class="form-control" required>
												<?php foreach($status as $s){; ?>
												<option value="<?=$s->id;?>"><?=$s->status;?></option>
												<?php }; ?>
											</select>
										</div>
										</div>
										<div class="form-group col-md-6">
											<label for="segmento">Segmento</label>
											<select id="id_segmento" name="id_segmento" class="form-control">
												<?php foreach($segmento as $m){; ?>
												<option value="<?=$m->id;?>"><?=$m->segmento;?></option>
												<?php };?>
											</select>
										</div>
										<div class="form-group">
											<label for="valor" class="col-md-4 label-heading">Valor</label>
											<div class="col-md-6">
												<input type="text" class="money form-control" name="valor" id="valor"
													placeholder="R$ 0.000,00" reverse="true" required>
											</div>
										</div>
										<div class="form-group">
										<div class="col-md-12">
										<label for="codigo" class="col-md-4 label-heading">Código de Barras</label>
											<div class="col-md-12">
												<input type="text" class="form-control" name="codigo" id="codigo">
											</div>
										</div>
										</div>
										<div class="form-group">
											<label for="p-in" class="col-md-4 label-heading">Obsrevações</label>
											<div class="col-md-12 ui-front">
												<textarea class="form-control" id="obs" name="obs" rows="3"></textarea>
											</div>
                                        </div>
                                        
										<div class="form-group">
												<label for="p-in" class="col-md-4 label-heading">Deletar Evento</label>
												<div class="col-md-8">
													<input type="checkbox" id="delete" name="delete" value="1">
												</div>
                                        </div>
                                        									
										<div class="modal-footer">
											<button type="button" class="btn btn-default"
												data-dismiss="modal">Sair</button>
											<input type="submit" id="btn" class="btn btn-primary">
											<input type="hidden" name="id" id="id" value="0" />
											<input type="hidden" id="edit_data" name="edit_data">
											<?php echo form_close() ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						</fieldset>
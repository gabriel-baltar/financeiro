						<!--Modal Adicionar Evento -->
						<div class="modal fade" id="addModal" tabindex="-1" role="dialog"
							aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Adicionar Evento ao Calendário</h4>
									</div>
									<div class="modal-body">
										<?php echo form_open(site_url("calendar/add_event"), array("class" => "form-horizontal")) ?>
										<div class="form-group col-md-6">
											<label for="add_id_beneficiario">Beneficiario</label>
											<select id="add_id_beneficiario" name="add_id_beneficiario" class="form-control"
												required>
												<?php foreach($beneficiario as $b){; ?>
												<option value="<?=$b->id;?>"><?=$b->beneficiario;?></option>
												<?php }; ?>
											</select>
										</div>
										<div class="form-group">
											<label for="vencimento" class="col-md-4 label-heading">Data de
												Vencimento</label>
											<div class="col-md-6">
												<input placeholder="DD-MM-AAAA" type="text" class="form-control"
													name="add_vencimento" id="add_vencimento" data-mask="00/00/0000" required>
											</div>
										</div>
										<div class="form-group col-md-6">
											<label for="status">Status</label>
											<select id="add_id_status" name="add_id_status" class="form-control" required>
												<?php foreach($status as $s){; ?>
												<option value="<?=$s->id;?>"><?=$s->status;?></option>
												<?php }; ?>
											</select>
										</div>
										<div class="form-group">
											<label for="add_valor" class="col-md-4 label-heading">Valor</label>
											<div class="col-md-6">
												<input type="text" class="money form-control" name="add_valor" id="add_valor"
													placeholder="R$ 0.000,00" reverse="true" required>
											</div>
										</div>
										<div class="form-group col-md-6">
											<label for="add_id_segmento">Segmento</label>
											<select id="add_id_segmento" name="add_id_segmento" class="form-control">
												<?php foreach($segmento as $m){; ?>
												<option value="<?=$m->id;?>"><?=$m->segmento;?></option>
												<?php };?>
											</select>
										</div>
										<div class="form-group">
											<label for="p-in" class="col-md-4 label-heading">Obsrevações</label>
											<div class="col-md-6 ui-front">
												<textarea class="form-control" id="add_obs" name="add_obs" rows="3"></textarea>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default"
												data-dismiss="modal">Sair</button>
											<input type="submit" onclick="formataValor('2.500,99')"
												class="btn btn-primary" value="Adicionar Evento">
											<?php echo form_close() ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="container-fluid">
							<!--Modal Adicionar Evento -->
							<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
								arial-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
													aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Adicionar Evento ao Calendário</h4>
										</div>
										<div class="modal-body">
											<?php echo form_open(site_url("supervisor/add_event"), array("class" => "form-horizontal", "id" => "envia_form"))?>
											<div class="form-row">
												<div class="col-md-6">
													<label for="add_id_beneficiario">Beneficiário</label>
													<select id="add_id_beneficiario" name="add_id_beneficiario" class="form-control" required>
														<option></option>
														<?php foreach($beneficiario as $b){;?>
														<option value="<?=$b->id;?>"><?=$b->beneficiario;?></option>
														<?php };?>
													</select>
												</div>

												<div class="col-md-6">
													<label for="add_id_status">Status</label>
													<select id="add_id_status" name="add_id_status" class="form-control" required>
													<option></option>
														<?php foreach($status as $s){; ?>
														<option value="<?=$s->id;?>"><?=$s->status;?></option>
														<?php }; ?>
													</select>
												</div>

												<div class="col-md-6">
													<label for="add_id_segmento">Segmento</label>
													<select id="add_id_segmento" name="add_id_segmento" class="form-control" required>
													<option></option>
														<?php foreach($segmento as $m){; ?>
															<option value="<?=$m->id;?>"><?=$m->segmento;?></option>
														<?php };?>
													</select>
												</div>
												<div class="col-md-6">
													<label for="add_valor" class="label-heading">Valor</label>
													<input type="text" class="form-control label-heading" id="add_valor"
														placeholder="R$ 0.000,00" required name="add_valor">
												</div>

												<div class="col-md-12">
													<label for="add_codigo">Código de Barras</label>
													<input type="text" class="form-control" name="add_codigo" id="add_codigo"
														placeholder="Código de barras" required>
												</div>

												<div class="col-md-12">
													<label for="add_obs">Obsrevações</label>
													<textarea class="form-control" id="add_obs" name="add_obs" rows="3" placeholder="Observações"
														required></textarea>
												</div>
											</div>
											<div class="modal-footer">
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
											<input type="submit" class="btn btn-primary form-group" id="btn_add" value="Adicionar Evento">
											<input type="hidden" id="add_data" name="add_data">
											<?php echo form_close();?>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
						



						<script type="text/javascript">
								document.getElementById('btn_add').addEventListener("click", function(){
								var val = document.getElementById('add_id_beneficiario').value;
								var status = document.getElementById('add_id_status').value;
								var segmento = document.getElementById('add_id_segmento').value;
								if(val == 1 && status ==  1 && segmento == 1){
									alert("Favor selecionar uma opção");
								}else{
									document.getElementById('envia_form').submit();
								}
							})
						</script>

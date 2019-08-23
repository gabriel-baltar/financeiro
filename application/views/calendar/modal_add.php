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
											<?php echo form_open(site_url("supervisor/add_event"), array("class" => "form-horizontal"))?>
											<div class="form-row">
												<div class="col-md-6">
													<label for="add_id_beneficiario">Beneficiário</label>
													<select id="add_id_beneficiario" name="add_id_beneficiario" class="form-control"
														onclick="Selectbeneficiario()">
														<?php foreach($beneficiario as $b){;?>
														<option value="<?=$b->id;?>"><?=$b->beneficiario;?></option>
														<?php };?>
													</select>
												</div>

												<div class="col-md-6">
													<label for="add_id_status">Status</label>
													<select id="add_id_status" name="add_id_status" class="form-control">
														<?php foreach($status as $s){; ?>
														<option value="<?=$s->id;?>"><?=$s->status;?></option>
														<?php }; ?>
													</select>
												</div>

												<div class="col-md-6">
													<label for="add_id_segmento">Segmento</label>
													<select id="add_id_segmento" name="add_id_segmento" class="form-control">
														<?php foreach($segmento as $m){; ?>
														<option value="<?=$m->id;?>"><?=$m->segmento;?></option>
														<?php };?>
													</select>
												</div>
												<div class="col-md-6">
													<label for="add_valor" class="label-heading">Valor</label>
													<input type="text" class="form-control label-heading" name="add_valor" id="add_valor"
														placeholder="R$ 0.000,00" required>
												</div>

												<div class="col-md-12">
													<label for="add_codigo">Código de Barras</label>
													<input type="text" class="form-control" name="add_codigo" id="add_codigo"
														placeholder="Código de barras" required>
												</div>

												<div class="col-md-12">
													<label for="add_obs">Obsrevações</label>
													<textarea class="form-control" id="add_obs" name="add_obs" rows="3" placelholder="Ob"
														required></textarea>
												</div>
											</div>
											<div class="modal-footer">
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
											<input type="submit" class="btn btn-primary form-group" value="Adicionar Evento">
											<input type="hidden" id="add_data" name="add_data">
											<?php echo form_close();?>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>


						<!--<script type="text/javascript">
							function Selectbeneficiario(event, perc) {
								event.preventDefault();
								if (document.getElementById("add.id.beneficiario").value == "1") {
									alert("Selecione uma opção.");
								} else {}
							}

						</script>-->

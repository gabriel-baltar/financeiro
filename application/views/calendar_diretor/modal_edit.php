						<!--Modal Editar Evento -->
						<div class="modal fade" id="editModal" tabindex="-1" role="dialog"
							aria-labelledby="myModalLabel">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Editar Evento</h4>
									</div>
									<fieldset disabled>
									<div class="modal-body">
										<?php echo form_open(site_url("diretor/edit_event"), array("class" => "form-horizontal")) ?>
										<div class="form-row">
										<div class="col-md-6">
											<label for="beneficiario">Beneficiário</label>
											<input type="text" class="form-control" name="beneficiario" id="beneficiario" required>
										</div>
										
										<div class="col-md-6">
										<label for="status">Status</label>
											<select id="id_status" name="id_status" class="form-control" required>
												<?php foreach($status as $s){; ?>
												<option value="<?=$s->id;?>"><?=$s->status;?></option>
												<?php };?>
											</select>
										</div>
			
										<div class="col-md-6">
											<label for="segmento">Segmento</label>
											<select id="id_segmento" name="id_segmento" class="form-control">
												<?php foreach($segmento as $m){; ?>
												<option value="<?=$m->id;?>"><?=$m->segmento;?></option>
												<?php };?>
											</select>
										</div>
										<div class="col-md-6">
											<label for="valor" class="label-heading">Valor</label>
											<input type="text" class="money form-control" name="valor" id="valor"
													placeholder="R$ 0.000,00" reverse="true" required>
										</div>
										
										<div class="col-md-12">
											<label for="codigo" class="label-heading">Código de Barras</label>
											<input type="text" class="form-control" name="codigo" id="codigo">
										</div>
										
										<div class="col-md-12">
											<label for="obs" class="label-heading">Obsrevações</label>
											<textarea class="form-control" id="obs" name="obs" rows="3"></textarea>
											</div>
                                        </div>
                                        
										<div class="col-md-12">
											<label for="delete" class="label-heading">Deletar Evento</label>
											<input type="checkbox" id="delete" name="delete" value="1">
					                    </div>
									</div>
                                        									
										<div class="modal-footer col-md-12">
											<button type="button" class="btn btn-default"
												data-dismiss="modal">Sair</button>
											<input type="submit" id="btn" class="btn btn-primary">
											<input type="hidden" name="id" id="id" value="0" />
											<input type="hidden" id="edit_data" name="edit_data">
											<?php echo form_close() ?>
										</div>
									
										<div class="table">
										<table class="table table-hover">
													<thead>
														<tr>
															<th scope="col">Total do Dia</th>
															<th scope="col">Débito em aberto  (Mês)</th>
															<th scope="col">Total do Mês</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>R$ <span id="totalPagoDia"></span></td>
															<td>R$ <?=number_format($debitosMes['0']->valor, 2, ',', '.');?></td>
															<td>R$ <?=number_format($pagoMes['0']->valor, 2, ',', '.');?></td>
														</tr>
													</tbody>
												</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						</fieldset>
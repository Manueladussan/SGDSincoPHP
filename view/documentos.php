<h1 class="page-header">Documentos</h1>
	<table class="table table-bordered table-striped" id="documentos">
		<thead>
			<tr>
				<th style="text-align:center;">Id</th>
				<th style="text-align:center;">Nombre personalizado</th>
				<th style="text-align:center;">Nombre real</th>
				<th style="text-align:center;">Extension</th>
				<th style="text-align:center;">Mime Type</th>
				<th style="text-align:center;">Archivo</th>
				<th style="text-align:center;" >Editar</th>
				<th style="text-align:center;" >Eliminar</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		if(count($dataToView["data"])>0){
			foreach($dataToView as $key):				
				foreach($key as $r): ?>
					<tr>
						<td style="text-align:center;"><?php echo $r['id'] ?></td> 
						<td style="text-align:center;"><?php echo $r['nombre_personalizado'] ?></td> 
						<td style="text-align:center;"><?php echo $r['nombre_real']?></td>
						<td style="text-align:center;"><?php echo $r['extension'] ?></td>
						<td style="text-align:center;"><?php echo $r['mime_type'] ?></td>
						<td style="text-align:center;"><?php echo $r['archivo'] ?></td>
						<td>
						<a class="edit"><i class="fa fa-edit"></i></a>
						</td>
						<td>
							<a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="index.php?controller=documento&action=delete&id=<?php echo $r['id']; ?>&archivo=<?php echo $r['archivo']; ?>"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php endforeach; 
			endforeach; 
		}else{
			?>
			<div class="alert alert-info">
				Actualmente no existen documentos.
			</div>
			<?php
		}?>
		</tbody>
	</table>
	<div class="modal fade" id="modal-add-document">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Agregar documento</h4>
          </div>
          <form  id="addDocument" action="index.php?controller=documento&action=create" method="post" enctype="multipart/form-data">
          <div class="modal-body">  
              <div class="box-body">
			  	<div class="form-group">
                  <label class="control-label">Carga archivo</label>
                  <input type="file" class="form-control" id="archivo" name="archivo" required>
                </div>
					<div class="form-group">
					<label class="control-label">Nombre personalizado</label>
					<input type="text" class="form-control" id="nombre_personalizado" name="nombre_personalizado" placeholder="Nombre Personalizado" required>
					</div>
					<div class="form-group" hidden>
					<label class="control-label">Nombre real</label>
					<input type="text" class="form-control" id="nombre_real" name="nombre_real" placeholder="Nombre Real">
					</div>
					<div class="form-group" hidden>
					<label class="control-label">Extension</label>
					<input type="text" class="form-control" id="extension" name="extension" placeholder="Extensión">
					</div>
					<div class="form-group" hidden>
					<label class="control-label">Mime type</label>
					<input type="text" class="form-control" id="mime_type" name="mime_type" placeholder="Mime Type">
					</div>
				</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Agregar documento</button>
          </div>
          </form>
        </div>
      </div>
    </div>
	<div class="modal fade" id="modal-edit-document">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Editar documento</h4>
          </div>
          <form  id="editDocument" action="index.php?controller=documento&action=edit" method="post" enctype="multipart/form-data">
          <div class="modal-body">  
              <div class="box-body">
			  	<div class="form-group">
                  <label class="control-label">Carga archivo</label>
                  <input type="file" class="form-control" id="archivo_edit" name="archivo">
                </div>
				<div class="form-group">
					<label class="control-label">Nombre actual archivo</label>
					<input type="text" class="form-control" id="nombre_actual_edit" name="nombre_actual_edit" placeholder="Nombre Actual" readonly>
					</div>
					<div class="form-group">
					<label class="control-label">Nombre personalizado</label>
					<input type="text" class="form-control" id="nombre_personalizado_edit" name="nombre_personalizado" placeholder="Nombre Personalizado" required>
					</div>
					<div class="form-group" hidden>
					<label class="control-label">Nombre real</label>
					<input type="text" class="form-control" id="nombre_real_edit" name="nombre_real" placeholder="Nombre Real">
					</div>
					<div class="form-group" hidden>
					<label class="control-label">Extension</label>
					<input type="text" class="form-control" id="extension_edit" name="extension" placeholder="Extensión">
					</div>
					<div class="form-group" hidden>
					<label class="control-label">Mime type</label>
					<input type="text" class="form-control" id="mime_type_edit" name="mime_type" placeholder="Mime Type">
					</div>
					<div class="form-group" hidden>
					<input type="text" class="form-control" id="id_document" name="id_document">
					<input type="text" class="form-control" id="name_document" name="name_document">
					</div>
				</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Editar documento</button>
          </div>
          </form>
        </div>
      </div>
	</div>

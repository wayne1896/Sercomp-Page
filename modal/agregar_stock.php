<form class="form-horizontal"  method="post" name="add_stock">
<!-- Modal -->
<div id="add-stock" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Agregar Stock</h4>
        <button type="button" class="close" data-bs-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="quantity" class="col-sm-2 control-label">Cantidad</label>
            <div class="col-sm-6">
              <input type="number" min="1" name="quantity" class="form-control" id="quantity" value="" placeholder="Cantidad" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="reference" class="col-sm-2 control-label">Referencia</label>
            <div class="col-sm-6">
              <input type="text" name="reference" class="form-control" id="reference" value="" placeholder="Referencia">
            </div>
          </div>
          
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
		<button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>

  </div>
</div> 
 </form>
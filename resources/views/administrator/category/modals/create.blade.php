<div class="modal fade" id="modal-create-element">
    <form action="{{ route('category.content.create') }}" method="post" class="modal-dialog" data-asyn="no" data-info="reset" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Crear</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Título">
                </div>
                <div class="form-group">
                    <textarea name="content_1" class="ckeditor" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Banner</label>
                    <input type="file" name="image" class="form-control-file">
                    <small>tamaño recomendado 1366x344</small>
                </div>   
                <div class="form-group">
                    <label for="">Imagen</label>
                    <input type="file" name="image_2" class="form-control-file">
                    <small>tamaño recomendado 500x380</small>
                </div> 
                <div class="form-group">
                    <label for="">Ficha técnica</label>
                    <input type="file" name="data_sheet" class="form-control-file">
                </div>    
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>
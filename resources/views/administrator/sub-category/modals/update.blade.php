<div class="modal fade" id="modal-update-element">
    <form action="{{ route('sub-category.content.update') }}" method="post" id="form-update-slider" class="modal-dialog" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body">
            <input type="hidden" name="id">
            <div class="form-group">
                <input type="text" name="order" class="form-control" placeholder="Ej AA BB">
            </div>
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Nombre" readonly>
            </div>
            <div class="form-group">
                <select name="category_id"  class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" id="category{{$category->id}}">{{strip_tags($category->name)}}</option>
                    @endforeach
                </select>
            </div>  
            <div class="form-group">
                <label for="">Imagen</label>
                <input type="file" name="image" class="form-control-file">
                <small>tamaño recomendado 500x380</small>
            </div>   
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>
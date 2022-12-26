<div class="modal fade" id="modal-create-element">
    <form action="{{ route('sub-category.content.create') }}" method="post" class="modal-dialog" data-info="reset" enctype="multipart/form-data">
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
                    <input type="text" name="order" class="form-control" placeholder="Ej AA AB BB">
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Título">
                </div>
                <div class="form-group">
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{strip_tags($category->name)}}</option>
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
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>
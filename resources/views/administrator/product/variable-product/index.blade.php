@if ($product->variableProducts()->count())
<div class="card card-primary">
    <div class="card-header">Medidas</div>
    <div class="card-body">
        @foreach ($product->variableProducts as $vp)
            <form action="{{ route('variable-product.content.update') }}" class="form-update-variable-product">
                @csrf
                <input type="hidden" name="id" value="{{$vp->id}}">
                <div class="table-responsive">
                    <table class="table">
                        <td>
                            <div class="form-group d-flex align-items-center">
                                <input type="text" name="diameter" value="{{$vp->diameter}}" placeholder="Diámetro interno" class="form-control">
                            </div>
                        </td>
                        <td>
                            <div class="form-group d-flex align-items-center">
                                <input type="text" name="width" value="{{$vp->width}}" placeholder="Ancho" class="form-control">
                            </div>
                        </td>
                        <td>
                            <div class="form-group d-flex align-items-center">
                                <input type="text" name="weight" value="{{$vp->weight}}" placeholder="Peso" class="form-control">
                            </div>
                        </td>
                        <td>
                            <div class="form-group d-flex align-items-center">
                                <input type="text" name="long" value="{{$vp->long}}" placeholder="Largo" class="form-control">
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger rounded-pill variable-product-destroy far fa-trash-alt" data-url="{{ route('variable-product.content.destroy', ['id' => $vp->id]) }}"></button>
                            <button type="submit" class="btn btn-sm btn-primary variable-product-update far fa-edit rounded-pill" data-url="{{ route('variable-product.content.update') }}"></button>                            
                        </td>
                    </table>
                </div>
            </form>   
        @endforeach
    </div>
    <div class="card-footer"></div>
</div> 
@endif
<div class="card card-primary">
    <div class="card-header">Medidas</div>
    <div class="card-body">
        <form action="{{ route('variable-product.content.store') }}" class="form-store-variable-product">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <div class="table-responsive">
                <table class="table">
                    <td>
                        <div class="form-group d-flex align-items-center">
                            <input type="text" name="diameter" placeholder="Diámetro interno" class="form-control">
                        </div>
                    </td>
                    <td>
                        <div class="form-group d-flex align-items-center">
                            <input type="text" name="width" placeholder="Ancho" class="form-control">
                        </div>
                    </td>
                    <td>
                        <div class="form-group d-flex align-items-center">
                            <input type="text" name="weight" placeholder="Peso" class="form-control">
                        </div>
                    </td>
                    <td>
                        <div class="form-group d-flex align-items-center">
                            <input type="text" name="long" placeholder="Largo" class="form-control">
                        </div>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-sm btn-primary far fa-save variable-product-create rounded-pill" data-url="{{ route('variable-product.content.store') }}"></button>
                    </td>
                </table>
            </div>
        </form>
    </div>
    <div class="card-footer"></div>
</div>
<div class="modal fade modal-slide-in-right" aria-hidden="true" 
     role="dialog" tabindex="-1" id="modal-delete-{{$cat->idcategoria_noticia}}">
    {{Form::Open(array(
            'action'=>array('CategoriaNoticiaController@destroy',
            $cat->idcategoria_noticia), 'method'=>'delete'
                    ))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Eliminar Categoría de esta noticia</h4>
            </div>
            <div class="modal-body">
                <p>Confirme eliminación de la categoría {{$cat->idcategoria_noticia}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                    Cerrar
                </button>
                <button type="submit" class="btn btn-primary">
                    Confirmar
                </button>
            </div>
        </div>
    </div>   
    {{Form::close()}}
</div>

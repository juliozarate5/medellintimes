<div class="modal fade modal-slide-in-right" aria-hidden="true" 
     role="dialog" tabindex="-1" id="modal-delete-{{$not->idnoticia}}">
    {{Form::Open(array(
            'action'=>array('NoticiaController@destroy',
            $not->idnoticia), 'method'=>'delete'
                    ))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Ocultar para siempre noticia</h4>
            </div>
            <div class="modal-body">
                <p>Confirme eliminación de la noticia {{$not->idnoticia}}</p>
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

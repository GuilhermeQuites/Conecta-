$(document).ready(function (){
    $('a[data-confirm]').click(function(ev){
        var href = $(this).attr('href');
        if(!$('#modal-exclusao').length){
            $('body').append(
                '<div class="modal-info-confirmed modal fade show" id="modal-exclusao" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-xs modal-info  modal-xs" role="document"><div class="modal-content "><div class="modal-body"><h6 class="modal-title">Tem certeza que deseja excluir esse Lead?</h6></div><form action="" method="post"><div class="admin__button-group button-group d-flex pt-1 justify-content-md-end justify-content-center mt-10 mb-10"><button id="excluir" type="submit" name="excluir" value="excluir" class="btn btn-danger btn-default btn-rounded mr-10">Sim</button><button class="btn btn-light btn-default btn-rounded mr-10">Não</button></div></form></div></div></div>'
            )
        }
        $('excluir').attr('href', href)
        $('#modal-exclusao').modal({shown: true})
        return false
    })

    $('#excluir').attr('href', href);
    
})


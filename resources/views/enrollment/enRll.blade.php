<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    
            <div class="form-group mb-2">
                            <label for="drug" class="m-2 font-weight-bold text-success">Agregar medicamento</label>
                <select class="form-control drugs @error('drug') is-invalid @enderror" name="subject[]" id="subject" multiple="multiple"></select>
                @error('drug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            </div>

            </div>
        <div class="modal-footer"></div>
    </div>

</div>
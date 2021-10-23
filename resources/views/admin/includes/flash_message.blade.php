<div>
    @if(session()->get('success'))
        <div class="pull-alert">
            <div class="alert alert-success pull-right" >
                <button onclick="$('.alert').fadeOut()" type="button" class="btn btn-default btn-circle btn-xl-alert btn-lateral btn-float-alert"><i class="glyphicon glyphicon-remove"></i></button>
                <hr class="hr-alert">
                <strong>{{ session()->get('success') }}</strong>
            </div>
        </div>
    @endif
</div>
<div>
    @if(session()->get('error'))
        <div class="pull-alert">
            <div class="alert alert-error pull-right" >
                <button onclick="$('.alert').fadeOut()" type="button" class="btn btn-default btn-circle btn-xl-alert btn-lateral btn-float-alert"><i class="glyphicon glyphicon-remove"></i></button>
                <hr class="hr-alert">
                <strong>{{ session()->get('error') }}</strong>
            </div>
        </div>
    @endif
</div>


<div class="row">

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="name">Nome</label>
        <input class="form-control" id="name" type="text" name="name" value="{{ $user->name ?? '' }}">
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="email">E-mail</label>
        <input class="form-control" id="email" type="text" name="email" value="{{ $user->email ?? '' }}">
        </div>    
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="email-verified-at">Confirmação do e-mail</label>
        <input class="form-control" type="text" id="email-verified-at" name="email_verified_at">    
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="phone">Telefone/Celular/Whatsapp</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone ?? '' }}">
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label for="address">Endereço</label>
            <input class="form-control" type="text" id="address" name="address" value="{{ $user->address ?? '' }}">    
            </div>
    </div>    

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="city">Cidade</label>
        <input class="form-control" type="text" id="city" name="city" value="{{ $user->city ?? '' }}">    
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="state">Estado</label>
        <input class="form-control" type="text" id="state" name="state" value="{{ $user->state ?? ''}}" >    
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="membership">Ano de filiação</label>
        <input class="form-control" type="text" id="membership" name="membership"  value="{{ $user->membership ?? '' }}">    
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="birthday">Data de nascimento</label>
            <input class="form-control" type="text" id="birthday" name="birthday" value="{{ $user->birthday ?? '' }}">    
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="rg">RG</label>
            <input class="form-control" type="text" id="rg" name="rg" value="{{ $user->rg ?? '' }}">    
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input class="form-control" type="text" id="cpf" name="cpf" value="{{ $user->cpf ?? '' }}">    
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="bloody">Tipo sanguíneo</label>
            <input class="form-control" type="text" id="blood" name="blood" value="{{ $user->blood ?? '' }}">    
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="healthcare">Convênio médico</label>
            <input class="form-control" type="text" id="healthcare" name="healthcare" value="{{ $user->membership ?? '' }}">    
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="cbm">Participou do curso básico de montanhismo?</label>
            <select class="form-control" id="cbm" name="cbm" value="{{ $user->cbm ?? '' }}">
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>    
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="cbm-institution">Em qual entidade?</label>
            <input class="form-control" type="text" id="cbm-institution" name="cbm_institution" value="{{ $user->cbm_institution ?? '' }}">    
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="number">Número de sócio</label>
            <input class="form-control" type="text" id="number" name="number" value="{{ $user->number ?? '' }}">    
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label for="photo">Foto</label>
            <input class="form-control-file" type="file" id="photo" name="photo">    
        </div>
    </div>

</div>

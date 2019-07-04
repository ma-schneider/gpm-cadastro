@extends('layouts.app')

@section('title')
    Cadastro
@endsection

@section('content')
    <form action="{{ route('socios.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('POST')

        <div class="row">

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input class="form-control" id="name" type="text" name="name">
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input class="form-control" id="email" type="text" name="email">
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
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="address">Endereço</label>
                        <input class="form-control" type="text" id="address" name="address">    
                    </div>
            </div>    

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="city">Cidade</label>
                    <input class="form-control" type="text" id="city" name="city">    
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="state">Estado</label>
                    <input class="form-control" type="text" id="state" name="state">    
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="membership">Ano de filiação</label>
                    <input class="form-control" type="text" id="membership" name="membership">    
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="birthday">Data de nascimento</label>
                    <input class="form-control" type="text" id="birthday" name="birthday">    
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="rg">RG</label>
                    <input class="form-control" type="text" id="rg" name="rg">    
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input class="form-control" type="text" id="cpf" name="cpf">    
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="bloody">Tipo sanguíneo</label>
                    <input class="form-control" type="text" id="blood" name="blood">    
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="healthcare">Convênio médico</label>
                    <input class="form-control" type="text" id="healthcare" name="healthcare">    
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="cbm">Participou do curso básico de montanhismo?</label>
                    <select class="form-control" id="cbm" name="cbm">
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>    
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="cbm-institution">Em qual entidade?</label>
                    <input class="form-control" type="text" id="cbm-institution" name="cbm_institution">    
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="number">Número de sócio</label>
                    <input class="form-control" type="text" id="number" name="number">    
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="photo">Foto</label>
                    <input class="form-control-file" type="file" id="photo" name="photo">    
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password">    
                </div>
            </div>

        </div>

        <button class="btn btn-primary" type="submit" dusk="register">Cadastrar</button>
    </form>
@endsection
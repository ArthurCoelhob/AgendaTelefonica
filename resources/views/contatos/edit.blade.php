<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Agenda Telefonica</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Editar contato</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('contatos.index') }}" enctype="multipart/form-data">
                        Voltar</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('contatos.update',$contato->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nome:</strong>
                        <input type="text" name="nome" value="{{ $contato->nome }}" class="form-control"
                            placeholder="Nome contato">
                        @error('nome')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Idade:</strong>
                        <input type="text" name="idade" value="{{ $contato->idade }}" class="form-control"
                            placeholder="Idade contato">
                        @error('idade')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Numero:</strong>
                        <input type="text" name="numero" value="{{ $contato->numero }}" class="form-control"
                            placeholder="Company Address">
                        @error('numero')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Salvar</button>
            </div>
        </form>
    </div>
</body>

</html>
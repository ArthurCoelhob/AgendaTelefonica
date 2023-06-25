<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Agenda Telefonica</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Agenda Telefonica</h2>
                </div>
            </div>
        </div>
        <form action="{{ route('contatos.search') }}">
            <div class="mb-2">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" name="nome" class="form-control" id="nome" aria-describedby="emailHelp">
            </div>
            <div class="mb-2">
              <label for="numero" class="form-label">Numero</label>
              <input type="text" name="numero" class="form-control" id="numero">
            </div>
            <div class="d-grid gap-2 d-md-flex mb-3 justify-content-md-end">
                <button class="btn btn-primary me-md-2 mr-2" type="submit">Pesquisar</button>
                <form action="{{ route('contatos.index') }}">
                    <button type="submit" class="btn btn-danger  me-md-2 mr-2">Limpar Pesquisa</button>
                </form>
                <form action="{{ route('contatos.create') }}">
                    <button type="submit" class="btn btn-success  me-md-2 mr-2">Criar contato</button>
                </form>
                <form action="{{ route('contatos.log') }}">
                    <button type="submit" class="btn btn-danger  me-md-2 mr-2">Log excluidos</button>
                </form>
            </div>   
          </form>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contatos as $contato)
                    <tr>
                        <td>{{ $contato->id }}</td>
                        <td>{{ $contato->nome }}</td>
                        <td>{{ $contato->idade }}</td>
                        <td>{{ $contato->numero }}</td>
                        <td><form>
                            <a class="btn btn-primary col-lg-12"  href="{{ route('contatos.edit',$contato->id) }}">Editar</a>
                        </form></td>
                        <td>
                            <form action="{{ route('contatos.destroy',$contato->id) }}" method="Post">
                                <button type="submit" class="btn btn-danger col-lg-12 ">Excluir</button>
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> Atualizar livros </h3>
        </div>

        <form pb-autologin="true" autocomplete="off" method="POST" action="{{ route('admin.livros.update', [$livro->id]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="role">Permissão User: </label>
                    <select class="form-control" name="role" id="role" value="value{{ $livro->role }}">
                        <option value="free">Free</option>
                        <option value="premium">Premium</option>
                        <option value="master">Master</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="titulo">Titulo do livro: </label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $livro->titulo }}">
                    @error('titulo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="editora">Editora do livro: </label>
                    <input type="text" class="form-control" id="editora" name="editora" value="{{ $livro->editora }}">
                    @error('editora')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="genero_id">Genero do livro:</label>
                    <select class="form-control" name="genero_id" id="genero_id">
                        @foreach ($generos as $key => $genero)
                            <option value={{ $key }}>{{ $genero }}</option>
                        @endforeach
                    </select>
                    @error('genero_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição do livro:</label>
                    <textarea class="form-control" rows="3" name="descricao" id="descricao">{{ $livro->descricao }}</textarea>
                    @error('descricao')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                @if (!is_null($livro->imagem) && strlen($livro->imagem) > 0 )
                    <div class="row">
                        <div class="col-md-3">
                            <img src="/img/livros/{{ $livro->imagem }}" />
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-warning"
                                href="{{ route('admin.livros.delete.image', ['imagem', $livro->id]) }}">Excluir imagem</a>
                        </div>
                    </div>
                @else
                    <div class="form-group">
                        <label for="imagem">Insira Sua Imagem</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="imagem" id="imagem" name="imagem">
                                <label class="custom-file-label" for="imagem">Imagem do livro:</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        @error('imagem')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                @endif

                @if (!is_null($livro->pdf) && strlen($livro->pdf) > 0 )
                    <div class="row">
                        <div class="col-md-3">
                            <img src="/img/livros/{{ $livro->pdf }}" />
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-warning"
                                href="{{ route('admin.livros.delete.image', ['pdf', $livro->id]) }}">Excluir PDF</a>
                        </div>
                    </div>
                @else
                    <div class="form-group">
                        <label for="pdf">Insira Seu Pdf</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="imagem" id="pdf" name="pdf">
                                <label class="custom-file-label" for="pdf">PDF livro:</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        @error('imagem')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                @endif

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop

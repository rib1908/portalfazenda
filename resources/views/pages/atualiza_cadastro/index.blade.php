<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/brasão.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/brasão.png') }}">
    <title> SEMEF - Portal Fazenda</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/42d5adcbca.js') }}" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet" />

    <style>
        .footer {
            position: fixed;
            bottom: 1px;
            width: 100%;
            background-color: #f8fafc;
            color: black;
            text-align: center;
            font-size: 12px;

        }
    </style>
</head>

<body>

    <nav class="navbar bg-light shadow-sm mb-3">
        <div class="container">
            <img id="logonav" src="{{ asset('img/logoretangular.jpg') }}" height="70vh"
                alt="Logotipo Prefeitura de Mesquita">

            {{-- <a href="{{ asset('assets/pdf/manual-de-utilizacao.pdf') }}" target="_blank" class="btn btn-primary">Manual
                de Utilização
            </a> --}}
            {{-- aaa --}}
        </div>
    </nav>

    <div id="app">
        @include('flash-message')

        @yield('content')
    </div>



    <div class="container-fluid" style="width: 80%">
        <div class="card mb-6">

            <div class="card-header" style="margin-bottom: -26px">
                <h6 class="text-center">Atualize suas informações</h6>
                <hr class="horizontal dark my-3">
            </div>

            <div class="card-body" style="padding: 0rem 1rem">
                <div style="font-weight: bold;font-size: 13px;color: red">
                    Campos com * são obrigatórios
                </div>

                {{-- https://qrco.de/IPTU2023 --}}
                {{-- https://egov.mesquita.rj.gov.br/ --}}
                <form onsubmit="return submitForm(this);" action="{{ url('/atualizacaocadastral') }}" method="post">
                    {{ csrf_field() }}
                    {{-- <h5 class="text-uppercase">IDENTIFICAÇÃO DO DECLARANTE</h5> --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* Nome Completo</label>
                                <input class="form-control" value="{{ old('nome') }}" type="text" id="nome"
                                    name="nome" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email" class="form-control-label">* Email</label>
                                <input class="form-control" value="{{ old('email') }}" type="email" name="email"
                                    id="email" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* CPF:</label>
                                <input class="form-control" value="{{ old('cpf') }}" type="text" name="cpf"
                                    id="cpf" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* Data de Nascimento:</label>
                                <input class="form-control" value="{{ old('data_nascimento') }}"
                                    placeholder="xx/xx/xxxx" type="text" name="data_nascimento" id="data_nascimento"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="celular" class="form-control-label">* Celular</label>
                                <input class="form-control" type="text" name="celular" id="celular"
                                    value="{{ old('celular') }}" placeholder="(xx)xxxxx-xxxx" required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* Nome da Mãe</label>
                                <input class="form-control" value="{{ old('nome_mae') }}" type="text"
                                    name="nome_mae" id="nome_mae" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="EstadoCivil" class="form-control-label">Estado Civil</label>
                                <select class="form-control" name="EstadoCivil" id="EstadoCivil">
                                    <option value="" selected>Selecione</option>
                                    <option value="Solteiro">Solteiro(a)</option>
                                    <option value="Casado">Casado(a)</option>
                                    <option value="Divorciado">Divorciado(a)</option>
                                    <option value="Viúvo">Viúvo(a)</option>
                                    <option value="Separado">Separado(a)</option>
                                </select>
                            </div>
                        </div>

                        <hr>
                        <p style="text-align: center"> Dados do imóvel</p>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* CEP</label>
                                <input class="form-control" value="{{ old('cep') }}" type="text"
                                    name="cep" id="cep" onblur="pesquisacep(this.value);" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* Logradouro</label>
                                <input class="form-control" value="{{ old('rua') }}" type="text"
                                    name="rua" id="rua" required readonly>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* Bairro</label>
                                <input class="form-control" value="{{ old('bairro') }}" type="text"
                                    name="bairro" id="bairro" required readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* Municipio</label>
                                <input class="form-control" value="{{ old('municipio') }}" type="text"
                                    name="municipio" id="municipio" required readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* Estado</label>
                                <input class="form-control" value="{{ old('estado') }}" type="text"
                                    name="estado" id="estado" required readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">* Numero</label>
                                <input class="form-control" value="{{ old('numero') }}" type="text"
                                    name="numero" id="numero" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label"> Complemento</label>
                                <input class="form-control" value="{{ old('complemento') }}" type="text"
                                    name="complemento" id="complemento">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="AnoAquisicao" class="form-control-label">Ano de aquisição do
                                    imóvel</label>
                                <input class="form-control" value="{{ old('AnoAquisicao') }}" type="number"
                                    name="AnoAquisicao" id="AnoAquisicao" min="1900" max="2099"
                                    step="1" placeholder="Ex: 2024">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="NomeAquisicao" class="form-control-label">Nome de quem adquiriu o
                                    imóvel</label>
                                <input class="form-control" value="{{ old('NomeAquisicao') }}" type="text"
                                    name="NomeAquisicao" id="NomeAquisicao">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="residentes_extras" class="form-control-label">Há outros moradores?</label>
                                <select class="form-control" name="residentes_extras" id="residentes_extras">
                                    <option value="" selected>Selecione</option>
                                    <option value="Sim">sim</option>
                                    <option value="Nao">Não</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="herdeiros" class="form-control-label">Possui hedeiros??</label>
                                <select class="form-control" name="herdeiros" id="herdeiros">
                                    <option value="" selected>Selecione</option>
                                    <option value="Sim">sim</option>
                                    <option value="Nao">Não</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" id="btn_salvar" class="btn btn-primary">Atualizar Dados</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modaleventclick" tabindex="-1" role="dialog"
        aria-labelledby="modaleventclickLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaleventclickLabel">Aguarde, Enviando Declaração</h5>
                </div>

                <div class="modal-body">
                    <center>
                        <div class="loader"></div>
                    </center>
                </div>
            </div>
        </div>
    </div>




    <div class="footer" style="border-top: ridge;">
        <div class="row" style="align-items: center;">
            <div class="col-md-3">
                © 2024, EQUIPE DE DESENVOLVIMENTO DE SISTEMAS
            </div>

            <div class="col-md-3">
                <a rel="noreferrer" target="_blank" href="http://devs.mesquita.rj.gov.br/membros">
                    <svg class="inline" viewBox="0 0 24 24" fill="currentColor" width="18" height="18"
                        xmlns="http://www.w3.org/2000/svg">
                        <title></title>
                        <path
                            d="M23.967 12.317c0 2.5-.854 4.718-2.598 6.681-.635.729-1.143 1.076-1.488 1.076-.121 0-.256-.033-.346-.125-.092-.096-.15-.223-.15-.35 0-.188.225-.475.674-.889 1.814-1.736 2.727-3.895 2.727-6.456 0-2.846-.943-5.152-2.816-6.936-.374-.342-.57-.627-.57-.852 0-.12.061-.256.164-.345.105-.09.225-.149.346-.149.418 0 1.049.509 1.842 1.527C23.25 7.402 24 9.694 24 12.345l-.033-.028zM0 11.682c0-2.499.854-4.719 2.598-6.681.635-.729 1.143-1.076 1.49-1.076.119 0 .254.033.344.125.09.095.15.189.15.314 0 .188-.225.477-.674.918-1.781 1.744-2.711 3.895-2.711 6.462 0 2.847.951 5.158 2.821 6.935.38.344.569.633.569.854 0 .127-.061.256-.16.348-.099.094-.225.16-.352.16-.436 0-1.033-.51-1.828-1.518C.734 16.654 0 14.373 0 11.682zm17.699 6.869H6.715c-.35 0-.668-.287-.668-.666 0-.383.285-.668.668-.668h10.984c.348 0 .668.285.668.668-.006.385-.287.666-.668.666zm-6-8.919c.197-.025.344.615.361.749.046.353-.071.693-.231 1.003-.597 1.165-1.978 2.104-1.612 3.575.166.635.494 1.076 1.514 1.619-.345.119-.824-.111-1.094-.301-1.199-.816-1.963-2.156-1.888-3.619.03-.464.12-.92.239-1.368.375-1.281 1.139-2.401 1.588-3.647.225-.599.39-1.324.211-1.953-.09-.309-.255-.599-.465-.849-.061-.076-.404-.465-.539-.42.6-.225 1.139-.016 1.662.299.404.24.72.585.959.975.449.719.629 1.542.719 2.381.031.345-.015 1.184.39 1.35.419.179.749-.525.839-.81.195-.645-.06-1.259-.314-1.858.061.121.285.255.389.346l.36.344c.435.449.704 1.004.884 1.604.164.539.24 1.093.27 1.633.074 1.123-.18 2.278-.629 3.311-.195.463-.449.898-.779 1.273-.319.373-.748.613-1.093.957.808-.809 1.238-2.127 1.123-3.131-.06-.553-.239-1.063-.659-1.572 0 0 .045.358.087.583.075.495-.255 1.02-.644.959-.285-.029-.136-.643-.105-.838.105-.584-.03-1.154-.244-1.693-.209-.509-.6-.914-1.198-.823l-.101-.079z">
                        </path>
                    </svg></a> SUBSECRETARIA DA TECNOLOGIA DA INFORMAÇÃO - PREFEITURA MUNICIPAL DE MESQUITA - RJ
            </div>

            <div class="col-md-3">
                RUA ARTHUR OLIVEIRA VECCHI, 120 - CENTRO - MESQUITA - RJ - CEP: 26553-080
            </div>
            <div class="col-md-3">
                <a rel="noreferrer" target="_blank" href="https://lgpd.mesquita.rj.gov.br/?page_id=43">POLÍTICA DE
                    PRIVACIDADE</a>
            </div>

        </div>
    </div>
</body>

</html>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('assets/js/vanillaMasker.min.js') }}"></script>

<script>
    VMasker($("#cpf")).maskPattern("999.999.999-99");
    VMasker($("#data_nascimento")).maskPattern("99/99/9999");
    VMasker($("#celular")).maskPattern("(99)99999-9999");
    VMasker($("#telefone_fixo")).maskPattern("(99)9999-9999");
    VMasker($("#rg")).maskPattern("99.999.999-9");
    // $(window).on('load', function() {

    //     swal({
    //     title: "Estamos passando por manutenção, Retornaremos em Breve!",
    //     }).then((result) => {

    //         window.location.href = "{{ route('inicio') }}";

    //     });
    // });

    function submitForm(form) {
        // Obtem o valor do CEP e remove caracteres não numéricos
        const cep = document.getElementById('cep').value.replace(/\D/g, '');
        const rua = document.getElementById('rua').value.trim();
        const bairro = document.getElementById('bairro').value.trim();
        const municipio = document.getElementById('municipio').value.trim();
        const estado = document.getElementById('estado').value.trim();

        // Verifica se o CEP está no formato válido
        const validacep = /^[0-9]{8}$/;
        if (!validacep.test(cep)) {
            alert("Por favor, insira um CEP válido.");
            return false; // Impede o envio do formulário
        }

        // Verifica se os campos de endereço estão preenchidos
        if (!rua || !bairro || !municipio || !estado) {
            alert("Por favor, complete os campos de endereço antes de enviar.");
            return false; // Impede o envio do formulário
        }

        return true; // Permite o envio do formulário
    }
</script>

<script>
    function limpa_formulário_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('rua').value = ("");
        document.getElementById('bairro').value = ("");
        document.getElementById('municipio').value = ("");
        document.getElementById('estado').value = ("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value = (conteudo.logradouro);
            document.getElementById('bairro').value = (conteudo.bairro);
            document.getElementById('municipio').value = (conteudo.localidade);
            document.getElementById('estado').value = (conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value = "...";
                document.getElementById('bairro').value = "...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor
            limpa_formulário_cep();
        }
    };
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Swal.fire({
        title: 'Aviso!',
        text: 'Este é um alerta simples com SweetAlert.',
        icon: 'info',
        confirmButtonText: 'OK'
    });
</script>

<?php
$imageYes = $already_associated === 'y' ? 'icon-radiobutton-checked.png' : 'icon-radiobutton.png';
$imageNo = $already_associated === 'n' ? 'icon-radiobutton-checked.png' : 'icon-radiobutton.png';
$imageAgree = $auth_agree == '1' ? 'icon-checkbox-selected.png' : 'icon-checkbox.png';

// Mapeando os nomes dos meses
$mappingPortuguesesMonths = array(
    'January' => 'Janeiro',
    'February' => 'Fevereiro',
    'March' => 'Março',
    'April' => 'Abril',
    'May' => 'Maio',
    'June' => 'Junho',
    'July' => 'Julho',
    'August' => 'Agosto',
    'September' => 'Setembro',
    'October' => 'Outubro',
    'November' => 'Novembro',
    'December' => 'Dezembro'
);
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100;1,300&display=swap" rel="stylesheet"> --}}
        <style>
            @page {
                /* using padding , still same output */
                margin: 0;
            }
            * {
                font-family: 'Arial', sans-serif;
            }
            body {
                background-color: #F1F2F2;
            }
            .center { text-align: center; }
            .max {
                width: 2480px;
                height: 3508px;
            }
            .logo {
                text-align: center;
                padding: 80px 0 100px;
            }
            .content {
                background-color: #FFFFFF;
                margin: 10px 25px 10px 25px;
                height: 2960px;
                padding: 20px 120px;
            }
            .first-title {
                font-size: 1.2em;
                text-align: center;
                color: #E34548;
                font-weight: bold;
                margin: 40px 0 60px;
            }
            .title {
                font-size: 1.2em;
                text-align: center;
                color: #E34548;
                font-weight: bold;
                margin: 120px 0 60px;
            }
            .fields .label, .agree-fields .label {
                font-size: 0.6em;
                font-weight: bold;
                color: #9D9A9A;
                margin-top: 20px;
            }

            .fields .input {
                font-size: 0.6em;
                color: #A11E21;
                /* border: solid 1px #A11E21; */
                /* border-radius: 40px; */
                padding: 10px 0;
                font-weight: normal;
            }

            .line {
                display: flex;
            }

            .union-registration {
                margin-top: 40px;
            }

            .section-agree {
                margin-top: 160px;
            }

            .agree-paragraph {
                font-size: 0.6em;
                color: #2b2e31;
            }

            .agree-fields .agree-input {
                font-size: 0.6em;
                color: #A11E21;
                border: solid 1px #9D9A9A;
                border-radius: 40px;
                padding: 10px 20px;
                font-weight: normal;
            }

            .agree-signature {
                color: #A11E21;
                font-size: 0.6em;
                text-align: center;
            }
        </style>
    </head>
    <body class="max">
        <section class="logo">
            <img src="{{public_path('assets')}}/images/print-logo.png" width="601" height="281">
        </section>
        <section class="content">
            <section class="union-registration">
                <table width="25%" cellspacing="0">
                    <tr>
                        <td width="25%">
                            <div class="agree-fields">
                                <div class="label">Matrícula Sindical</div>
                                <div class="agree-input">&nbsp;</div>
                            </div>
                        </td>
                    </tr>
                </table>
            </section>
            <section class="comercial-section">
                <div class="first-title">Dados Comerciais</div>
                <table width="100%" cellspacing="10">
                    <tr>
                        <td width="25%">
                            <div class="fields">
                                <div class="label">Banco</div>
                                <div class="input">{{ $bank }}</div>
                            </div>
                        </td>
                        <td width="25%">
                            <div class="fields">
                                <div class="label">COD do banco</div>
                                <div class="input">{{ $code_bank }}</div>
                            </div>
                        </td>
                        <td width="25%">
                            <div class="fields">
                                <div class="label">Agência</div>
                                <div class="input">{{ $agency }}</div>
                            </div>
                        </td>
                        <td width="25%">
                            <div class="fields">
                                <div class="label">Data de admissão</div>
                                <div class="input">{{ $admission_date }}</div>
                            </div>
                        </td>
                    </tr>
                </table>
                <table width="100%" cellspacing="10">
                    <tr>
                        <td width="40%">
                            <div class="fields">
                                <div class="label">Telefone comercial</div>
                                <div class="input">{{ $commercial_phone }}</div>
                            </div>
                        </td>
                        <td width="25%">
                            <div class="fields">
                                <div class="label">Ramal</div>
                                <div class="input">{{ $extension }}</div>
                            </div>
                        </td>
                        <td width="35%">
                            <div class="fields">
                                <div class="label">Já foi associado à este sindicato?</div>
                                <div class="input">
                                    <table border="0">
                                        <tr>
                                            <td><img src="{{public_path('assets')}}/images/{{$imageNo}}" width="56" height="56"></td>
                                            <td><div style="width: 5px;"></div></td>
                                            <td>Não</td>

                                            <td><div style="width: 40px;"></div></td>

                                            <td><img src="{{public_path('assets')}}/images/{{$imageYes}}" width="56" height="56"></td>
                                            <td><div style="width: 5px;"></div></td>
                                            <td>Sim</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                <table width="100%" cellspacing="10">
                    <tr>
                        <td width="30%">
                            <div class="fields">
                                <div class="label">Matrícula funcional</div>
                                <div class="input">{{ $registration }}</div>
                            </div>
                        </td>
                        <td width="25%">
                            <div class="fields">
                                <div class="label">Cargo/Função</div>
                                <div class="input">{{ $position }}</div>
                            </div>
                        </td>
                        <td width="45%">
                            <div class="fields">
                                <div class="label">E-mail comercial</div>
                                <div class="input">{{ $commercial_email }}</div>
                            </div>
                        </td>
                    </tr>
                </table>
            </section>
            <section>
                <div class="title">Dados Pessoais</div>
                <table width="100%" cellspacing="10">
                    <tr>
                        <td width="33%">
                            <div class="fields">
                                <div class="label">CPF</div>
                                <div class="input">{{ $cpf }}</div>
                            </div>
                        </td>
                        <td width="34%">
                            <div class="fields">
                                <div class="label">RG</div>
                                <div class="input">{{ $rg }}</div>
                            </div>
                        </td>
                        <td width="33%">
                            <div class="fields">
                                <div class="label">Orgão emissor</div>
                                <div class="input">{{ $issuing_authority }}</div>
                            </div>
                        </td>
                    </tr>
                </table>
                <table width="100%" cellspacing="10">
                    <tr>
                        <td>
                            <div class="fields">
                                <div class="label">Nome completo</div>
                                <div class="input">{{ $name }}</div>
                            </div>
                        </td>
                    </tr>
                </table>
                <table width="100%" cellspacing="10">
                    <tr>
                        <td width="25%">
                            <div class="fields">
                                <div class="label">Data de nascimento</div>
                                <div class="input">{{ $birth }}</div>
                            </div>
                        </td>
                        <td width="25%">
                            <div class="fields">
                                <div class="label">Gênero</div>
                                <div class="input">{{ $gender }}</div>
                            </div>
                        </td>
                        <td width="25%">
                            <div class="fields">
                                <div class="label">Cor</div>
                                <div class="input">{{ $color }}</div>
                            </div>
                        </td>
                        <td width="25%">
                            <div class="fields">
                                <div class="label">Estado civil</div>
                                <div class="input">{{ $marital_status }}</div>
                            </div>
                        </td>
                    </tr>
                </table>
                <table width="100%" cellspacing="10">
                    <tr>
                        <td width="50%">
                            <div class="fields">
                                <div class="label">E-mail</div>
                                <div class="input">{{ $email }}</div>
                            </div>
                        </td>
                        <td width="25%">
                            <div class="fields">
                                <div class="label">Telefone</div>
                                <div class="input">{{ $phone }}</div>
                            </div>
                        </td>
                        <td width="25%">
                            <div class="fields">
                                <div class="label">Celular</div>
                                <div class="input">{{ $cellphone }}</div>
                            </div>
                        </td>
                    </tr>
                </table>
                <table width="100%" cellspacing="10">
                    <tr>
                        <td width="50%">
                            <div class="fields">
                                <div class="label">Endereço residencial</div>
                                <div class="input">{{ $home_address }}</div>
                            </div>
                        </td>
                        <td width="15%">
                            <div class="fields">
                                <div class="label">Número</div>
                                <div class="input">{{ $number }}</div>
                            </div>
                        </td>
                        <td width="35%">
                            <div class="fields">
                                <div class="label">Complemento</div>
                                <div class="input">{{ $complement }}</div>
                            </div>
                        </td>
                    </tr>
                </table>
                <table width="100%" cellspacing="10">
                    <tr>
                        <td width="33%">
                            <div class="fields">
                                <div class="label">Bairro</div>
                                <div class="input">{{ $neighborhood }}</div>
                            </div>
                        </td>
                        <td width="34%">
                            <div class="fields">
                                <div class="label">Cidade</div>
                                <div class="input">{{ $city }}</div>
                            </div>
                        </td>
                        <td width="33%">
                            <div class="fields">
                                <div class="label">Estado</div>
                                <div class="input">RS</div>
                            </div>
                        </td>
                    </tr>
                </table>
            </section>
            <section class="section-agree">
                <div>
                    <table width="100%" cellspacing="10">
                        <tr>
                            <td valign="top"><img src="{{public_path('assets')}}/images/{{ $imageAgree }}" width="65" height="65"></td>
                            <td valign="top" class="agree-paragraph">
                                Autorizo o Sindicato dos Bancários de Porto Alegre e Região a requerer o desconto de mensalidades sindicais e outras contribuições sindicais
                                devidamente autorizadas em assembleia geral da categoria, através de desconto em folha de pagamento ou utilizar meus dados bancários:
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <table width="100%" cellspacing="10">
                                    <tr>
                                        <td width="25%">
                                            <div class="agree-fields">
                                                <div class="label">Banco</div>
                                                <div class="agree-input">{{ $auth_bank }}</div>
                                            </div>
                                        </td>
                                        <td width="25%">
                                            <div class="agree-fields">
                                                <div class="label">COD do banco</div>
                                                <div class="agree-input">{{ $auth_code_bank }}</div>
                                            </div>
                                        </td>
                                        <td width="25%">
                                            <div class="agree-fields">
                                                <div class="label">Agência</div>
                                                <div class="agree-input">{{ $auth_agency }}</div>
                                            </div>
                                        </td>
                                        <td width="25%">
                                            <div class="agree-fields">
                                                <div class="label">Conta</div>
                                                <div class="agree-input">{{ $auth_account }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td valign="top" class="agree-paragraph">
                                para débito na minha conta corrente ou, ainda, através de outro meio eletrônico.
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <p class="agree-paragraph">
                                    As suas informações pessoais serão tratadas de acordo com a lei 13.709/18 (Lei Geral de Proteção de Dados – LGPD), principalmente nas hipóteses de
                                    execução de contrato, legítimo interesse e exercício regular de direitos e ficam a você assegurados todos os direitos de acesso à informação, retificação
                                    e eliminação de dados pessoais e sua titularidade, quando isso não importe na execução do presente contrato. Poderemos também enviar notificações
                                    referentes a atividade sindical por meios eletrônicos ou tradicionais a fim de lhe manter a par dos últimos acontecimentos relevantes.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <p class="agree-paragraph center">
                                    Porto Alegre, {{ date('d') }} de {{ $mappingPortuguesesMonths[date('F')] }} de {{ date('Y') }}.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <p class="agree-signature">_________________________________________</p>
                                <p class="agree-signature">{{ $name }}</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </section>
        </section>
    </body>
</html>

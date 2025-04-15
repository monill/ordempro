<div class="sidebar-wrapper" data-sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href="index"><img class="img-fluid for-light" src="../assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt=""></a>
            <div class="back-btn"><i class="fa-solid fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="index"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa-solid fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="pin-title sidebar-main-title">
                        <div>
                            <h6>Pinned</h6>
                        </div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1">Geral</h6>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-user') }}"></use>
                            </svg>
                            <span>Contatos</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('customers.index') }}">Clientes</a></li>
                            <li><a href="{{ route('suppliers.index') }}">Fornecedores</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-widget') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-widget') }}"></use>
                            </svg>
                            <span>Venda</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#">POS</a></li>
                            <li><a href="#">Faturas</a></li>
                            <li><a href="#">Orçamentos</a></li>
                            <li><a href="#">Pagamento Entrando</a></li>
                            <li><a href="#">Pedido de Venda</a></li>
                            <li><a href="#">Retorno de Venda/Nota de Crédito</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-layout') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-layout') }}"></use>
                            </svg>
                            <span>Compra</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#">Faturas de Compra</a></li>
                            <li><a href="#">Pagamento Saindo</a></li>
                            <li><a href="#">Pedido de Compra</a></li>
                            <li><a href="#">Retorno de Compra/Nota de Débito</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-layout') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-layout') }}"></use>
                            </svg>
                            <span>Itens</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#">Lista</a></li>
                            <li><a href="#">Categorias</a></li>
                            <li><a href="#">Marcas</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-layout') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-layout') }}"></use>
                            </svg>
                            <span>Despesa</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#">Lista</a></li>
                            <li><a href="#">Categorias</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-8">Applications</h6>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-project') }}"></use>
                            </svg>
                            <span>Dinheiro & Banco</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#">Dinheiro em Caixa</a></li>
                            <li><a href="#">Cheques</a></li>
                            <li><a href="#">Banco</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-ecommerce') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-ecommerce') }}"></use>
                            </svg>
                            <span>Armazém</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#">Armazéns</a></li>
                            <li><a href="#">Transferência de Estoque</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-chat') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-chat') }}"></use>
                            </svg>
                            <span>Utilitários</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#">Importar itens</a></li>
                            <li><a href="#">Importar Contatos</a></li>
                            <li><a href="#">Gerar código de barras</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-reports') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-reports') }}"></use>
                            </svg>
                            <span>Usuários</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#">Perfil</a></li>
                            <li><a href="#">Usuários</a></li>
                            <li><a href="#">Funções</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-reports') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-reports') }}"></use>
                            </svg>
                            <span>SMS</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#">Modelos</a></li>
                            <li><a href="#">Criar</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-reports') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-reports') }}"></use>
                            </svg>
                            <span>E-mail</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#">Modelos</a></li>
                            <li><a href="#">Criar</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-ecommerce') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-ecommerce') }}"></use>
                            </svg>
                            <span>Relatórios</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="category">Lucros e Perdas</a></li>
                            <li>
                                <a class="submenu-title" href="#">Transação do item
                                    <span class="sub-arrow">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="#">Por lote</a></li>
                                    <li><a href="#">Número de série/IMEI</a></li>
                                    <li><a href="#">Geral</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="submenu-title" href="#">Compra
                                    <span class="sub-arrow">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="#">Compra</a></li>
                                    <li><a href="#">Compra de Item</a></li>
                                    <li><a href="#">Pagamento</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="submenu-title" href="#">Venda
                                    <span class="sub-arrow">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="#">Venda</a></li>
                                    <li><a href="#">Venda de Item</a></li>
                                    <li><a href="#">Pagamento</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="submenu-title" href="#">Pagamentos Devidos
                                    <span class="sub-arrow">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="#">Cliente</a></li>
                                    <li><a href="#">Fornecedor</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="submenu-title" href="#">Despesa
                                    <span class="sub-arrow">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="#">Despesa</a></li>
                                    <li><a href="#">Despesa de Item</a></li>
                                    <li><a href="#">Pagamento</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="submenu-title" href="#">Transações
                                    <span class="sub-arrow">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="#">Fluxo de Caixa</a></li>
                                    <li><a href="#">Extrato Bancário</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="submenu-title" href="#">GST
                                    <span class="sub-arrow">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="#">GSTR-1</a></li>
                                    <li><a href="#">GSTR-2</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="submenu-title" href="#">Transferência de Estoque
                                    <span class="sub-arrow">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="#">Transferência de Estoque</a></li>
                                    <li><a href="#">Por item</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="submenu-title" href="#">Relatório de estoque
                                    <span class="sub-arrow">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="#">Por lote</a></li>
                                    <li><a href="#">Número de série/IMEI</a></li>
                                    <li><a href="#">Geral</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Relatório de itens expirados</a></li>
                            <li><a href="#">Relatório de itens para reabastecimento</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-main-title">
                        <div>
                            <h6>Configuracoes</h6>
                        </div>
                    </li>

                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-gallery') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-gallery') }}"></use>
                            </svg>
                            <span>Configurações</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#">Aplicativo</a></li>
                            <li><a href="#">Empresa</a></li>
                            <li><a href="#">Taxas de Imposto</a></li>
                            <li><a href="#">Contas Bancárias</a></li>
                            <li><a href="#">Lista de Moedas</a></li>
                            <li><a href="#">Lista de Unidades</a></li>
                            <li><a href="#">Idiomas</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-main-title">
                        <div>
                            <h6>Configuracoes</h6>
                        </div>
                    </li>

                    <li class="sidebar-list">
                        <i class="fa-solid fa-thumbtack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="#">
                            <i class="fa-solid fa-arrows-rotate"></i>
                            <span>Limpar Cache</span>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>

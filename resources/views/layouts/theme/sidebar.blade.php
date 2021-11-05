<div class="sidebar-wrapper sidebar-theme">

            <nav id="compactSidebar">
                <ul class="navbar-nav theme-brand flex-row">
                    <li class="nav-item theme-logo">
                        <a href="index.html">
                            <img src="{{ asset('assets/img/logoF.png') }}" class="navbar-logo" alt="logo">
                        </a>
                    </li>
                </ul>
                <ul class="menu-categories">
                 @can('Categorias_Index')
                    <li class="menu">
                        <a href="#app" data-active="false" class="menu-toggle">
                            <div class="base-menu">
                                <div class="base-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                </div>
                                <span>Categorías</span>
                            </div>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    </li>
                    @endcan
                    @can('Productos_Index')
                    <li class="menu">
                        <a href="#uiKit" data-active="false" class="menu-toggle">
                            <div class="base-menu">
                                <div class="base-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                </div>
                                <span>Productos</span>
                            </div>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    </li>
                    @endcan
                    @can('Facturacion_Index')
                    <li class="menu menu-single">
                        <a href="{{ url('/facturacion')}}" data-active="false" class="menu-toggle">
                            <div class="base-menu">
                                <div class="base-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                </div>
                                <span>Facturación</span>
                            </div>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    </li>
                    @endcan
                    @can('Usuarios_Index')
                    <li class="menu menu-single">
                        <a href="{{ url('/usuarios')}}" data-active="false" class="menu-toggle">
                            <div class="base-menu">
                                <div class="base-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                </div>
                                <span class="">Usuarios</span>
                            </div>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    </li>
                    @endcan
                    @can('Permisos_Index')
                    <li class="menu">
                        <a href="#forms" data-active="false" class="menu-toggle">
                            <div class="base-menu">
                                <div class="base-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                                </div>
                                <span>Permisos</span>
                            </div>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    </li>
                    @endcan
                    @can('Consulta_Venta_Index')
                    <li class="menu menu-single">
                        <a href="{{ url('/consulta-ventas')}}" data-active="false" class="menu-toggle">
                            <div class="base-menu">
                                <div class="base-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                </div>
                                <span>Consulta Ventas</span>
                            </div>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    </li>
                    @endcan
                    @can('Reportes_Index')
                    <li class="menu menu-single">
                        <a href="{{ url('/reporte-venta')}}" data-active="false" class="menu-toggle">
                            <div class="base-menu">
                                <div class="base-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                </div>
                                <span>Reportes</span>
                            </div>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    </li>
                    @endcan
                </ul>
            </nav>

            <div id="compact_submenuSidebar" class="submenu-sidebar">

                <div class="submenu" id="app">
                    <ul class="submenu-list" data-parent-element="#app">
                        <li>
                            <a href="{{ url('/categories')}}"> Categorías </a>
                        </li>
                        <li>
                            <a href="{{ url('/subcategories')}}"> Sub Categorías </a>
                        </li>
                    </ul>
                </div>

                <div class="submenu" id="uiKit">
                    <ul class="submenu-list" data-parent-element="#uiKit">
                        <li>
                            <a href="{{ url('/products')}}"> Inventario </a>
                        </li>
                           <li>
                            <a href="{{ url('/proveedores')}}"> proveedores </a>
                        </li>
                        <li>
                            <a href="{{ url('/compras')}}"> Compras </a>
                        </li>
                    </ul>
                </div>

                

                <div class="submenu" id="forms">
                    <ul class="submenu-list" data-parent-element="#forms">
                        <li>
                            <a href="{{ url('/roles')}}">Roles</a>
                        </li>
                         <li>
                            <a href="{{ url('/permisos')}}">Permisos</a>
                        </li>
                        <li>
                            <a href="{{ url('/asignar')}}">Asignar</a>
                        </li>

                    </ul>
                </div>


                <div class="submenu" id="tables">
                    <ul class="submenu-list" data-parent-element="#tables">
                        <li>
                            <a href="table_basic.html">Basic </a>
                        </li>
                        <li class="sub-submenu">
                            <a role="menu" class="collapsed" data-toggle="collapse" data-target="#datatables" aria-expanded="true"><div>Datatables</div> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                            <ul id="datatables" class="collapse show" data-parent="#compact_submenuSidebar">
                                <li>
                                    <a href="table_dt_basic.html"> Basic </a>
                                </li>
                                <li>
                                    <a href="table_dt_striped_table.html"> Striped Table </a>
                                </li>
                                <li>
                                    <a href="table_dt_ordering_sorting.html"> Order Sorting </a>
                                </li>
                                <li>
                                    <a href="table_dt_multi-column_ordering.html"> Multi-Column </a>
                                </li>
                                <li>
                                    <a href="table_dt_multiple_tables.html"> Multiple Tables</a>
                                </li>
                                <li>
                                    <a href="table_dt_alternative_pagination.html"> Alt. Pagination</a>
                                </li>
                                <li>
                                    <a href="table_dt_custom.html"> Custom </a>
                                </li>
                                <li>
                                    <a href="table_dt_range_search.html"> Range Search </a>
                                </li>
                                <li>
                                    <a href="table_dt_html5.html"> HTML5 Export </a>
                                </li>
                                <li>
                                    <a href="table_dt_live_dom_ordering.html"> Live DOM ordering </a>
                                </li>
                                <li>
                                    <a href="table_dt_miscellaneous.html"> Miscellaneous </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="submenu" id="more">
                    <ul class="submenu-list" data-parent-element="#more">

                        <li>
                            <a href="fonticons.html">Font Icons </a>
                        </li>

                        <li class="sub-submenu">
                            <a role="menu" class="collapsed" data-toggle="collapse" data-target="#users" aria-expanded="false"><div> Users</div> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></a>
                            <ul id="users" class="collapse" data-parent="#compact_submenuSidebar">
                                <li>
                                    <a href="user_profile.html">Profile </a>
                                </li>
                                <li>
                                    <a href="user_account_setting.html">Account Settings </a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="dragndrop_dragula.html">Drag and Drop </a>
                        </li>
                        <li>
                            <a href="charts_apex.html">Charts </a>
                        </li>
                        <li>
                            <a href="map_jvector.html">Maps </a>
                        </li>

                        <li class="sub-submenu">
                            <a role="menu" class="collapsed" data-toggle="collapse" data-target="#errors" aria-expanded="false"><div> Errors</div> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></a>
                            <ul id="errors" class="collapse" data-parent="#compact_submenuSidebar">
                                <li>
                                    <a target="_blank" href="pages_error404.html"> 404 </a>
                                </li>
                                <li>
                                    <a target="_blank" href="pages_error500.html"> 500 </a>
                                </li>
                                <li>
                                    <a target="_blank" href="pages_error503.html"> 503 </a>
                                </li>
                                <li>
                                    <a target="_blank" href="pages_maintenence.html"> Maintanence </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sub-submenu">
                            <a role="menu" class="collapsed" data-toggle="collapse" data-target="#pages" aria-expanded="false"><div> Pages</div> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></a>
                            <ul id="pages" class="collapse" data-parent="#compact_submenuSidebar">
                                <li>
                                    <a href="pages_helpdesk.html">Helpdesk </a>
                                </li>
                                <li>
                                    <a href="pages_contact_us.html">Contact Form </a>
                                </li>
                                <li>
                                    <a href="pages_faq.html">FAQ </a>
                                </li>
                                <li>
                                    <a href="pages_faq2.html">FAQ 2 </a>
                                </li>
                                <li>
                                    <a href="pages_privacy.html">Privacy Policy </a>
                                </li>
                                <li>
                                    <a target="_blank" href="pages_coming_soon.html">Coming Soon </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sub-submenu">
                            <a role="menu" class="collapsed" data-toggle="collapse" data-target="#auth" aria-expanded="false"><div> Authentication</div> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></a>
                            <ul id="auth" class="collapse" data-parent="#compact_submenuSidebar">
                                <li>
                                    <a target="_blank" href="auth_login.html"> Login </a>
                                </li>
                                <li>
                                    <a target="_blank" href="auth_login_boxed.html"> Login Boxed </a>
                                </li>
                                <li>
                                    <a target="_blank" href="auth_register.html"> Register </a>
                                </li>
                                <li>
                                    <a target="_blank" href="auth_register_boxed.html"> Register Boxed </a>
                                </li>
                                <li>
                                    <a target="_blank" href="auth_lockscreen.html"> Unlock </a>
                                </li>
                                <li>
                                    <a target="_blank" href="auth_lockscreen_boxed.html"> Unlock Boxed </a>
                                </li>
                                <li>
                                    <a target="_blank" href="auth_pass_recovery.html"> Recover ID </a>
                                </li>
                                <li>
                                    <a target="_blank" href="auth_pass_recovery_boxed.html"> Recover ID Boxed </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sub-submenu">
                            <a role="menu" class="collapsed" data-toggle="collapse" data-target="#starter-kit" aria-expanded="true"><div>Starter Kit</div> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></a>
                            <ul id="starter-kit" class="collapse show" data-parent="#compact_submenuSidebar">
                                <li>
                                    <a href="starter_kit_blank_page.html"> Blank Page </a>
                                </li>
                                <li>
                                    <a href="starter_kit_breadcrumbs.html"> Breadcrumbs </a>
                                </li>
                                <li>
                                    <a href="starter_kit_boxed.html"> Boxed </a>
                                </li>
                                <li>
                                    <a href="starter_kit_light_menu.html"> Light Menu </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

<aside class="page-sidebar">
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">

            <span class="page-logo-text mr-1">FatimaKashmiri Admin</span>
        </a>
    </div>
    @if (auth()->user()->role_id == 1)
        <nav id="js-primary-nav" class="primary-nav" role="navigation">

            <ul id="js-nav-menu" class="nav-menu">
                <li>
                    <a href="{{ route('dashboard.index') }}" title="UI Components" data-filter-tags="ui components">
                        <i class="fal fa-home"></i>
                        <span class="nav-link-text" data-i18n="nav.ui_components">Home Page</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('block.add') ||  Request::routeIs('block.manage') ? 'active' : '' }}">
                    <a href="#" title="Plot Block" data-filter-tags="customers">
                        <i class="fal fa-window-restore"></i>
                        <span class="nav-link-text px-2" data-nav="nav.customers">Blocks</span>
                    </a>
                    <ul>
                        <li class="{{ Request::routeIs('block.add') ? 'active' : '' }}">
                            <a href="{{ route('block.add') }}" title="Add Blocks" data-filter-tags="application intel introduction">
                                <i class="fal fa-plus"></i>
                                <span class="nav-link-text" data-i18n="nav.application_intel_introduction">Add New Block</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('block.manage') ? 'active' : '' }}">
                            <a href="{{ route('block.manage') }}" title="Manage Blocks" data-filter-tags="application intel privacy">
                                <i class="fal fa-table"></i>
                                <span class="nav-link-text" data-i18n="nav.application_intel_privacy">Show All Blocks</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::routeIs('plots.add') || Request::routeIs('plots.get.franchises.plots') ||  Request::routeIs('plots.manage') ? 'active' : '' }}">
                    <a href="#" title="Plots" data-filter-tags="customers">
                        <i class="fal fa-th-large"></i>
                        <span class="nav-link-text px-2" data-nav="nav.customers">Plots</span>
                    </a>
                    <ul>
                        <li class="{{ Request::routeIs('plots.add') ? 'active' : '' }}">
                            <a href="{{ route('plots.add') }}" title="How it works" data-filter-tags="theme settings how it works">
                                <i class="fal fa-window"></i>
                                <span class="nav-link-text" data-i18n="nav.theme_settings_how_it_works">Add Plots</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('plots.manage') ? 'active' : '' }}">
                            <a href="{{ route('plots.manage') }}" title="Layout Options" data-filter-tags="theme settings layout options">
                                <i class="fal fa-window"></i>
                                <span class="nav-link-text" data-i18n="nav.theme_settings_layout_options">Plot Details</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('plots.get.franchises.plots') ? 'active' : '' }}">
                            <a href="{{ route('plots.get.franchises.plots') }}" title="Franchises plots" data-filter-tags="theme settings layout options">
                                <i class="fal fa-window"></i>
                                <span class="nav-link-text" data-i18n="nav.theme_settings_layout_options">Franchises Plots</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="{{ Request::routeIs('add.cusotmer') ||  Request::routeIs('manage.customer') || Request::routeIs('installment.remaining') || Request::routeIs('admin.manage.cancelled.customers') ? 'active' : '' }}">
                    <a href="#" title="Customers" data-filter-tags="customers">
                        <i class="fal fa-users"></i>
                        <span class="nav-link-text px-2" data-nav="nav.customers">Customers</span>
                    </a>
                    <ul>
                        <li class="{{ Request::routeIs('add.cusotmer') ? 'active' : '' }}">
                            <a href="{{ route('add.cusotmer') }}" title="Introduction" data-filter-tags="application intel introduction">
                                <i class="fal fa-user-plus"></i>
                                <span class="nav-link-text" data-i18n="nav.application_intel_introduction">Plot Customer</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('manage.customer') ? 'active' : '' }}">
                            <a href="{{ route('manage.customer') }}" title="Privacy" data-filter-tags="application intel privacy">
                                <i class="fal fa-users"></i>
                                <span class="nav-link-text" data-i18n="nav.application_intel_privacy">Show Customers</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('installment.remaining') ? 'active' : '' }}">
                            <a href="{{ route('installment.remaining') }}" title="Privacy" data-filter-tags="application intel privacy">
                                <i class="fal fa-user-times "></i>
                                <span class="nav-link-text" data-i18n="nav.application_intel_privacy">Remaining Installments</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('admin.manage.cancelled.customers') ? 'active' : '' }}">
                            <a href="{{ route('admin.manage.cancelled.customers') }}" title="Privacy" data-filter-tags="application intel privacy">
                                <i class="fal fa-user-times "></i>
                                <span class="nav-link-text" data-i18n="nav.application_intel_privacy">Cancelled Files</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::routeIs('installment.payment') ? 'active' : '' }}">
                    <a href="{{ route('installment.payment') }}" title="UI Components" data-filter-tags="ui components">
                        <i class="fal fa-window"></i>
                        <span class="nav-link-text" data-i18n="nav.ui_components">Pay Installment</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('franchise.add') ||  Request::routeIs('franchise.manage') ? 'active' : '' }}">
                    <a href="#" title="Branch Customers" data-filter-tags="customers">
                        <i class="fal fa-plus-square"></i>
                        <span class="nav-link-text px-2" data-nav="nav.customers">Agents</span>
                    </a>
                    <ul>
                        <li class="{{ Request::routeIs('franchise.add') ? 'active' : '' }}">
                            <a href="{{ route('franchise.add') }}" title="Product Licensing" data-filter-tags="package info product licensing">
                                <i class="fal fa-plus"></i>
                                <span class="nav-link-text" data-i18n="nav.package_info_product_licensing">New Franchise</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('franchise.manage') ? 'active' : '' }}">
                            <a href="{{ route('franchise.manage') }}" title="Product Licensing" data-filter-tags="package info product licensing">
                                <i class="fal fa-table"></i>
                                <span class="nav-link-text" data-i18n="nav.package_info_product_licensing">Show Franchises</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::routeIs('expanse.add') ||  Request::routeIs('expase.manage') ? 'active' : '' }}">
                    <a href="#" title="Branch Customers" data-filter-tags="customers">
                        <i class="fal fa-exclamation-circle"></i>
                        <span class="nav-link-text px-2" data-nav="nav.customers">Expenses</span>
                    </a>
                    <ul>
                        <li class="{{ Request::routeIs('expanse.add') ? 'active' : '' }}">
                            <a href="{{ route('expanse.add') }}" title="Add Blocks" data-filter-tags="application intel introduction">
                                <i class="fal fa-plus"></i>
                                <span class="nav-link-text" data-i18n="nav.application_intel_introduction">Add New Expanse</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('expase.manage') ? 'active' : '' }}">
                            <a href="{{ route('expase.manage') }}" title="Manage Blocks" data-filter-tags="application intel privacy">
                                <i class="fal fa-table"></i>
                                <span class="nav-link-text" data-i18n="nav.application_intel_privacy">Show All Expanses</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="filter-message js-filter-message bg-success-600"></div>
        </nav>
    @else
        <nav id="js-primary-nav" class="primary-nav" role="navigation">
            <ul id="js-nav-menu" class="nav-menu">
                <li>
                    <a href="{{ route('agent.dashboard.index') }}" title="UI Components" data-filter-tags="ui components">
                        <i class="fal fa-home"></i>
                        <span class="nav-link-text" data-i18n="nav.ui_components">Home Page</span>
                    </a>
                </li>
                <li>
                    <a href="/profile/{{ auth()->user()->id }}" title="UI Components" data-filter-tags="ui components">
                        <i class="fal fa-user"></i>
                        <span class="nav-link-text" data-i18n="nav.ui_components">Profile</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('agent.add.cusotmer') ||  Request::routeIs('agent.manage.customer')|| Request::routeIs('agent.installment.remaining') || Request::routeIs('agent.customer.cancelled') ? 'active' : '' }}">
                    <a href="#" title="Branch Customers" data-filter-tags="customers">
                        <i class="fal fa-users"></i>
                        <span class="nav-link-text px-2" data-nav="nav.customers">Customers</span>
                    </a>
                    <ul>
                        <li class="{{ Request::routeIs('agent.add.cusotmer') ? 'active' : '' }}">
                            <a href="{{ route('agent.add.cusotmer') }}" title="Introduction" data-filter-tags="application intel introduction">
                                <i class="fal fa-user-plus"></i>
                                <span class="nav-link-text" data-i18n="nav.application_intel_introduction"> Plot Booking</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('agent.manage.customer') ? 'active' : '' }}">
                            <a href="{{ route('agent.manage.customer') }}" title="Privacy" data-filter-tags="application intel privacy">
                                <i class="fal fa-users"></i>
                                <span class="nav-link-text" data-i18n="nav.application_intel_privacy">Show Customers</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('agent.installment.remaining') ? 'active' : '' }}">
                            <a href="{{ route('agent.installment.remaining') }}" title="Privacy" data-filter-tags="application intel privacy">
                                <i class="fal fa-user-times"></i>
                                <span class="nav-link-text" data-i18n="nav.application_intel_privacy">Remaining Customers</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('agent.customer.cancelled') ? 'active' : '' }}">
                            <a href="{{ route('agent.customer.cancelled') }}" title="Privacy" data-filter-tags="application intel privacy">
                                <i class="fal fa-user-times"></i>
                                <span class="nav-link-text" data-i18n="nav.application_intel_privacy">Cancelled Files</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::routeIs('agent.plots.add') ||  Request::routeIs('agent.plots.manage') ? 'active' : '' }}">
                    <a href="#" title="Branch Customers" data-filter-tags="customers">
                        <i class="fal fa-th-large"></i>
                        <span class="nav-link-text px-2" data-nav="nav.customers">Plots</span>
                    </a>
                    <ul>
                        <li class="{{ Request::routeIs('agent.plots.add') ? 'active' : '' }}">
                            <a href="{{ route('agent.plots.add') }}" title="Add New Plot" data-filter-tags="ui components">
                                <i class="fal fa-plus"></i>
                                <span class="nav-link-text" data-i18n="nav.ui_components">Add Plot</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('agent.plots.manage') ? 'active' : '' }}">
                            <a href="{{ route('agent.plots.manage') }}" title="Manage Plots" data-filter-tags="application intel introduction">
                                <i class="fal fa-table"></i>
                                <span class="nav-link-text" data-i18n="nav.application_intel_introduction">Manage</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('agent.installment.payment') }}" title="UI Components" data-filter-tags="ui components">
                        <i class="fal fa-id-card"></i>
                        <span class="nav-link-text" data-i18n="nav.ui_components">Pay Installment</span>
                    </a>
                </li>

                <li class="{{ Request::routeIs('agent.subagent.add') ||  Request::routeIs('agent.subagent.manage') ? 'active' : '' }}">
                    <a href="#" title="Branch Customers" data-filter-tags="customers">
                        <i class="fal fa-user"></i>
                        <span class="nav-link-text px-2" data-nav="nav.customers">My Agents</span>
                    </a>
                    <ul>
                        <li class="{{ Request::routeIs('agent.subagent.add') ? 'active' : '' }}">
                            <a href="{{ route('agent.subagent.add') }}" title="Add New Agent" data-filter-tags="ui components">
                                <i class="fal fa-plus"></i>
                                <span class="nav-link-text" data-i18n="nav.ui_components">Add Agent</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('agent.subagent.manage') ? 'active' : '' }}">
                            <a href="{{ route('agent.subagent.manage') }}" title="Manage Agents" data-filter-tags="application intel introduction">
                                <i class="fal fa-table"></i>
                                <span class="nav-link-text" data-i18n="nav.application_intel_introduction">Manage</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="{{ Request::routeIs('agent.expanse.add') ||  Request::routeIs('agent.expase.manage') ? 'active' : '' }}">
                    <a href="#" title="Branch Customers" data-filter-tags="customers">
                        <i class="fal fa-exclamation-circle"></i>
                        <span class="nav-link-text px-2" data-nav="nav.customers">Expenses</span>
                    </a>
                    <ul>
                        <li class="{{ Request::routeIs('agent.expanse.add') ? 'active' : '' }}">
                            <a href="{{ route('agent.expanse.add') }}" title="Add Blocks" data-filter-tags="application intel introduction">
                                <i class="fal fa-plus"></i>
                                <span class="nav-link-text" data-i18n="nav.application_intel_introduction">Add Expanses</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('agent.expase.manage') ? 'active' : '' }}">
                            <a href="{{ route('agent.expase.manage') }}" title="Manage Blocks" data-filter-tags="application intel privacy">
                                <i class="fal fa-table"></i>
                                <span class="nav-link-text" data-i18n="nav.application_intel_privacy">Show Expanses</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="filter-message js-filter-message bg-success-600"></div>
        </nav>
    @endif
</aside>

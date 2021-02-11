<li class="nav-item has-treeview {{ isActive(['Inventory*']) }}">
    <a href="#" class="nav-link {{ isActive(['Inventory*']) }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Inventory<i class="fas fa-angle-left right"></i> </p>
    </a>

    <ul class="nav nav-treeview" style="background-color: #292929">

        {{-- Menu Setup Start --}}

        <li class="nav-item has-treeview {{ isActive(['Inventory/add-inventory-department*','Inventory/add-inventory-group*','Inventory/add-inventory-unit*']) }}">
            <a href="#" class="nav-link {{ isActive(['Inventory/add-inventory-department*','Inventory/add-inventory-group*','Inventory/add-inventory-unit*']) }}">
                <i class="fas fa-tools"></i>
                <p> Menu Setup<i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ url('Inventory/add-inventory-department') }}" class="nav-link {{ isActive('Inventory/add-inventory-department') }}">
                        <p style="margin-left:30px">Section</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('Inventory/add-inventory-group') }}" class="nav-link {{ isActive('Inventory/add-inventory-group') }}">
                        <p style="margin-left:30px">Group</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('Inventory/add-inventory-unit') }}" class="nav-link {{ isActive('Inventory/add-inventory-unit') }}">
                        <p style="margin-left:30px">Unit</p>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Menu Setup End --}}

        {{-- Menu Setup Start --}}

        <li class="nav-item has-treeview {{ isActive(['settings/accessories*','settings/trims*','settings/units*','settings/fabrics_categories*','settings/fabrics*']) }}">
            <a href="#" class="nav-link {{ isActive('settings/*') }}">
                <i class="fas fa-users"></i>
                <p> Suppler / Party Setting<i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ url('add-inventory-supplier') }}" class="nav-link {{ isActive('Inventory/add-inventory-supplier') }}">
                        <p style="margin-left:30px">Suppliers</p>
                    </a>
                </li>


            </ul>
        </li>

        {{-- Menu Setup End --}}

        {{-- Item Create Start --}}
        <li class="nav-item has-treeview {{ isActive(['Inventory/add-inventory-item*']) }}">
            <a href="#" class="nav-link {{ isActive('settings/*') }}">
                <i class="fas fa-app-store"></i>
                <p> Item Management<i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ url('Inventory/add-inventory-item') }}" class="nav-link {{ isActive('Inventory/add-inventory-item') }}">
                        <p style="margin-left:30px">Item Create & View </p>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Item Create End --}}

        {{-- Requistiion Manage Start --}}

        <li class="nav-item has-treeview {{ isActive(['settings/accessories*','settings/trims*','settings/units*','settings/fabrics_categories*','settings/fabrics*']) }}">
            <a href="#" class="nav-link {{ isActive('settings/*') }}">
                <i class="fas fa-money"></i>
                <p> Requisition Management<i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ url('Inventory/add-inventory-requisition') }}" class="nav-link {{ isActive('Inventory/add-inventory-requisition') }}">
                        <p style="margin-left:30px">Create Requisition</p>
                    </a>

                    <a href="{{ url('list-inventory-requisition') }}" class="nav-link {{ isActive('Inventory/list-inventory-requisition') }}">
                        <p style="margin-left:30px">All Requisition</p>
                    </a>


                </li>
            </ul>
        </li>

        {{-- Requistiion Manage End--}}

        {{-- Purchase Management Start --}}
        <li class="nav-item has-treeview {{ isActive([
        'settings/accessories*','settings/trims*','settings/units*','settings/fabrics_categories*','settings/fabrics*']) }}">
            <a href="#" class="nav-link {{ isActive('settings/*') }}">
                <i class="fas fa-money"></i>
                <p> Purchase Management<i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ url('add-inventory-requisition-purchase') }}" class="nav-link {{ isActive('Inventory/add-inventory-requisition-purchase') }}">
                        <p style="margin-left:30px">Approved Requisition</p>
                    </a>

                    <a href="{{ url('add-inventory-requisition-purchase') }}" class="nav-link {{ isActive('Inventory/list-inventory-requisition-purchase') }}">
                        <p style="margin-left:30px">All Approved Requisition</p>
                    </a>

                    <a href="{{ url('purchase-order') }}" class="nav-link {{ isActive('Inventory/purchase-order') }}">
                        <p style="margin-left:30px">Purchase Order </p>
                    </a>


                </li>
            </ul>
        </li>

        {{-- Purchase Management End --}}

    </ul>
</li>
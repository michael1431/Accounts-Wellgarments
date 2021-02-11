<li class="nav-item has-treeview {{ isActive(['merchandise*']) }}">
    <a href="#" class="nav-link {{ isActive(['merchandise*']) }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Merchandising<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview" style="background-color: #292929">
        <li class="nav-item">
            <a href="{{ url('merchandise/manage-buyer') }}" class="nav-link {{ isActive('merchandise/manage-buyer') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Buyer</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('merchandise/manage-supplier') }}" class="nav-link {{ isActive('merchandise/manage-supplier') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Supplier</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('merchandise/product-cost-sheet/create') }}" class="nav-link {{ isActive('merchandise/product-cost-sheet/create') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Product Cost Sheet</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('merchandise/budget-sheet/create') }}" class="nav-link {{ isActive('merchandise/budget-sheet/create') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Budget Sheet</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ isActive(['booking*','booking/add-fabric*','booking/add-poly*','booking/add-zipper*','booking/add-thread*','booking/add-hangtag*','booking/add-label*','booking/add-hanger*']) }}">
    <a href="#" class="nav-link {{ isActive('booking/*') }}">
        <i class="fas fa-book"></i>
        <p> Booking<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">

        <li class="nav-item">
            <a href="{{ url('booking/add-fabric') }}" class="nav-link {{ isActive('booking/add-fabric') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Fabrics Booking</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('booking/add-poly') }}" class="nav-link {{ isActive('booking/add-poly') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Poly Booking</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('booking/add-zipper') }}" class="nav-link {{ isActive('booking/add-zipper') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Zipper Booking</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('booking/add-thread') }}" class="nav-link {{ isActive('booking/add-thread') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Thread Booking</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('booking/add-hangtag') }}" class="nav-link {{ isActive('booking/add-hangtag') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Hangtag Booking</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('booking/add-label') }}" class="nav-link {{ isActive('booking/add-label') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Label Booking</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('booking/add-hanger') }}" class="nav-link {{ isActive('booking/add-hanger') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Hanger Booking</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ isActive(['report*']) }}">
    <a href="#" class="nav-link {{ isActive('report/*') }}">
        <i class="fas fa-chart-pie"></i>
        <p> Report<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">

        <li class="nav-item">
            <a href="{{ url('report/view-cost-breakdown-sheet') }}" class="nav-link {{ isActive('report/view-cost-breakdown-sheet') }}">
                <i class="far fa-circle"></i>
                <p style="margin-left:30px">Cost Breakdown Sheets</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('report/view-all-budget-sheets') }}" class="nav-link {{ isActive('report/view-all-budget-sheets') }}">
                <i class="far fa-circle"></i>
                <p style="margin-left:30px">Budget Sheets</p>
            </a>
        </li>
        <li class="nav-item has-treeview {{ isActive(['report/view-fabrics-booking*','report/view-hanger-booking*',
        'report/view-poly-booking*','report/view-zipper-booking*','report/view-thread-booking*','report/view-hangtag-booking*','report/view-label-booking*']) }}">
            <a href="#" class="nav-link }}">
                <i class="far fa-circle"></i>
                <p> Booking Report<i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('report/view-fabrics-booking') }}" class="nav-link {{ isActive('report/view-fabrics-booking') }}">
                        <i class="fas fa-arrow-circle-right"></i>
                        <p style="margin-left:30px">Fabric Bookings</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('report/view-poly-booking') }}" class="nav-link {{ isActive('report/view-poly-booking') }}">
                        <i class="fas fa-arrow-circle-right"></i>
                        <p style="margin-left:30px">poly Bookings</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('report/view-zipper-booking') }}" class="nav-link {{ isActive('report/view-zipper-booking') }}">
                        <i class="fas fa-arrow-circle-right"></i>
                        <p style="margin-left:30px">Zipper Bookings</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('report/view-thread-booking') }}" class="nav-link {{ isActive('report/view-thread-booking') }}">
                        <i class="fas fa-arrow-circle-right"></i>
                        <p style="margin-left:30px">Thread Bookings</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('report/view-hangtag-booking') }}" class="nav-link {{ isActive('report/view-hangtag-booking') }}">
                        <i class="fas fa-arrow-circle-right"></i>
                        <p style="margin-left:30px">Hangtag Bookings</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('report/view-label-booking') }}" class="nav-link {{ isActive('report/view-label-booking') }}">
                        <i class="fas fa-arrow-circle-right"></i>
                        <p style="margin-left:30px">Label Bookings</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('report/view-hanger-booking') }}" class="nav-link {{ isActive('report/view-hanger-booking') }}">
                        <i class="fas fa-arrow-circle-right"></i>
                        <p style="margin-left:30px">Hanger Bookings</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ isActive(['products/*']) }}">
    <a href="#" class="nav-link {{ isActive('products/*') }}">
        <i class="fas fa-boxes"></i>
        <p> Products<i class="fas fa-angle-left right"></i> </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('products/fabrics') }}" class="nav-link {{ isActive('products/fabrics') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Fabrics</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('products/accessories') }}" class="nav-link {{ isActive('products/accessories') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Accessories</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('products/trims') }}" class="nav-link {{ isActive('products/trims') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Trims</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('products/other-trims') }}" class="nav-link {{ isActive('products/other-trims') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Other Trims</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('products/fabrics_categories') }}" class="nav-link {{ isActive('products/fabrics_categories') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Fabrics Category</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('products/accessories_categories') }}" class="nav-link {{ isActive('products/accessories_categories') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Accessories Category</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('products/trims-categories') }}" class="nav-link {{ isActive('products/trims-categories') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Trims Category</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('products/other-trims-categories') }}" class="nav-link {{ isActive('products/other-trims-categories') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Other Trims Category</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('products/units') }}" class="nav-link {{ isActive('products/units') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Unit</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ isActive(['settings/*']) }}">
    <a href="#" class="nav-link {{ isActive('settings/*') }}">
        <i class="fas fa-tools"></i>
        <p> Settings<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('settings/company_address') }}" class="nav-link {{ isActive('settings/company_address') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Company Address</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('settings/colors') }}" class="nav-link {{ isActive('settings/colors') }}">
                <i class="fas fa-circle"></i>
                <p style="margin-left:30px">Color</p>
            </a>
        </li>
    </ul>
</li>
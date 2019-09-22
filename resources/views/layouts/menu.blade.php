


<li class="treeview {{ Request::is('categories*') ? 'active' : '' }}">
    <a href="#">
    <i class="fa fa-laptop"></i>
    <span>Categories</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('categories*') ? 'active' : '' }}"><a href="{!! route('categories.index') !!}"><i class="fa fa-circle-o"></i>Categories</a></li>
    </ul>
</li>

<li class="treeview {{ Request::is('brands*') ? 'active' : '' }}">
    <a href="#">
    <i class="fa fa-laptop"></i>
    <span>Brands</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('brands*') ? 'active' : '' }}"><a href="{!! route('brands.index') !!}"><i class="fa fa-circle-o"></i>Brands</a></li>
    </ul>
</li>

<li class="treeview {{ Request::is('subcategories*') ? 'active' : '' }}">
    <a href="#">
    <i class="fa fa-laptop"></i>
    <span>Subcategories</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('subcategories*') ? 'active' : '' }}"><a href="{!! route('subcategories.index') !!}"><i class="fa fa-circle-o"></i>Subcategories</a></li>
    </ul>
</li>


<li class="treeview {{ Request::is('products*') ? 'active' : '' }}">
    <a href="#">
    <i class="fa fa-laptop"></i>
    <span>Products</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('products*') ? 'active' : '' }}"><a href="{!! route('products.index') !!}"><i class="fa fa-circle-o"></i>Products</a></li>
    </ul>
</li>

<li class="treeview {{ Request::is('compositions*') ? 'active' : '' }}">
    <a href="#">
    <i class="fa fa-laptop"></i>
    <span>Compositions</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('compositions*') ? 'active' : '' }}"><a href="{!! route('compositions.index') !!}"><i class="fa fa-circle-o"></i>Compositions</a></li>
    </ul>
</li>

<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Orders</span></a>
</li>


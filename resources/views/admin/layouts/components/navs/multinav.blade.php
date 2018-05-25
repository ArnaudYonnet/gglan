<li class="treeview">
    <a href="#">
        <i class="{{ $icon }}"></i> 
        <span>{{ $title }}</span>
        <span class="pull-right-container">
            <i class="fas fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        {{ $slot }}
    </ul>
</li>
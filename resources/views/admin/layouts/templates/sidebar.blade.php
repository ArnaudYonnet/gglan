<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset(Auth::guard('admin')->user()->avatar) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> {{ Auth::guard('admin')->user()->name }} </p>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            @foreach (config('sidebar') as $item)
                @if ($item['group'])
                    @if (Auth::guard('admin')->user()->role[config('role.pageRole')[strtolower($item['name'])]['role']])
                        <li class="treeview">
                            <a href="#">
                                <i class="{{ $item['icon'] }}"></i> 
                                <span>{{ __($item['name']) }}</span>
                                <span class="pull-right-container">
                                    <i class="fas fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                @foreach ($item['items'] as $subitem)
                                    <li>
                                        <a href=" {{ $subitem['url'] }} ">
                                            <i class="{{ $subitem['icon'] }}"></i> 
                                            <span>{{ __($subitem['name']) }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @else
                    @if (Auth::guard('admin')->user()->role[config('role.pageRole')[strtolower($item['name'])]['role']])
                    <li>
                        <a href=" {{ $item['url'] }} ">
                            <i class="{{ $item['icon'] }}"></i> 
                             <span>{{ __($item['name']) }}</span>
                        </a>
                    </li>
                    @endif
                @endif
            @endforeach
        </ul>
    </section>
</aside>
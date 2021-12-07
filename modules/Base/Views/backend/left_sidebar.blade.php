<?php
$menu = config_menu_merge();
$segment = segmentUrl(1);
?>

<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @if(!empty($menu))
                    @foreach($menu as $key => $item)
                        @can($item['middleware'])
                            @if($item['active'])
                                @if(empty($item['group']))
                                    <li>
                                        <a class="waves-effect waves-dark @if($segment === $item['id']) active @endif"
                                           href="{{ $item['route'] }}" aria-expanded="false">
                                            {!! $item['icon'] !!}
                                            <span class="hide-menu">{{ $item['name'] }}</span>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a class="has-arrow waves-effect waves-dark @if($segment === $item['id']) active @endif"
                                           href="javascript:void(0)" aria-expanded="false">
                                            {!! $item['icon'] !!}
                                            <span class="hide-menu">
                                                {{ $item['name'] }}
                                            </span>
                                        </a>
                                        <ul aria-expanded="false" class="collapse menu-child">
                                            @foreach($item['group'] as $child)
                                                @can($child['middleware'])
                                                    <li><a href="{{ $child['route'] }}">{{ $child['name'] }} </a></li>
                                                @endcan
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endif
                        @endcan
                    @endforeach
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

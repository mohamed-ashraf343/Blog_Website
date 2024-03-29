<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashbord.settings') }}"><i class="icon-speedometer"></i>
                    {{ __('words.dashbord') }} <span class="tag tag-info">جدید</span></a>
            </li>




            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>
                    {{ __('words.categories') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        @can('view', $setting)
                            <a class="nav-link" href="{{ route('dashbord.category.create') }}"><i
                                    class="icon-user-follow"></i>{{ __('words.add category') }}</a>
                        @endcan

                        <a class="nav-link" href="{{ route('dashbord.category.index') }}"><i class="icon-people"></i>
                            {{ __('words.categories') }}</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>
                    {{ __('words.posts') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashbord.posts.create') }}"><i
                                class="icon-user-follow"></i>{{ __('words.add post') }}</a>
                        <a class="nav-link" href="{{ route('dashbord.posts.index') }}"><i class="icon-people"></i>
                            {{ __('words.posts') }}</a>
                    </li>
                </ul>
            </li>



            @can('view', $setting)
                {{-- view users --}}
                <li class="nav-title">
                    {{ __('words.manger.mangement') }}
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashbord.users.index') }}"><i class="icon-people"></i>
                        {{ __('words.item.user') }} </a>
                    <a class="nav-link" href="{{ route('dashbord.users.create') }}"><i class="icon-user-follow"></i>
                        {{ __('words.add.users') }} </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashbord.settings') }}"><i class="icon-people"></i>
                        {{ trans('words.settings') }}</a>
                </li>
            @endcan



        </ul>
    </nav>
</div>

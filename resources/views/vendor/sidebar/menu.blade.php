<ul class="nav {{ setting('theme_sidebar_color','white')=='white' ? 'nav-primary' : '' }}">
    @foreach($groups as $group)
        {!! $group !!}
    @endforeach
</ul>

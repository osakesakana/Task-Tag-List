<ul class="nav nav-tabs nav-justified mb-3 mt-4">
    {{-- 「優先度：高」タブ --}}
    <li class="nav-item">
        <a href="{{ route('tasks.index') }}" class="nav-link {{ Request::routeIs('tasks.index') ? 'active' : 'text-muted bg-light'}}">
            優先度：高
        </a>
    </li>
    {{-- 「優先度：中」タブ --}}
    <li class="nav-item">
        <a href="{{ route('tasks.indexmiddle') }}" class="nav-link {{ Request::routeIs('tasks.indexmiddle') ? 'active' : 'text-muted bg-light'}}">
            優先度：中
        </a>
    </li>
    {{-- 「優先度：低」タブ --}}
    <li class="nav-item">
        <a href="{{ route('tasks.indexlow') }}" class="nav-link {{ Request::routeIs('tasks.indexlow') ? 'active' : 'text-muted bg-light'}}">
            優先度：低
        </a>
    </li>
</ul>
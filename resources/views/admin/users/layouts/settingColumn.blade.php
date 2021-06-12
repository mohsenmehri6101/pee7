<section id="setting" class="text-center">
    <a href="{{ route('admin.users.block',$user->id) }}" class="blockClass btn btn-sm {{ $user->isBan() ? 'btn-danger' : 'btn-outline-danger' }}">
        بلاک
    </a>
    <a href="{{ route('admin.users.show',$user->id) }}" class="btn btn-sm btn-outline-info">
        مشاهده
    </a>
    <a onclick='show_message("{{ $user->id }}","{{ $user->name }}")' class="btn text-success btn-sm btn-outline-success">
        پیام
    </a>
</section>

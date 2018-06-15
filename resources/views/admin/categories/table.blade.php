<table class="table table-bordered table-stripped">
    <thead>
    <tr>
        <th>Название</th>
        <th>Url</th>
        <th>Количество постов</th>
    </tr>
    </thead>

    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>
                @for($i = 0; $i < $category->depth; $i++) &mdash; @endfor
                <a href="{{ route('admin.category.show', $category) }}">{{ $category->name }}</a>
            </td>
            <td>
                {{ $category->slug }}
            </td>

            <td>
                {{ $category->posts->count() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
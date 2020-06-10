<li>
    @can('category-edit')
        <a href="{{route('edit.category', $child_category->id)}}" class="btn btn-xs btn-outline-success"><i
                class="fa fa-edit"></i></a>
    @endcan
    @can('category-delete')
        <a href="{{route('destroy.category', $child_category->id)}}"
           class="btn btn-xs btn-outline-danger"
           onclick="return confirm('Do you want to delete?')"><i
                class="fa fa-trash"></i></a>
    @endcan
    &nbsp;
    {{ $child_category->name }}
</li>
@if ($child_category->categories)
    <ul>
        @foreach ($child_category->categories as $childCategory)
            @include('admin.category.child_category', ['child_category' => $childCategory])
        @endforeach
    </ul>
@endif

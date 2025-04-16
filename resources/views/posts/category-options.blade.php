@foreach ($categories->where('parent_id', $parent_id) as $sub_category)
    <option value="{{ $sub_category->id }}">
        {{ str_repeat('--', $depth) }} {{ $sub_category->post_category_name }}
    </option>
    @include('posts.category-options', ['categories' => $categories, 'parent_id' => $sub_category->id, 'depth' => $depth + 1])
@endforeach

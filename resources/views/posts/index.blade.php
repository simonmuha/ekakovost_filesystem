@extends('layouts.school_admin_master')
@section('styles')


@endsection

@section ('content')
   



    <!-- Page Header -->
    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
        <div>
            <nav>
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item"><a href="/school/calendars">Prispevki</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pregled</li>
                </ol>
            </nav>
            <h1 class="page-title fw-medium fs-18 mb-0"></h1>
        </div>
        <div class="btn-list">
            
        </div>
    </div>
    <!-- Page Header Close -->
    <!-- Start:: row-1 -->
    <div class="row">
        <div class="row">
            <div class="col-xl-7">
                
            </div>
            <div class="col-xl-5">
                

            </div>
        </div>
    </div>
    <a href="/posts/create" class="btn btn-primary">Dodaj prispevek</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Naslov</th>
                <th>Kategorija</th>
                <th>Avtor</th>
                <th>Objavljeno</th>
                <th>Dejanja</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td><a href="posts/{{$post->id }}" "> {{ $post->post_title }}</a></td>
                    <td>{{ $post->category->post_category_name }}</td>
                    <td>{{ $post->author->name }}</td>
                    <td>{{ $post->post_published_at }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Uredi</a>
                        
                        <!-- Obrazec z JS potrditvijo -->
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Izbriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
    <!-- End:: row-1 -->
    


    

@endsection

@section('scripts')

<script>
    function confirmDelete(form) {
        if (confirm("Ali ste prepričani, da želite izbrisati ta prispevek?")) {
            return true; // Pošlje obrazec
        }
        return false; // Prekliče brisanje
    }
</script>


@endsection
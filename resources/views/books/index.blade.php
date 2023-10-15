@extends('books.layout')

@section('content')
<a href="{{ route('books.create') }}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>ID</th>
        <th>TITLE</th>
        <th>AUTHOR</th>
        <th>PAGE</th>
        <th>YEAR</th>
        <th>ACTION</th>
    </tr>
    @foreach ($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->page }}</td>
            <td>{{ $book->year }}</td>
            <td>
                <a href="{{ route('books.show', $book->id) }}" class="btn btn-success">Show</a>
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                <form onclick="return confirm('Are you sure?')" action="{{route('books.destroy', $book->id)}}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
{{ $books->links() }}
@endsection
@extends('admin.layouts.app')

@section('content')
    <div>
        <h2>{{ __('book.books') }}</h2>
        <h4><button class="addAuthor"><a href="{{ route('create_book')}}">{{ __('book.add_new_book') }}</a></button></h4>
        <table class="table table-striped notelists">
            <thead class="addAuthor">
            <tr>
                <td>{{ __('book.id') }}</td>
                <td>{{ __('book.name') }}</td>
                <td>{{ __('book.description') }}</td>
                <td>{{ __('book.content') }}</td>
                <td>{{ __('book.category') }}</td>
                <td>{{ __('book.download_count') }}</td>
                <td>{{ __('book.rating') }}</td>
                <td>{{ __('book.authors') }}</td>
                <td>{{ __('book.image') }}</td>
                <td colspan="2">{{ __('book.action') }}</td>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->full_name}}</td>
                    <td>{{ $book->getShortText($book->description) }}</td>
                    <td>{!! $book->getShortText($book->content) !!}</td>
                    <td>{{$book->category->category_name}}</td>
                    <td>{{$book->download_count}}</td>
                    <td>{{$book->rating}}</td>
                    <td>{{ $book->getAuthorsName()}}</td>
                    <td><img src="{{$book->image}}" style="width: 100px"></td>
                    <td class="px-0 mx-0" style="width: 50px">
                        <a href="{{ route('edit_book',$book->id)}}" class="btn btn-primary"><i
                                class="fa fa-edit"></i></a>
                    </td>
                    <td class="px-0 mx-0">
                        <form action="{{ route('destroy_book', $book->id)}}" method="post" class="px-0 mx-0">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $books->links() }}
    </div>
@endsection
@push('css')
    <style>
        .addAuthor{
            background: #222d32!important;
            padding: 10px!important;
            border-radius: 8px;
            color: #fff!important;
            margin-bottom: 15px;
        }
        .addAuthor>a{
            color: #fff!important;
        }
        .bgcolor{

        }

    </style>
@endpush
@push('js')
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endpush



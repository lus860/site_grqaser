@extends('admin.layouts.app')

@section('content')
    <div>
        <h2>{{ __('author.authors') }}</h2>
        <h4><button class="addAuthor"><a href="{{ route('create_author')}}">{{ __('author.add_new_author') }}</a></button></h4>
        <table class="table table-striped notelists">
            <thead class="addAuthor">
            <tr>
                <td>{{ __('author.id') }}</td>
                <td>{{ __('author.name') }}</td>
                <td>{{ __('author.was_born') }}</td>
                <td>{{ __('author.died') }}</td>
                <td>{{ __('author.views') }}</td>
                <td>{{ __('author.biography') }}</td>
                <td>{{ __('author.image') }}</td>
                <td colspan="2">{{ __('author.action') }}</td>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{  $author->id }}</td>
                    <td>{{  $author->full_name }}</td>
                    <td>{{  $author->was_born }}</td>
                    <td>{{  $author->died }}</td>
                    <td>{{  $author->views }}</td>
                    <td>{!! $author->getShortText($author->biography, 20) !!}</td>
                    <td><img src="{{$author->image}}" style="width: 100px"></td>
                    <td class="px-0 mx-0" style="width: 50px">
                        <a href="{{ route('edit_author',$author->id)}}" class="btn btn-primary"><i
                                class="fa fa-edit"></i></a>
                    </td>
                    <td class="px-0 mx-0">
                        <form action="{{ route('destroy_author', $author->id)}}" method="post" class="px-0 mx-0">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $authors->links() }}
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



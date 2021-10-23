@extends('admin.layouts.app')

@section('content')
    <div>
        <h2>{{ __('category.categories') }}</h2>
        <h4><button class="addCatgory"><a href="{{ route('create_category')}}">{{ __('category.add_new_category') }}</a></button></h4>
        <table class="table table-striped notelists">
            <thead class="addCatgory">
            <tr>
                <td>{{ __('category.id') }}</td>
                <td>{{ __('category.name') }}</td>
                <td colspan="2">{{ __('category.action') }}</td>

            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->category_name}}</td>
                    <td class="px-0 mx-0" style="width: 50px">
                        <a href="{{ route('edit_category',$category->id)}}" class="btn btn-primary"><i
                                class="fa fa-edit"></i></a>
                    </td>
                    <td class="px-0 mx-0">
                        <form action="{{ route('destroy_category', $category->id)}}" method="post" class="px-0 mx-0">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
@endsection
@push('css')
    <style>
        .addCatgory{
            background: #222d32!important;
            padding: 10px!important;
            border-radius: 8px;
            color: #fff!important;
            margin-bottom: 15px;
        }
        .addCatgory>a{
            color: #fff!important;
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



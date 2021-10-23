<ul class="list-group">
    @if(count($books) >0)
        @foreach($books as $book)
    <a href="{{ route('book',$book->id)}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
        <div class="flex-column">
            {{$book->full_name}}
        </div>

        <div class="image-parent">
            <img src="{{url($book->image)}}" class="img-fluid" alt="quixote">
        </div>
    </a>
        @endforeach
            <a href="{{ route('search_show',$search)}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <div class="flex-column">
                    <i class="fas fa-chevron-right"></i>
                    {{__('app.found', ['count' => count($books)])}} {{__('app.show_all_results')}}
                </div>
            </a>
        @else
        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
        <div class="flex-column">
            {{__('app.no_books_found')}}
        </div>
        </a>
    @endif

</ul>

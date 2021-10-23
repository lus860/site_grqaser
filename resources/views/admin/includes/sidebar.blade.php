{{--@if ($pending_orders_count>0)--}}
{{--    @alink(['url'=>route('admin.orders.pending'), 'icon'=>'fas fa-truck', 'title'=>'Новые заказы', 'counter'=>$pending_orders_count])@endalink--}}
{{--@endif--}}

{{--@alink(['icon'=>'fas fa-door-open', 'title'=>'Комнаты'])--}}
{{--@alink(['url'=>route('admin.rooms.index',['type'=>1]), 'icon'=>'fas fa-door-open', 'title'=>'Комнаты в Ереване'])@endalink--}}
{{--@alink(['url'=>route('admin.rooms.index',['type'=>0]), 'icon'=>'fas fa-door-open', 'title'=>'Комнаты в Севане'])@endalink--}}
{{--@endalink--}}
{{--@alink(['url'=>route('admin.rooms.index',['type'=>5]), 'icon'=>'fas fa-utensils', 'title'=>'Ресторан'])@endalink--}}
{{--@alink(['url'=>route('admin.rooms.index',['type'=>2]), 'icon'=>'fas fa-hot-tub', 'title'=>'Сауна'])@endalink--}}
{{--@alink(['url'=>route('admin.rooms.index',['type'=>3]), 'icon'=>'fas fa-beer', 'title'=>'Нор Партез'])@endalink--}}
{{--@alink(['url'=>route('admin.rooms.index',['type'=>4]), 'icon'=>'fas fa-hiking', 'title'=>'Тур'])@endalink--}}
{{--@alink(['url'=>route('admin.rooms_types.main'), 'icon'=>'fa fa-bed', 'title'=>'Условие для комнат']) @endalink--}}
{{--@alink(['url'=>route('admin.users.main'), 'icon'=>'fas fa-users', 'title'=>'Пользователи']) @endalink--}}
{{--@alink(['url'=>route('admin.banners',['exchange']), 'icon'=>'fas fa-exchange-alt', 'title'=>'Валюты']) @endalink--}}
{{--@alink(['url'=>route('admin.banners',['auth']), 'icon'=>'fas fa-image', 'title'=>'Фоновые изображения']) @endalink--}}

@alink(['url'=>route('admin.pages.main'), 'icon'=>'mdi mdi-receipt', 'title'=>'Страницы'])@endalink
@alink(['url'=>route('admin.main_slider.main'), 'icon'=>'fas fa-image', 'title'=>'Слайдер'])@endalink
@alink(['url'=>route('admin.news.main'), 'icon'=>'far fa-newspaper', 'title'=>'Новости']) @endalink
@alink(['url'=>route('admin.services.main'), 'icon'=>'fas fa-briefcase-medical', 'title'=>'Сервисы'])@endalink
@alink(['url'=>route('admin.banners', ['page'=>'info']), 'icon'=>'fas fa-info-circle', 'title'=>'Информация']) @endalink
@alink(['url'=>route('admin.languages.main'), 'icon'=>'mdi mdi-translate', 'title'=>'Языки']) @endalink






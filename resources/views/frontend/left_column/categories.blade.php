

 <ul class="nav  main-navigation collapse in">
             
 @foreach($categories as $category)
    <li class="{{Request::query('categories_id') == $category->id ? 'active' : ''}}"><a href="{{ route('shop', ['id' => 'category_id-' . $category->id]) }}">{{ title_case($category->name) }}</a></li>
 @endforeach
               
 </ul>
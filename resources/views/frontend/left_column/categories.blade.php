

 <ul class="nav  main-navigation collapse in">
             
 @foreach($categories as $category)
    <li>
       <a class="{{Request::query('id') == 'category_id-' . $category->id ? 'active-manu' : ''}}" href="{{ route('shop', ['id' => 'category_id-' . $category->id]) }}">{{ title_case($category->name) }}</a>
   </li>
 @endforeach
               
 </ul>
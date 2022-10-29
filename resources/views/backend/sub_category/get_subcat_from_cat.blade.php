<option>--Please Select--</option>
@foreach($get_list as $all_get_list)
<option value="{{ $all_get_list->name }}">{{ $all_get_list->name }}</option>
@endforeach

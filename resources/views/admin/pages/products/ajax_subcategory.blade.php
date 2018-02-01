<select class="form-control input-lg m-bot15" name="subcategory_id" id="sel1">
    @foreach($subcategories as $cate)
    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
    @endforeach
</select>

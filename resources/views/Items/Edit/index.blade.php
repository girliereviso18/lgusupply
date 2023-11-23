@extends('layouts.default')

@section('content')

<div class="container" style="margin-top: 52px;">
     @include('layouts.partials.messages') 
    <div class="row p-3">
        <div class="col-sm-6">
            <div class="card card-outline card-primary">
                <div class="card-header"><br>
                    <p class="card-title">Edit Items</p></br>
                </div>
                <div class="card-body"> 
                    <form action="{{route('items.edit.save')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="form-group">
                            <label>Item Name</label>
                            <input type="text" class="form-control" name="item_name" value="{{ $item->items_name}}" required="required">
                        </div>
                        <div class="form-group">
                            <label>Barcode</label>
                            <input type="text" class="form-control" name="barcode" value="{{ $item->barcode}}" required="required">
                        </div>
                         <div class="form-group">
                            <label>Category </label>
                             <select name="category_name" id="category_name" class="form-control" required>
                                        <option value="" disabled>Select Category</option>
                                @if($categories = App\Models\Category::get())
                                    @foreach($categories as $category)
                                        @if($item->category_name == $category->id)
                                            <option value="{{ $category->id }}" selected> {{ $category->category_name }}</option>
                                        @else
                                            <option value="{{ $category->id }}"> {{ $category->category_name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                          <div class="form-group">
                            <label>Description (optional)</label>
                            <textarea type="text" class="form-control" name="description" value="{{ $item->description}}" required="required">{{ $item->description}}</textarea>
                         </div>
                         <button class="btn btn-flat btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
            
        </div>
        @endSection
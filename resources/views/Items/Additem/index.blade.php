@extends('layouts.default')

@section('content')

<div class="container" style="margin-top: 52px;">
     @include('layouts.partials.messages') 
    <div class="row p-1">
        <div class="col-sm-12">
            <div class="card card-outline card-primary">
                <div class="card-header"><br>
                    <p class="card-title">Add Items</p></br>
                </div>
                <div class="card-body"> 
                    <form action="{{route('items.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Item Name and Brand</label>
                            <input type="text" name="item_name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Barcode</label>
                            <input type="text" name="barcode" class="form-control">
                        </div>
                         
                         <div class="form-group">
                            <label>Category </label>
                             <select name="category_name" id="category_name" class="form-control" required>
                                        <option value="" disabled selected>Select Category</option>
                                @if($categories = App\Models\Category::get())
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->category_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                          <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control">
                         </div>
                         <button class="btn btn-flat btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
            
        </div>
        @endSection
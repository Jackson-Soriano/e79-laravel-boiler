<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Categories
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="card p-0 col-md-8 overflow-hidden">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                            <th scope="col">List No.</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">User</th>
                            <th scope="col">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{--@php($i=1)--}}
                            @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->name}}</td>
                                {{--<td>{{$category->user_id}}</td>--}}
                                <td>
                                    @if($category->created_at==NULL)
                                        <span class="text-danger"> Date not Set...</span>
                                    @else
                                        {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div class="p-1">
                        {{$categories->links()}}
                    </div>
                    
                </div>
                {{-- insert form --}}
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> Add Category</div>
                        <div class="card-body">
                            <form action="{{route('store.category')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="category_name" class="form-label">Category</label>
                                    <input type="test" name="category_name" class="form-control" id="category_name" aria-describedby="addCategory">
                                    @error('category_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
    </div>
</x-app-layout>

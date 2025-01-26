@extends('layouts.app')

@section('title', 'Category List')

@section('content')
    <!-- Categories List (Vertical Full Width) -->
    <div class="space-y-8 px-32 mt-20">
        @foreach ($categories as $category)
            <!-- Dynamic Category Cards -->
            @include('components.categories.card_category', [
                'path' => route('categories.show', $category->id),
                'title' => $category->nama,
                'desc' => $category->deskripsi,
                'image' => Str::startsWith($category->path_img, 'http')
                    ? $category->path_img
                    : asset('storage/' . $category->path_img),
            ])
        @endforeach
    </div>
@endsection

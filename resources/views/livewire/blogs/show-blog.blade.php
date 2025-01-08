<div>
    <div class="max-w-2xl mx-auto space-y-6">
        <h1 class="text-4xl font-extrabold">{{ $blog->title }}</h1>
        <img src="{{ Storage::url($blog->thumbnail) }}" alt="thumbnail">
        <div class="text-justify blog-content">{!! $blog->content !!}</div>
    </div>
</div>


<div class="">
    <div class="max-w-2xl mx-auto space-y-6">
        <h1 class="text-4xl font-extrabold">{{ $blog->title }}</h1>
        <x-cld-image public-id="{{ $blog->public_id }}" />
        <div class="text-justify blog-content">{!! $blog->content !!}</div>
    </div>
</div>


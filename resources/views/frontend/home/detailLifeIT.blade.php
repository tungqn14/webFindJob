@extends("frontend.layouts.master")
@section("main")
    <main class="bg-white">
        <article class="life-it" style="margin-top: 100px">
            <div class="container">
                <div class="row">
                    <div class="my-3" style="width: 1200px;height: 150px;margin: 0 auto">
                        <img style="object-fit: cover;width: 100%;height: 100%" src="{{ $blog->images }}" alt="">
                    </div>
                    <h2 class="my-2">{{$blog->titleBlogs}}</h2>

                    <div class="my-3">
                        {!! $blog->description !!}
                    </div>

                    <div>
                        {!! $blog->content !!}
                    </div>
                </div>
            </div>
        </article>

    </main>


@endsection



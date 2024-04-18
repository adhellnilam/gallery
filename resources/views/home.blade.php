@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="{{ asset('img/sparkle.png') }}" alt="Logo" class="spark1">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border-radius: 5px; box-shadow: 2px 2px 3px 1px rgba(0, 0, 0, 0.263);">
                    <div class="card-header">
                        Welcome to orgGallery, {{ Auth::user()->name }}!
                    </div>

                    <div class="card-body">
                        <div class="row gambar">
                            @foreach($posts as $post)
                                <div class="col-md-4">
                                    <div class="card" style="border-radius: 5px; box-shadow: 2px 2px 3px 1px rgba(0, 0, 0, 0.263);">
                                        <div class="card-body">
                                            <div class="show_image">
                                                <a href="#{{ $post->id }}" data-toggle="modal"><img src="{{ asset('images/'.$post->cover) }}" alt=""></a>
                                            </div>                                            
                                        </div>

                                        <div class="post-footer">
                                            <div class="button-footer">
                                                <a class="btn btn-default btn-xs ic" href="#{{ $post->id }}" data-toggle="modal"><i class="fa fa-comment"></i></a>
                                                <span class="btn btn-default btn-xs no" href="#">{{ $post->comments->count() }}</span>

                                                <form action="{{ route('posts.like', $post->id) }}" class="btn btn-default btn-xs up" method="POST">
                                                    @csrf
                                                    @if ($post->likes()->where('user_id', auth()->user()->id)->exists())
                                                        <button class="lik" type="submit">
                                                            <i class="fas fa-thumbs-down"></i>
                                                        </button>
                                                    @else
                                                        <button class="lik" type="submit">
                                                            <i class="fas fa-thumbs-up"></i>
                                                        </button>
                                                    @endif
                                                </form>
                                                <span class="btn btn-default btn-xs no">{{ $post->likesCount() }}</span>

                                                <a class="btn btn-default btn-xs ic" href="{{ route('download.image', ['id' => $post->id]) }}"><i class="fa fa-download"></i></a>

                                                @if ($post->user_id === auth()->id())
                                                    <form class="btn btn-default btn-xs dell" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="del"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                @endif
                                            </div>      
                                                                            
                                        </div>                                        
                                    </div>
                                </div>

                                {{-- Modal --}}
                                <div class="modal fade " id="{{ $post->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="show_modal_image"><a href="#"><img src="{{ asset('images/'.$post->cover) }}" alt=""></a></div>
                                            </div>

                                            <div class="all" style="margin: 14px;">
                                                <div class="desc-post">
                                                    <h5>{{ $post->title }}</h5>
                                                    <p>{{ $post->description }}</p>
                                                </div>
                                            
                                                <div class="card-footer d-flex justify-content-between" style="border-radius: 5px;">
                                                    <span class="user-info">{{ $post->user->name }}</span>
                                                    <span class="user-time">{{ $post->created_at->diffForHumans() }}</span>
                                                </div>
                                            
                                                <br>
                                                <h6>Comment:</h6>
                                                <form action="{{ route('comments.store') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                        <input type="text" name="content" class="form-control" placeholder="Input Comment">
                                                    </div>
                                                    <button class="btn btn-success btn-block com" type="submit">Submit</button>
                                                </form>
                                                <hr>

                                                <div class="comment-list">
                                                    @if ($post->comments)
                                                        @foreach ($post->comments as $comment)
                                                            <div class="comment-body">
                                                                <p>{{ $comment->content }}</p>

                                                                @if (auth()->check() && $comment->user_id === auth()->user()->id)
                                                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-xs">
                                                                            <i class="fas fa-trash"></i> <!-- Icon untuk hapus -->
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                
                                                                <div style="text-align: right; margin-top: -33px; margin-bottom: 10px;">
                                                                    <span style="margin-left: auto;">by {{ $comment->user->name }}</span> |
                                                                    <span>{{ $comment->created_at->diffForHumans() }}</span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>                                                
                                            </div>
                                                                                      
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <img src="{{ asset('img/line.png') }}" alt="Logo" class="line">
    </div> {{-- End container --}}


@endsection

<style type="text/css">
    .show_image img {
        width:  100%;
        height: 98%;
    }

    .post-footer {
        padding: 13px;
        padding-top: 0px;
    }

    .show_modal_image img {
        width:  100%;
        height: auto%;
    }

    .desc-post {
        padding: 10px;
        margin-bottom: 5px
    }

    .comment-body {
        background-color: #E6A349;
        color: #fff;
        padding: 12px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .comment-body p {
        font-size: 15px;
        font-weight: 500;
        padding-bottom: 10px;
    }
</style>

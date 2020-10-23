@extends('template')


@section('tabcontent')


@include("blog.header", ["active" => "blog"])

<div class="container-fluid">
    @if(isset($blog))
        <h3 class="mt-5 mb-4">{{$blog->title}}</h3>
    @endif

    @if(isset($comments) && count($comments) > 0)
        <table class="table table-responsive w-100">
            <thead>
                <tr class="w-100">
                    <th style="width: 5%">S/N</th>
                    <th style="width: 45%">Comment</th>
                    <th style="width: 10%">Writer</th>
                    <th style="width: 10%">Status</th>
                    <th style="width: 20%">Date Sent</th>
                    <th style="width: 10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $index => $comment)
                    <tr id="{{$comment->id}}" class="comment-row">
                        <td>{{$index + 1}}</td>
                        <td class="comment-content">{{$comment->comment_content}}</td>
                        <td class="">
                            @if($comment->commentator_id != 0)
                                {{$comment->commentator->name}}
                            @elseif($comment->commentator_id == 0 && $comment->admin_id == Auth::user()->id)
                                {{"You"}}
                            @else
                                Admin: {{App\User::find($comment->admin_id)->name}}
                            @endif
                        </td>
                        <td>
                            @if($comment->status == "Pending")
                                <span class="text-danger" style="font-weight: bold">{{$comment->status}}</span>    
                            @else
                                <span class="text-success" style="font-weight: bold">{{$comment->status}}</span>
                            @endif
                        </td>
                        <td>{{$comment->created_at}}</td>
                        <td>
                            @if($comment->status == "Pending")
                                <a href="/update-comment-status/{{$comment->id}}"><span class="text-info" style="font-weight: bold">Approve</span></a>
                            @endif
                            <form action="/comments/{{$comment->id}}" class="form-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-danger p-0 m-0" style="background: none; border:0; font-weight: bold" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <span class="text-info">Click on a comment to edit it</span>
            </tfoot>
        </table>


        {{-- Section to add comments --}}
    <div>
        <button class="btn btn-block general-bg-color text-white" data-target="#add-comment-modal" data-toggle="modal">Add Comment</button>
    </div>        
    <div class="" style="width: 100%; display: grid; justify-content: center; align-items: center">{{ $comments->links() }}</div>
    @else

    <div class="text-info mt-5">
        No comments yet
    </div>

    @endif


    <div class="text-center mb-5 mt-5">
        <a href="{{route('blog.show', $blog->id)}}" class="general-text-color" style="font-weight: bold;"><span style="text-decoration: underline">Back</span></a>
    </div>
 
</div>




<div class="modal offset-md-2 col-md-8" id="edit-comment-modal">
    <form id="edit-comment-form" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Comment</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Comment</label>
                    <textarea class="form-control" name="comment_content" id="comment_content" required placeholder="Please enter comment"></textarea>
                </div>
                <div class="form-group">
                    <select class="form-control" name="status" id="status">
                        <option value="Pending">Pending</option>
                        <option value="Approved">Approved</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="bg-danger px-3 py-2 text-white border" type="button" data-dismiss="modal" data-target="#edit-comment-modal">Cancel</button>
                <button class="general-bg px-3 py-2 text-white border" type="submit">Update</button>
            </div>
        </div>
    </form>
</div>

<div class="modal offset-md-2 col-md-8" id="add-comment-modal">
    <form id="add-comment-form" method="POST" action="/comments">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add Comment</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="hidden" name="blog_id" value="{{$blog->id}}" />
            <input type="hidden" name="admin" value="admin" />
            <div class="modal-body">
                <div class="form-group">
                    <label>Comment</label>
                    <textarea class="form-control" name="comment_content" id="comment_content" required placeholder="Please enter comment"></textarea>
                </div>
                {{-- <div class="form-group">
                    <select class="form-control" name="status" id="status">
                        <option value="Pending">Pending</option>
                        <option value="Approved">Approved</option>
                    </select>
                </div> --}}
            </div>
            <div class="modal-footer">
                <button class="bg-danger px-3 py-2 text-white border" type="button" data-dismiss="modal" data-target="#edit-comment-modal">Cancel</button>
                <button class="general-bg px-3 py-2 text-white border" type="submit">Add</button>
            </div>
        </div>
    </form>
</div>


@endsection
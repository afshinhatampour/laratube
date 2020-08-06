@extends('layouts.app')


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $channel->name }}</div>

                <div class="card-body text-center">

                    <img src="{{ $channel->image() }}" class="channel-avatar">

                    @if($channel->editable())
                        <form action="{{ route('channels.update', $channel->id) }}" method="post"
                              enctype="multipart/form-data">

                            @csrf

                            @method('PATCH')

                            <div class="form-group">
                                <label class="float-left" for="name">name</label>
                                <input type="text" class="form-control" name="name" value="{{ $channel->name }}">
                            </div>

                            <div class="form-group">
                                <label class="float-left" for="description">description</label>
                                <textarea name="description" rows="10"
                                          class="form-control">{{ $channel->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="float-left" for="avatar">avatar</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="text-center">
                                <input type="submit" class="btn btn-primary text-white" value="Update profile">
                            </div>

                        </form>

                        @if($errors->any)
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    @else
                        <p>{{ $channel->description }}</p>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection

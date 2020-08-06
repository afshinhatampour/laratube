@extends('layouts.app')


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $channel->name }}</div>

                <div class="card-body">

                    <img src="{{ $channel->image() }}" class="channel-avatar">

                    <form action="{{ route('channels.update', $channel->id) }}" method="post" enctype="multipart/form-data">

                        @csrf

                        @method('PATCH')

                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" name="name" value="{{ $channel->name }}">
                        </div>

                        <div class="form-group">
                            <label for="description">description</label>
                            <textarea name="description" rows="10" class="form-control">{{ $channel->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="avatar">avatar</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="text-center">
                            <input type="submit" class="btn btn-secondary" value="Update">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

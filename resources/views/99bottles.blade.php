@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Details</div>

                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Song Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="name" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Number of Verses</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" v-model="numberOfVerses" @change="getSongLyrics">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Lyrics</div>
                    <div class="panel-body">
                        <p v-if="lyrics" v-html="lyrics"></p>
                        <p v-else>@{{ error }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
